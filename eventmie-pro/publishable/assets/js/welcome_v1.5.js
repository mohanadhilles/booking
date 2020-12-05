(window.webpackJsonp = window.webpackJsonp || []).push([
    [12], {
        563: function (s, t, e) {
            s.exports = e(564)
        },
        564: function (s, t, e) {
            e(23), window.moment = e(24), window.VueCarousel = e(84), Vue.use(VueCarousel), Vue.component("event-listing", e(128).default), Vue.component("banner-slider", e(580).default), window.app = new Vue({
                el: "#eventmie_app"
            })
        },
        580: function (s, t, e) {
            "use strict";
            e.r(t);
            var a = e(84);
            Vue.prototype.base_url = window.base_url;
            var i = {
                components: {
                    Carousel: a.Carousel,
                    Slide: a.Slide
                },
                props: ["banners", "is_logged", "is_customer", "is_organiser", "is_admin", "is_multi_vendor", "demo_mode", "check_session", "s_host"],
                data: () => ({
                    check: 1,
                    checkSession: 1,
                    verifyD: 1,
                }),
            },
                n = e(1),
                o = Object(n.a)(i, (function () {
                    var s = this,
                        t = s.$createElement,
                        e = s._self._c || t;
                    return e("carousel", {
                        attrs: {
                            autoplay: !1,
                            autoplayTimeout: 5e3,
                            scrollPerPage: !1,
                            perPage: 1,
                            paginationEnabled: !1
                        }
                    }, s._l(s.banners, (function (t, a) {
                        return e("slide", {
                            key: a,
                            class: "lgx-item-common",
                            attrs: {
                                item: t,
                                index: a
                            }
                        }, [e("div", {
                            staticClass: "slider-text-single"
                        }, [e("figure", [e("img", {
                            attrs: {
                                src: "/storage/" + t.image,
                                alt: ""
                            }
                        }), s._v(" "), e("figcaption", [e("div", {
                            staticClass: "lgx-container"
                        }, [e("div", {
                            staticClass: "lgx-hover-link"
                        }, [e("div", {
                            staticClass: "lgx-vertical"
                        }, [e("div", {
                            staticClass: "lgx-banner-info"
                        }, [e("h3", {
                            staticClass: "subtitle lgx-delay lgx-fadeInDown"
                        }, [s._v(s._s(t.subtitle))]), s._v(" "), e("h2", {
                            staticClass: "title lgx-delay lgx-fadeInDown"
                        }, [s._v(s._s(t.title))]), s._v(" "), e("div", {
                            staticClass: "action-area"
                        }, [s.demo_mode ? e("div", {
                            staticClass: "lgx-video-area"
                        }, [e("a", {
                            staticClass: "lgx-btn lgx-btn-white",
                            attrs: {
                                target: "_blank",
                                href: "https://classiebit.com/eventmie"
                            }
                        }, [e("i", {
                            staticClass: "fas fa-cloud-download-alt"
                        }), s._v(" Free Demo")]), s._v(" "), e("a", {
                            staticClass: "lgx-btn lgx-btn-success",
                            attrs: {
                                target: "_blank",
                                href: "https://classiebit.com/eventmie-pro"
                            }
                        }, [e("i", {
                            staticClass: "fas fa-shopping-cart"
                        }), s._v(" Purchase PRO ")]), s._v(" "), e("a", {
                            staticClass: "lgx-btn lgx-btn-white",
                            attrs: {
                                target: "_blank",
                                href: "https://eventmie-pro-docs.classiebit.com"
                            }
                        }, [e("i", {
                            staticClass: "fas fa-book"
                        }), s._v(" Docs ")]), s._v(" "), e("a", {
                            staticClass: "lgx-btn lgx-btn-primary",
                            attrs: {
                                target: "_blank",
                                href: "https://eventmie-pro-docs.classiebit.com/docs/1.5/changelog/changes"
                            }
                        }, [e("i", {
                            staticClass: "fas fa-book"
                        }), s._v(" See What's New v1.5 ")])]) : e("div", {
                            staticClass: "lgx-video-area"
                        }, [e("a", {
                            staticClass: "lgx-btn lgx-btn-red",
                            attrs: {
                                href: s.getRoute("eventmie.events_index")
                            }
                        }, [e("i", {
                            staticClass: "fas fa-calendar-day"
                        }), s._v(" " + s._s(s.trans("em.browse_events")))]), s._v(" "), s.is_logged ? s._e() : e("a", {
                            staticClass: "lgx-btn",
                            attrs: {
                                href: s.getRoute("eventmie.register_show")
                            }
                        }, [e("i", {
                            staticClass: "fas fa-door-open"
                        }), s._v(" " + s._s(s.trans("em.register")) + "\n                                            ")]), s._v(" "), s.is_logged && s.is_customer && s.is_multi_vendor ? e("a", {
                            staticClass: "lgx-btn",
                            attrs: {
                                href: s.getRoute("eventmie.profile")
                            }
                        }, [e("i", {
                            staticClass: "fas fa-person-booth"
                        }), s._v(" " + s._s(s.trans("em.become_organiser")) + "\n                                            ")]) : s._e(), s._v(" "), s.is_logged && s.is_organiser && s.is_multi_vendor ? e("a", {
                            staticClass: "lgx-btn",
                            attrs: {
                                href: s.getRoute("eventmie.myevents_form")
                            }
                        }, [e("i", {
                            staticClass: "fas fa-calendar-plus"
                        }), s._v(" " + s._s(s.trans("em.create_event")) + "\n                                            ")]) : s._e(), s._v(" "), s.is_logged && s.is_admin ? e("a", {
                            staticClass: "lgx-btn",
                            attrs: {
                                href: s.getRoute("eventmie.myevents_form")
                            }
                        }, [e("i", {
                            staticClass: "fas fa-calendar-plus"
                        }), s._v(" " + s._s(s.trans("em.create_event")) + "\n                                            ")]) : s._e()])])])])])])])])])])
                    })), 1)
                }), [], !1, null, null, null);
            t.default = o.exports
        }
    },
    [
        [563, 0, 1]
    ]
]);