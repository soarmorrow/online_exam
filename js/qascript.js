'use strict';

window.addEventListener('load', function() {
    new FastClick(document.body);
}, false);
$(function() {
    $(document).foundation();
});

var qaSet = new Array();
var getLength;
var qaSection;
var selectedAnswer = {};
var qa = {};
var testId;

var sliderWidth = '100%';
var slider = $('#qa-wrapper');
var render;


qa.QaModel = Backbone.Model.extend({
    defaults: {
        total: 0,
        answered: 0,
        completed: false
    }
});
var model = new qa.QaModel;
var counter = 0;
qa.QaView = Backbone.View.extend({
    el: 'body',
    initialize: function() {
        _.bindAll(this, 'prepareJSON', 'prev', 'next', 'controls', 'slideMenu');
        sessionStorage.clear();
        this.render();
    },
    events: {
        'click #startTest': 'startTest',
        'ifClicked input[type="radio"]': 'prepareJSON',
        'click #submitAnswers': 'submitAnswers',
        'click .side-menu-link': 'menu'
    },
    startTest: function(e) {
        $(".DateCountdown").TimeCircles().restart();
        $(this.el).find('#overlay').fadeOut(500);
    },
    render: function() {
        this.initializeTimer();
        this.getData(this.$el, this);
        render = this;
        $(this.el).find('#side-menu-list').niceScroll({cursorcolor: "#000", cursorwidth: 9});
        $(this.el).find('input[type="radio"]').on('ifClicked', this.prepareJSON);
        $(this.el).find('.qa-prev').on('click', this.prev);
        $(this.el).find('.qa-next').on('click', this.next);
        $(this.el).find('.slide-menu-toggle').on('click', this.slideMenu);
        $(document).on('contextmenu', this.controls);
    },
    initializeTimer: function() {
        $(".DateCountdown").TimeCircles({
            "bg_width": 0.7,
            "fg_width": 0.05333333333333334,
            "circle_bg_color": "#60686F",
            "count_past_zero": false,
            "time": {"Days": {"text": "Days", "color": "#FFCC66", "show": false}, "Hours": {"text": "Hours", "color": "#99CCFF", "show": false}, "Minutes": {"text": "Minutes", "color": "#BBFFBB", "show": true}, "Seconds": {"text": "Seconds", "color": "#FF9999", "show": true}}
        });
        $(".DateCountdown").TimeCircles().addListener(
                function(unit, value, total) {
                    if (total === 300) {
                        $(".DateCountdown").TimeCircles({time: {Days: {show: false}, Hours: {show: false}, Minutes: {color: '#ff0a00'}, Seconds: {color: '#ff0a00'}}});
                        $().toastmessage('showToast', {text: 'You got 5 minutes left', sticky: false, type: 'warning'});
                    }
                    if (total === 60) {
                        $("#timer").addClass('infinite-pulse');
                    }
                    if (total === 0) {
                        $("#timer").removeClass('infinite-pulse');
                        $().toastmessage('showToast', {text: 'Time up!! <br/>Thanks for taking the test', sticky: true, type: 'success'});
                        $.ajax({
                            url: "http://202.83.47.165test/submit/" + testId,
                            type: "POST",
                            contentType: 'application/json',
                            processData: false,
                            dataType: "JSON",
                            data: JSON.stringify(selectedAnswer),
                            success: function(data) {
                                console.log(data);
                            },
                            failure: function(errMsg) {
                                alert(errMsg);
                            }
                        });
                        setTimeout(function() {
                            $('#mask').slideDown();
                        }, 1000);
                    }
                }
        );
    },
    getData: function(el, that) {
        window.typeId = $("#type").val();
        $.ajax({url: '../type.json'/*'http://202.83.47.165:9999/exam/startexam/'+typeId*/, dataType: 'json', type: 'GET', success: function(response, status, xhr) {
                testId = response.test_id;
                console.log(response);
            }, error: function(resp) {
                console.log(resp);
            }});
        Object.size = function(obj) {
            var size = 0, key;
            for (key in obj) {
                if (obj.hasOwnProperty(key))
                    size++;
            }
            return size;
        };
        $.get('../sample.json'/*'http://202.83.47.165:9999/exam/startexam/' + testId*/, function(set) {
            var navigate = '<ul>';
            $(".DateCountdown").data('timer', (set.duration * 60)).TimeCircles().start();
            $.each(set.questions, function(title, sets) {
                qaSet[title] = {};
                $.each(sets.question, function(head, ques) {
                    qaSet[title][head] = [];
                    qaSet[title][head] = ques;
                });
            });
            getLength = qaSet.length;
            that.model.set({total: getLength});
            that.model.save;
            $.map(qaSet, function(data, index) {
                var qid = data.id;
                navigate += '<li><a href="#' + data.question + '" class="side-menu-link quest-id-' + qid + '" data-position="' + index + '">' + data.question + '</a></li>';
                qaSection = '<div class="qa-section"><div class="panel round" data-id="' + index + '" data-questionId="' + qid + '"><h1>' + data.question + '</h1></div><div class="answer-section">\n';
                var answers = '';
                $.each(set.questions, function(title, sets) {
                    $.each(sets.answer, function(index, data) {
                        if (qid === data.ques_id) {
                            answers += '<input type="radio" data-id="' + data.id + '" name="' + qid + '" value="' + data.answer + '"><label>' + data.answer + '</label>';
                        }
                    });
                });
                qaSection += answers + '</div></div>';
                el.find('#qa-wrapper').append(qaSection);
            });
            navigate += '</ul>';
            el.find('#side-menu-list #side-menu').append(navigate);
            el.find('#qa-wrapper').append('<div class="qa-section"><button class="button success large" id="submitAnswers">Submit Answers</button></div>');
            $('input[type="radio"]').each(function() {
                var self = $(this),
                        label = self.next(),
                        label_text = label.text();

                label.remove();
                self.iCheck({
                    checkboxClass: 'icheckbox_line-blue',
                    radioClass: 'iradio_line-blue',
                    insert: '<div class="icheck_line-icon"></div>' + label_text
                });
            });
            var prev = $('.qa-prev');
            var next = $('.qa-next');
            var left;
            setInterval(function() {
                if (!prev.hasClass('disabled') || !next.hasClass('disabled')) {
                    left = slider.css('left');
                    left = left.slice(0, left.length - 2);
                    if (left >= 0 && !prev.hasClass('disabled') || left === 'undefined' || left === 'au' || typeof (left) === undefined)
                    {
                        prev.addClass('disabled');
                        prev.html('<span data-tooltip class="has-tip" title="This is the first question"><i class="fa fa-arrow-circle-left"> </i> back</span>');
                        return false;
                    }
                    if (left <= -(getLength * 774.6) && !next.hasClass('disabled')) {
                        next.addClass('disabled');
                        next.html('<span data-tooltip class="has-tip" title="You can\'t scroll further">next <i class="fa fa-arrow-circle-right"> </i></span>');
                        return false;
                    }
                    if (left >= -(getLength * 774.6) && next.hasClass('disabled')) {
                        next.removeClass('disabled');
                        next.html('next  <i class="fa fa-arrow-circle-right">');
                        return false;
                    }
                }
            }, 100);
        });
    },
    prepareJSON: function(evt) {
        var ques_id = evt.currentTarget.name;
        var answ_id = evt.currentTarget.getAttribute('data-id');
        selectedAnswer[ques_id] = [];
        selectedAnswer[ques_id].push(answ_id);
        if (typeof (sessionStorage.getItem(ques_id)) === undefined || sessionStorage.getItem(ques_id) === null) {
            model.set({answered: ++counter});
            model.save;
        }
        var sidelink = $("#side-menu-list #side-menu ul li a");
        if (!sidelink.find(".quest-id-" + ques_id).hasClass("attended")) {
            $("#side-menu-list #side-menu ul li a.quest-id-" + ques_id).addClass('attended');
        }
        sessionStorage.setItem(ques_id, true);
        console.clear();
        console.log(JSON.stringify(selectedAnswer));
    },
    submitAnswers: function(e) {
        $(".DateCountdown").TimeCircles().stop();
        if ($('#timer').hasClass('infinite-pulse')) {
            $('#timer').removeClass('infinite-pulse');
        }
        sessionStorage.clear();
        $('#mask').slideDown('slow');
        $().toastmessage('showToast', {text: 'Thanks for taking the test', sticky: true, type: 'success'});
        $.ajax({
            url: "http://202.83.47.165/test/submit/" + testId,
            type: "POST",
            contentType: 'application/json',
            processData: false,
            dataType: "JSON",
            data: JSON.stringify(selectedAnswer),
            success: function(data) {
                console.log(data);
            },
            failure: function(errMsg) {
                alert(errMsg);
            }
        });
    },
    prev: function(e) {
        var prev = $(e.currentTarget);
        var sliderCount = $('div.qa-section', slider).length;
        slider.width(sliderCount * sliderWidth);
        if (!(prev.hasClass('disabled')))
            $('#qa-wrapper').animate({left: '+=' + sliderWidth}, 800, 'easeInOutExpo');
        e.preventDefault();
    },
    next: function(evt) {
        var next = $(evt.currentTarget);
        var sliderCount = $('div.qa-section', slider).length;
        slider.width(sliderCount * sliderWidth);
        if ($('.qa-prev').hasClass('disabled')) {
            $('.qa-prev').removeClass('disabled').html('<i class="fa fa-arrow-circle-left"> </i> back');
        }
        if (!(next.hasClass('disabled')))
            $('#qa-wrapper').animate({left: '-=' + sliderWidth}, 800, 'easeInOutExpo');
        evt.preventDefault();
    },
    slideMenu: function(evt) {
        var menu = $('body');
        if (menu.css('left') === '0px' || menu.css('left') === 'auto') {
            menu.stop().animate({
                left: '222px'
            });
        }
        else {
            menu.stop().animate({
                left: 0
            });
        }
        evt.preventDefault();
    },
    menu: function(event) {
        if ($("#mask").css('display') === 'none') {
            var position = event.currentTarget.getAttribute('data-position');
            $('#qa-wrapper').animate({left: '-' + position * 100 + '%'}, 800, 'easeInOutExpo');
            var prev = $('.qa-prev');
            var next = $('.qa-next');
            if (position > 0 && prev.hasClass('disabled')) {
                prev.removeClass('disabled').html('<i class="fa fa-arrow-circle-left"> </i> back');
            }
        }
        event.preventDefault();
    },
    controls: function(event) {
        console.log('contextmenu disabled on purpose');
        if ($("#mask").css('display') === 'block') {
            $("#qa-container").fadeOut(1000, function() {
                $(this).remove();
                $("#wrapper").empty().html('<div data-alert class="alert-box warning" style="bottom:7px;">Question box is removed from page on purpose. Thanks for taking the test.<a href="#" class="close">&times;</a></div>');
            });
        }
        event.preventDefault();
    }
});
qa.Progress = Backbone.View.extend({
    model: model,
    el: '#progress',
    template: _.template($('#progress-template').html()),
    initialize: function() {
        this.model.bind('change', this.render, this);
    },
    render: function() {
        var data = this.model.toJSON();
        var progress = Math.floor((data.answered / data.total) * 100);
        this.model.set({'progress': progress});
        this.$el.html(this.template(this.model.toJSON()));
        return this;
    }
});
var App = new qa.QaView({model: model});
var progress = new qa.Progress();
