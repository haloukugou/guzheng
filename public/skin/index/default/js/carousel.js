/*产品滚动切换，如：首页
*依赖nav.js的window.theme和window.theme.fn和owl.carousel.min.js
*/
(function(theme, $) {
    theme = theme || {};
    var instanceName = '__carousel';
    var PluginCarousel = function($el, opts) {
        return this.initialize($el, opts);
    };
    PluginCarousel.defaults = {
        loop: true,
        responsive: {
            0: {
                items: 2
            },
            479: {
                items: 3
            },
            768: {
                items: 4
            },
            979: {
                items: 5
            },
            1199: {
                items: 5
            }
        },
        navText: []
    };
    PluginCarousel.prototype = {
        initialize: function($el, opts) {
            if ($el.data(instanceName)) {
                return this;
            }
            this.$el = $el;
            this
                .setData()
                .setOptions(opts)
                .build();
            return this;
        },
        setData: function() {
            this.$el.data(instanceName, this);
            return this;
        },
        setOptions: function(opts) {
            this.options = $.extend(true, {}, PluginCarousel.defaults, opts, {
                wrapper: this.$el
            });
            return this;
        },
        build: function() {
            if (!($.isFunction($.fn.owlCarousel))) {
                return this;
            }
            var self = this,
                $el = this.options.wrapper;
            //添加皮肤样式
            $el.addClass('owl-theme');
            //添加Loading
            $el.addClass('owl-loading');
            //根据html位置属性强制右侧效果
            if ($('html').attr('dir') == 'rtl') {
                this.options = $.extend(true, {}, this.options, {
                    rtl: true
                });
            }
            if (this.options.items == 1) {
                this.options.responsive = {}
            }
            if (this.options.items > 4) {
                this.options = $.extend(true, {}, this.options, {
                    responsive: {
                        1199: {
                            items: this.options.items
                        }
                    }
                });
            }
            //高度自适应
            if (this.options.autoHeight) {
                var itemsHeight = [];
                $el.find('.owl-item').each(function(){
                    if( $(this).hasClass('active') ) {
                        itemsHeight.push( $(this).height() );
                    }
                });
                $(window).afterResize(function() {
                    $el.find('.owl-stage-outer').height( Math.max.apply(null, itemsHeight) );
                });
                $(window).on('load', function() {
                    $el.find('.owl-stage-outer').height( Math.max.apply(null, itemsHeight) );
                });
            }
            //初始化OwlCarousel
            $el.owlCarousel(this.options).addClass('owl-carousel-init');
            //同步
            if ($el.attr('data-sync')) {
                $el.on('change.owl.carousel', function(event) {
                    if (event.namespace && event.property.name === 'position') {
                        var target = event.relatedTarget.relative(event.property.value, true);
                        $( $el.data('sync') ).owlCarousel('to', target, 300, true);                     
                    }
                });
            }
            //Carousel中间活动项目
            if( $el.hasClass('carousel-center-active-item') ) {
                var itemsActive    = $el.find('.owl-item.active'),
                    indexCenter    = Math.floor( ($el.find('.owl-item.active').length - 1) / 2 ),
                    itemCenter     = itemsActive.eq(indexCenter);
                itemCenter.addClass('current');
                $el.on('change.owl.carousel', function(event) {
                    $el.find('.owl-item').removeClass('current');
                    setTimeout(function(){
                        var itemsActive    = $el.find('.owl-item.active'),
                            itemCenter     = itemsActive.eq(indexCenter);
                        itemCenter.addClass('current');
                    }, 100);
                });
                //刷新
                $el.trigger('refresh.owl.carousel');
            }
            //移除Loading
            $el.removeClass('owl-loading');
            //移除高度
            $el.css('height', 'auto');
            return this;
        }
    };
    //显示范围
    $.extend(theme, {
        PluginCarousel: PluginCarousel
    });
    //jquery插件
    $.fn.themePluginCarousel = function(opts) {
        return this.map(function() {
            var $this = $(this);

            if ($this.data(instanceName)) {
                return $this.data(instanceName);
            } else {
                return new PluginCarousel($this, opts);
            }
        });
    }
}).apply(this, [window.theme, jQuery]);
//产品Carousel
(function($) {
    'use strict';
    if ($.isFunction($.fn['themePluginCarousel'])) {
        $(function() {
            $('[data-plugin-carousel]:not(.manual), .owl-carousel:not(.manual)').each(function() {
                var $this = $(this),
                    opts;
                var pluginOptions = theme.fn.getOptions($this.data('plugin-options'));
                if (pluginOptions)
                    opts = pluginOptions;
                $this.themePluginCarousel(opts);
            });
        });
    }
}).apply(this, [jQuery]);