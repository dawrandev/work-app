/*!
 * ApexCharts v3.10.1
 * (c) 2018-2019 Juned Chhipa
 * Released under the MIT License.
 */
!(function (t, e) {
  "object" == typeof exports && "undefined" != typeof module
    ? (module.exports = e())
    : "function" == typeof define && define.amd
    ? define(e)
    : ((t = t || self).ApexCharts = e());
})(this, function () {
  "use strict";
  function t(e) {
    return (t =
      "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
        ? function (t) {
            return typeof t;
          }
        : function (t) {
            return t &&
              "function" == typeof Symbol &&
              t.constructor === Symbol &&
              t !== Symbol.prototype
              ? "symbol"
              : typeof t;
          })(e);
  }
  function e(t, e) {
    if (!(t instanceof e))
      throw new TypeError("Cannot call a class as a function");
  }
  function i(t, e) {
    for (var i = 0; i < e.length; i++) {
      var a = e[i];
      (a.enumerable = a.enumerable || !1),
        (a.configurable = !0),
        "value" in a && (a.writable = !0),
        Object.defineProperty(t, a.key, a);
    }
  }
  function a(t, e, a) {
    return e && i(t.prototype, e), a && i(t, a), t;
  }
  function s(t, e, i) {
    return (
      e in t
        ? Object.defineProperty(t, e, {
            value: i,
            enumerable: !0,
            configurable: !0,
            writable: !0,
          })
        : (t[e] = i),
      t
    );
  }
  function n(t, e) {
    var i = Object.keys(t);
    if (Object.getOwnPropertySymbols) {
      var a = Object.getOwnPropertySymbols(t);
      e &&
        (a = a.filter(function (e) {
          return Object.getOwnPropertyDescriptor(t, e).enumerable;
        })),
        i.push.apply(i, a);
    }
    return i;
  }
  function r(t) {
    for (var e = 1; e < arguments.length; e++) {
      var i = null != arguments[e] ? arguments[e] : {};
      e % 2
        ? n(i, !0).forEach(function (e) {
            s(t, e, i[e]);
          })
        : Object.getOwnPropertyDescriptors
        ? Object.defineProperties(t, Object.getOwnPropertyDescriptors(i))
        : n(i).forEach(function (e) {
            Object.defineProperty(t, e, Object.getOwnPropertyDescriptor(i, e));
          });
    }
    return t;
  }
  function o(t, e) {
    if ("function" != typeof e && null !== e)
      throw new TypeError("Super expression must either be null or a function");
    (t.prototype = Object.create(e && e.prototype, {
      constructor: { value: t, writable: !0, configurable: !0 },
    })),
      e && h(t, e);
  }
  function l(t) {
    return (l = Object.setPrototypeOf
      ? Object.getPrototypeOf
      : function (t) {
          return t.__proto__ || Object.getPrototypeOf(t);
        })(t);
  }
  function h(t, e) {
    return (h =
      Object.setPrototypeOf ||
      function (t, e) {
        return (t.__proto__ = e), t;
      })(t, e);
  }
  function c(t, e) {
    return !e || ("object" != typeof e && "function" != typeof e)
      ? (function (t) {
          if (void 0 === t)
            throw new ReferenceError(
              "this hasn't been initialised - super() hasn't been called"
            );
          return t;
        })(t)
      : e;
  }
  function d(t) {
    return (
      (function (t) {
        if (Array.isArray(t)) {
          for (var e = 0, i = new Array(t.length); e < t.length; e++)
            i[e] = t[e];
          return i;
        }
      })(t) ||
      (function (t) {
        if (
          Symbol.iterator in Object(t) ||
          "[object Arguments]" === Object.prototype.toString.call(t)
        )
          return Array.from(t);
      })(t) ||
      (function () {
        throw new TypeError("Invalid attempt to spread non-iterable instance");
      })()
    );
  }
  var u = (function () {
      function i() {
        e(this, i);
      }
      return (
        a(
          i,
          [
            {
              key: "shadeRGBColor",
              value: function (t, e) {
                var i = e.split(","),
                  a = t < 0 ? 0 : 255,
                  s = t < 0 ? -1 * t : t,
                  n = parseInt(i[0].slice(4)),
                  r = parseInt(i[1]),
                  o = parseInt(i[2]);
                return (
                  "rgb(" +
                  (Math.round((a - n) * s) + n) +
                  "," +
                  (Math.round((a - r) * s) + r) +
                  "," +
                  (Math.round((a - o) * s) + o) +
                  ")"
                );
              },
            },
            {
              key: "shadeHexColor",
              value: function (t, e) {
                var i = parseInt(e.slice(1), 16),
                  a = t < 0 ? 0 : 255,
                  s = t < 0 ? -1 * t : t,
                  n = i >> 16,
                  r = (i >> 8) & 255,
                  o = 255 & i;
                return (
                  "#" +
                  (
                    16777216 +
                    65536 * (Math.round((a - n) * s) + n) +
                    256 * (Math.round((a - r) * s) + r) +
                    (Math.round((a - o) * s) + o)
                  )
                    .toString(16)
                    .slice(1)
                );
              },
            },
            {
              key: "shadeColor",
              value: function (t, e) {
                return e.length > 7
                  ? this.shadeRGBColor(t, e)
                  : this.shadeHexColor(t, e);
              },
            },
          ],
          [
            {
              key: "bind",
              value: function (t, e) {
                return function () {
                  return t.apply(e, arguments);
                };
              },
            },
            {
              key: "isObject",
              value: function (e) {
                return e && "object" === t(e) && !Array.isArray(e) && null != e;
              },
            },
            {
              key: "listToArray",
              value: function (t) {
                var e,
                  i = [];
                for (e = 0; e < t.length; e++) i[e] = t[e];
                return i;
              },
            },
            {
              key: "extend",
              value: function (t, e) {
                var i = this;
                "function" != typeof Object.assign &&
                  (Object.assign = function (t) {
                    if (null == t)
                      throw new TypeError(
                        "Cannot convert undefined or null to object"
                      );
                    for (var e = Object(t), i = 1; i < arguments.length; i++) {
                      var a = arguments[i];
                      if (null != a)
                        for (var s in a) a.hasOwnProperty(s) && (e[s] = a[s]);
                    }
                    return e;
                  });
                var a = Object.assign({}, t);
                return (
                  this.isObject(t) &&
                    this.isObject(e) &&
                    Object.keys(e).forEach(function (n) {
                      i.isObject(e[n]) && n in t
                        ? (a[n] = i.extend(t[n], e[n]))
                        : Object.assign(a, s({}, n, e[n]));
                    }),
                  a
                );
              },
            },
            {
              key: "extendArray",
              value: function (t, e) {
                var a = [];
                return (
                  t.map(function (t) {
                    a.push(i.extend(e, t));
                  }),
                  (t = a)
                );
              },
            },
            {
              key: "monthMod",
              value: function (t) {
                return t % 12;
              },
            },
            {
              key: "addProps",
              value: function (t, e, i) {
                "string" == typeof e && (e = e.split(".")),
                  (t[e[0]] = t[e[0]] || {});
                var a = t[e[0]];
                return (
                  e.length > 1
                    ? (e.shift(), this.addProps(a, e, i))
                    : (t[e[0]] = i),
                  t
                );
              },
            },
            {
              key: "clone",
              value: function (e) {
                if ("[object Array]" === Object.prototype.toString.call(e)) {
                  for (var i = [], a = 0; a < e.length; a++)
                    i[a] = this.clone(e[a]);
                  return i;
                }
                if ("object" === t(e)) {
                  var s = {};
                  for (var n in e)
                    e.hasOwnProperty(n) && (s[n] = this.clone(e[n]));
                  return s;
                }
                return e;
              },
            },
            {
              key: "log10",
              value: function (t) {
                return Math.log(t) / Math.LN10;
              },
            },
            {
              key: "roundToBase10",
              value: function (t) {
                return Math.pow(10, Math.floor(Math.log10(t)));
              },
            },
            {
              key: "roundToBase",
              value: function (t, e) {
                return Math.pow(e, Math.floor(Math.log(t) / Math.log(e)));
              },
            },
            {
              key: "parseNumber",
              value: function (t) {
                return null === t ? t : parseFloat(t);
              },
            },
            {
              key: "randomId",
              value: function () {
                return (Math.random() + 1).toString(36).substring(4);
              },
            },
            {
              key: "noExponents",
              value: function (t) {
                var e = String(t).split(/[eE]/);
                if (1 == e.length) return e[0];
                var i = "",
                  a = t < 0 ? "-" : "",
                  s = e[0].replace(".", ""),
                  n = Number(e[1]) + 1;
                if (n < 0) {
                  for (i = a + "0."; n++; ) i += "0";
                  return i + s.replace(/^\-/, "");
                }
                for (n -= s.length; n--; ) i += "0";
                return s + i;
              },
            },
            {
              key: "getDimensions",
              value: function (t) {
                var e = getComputedStyle(t),
                  i = [],
                  a = t.clientHeight,
                  s = t.clientWidth;
                return (
                  (a -= parseFloat(e.paddingTop) + parseFloat(e.paddingBottom)),
                  (s -= parseFloat(e.paddingLeft) + parseFloat(e.paddingRight)),
                  i.push(s),
                  i.push(a),
                  i
                );
              },
            },
            {
              key: "getBoundingClientRect",
              value: function (t) {
                var e = t.getBoundingClientRect();
                return {
                  top: e.top,
                  right: e.right,
                  bottom: e.bottom,
                  left: e.left,
                  width: e.width,
                  height: e.height,
                  x: e.x,
                  y: e.y,
                };
              },
            },
            {
              key: "hexToRgba",
              value: function () {
                var t =
                    arguments.length > 0 && void 0 !== arguments[0]
                      ? arguments[0]
                      : "#999999",
                  e =
                    arguments.length > 1 && void 0 !== arguments[1]
                      ? arguments[1]
                      : 0.6;
                "#" !== t.substring(0, 1) && (t = "#999999");
                var i = t.replace("#", "");
                i = i.match(new RegExp("(.{" + i.length / 3 + "})", "g"));
                for (var a = 0; a < i.length; a++)
                  i[a] = parseInt(1 === i[a].length ? i[a] + i[a] : i[a], 16);
                return void 0 !== e && i.push(e), "rgba(" + i.join(",") + ")";
              },
            },
            {
              key: "getOpacityFromRGBA",
              value: function (t) {
                return (t = t.match(
                  /^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i
                ))[3];
              },
            },
            {
              key: "rgb2hex",
              value: function (t) {
                return (t = t.match(
                  /^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i
                )) && 4 === t.length
                  ? "#" +
                      ("0" + parseInt(t[1], 10).toString(16)).slice(-2) +
                      ("0" + parseInt(t[2], 10).toString(16)).slice(-2) +
                      ("0" + parseInt(t[3], 10).toString(16)).slice(-2)
                  : "";
              },
            },
            {
              key: "isColorHex",
              value: function (t) {
                return /(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(t);
              },
            },
            {
              key: "polarToCartesian",
              value: function (t, e, i, a) {
                var s = ((a - 90) * Math.PI) / 180;
                return { x: t + i * Math.cos(s), y: e + i * Math.sin(s) };
              },
            },
            {
              key: "escapeString",
              value: function (t) {
                var e =
                    arguments.length > 1 && void 0 !== arguments[1]
                      ? arguments[1]
                      : "x",
                  i = t.toString().slice();
                return (i = i.replace(
                  /[` ~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi,
                  e
                ));
              },
            },
            {
              key: "negToZero",
              value: function (t) {
                return t < 0 ? 0 : t;
              },
            },
            {
              key: "moveIndexInArray",
              value: function (t, e, i) {
                if (i >= t.length)
                  for (var a = i - t.length + 1; a--; ) t.push(void 0);
                return t.splice(i, 0, t.splice(e, 1)[0]), t;
              },
            },
            {
              key: "extractNumber",
              value: function (t) {
                return parseFloat(t.replace(/[^\d\.]*/g, ""));
              },
            },
            {
              key: "randomString",
              value: function (t) {
                for (
                  var e = "",
                    i = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz",
                    a = 0;
                  a < t;
                  a++
                )
                  e += i.charAt(Math.floor(Math.random() * i.length));
                return e;
              },
            },
            {
              key: "findAncestor",
              value: function (t, e) {
                for (; (t = t.parentElement) && !t.classList.contains(e); );
                return t;
              },
            },
            {
              key: "setELstyles",
              value: function (t, e) {
                for (var i in e) e.hasOwnProperty(i) && (t.style.key = e[i]);
              },
            },
            {
              key: "isNumber",
              value: function (t) {
                return (
                  !isNaN(t) &&
                  parseFloat(Number(t)) === t &&
                  !isNaN(parseInt(t, 10))
                );
              },
            },
            {
              key: "isFloat",
              value: function (t) {
                return Number(t) === t && t % 1 != 0;
              },
            },
            {
              key: "isSafari",
              value: function () {
                return /^((?!chrome|android).)*safari/i.test(
                  navigator.userAgent
                );
              },
            },
            {
              key: "isFirefox",
              value: function () {
                return (
                  navigator.userAgent.toLowerCase().indexOf("firefox") > -1
                );
              },
            },
            {
              key: "isIE11",
              value: function () {
                if (
                  -1 !== window.navigator.userAgent.indexOf("MSIE") ||
                  window.navigator.appVersion.indexOf("Trident/") > -1
                )
                  return !0;
              },
            },
            {
              key: "isIE",
              value: function () {
                var t = window.navigator.userAgent,
                  e = t.indexOf("MSIE ");
                if (e > 0)
                  return parseInt(t.substring(e + 5, t.indexOf(".", e)), 10);
                if (t.indexOf("Trident/") > 0) {
                  var i = t.indexOf("rv:");
                  return parseInt(t.substring(i + 3, t.indexOf(".", i)), 10);
                }
                var a = t.indexOf("Edge/");
                return (
                  a > 0 && parseInt(t.substring(a + 5, t.indexOf(".", a)), 10)
                );
              },
            },
          ]
        ),
        i
      );
    })(),
    g = (function () {
      function t(i) {
        e(this, t), (this.ctx = i), (this.w = i.w);
      }
      return (
        a(t, [
          {
            key: "getDefaultFilter",
            value: function (t, e) {
              var i = this.w;
              t.unfilter(!0),
                new window.SVG.Filter().size("120%", "180%", "-5%", "-40%"),
                "none" !== i.config.states.normal.filter
                  ? this.applyFilter(
                      t,
                      e,
                      i.config.states.normal.filter.type,
                      i.config.states.normal.filter.value
                    )
                  : i.config.chart.dropShadow.enabled &&
                    this.dropShadow(t, i.config.chart.dropShadow, e);
            },
          },
          {
            key: "addNormalFilter",
            value: function (t, e) {
              var i = this.w;
              i.config.chart.dropShadow.enabled &&
                this.dropShadow(t, i.config.chart.dropShadow, e);
            },
          },
          {
            key: "addLightenFilter",
            value: function (t, e, i) {
              var a = this,
                s = this.w,
                n = i.intensity;
              if (!u.isFirefox()) {
                t.unfilter(!0);
                var r = new window.SVG.Filter();
                r.size("120%", "180%", "-5%", "-40%"),
                  t.filter(function (t) {
                    var i = s.config.chart.dropShadow;
                    (r = i.enabled
                      ? a.addShadow(t, e, i)
                      : t).componentTransfer({
                      rgb: { type: "linear", slope: 1.5, intercept: n },
                    });
                  }),
                  t.filterer.node.setAttribute("filterUnits", "userSpaceOnUse");
              }
            },
          },
          {
            key: "addDarkenFilter",
            value: function (t, e, i) {
              var a = this,
                s = this.w,
                n = i.intensity;
              if (!u.isFirefox()) {
                t.unfilter(!0);
                var r = new window.SVG.Filter();
                r.size("120%", "180%", "-5%", "-40%"),
                  t.filter(function (t) {
                    var i = s.config.chart.dropShadow;
                    (r = i.enabled
                      ? a.addShadow(t, e, i)
                      : t).componentTransfer({
                      rgb: { type: "linear", slope: n },
                    });
                  }),
                  t.filterer.node.setAttribute("filterUnits", "userSpaceOnUse");
              }
            },
          },
          {
            key: "applyFilter",
            value: function (t, e, i) {
              var a =
                arguments.length > 3 && void 0 !== arguments[3]
                  ? arguments[3]
                  : 0.5;
              switch (i) {
                case "none":
                  this.addNormalFilter(t, e);
                  break;
                case "lighten":
                  this.addLightenFilter(t, e, { intensity: a });
                  break;
                case "darken":
                  this.addDarkenFilter(t, e, { intensity: a });
              }
            },
          },
          {
            key: "addShadow",
            value: function (t, e, i) {
              var a = i.blur,
                s = i.top,
                n = i.left,
                r = i.color,
                o = i.opacity,
                l = t
                  .flood(Array.isArray(r) ? r[e] : r, o)
                  .composite(t.sourceAlpha, "in")
                  .offset(n, s)
                  .gaussianBlur(a)
                  .merge(t.source);
              return t.blend(t.source, l);
            },
          },
          {
            key: "dropShadow",
            value: function (t, e) {
              var i =
                  arguments.length > 2 && void 0 !== arguments[2]
                    ? arguments[2]
                    : 0,
                a = e.top,
                s = e.left,
                n = e.blur,
                r = e.color,
                o = e.opacity,
                l = e.noUserSpaceOnUse,
                h = this.w;
              return (
                t.unfilter(!0),
                u.isIE() && "radialBar" === h.config.chart.type
                  ? t
                  : ((r = Array.isArray(r) ? r[i] : r),
                    new window.SVG.Filter().size("120%", "180%", "-5%", "-40%"),
                    t.filter(function (t) {
                      var e = null;
                      (e =
                        u.isSafari() || u.isFirefox() || u.isIE()
                          ? t
                              .flood(r, o)
                              .composite(t.sourceAlpha, "in")
                              .offset(s, a)
                              .gaussianBlur(n)
                          : t
                              .flood(r, o)
                              .composite(t.sourceAlpha, "in")
                              .offset(s, a)
                              .gaussianBlur(n)
                              .merge(t.source)),
                        t.blend(t.source, e);
                    }),
                    l ||
                      t.filterer.node.setAttribute(
                        "filterUnits",
                        "userSpaceOnUse"
                      ),
                    t)
              );
            },
          },
          {
            key: "setSelectionFilter",
            value: function (t, e, i) {
              var a = this.w;
              if (
                void 0 !== a.globals.selectedDataPoints[e] &&
                a.globals.selectedDataPoints[e].indexOf(i) > -1
              ) {
                t.node.setAttribute("selected", !0);
                var s = a.config.states.active.filter;
                "none" !== s && this.applyFilter(t, e, s.type, s.value);
              }
            },
          },
        ]),
        t
      );
    })(),
    f = (function () {
      function t(i) {
        e(this, t), (this.ctx = i), (this.w = i.w), this.setEasingFunctions();
      }
      return (
        a(t, [
          {
            key: "setEasingFunctions",
            value: function () {
              var t;
              if (!this.w.globals.easing) {
                switch (this.w.config.chart.animations.easing) {
                  case "linear":
                    t = "-";
                    break;
                  case "easein":
                    t = "<";
                    break;
                  case "easeout":
                    t = ">";
                    break;
                  case "easeinout":
                    t = "<>";
                    break;
                  case "swing":
                    t = function (t) {
                      var e = 1.70158;
                      return (t -= 1) * t * ((e + 1) * t + e) + 1;
                    };
                    break;
                  case "bounce":
                    t = function (t) {
                      return t < 1 / 2.75
                        ? 7.5625 * t * t
                        : t < 2 / 2.75
                        ? 7.5625 * (t -= 1.5 / 2.75) * t + 0.75
                        : t < 2.5 / 2.75
                        ? 7.5625 * (t -= 2.25 / 2.75) * t + 0.9375
                        : 7.5625 * (t -= 2.625 / 2.75) * t + 0.984375;
                    };
                    break;
                  case "elastic":
                    t = function (t) {
                      return t === !!t
                        ? t
                        : Math.pow(2, -10 * t) *
                            Math.sin(((t - 0.075) * (2 * Math.PI)) / 0.3) +
                            1;
                    };
                    break;
                  default:
                    t = "<>";
                }
                this.w.globals.easing = t;
              }
            },
          },
          {
            key: "animateLine",
            value: function (t, e, i, a) {
              t.attr(e).animate(a).attr(i);
            },
          },
          {
            key: "animateCircleRadius",
            value: function (t, e, i, a, s) {
              e || (e = 0), t.attr({ r: e }).animate(a, s).attr({ r: i });
            },
          },
          {
            key: "animateCircle",
            value: function (t, e, i, a, s) {
              t.attr({ r: e.r, cx: e.cx, cy: e.cy })
                .animate(a, s)
                .attr({ r: i.r, cx: i.cx, cy: i.cy });
            },
          },
          {
            key: "animateRect",
            value: function (t, e, i, a, s) {
              t.attr(e)
                .animate(a)
                .attr(i)
                .afterAll(function () {
                  s();
                });
            },
          },
          {
            key: "animatePathsGradually",
            value: function (t) {
              var e = t.el,
                i = t.j,
                a = t.pathFrom,
                s = t.pathTo,
                n = t.speed,
                r = t.delay,
                o = (t.strokeWidth, this.w),
                l = 0;
              o.config.chart.animations.animateGradually.enabled &&
                (l = o.config.chart.animations.animateGradually.delay),
                o.config.chart.animations.dynamicAnimation.enabled &&
                  o.globals.dataChanged &&
                  (l = 0),
                this.morphSVG(e, i, a, s, n, r * l);
            },
          },
          {
            key: "showDelayedElements",
            value: function () {
              this.w.globals.delayedElements.forEach(function (t) {
                t.el.classList.remove("hidden");
              });
            },
          },
          {
            key: "animationCompleted",
            value: function (t) {
              var e = this.w;
              (e.globals.animationEnded = !0),
                "function" == typeof e.config.chart.events.animationEnd &&
                  e.config.chart.events.animationEnd(this.ctx, { el: t, w: e });
            },
          },
          {
            key: "morphSVG",
            value: function (t, e, i, a, s, n) {
              var r = this,
                o = this.w;
              i || (i = t.attr("pathFrom")),
                a || (a = t.attr("pathTo")),
                (!i || i.indexOf("undefined") > -1 || i.indexOf("NaN") > -1) &&
                  ((i = "M 0 ".concat(o.globals.gridHeight)), (s = 1)),
                (a.indexOf("undefined") > -1 || a.indexOf("NaN") > -1) &&
                  ((a = "M 0 ".concat(o.globals.gridHeight)), (s = 1)),
                o.globals.shouldAnimate || (s = 1),
                t
                  .plot(i)
                  .animate(1, o.globals.easing, n)
                  .plot(i)
                  .animate(s, o.globals.easing, n)
                  .plot(a)
                  .afterAll(function () {
                    u.isNumber(e)
                      ? e ===
                          o.globals.series[o.globals.maxValsInArrayIndex]
                            .length -
                            2 &&
                        o.globals.shouldAnimate &&
                        r.animationCompleted(t)
                      : o.globals.shouldAnimate && r.animationCompleted(t),
                      r.showDelayedElements();
                  });
            },
          },
        ]),
        t
      );
    })(),
    p = (function () {
      function t(i) {
        e(this, t), (this.ctx = i), (this.w = i.w);
      }
      return (
        a(
          t,
          [
            {
              key: "drawLine",
              value: function (t, e, i, a) {
                var s =
                    arguments.length > 4 && void 0 !== arguments[4]
                      ? arguments[4]
                      : "#a8a8a8",
                  n =
                    arguments.length > 5 && void 0 !== arguments[5]
                      ? arguments[5]
                      : 0,
                  r =
                    arguments.length > 6 && void 0 !== arguments[6]
                      ? arguments[6]
                      : null;
                return this.w.globals.dom.Paper.line().attr({
                  x1: t,
                  y1: e,
                  x2: i,
                  y2: a,
                  stroke: s,
                  "stroke-dasharray": n,
                  "stroke-width": r,
                });
              },
            },
            {
              key: "drawRect",
              value: function () {
                var t =
                    arguments.length > 0 && void 0 !== arguments[0]
                      ? arguments[0]
                      : 0,
                  e =
                    arguments.length > 1 && void 0 !== arguments[1]
                      ? arguments[1]
                      : 0,
                  i =
                    arguments.length > 2 && void 0 !== arguments[2]
                      ? arguments[2]
                      : 0,
                  a =
                    arguments.length > 3 && void 0 !== arguments[3]
                      ? arguments[3]
                      : 0,
                  s =
                    arguments.length > 4 && void 0 !== arguments[4]
                      ? arguments[4]
                      : 0,
                  n =
                    arguments.length > 5 && void 0 !== arguments[5]
                      ? arguments[5]
                      : "#fefefe",
                  r =
                    arguments.length > 6 && void 0 !== arguments[6]
                      ? arguments[6]
                      : 1,
                  o =
                    arguments.length > 7 && void 0 !== arguments[7]
                      ? arguments[7]
                      : null,
                  l =
                    arguments.length > 8 && void 0 !== arguments[8]
                      ? arguments[8]
                      : null,
                  h =
                    arguments.length > 9 && void 0 !== arguments[9]
                      ? arguments[9]
                      : 0,
                  c = this.w.globals.dom.Paper.rect();
                return (
                  c.attr({
                    x: t,
                    y: e,
                    width: i > 0 ? i : 0,
                    height: a > 0 ? a : 0,
                    rx: s,
                    ry: s,
                    fill: n,
                    opacity: r,
                    "stroke-width": null !== o ? o : 0,
                    stroke: null !== l ? l : "none",
                    "stroke-dasharray": h,
                  }),
                  c
                );
              },
            },
            {
              key: "drawPolygon",
              value: function (t) {
                var e =
                    arguments.length > 1 && void 0 !== arguments[1]
                      ? arguments[1]
                      : "#e1e1e1",
                  i =
                    arguments.length > 2 && void 0 !== arguments[2]
                      ? arguments[2]
                      : "none";
                return this.w.globals.dom.Paper.polygon(t).attr({
                  fill: i,
                  stroke: e,
                });
              },
            },
            {
              key: "drawCircle",
              value: function (t) {
                var e =
                    arguments.length > 1 && void 0 !== arguments[1]
                      ? arguments[1]
                      : null,
                  i = this.w.globals.dom.Paper.circle(2 * t);
                return null !== e && i.attr(e), i;
              },
            },
            {
              key: "drawPath",
              value: function (t) {
                var e = t.d,
                  i = void 0 === e ? "" : e,
                  a = t.stroke,
                  s = void 0 === a ? "#a8a8a8" : a,
                  n = t.strokeWidth,
                  r = void 0 === n ? 1 : n,
                  o = t.fill,
                  l = t.fillOpacity,
                  h = void 0 === l ? 1 : l,
                  c = t.strokeOpacity,
                  d = void 0 === c ? 1 : c,
                  u = t.classes,
                  g = t.strokeLinecap,
                  f = void 0 === g ? null : g,
                  p = t.strokeDashArray,
                  x = void 0 === p ? 0 : p,
                  b = this.w;
                return (
                  null === f && (f = b.config.stroke.lineCap),
                  (i.indexOf("undefined") > -1 || i.indexOf("NaN") > -1) &&
                    (i = "M 0 ".concat(b.globals.gridHeight)),
                  b.globals.dom.Paper.path(i).attr({
                    fill: o,
                    "fill-opacity": h,
                    stroke: s,
                    "stroke-opacity": d,
                    "stroke-linecap": f,
                    "stroke-width": r,
                    "stroke-dasharray": x,
                    class: u,
                  })
                );
              },
            },
            {
              key: "group",
              value: function () {
                var t =
                    arguments.length > 0 && void 0 !== arguments[0]
                      ? arguments[0]
                      : null,
                  e = this.w.globals.dom.Paper.group();
                return null !== t && e.attr(t), e;
              },
            },
            {
              key: "move",
              value: function (t, e) {
                var i = ["M", t, e].join(" ");
                return i;
              },
            },
            {
              key: "line",
              value: function (t, e) {
                var i =
                    arguments.length > 2 && void 0 !== arguments[2]
                      ? arguments[2]
                      : null,
                  a = null;
                return (
                  null === i
                    ? (a = ["L", t, e].join(" "))
                    : "H" === i
                    ? (a = ["H", t].join(" "))
                    : "V" === i && (a = ["V", e].join(" ")),
                  a
                );
              },
            },
            {
              key: "curve",
              value: function (t, e, i, a, s, n) {
                var r = ["C", t, e, i, a, s, n].join(" ");
                return r;
              },
            },
            {
              key: "quadraticCurve",
              value: function (t, e, i, a) {
                return ["Q", t, e, i, a].join(" ");
              },
            },
            {
              key: "arc",
              value: function (t, e, i, a, s, n, r) {
                var o = "A";
                arguments.length > 7 &&
                  void 0 !== arguments[7] &&
                  arguments[7] &&
                  (o = "a");
                var l = [o, t, e, i, a, s, n, r].join(" ");
                return l;
              },
            },
            {
              key: "renderPaths",
              value: function (t) {
                var e,
                  i = t.j,
                  a = t.realIndex,
                  s = t.pathFrom,
                  n = t.pathTo,
                  o = t.stroke,
                  l = t.strokeWidth,
                  h = t.strokeLinecap,
                  c = t.fill,
                  d = t.animationDelay,
                  u = t.initialSpeed,
                  p = t.dataChangeSpeed,
                  x = t.className,
                  b = t.shouldClipToGrid,
                  m = void 0 === b || b,
                  v = t.bindEventsOnPaths,
                  y = void 0 === v || v,
                  w = t.drawShadow,
                  k = void 0 === w || w,
                  A = this.w,
                  S = new g(this.ctx),
                  C = new f(this.ctx),
                  L = this.w.config.chart.animations.enabled,
                  P =
                    L &&
                    this.w.config.chart.animations.dynamicAnimation.enabled,
                  z = !!(
                    (L && !A.globals.resized) ||
                    (P && A.globals.dataChanged && A.globals.shouldAnimate)
                  );
                z ? (e = s) : ((e = n), (A.globals.animationEnded = !0));
                var E = A.config.stroke.dashArray,
                  M = 0;
                M = Array.isArray(E) ? E[a] : A.config.stroke.dashArray;
                var T = this.drawPath({
                  d: e,
                  stroke: o,
                  strokeWidth: l,
                  fill: c,
                  fillOpacity: 1,
                  classes: x,
                  strokeLinecap: h,
                  strokeDashArray: M,
                });
                if (
                  (T.attr("index", a),
                  m &&
                    T.attr({
                      "clip-path": "url(#gridRectMask".concat(
                        A.globals.cuid,
                        ")"
                      ),
                    }),
                  "none" !== A.config.states.normal.filter.type)
                )
                  S.getDefaultFilter(T, a);
                else if (
                  A.config.chart.dropShadow.enabled &&
                  k &&
                  (!A.config.chart.dropShadow.enabledSeries ||
                    (A.config.chart.dropShadow.enabledSeries &&
                      -1 !==
                        A.config.chart.dropShadow.enabledSeries.indexOf(a)))
                ) {
                  var I = A.config.chart.dropShadow;
                  S.dropShadow(T, I, a);
                }
                y &&
                  (T.node.addEventListener(
                    "mouseenter",
                    this.pathMouseEnter.bind(this, T)
                  ),
                  T.node.addEventListener(
                    "mouseleave",
                    this.pathMouseLeave.bind(this, T)
                  ),
                  T.node.addEventListener(
                    "mousedown",
                    this.pathMouseDown.bind(this, T)
                  )),
                  T.attr({ pathTo: n, pathFrom: s });
                var X = { el: T, j: i, pathFrom: s, pathTo: n, strokeWidth: l };
                return (
                  !L || A.globals.resized || A.globals.dataChanged
                    ? (!A.globals.resized && A.globals.dataChanged) ||
                      C.showDelayedElements()
                    : C.animatePathsGradually(r({}, X, { speed: u, delay: d })),
                  A.globals.dataChanged &&
                    P &&
                    z &&
                    C.animatePathsGradually(r({}, X, { speed: p })),
                  T
                );
              },
            },
            {
              key: "drawPattern",
              value: function (t, e, i) {
                var a =
                    arguments.length > 3 && void 0 !== arguments[3]
                      ? arguments[3]
                      : "#a8a8a8",
                  s =
                    arguments.length > 4 && void 0 !== arguments[4]
                      ? arguments[4]
                      : 0;
                return this.w.globals.dom.Paper.pattern(e, i, function (n) {
                  "horizontalLines" === t
                    ? n.line(0, 0, i, 0).stroke({ color: a, width: s + 1 })
                    : "verticalLines" === t
                    ? n.line(0, 0, 0, e).stroke({ color: a, width: s + 1 })
                    : "slantedLines" === t
                    ? n.line(0, 0, e, i).stroke({ color: a, width: s })
                    : "squares" === t
                    ? n.rect(e, i).fill("none").stroke({ color: a, width: s })
                    : "circles" === t &&
                      n.circle(e).fill("none").stroke({ color: a, width: s });
                });
              },
            },
            {
              key: "drawGradient",
              value: function (t, e, i, a, s) {
                var n,
                  r =
                    arguments.length > 5 && void 0 !== arguments[5]
                      ? arguments[5]
                      : null,
                  o =
                    arguments.length > 6 && void 0 !== arguments[6]
                      ? arguments[6]
                      : null,
                  l =
                    arguments.length > 7 && void 0 !== arguments[7]
                      ? arguments[7]
                      : null,
                  h =
                    arguments.length > 8 && void 0 !== arguments[8]
                      ? arguments[8]
                      : 0,
                  c = this.w;
                (e = u.hexToRgba(e, a)), (i = u.hexToRgba(i, s));
                var d = 0,
                  g = 1,
                  f = 1,
                  p = null;
                null !== o &&
                  ((d = void 0 !== o[0] ? o[0] / 100 : 0),
                  (g = void 0 !== o[1] ? o[1] / 100 : 1),
                  (f = void 0 !== o[2] ? o[2] / 100 : 1),
                  (p = void 0 !== o[3] ? o[3] / 100 : null));
                var x = !(
                  "donut" !== c.config.chart.type &&
                  "pie" !== c.config.chart.type &&
                  "bubble" !== c.config.chart.type
                );
                if (
                  ((n =
                    null === l || 0 === l.length
                      ? c.globals.dom.Paper.gradient(
                          x ? "radial" : "linear",
                          function (t) {
                            t.at(d, e, a),
                              t.at(g, i, s),
                              t.at(f, i, s),
                              null !== p && t.at(p, e, a);
                          }
                        )
                      : c.globals.dom.Paper.gradient(
                          x ? "radial" : "linear",
                          function (t) {
                            (Array.isArray(l[h]) ? l[h] : l).forEach(function (
                              e
                            ) {
                              t.at(e.offset / 100, e.color, e.opacity);
                            });
                          }
                        )),
                  x)
                ) {
                  var b = c.globals.gridWidth / 2,
                    m = c.globals.gridHeight / 2;
                  "bubble" !== c.config.chart.type
                    ? n.attr({
                        gradientUnits: "userSpaceOnUse",
                        cx: b,
                        cy: m,
                        r: r,
                      })
                    : n.attr({ cx: 0.5, cy: 0.5, r: 0.8, fx: 0.2, fy: 0.2 });
                } else
                  "vertical" === t
                    ? n.from(0, 0).to(0, 1)
                    : "diagonal" === t
                    ? n.from(0, 0).to(1, 1)
                    : "horizontal" === t
                    ? n.from(0, 1).to(1, 1)
                    : "diagonal2" === t && n.from(0, 1).to(2, 2);
                return n;
              },
            },
            {
              key: "drawText",
              value: function (t) {
                var e,
                  i = this.w,
                  a = t.x,
                  s = t.y,
                  n = t.text,
                  r = t.textAnchor,
                  o = t.fontSize,
                  l = t.fontFamily,
                  h = t.fontWeight,
                  c = t.foreColor,
                  d = t.opacity;
                return (
                  void 0 === n && (n = ""),
                  r || (r = "start"),
                  c || (c = i.config.chart.foreColor),
                  (l = l || i.config.chart.fontFamily),
                  (h = h || "regular"),
                  (e = Array.isArray(n)
                    ? i.globals.dom.Paper.text(function (t) {
                        for (var e = 0; e < n.length; e++) t.tspan(n[e]);
                      })
                    : i.globals.dom.Paper.plain(n)).attr({
                    x: a,
                    y: s,
                    "text-anchor": r,
                    "dominant-baseline": "auto",
                    "font-size": o,
                    "font-family": l,
                    "font-weight": h,
                    fill: c,
                    class: (t.cssClass, t.cssClass),
                  }),
                  (e.node.style.fontFamily = l),
                  (e.node.style.opacity = d),
                  e
                );
              },
            },
            {
              key: "addTspan",
              value: function (t, e, i) {
                var a = t.tspan(e);
                i || (i = this.w.config.chart.fontFamily),
                  (a.node.style.fontFamily = i);
              },
            },
            {
              key: "drawMarker",
              value: function (t, e, i) {
                t = t || 0;
                var a = i.pSize || 0,
                  s = null;
                if ("square" === i.shape) {
                  var n = void 0 === i.pRadius ? a / 2 : i.pRadius;
                  null === e && ((a = 0), (n = 0));
                  var r = 1.2 * a + n,
                    o = this.drawRect(r, r, r, r, n);
                  o.attr({
                    x: t - r / 2,
                    y: e - r / 2,
                    cx: t,
                    cy: e,
                    class: i.class ? i.class : "",
                    fill: i.pointFillColor,
                    "fill-opacity": i.pointFillOpacity ? i.pointFillOpacity : 1,
                    stroke: i.pointStrokeColor,
                    "stroke-width": i.pWidth ? i.pWidth : 0,
                    "stroke-opacity": i.pointStrokeOpacity
                      ? i.pointStrokeOpacity
                      : 1,
                  }),
                    (s = o);
                } else
                  ("circle" !== i.shape && i.shape) ||
                    (u.isNumber(e) || ((a = 0), (e = 0)),
                    (s = this.drawCircle(a, {
                      cx: t,
                      cy: e,
                      class: i.class ? i.class : "",
                      stroke: i.pointStrokeColor,
                      fill: i.pointFillColor,
                      "fill-opacity": i.pointFillOpacity
                        ? i.pointFillOpacity
                        : 1,
                      "stroke-width": i.pWidth ? i.pWidth : 0,
                      "stroke-opacity": i.pointStrokeOpacity
                        ? i.pointStrokeOpacity
                        : 1,
                    })));
                return s;
              },
            },
            {
              key: "pathMouseEnter",
              value: function (t, e) {
                var i = this.w,
                  a = new g(this.ctx),
                  s = parseInt(t.node.getAttribute("index")),
                  n = parseInt(t.node.getAttribute("j"));
                if (
                  ("function" ==
                    typeof i.config.chart.events.dataPointMouseEnter &&
                    i.config.chart.events.dataPointMouseEnter(e, this.ctx, {
                      seriesIndex: s,
                      dataPointIndex: n,
                      w: i,
                    }),
                  this.ctx.fireEvent("dataPointMouseEnter", [
                    e,
                    this.ctx,
                    { seriesIndex: s, dataPointIndex: n, w: i },
                  ]),
                  ("none" === i.config.states.active.filter.type ||
                    "true" !== t.node.getAttribute("selected")) &&
                    "none" !== i.config.states.hover.filter.type &&
                    "none" !== i.config.states.active.filter.type &&
                    !i.globals.isTouchDevice)
                ) {
                  var r = i.config.states.hover.filter;
                  a.applyFilter(t, s, r.type, r.value);
                }
              },
            },
            {
              key: "pathMouseLeave",
              value: function (t, e) {
                var i = this.w,
                  a = new g(this.ctx),
                  s = parseInt(t.node.getAttribute("index")),
                  n = parseInt(t.node.getAttribute("j"));
                "function" ==
                  typeof i.config.chart.events.dataPointMouseLeave &&
                  i.config.chart.events.dataPointMouseLeave(e, this.ctx, {
                    seriesIndex: s,
                    dataPointIndex: n,
                    w: i,
                  }),
                  this.ctx.fireEvent("dataPointMouseLeave", [
                    e,
                    this.ctx,
                    { seriesIndex: s, dataPointIndex: n, w: i },
                  ]),
                  ("none" !== i.config.states.active.filter.type &&
                    "true" === t.node.getAttribute("selected")) ||
                    ("none" !== i.config.states.hover.filter.type &&
                      a.getDefaultFilter(t, s));
              },
            },
            {
              key: "pathMouseDown",
              value: function (t, e) {
                var i = this.w,
                  a = new g(this.ctx),
                  s = parseInt(t.node.getAttribute("index")),
                  n = parseInt(t.node.getAttribute("j")),
                  r = "false";
                if ("true" === t.node.getAttribute("selected")) {
                  if (
                    (t.node.setAttribute("selected", "false"),
                    i.globals.selectedDataPoints[s].indexOf(n) > -1)
                  ) {
                    var o = i.globals.selectedDataPoints[s].indexOf(n);
                    i.globals.selectedDataPoints[s].splice(o, 1);
                  }
                } else {
                  if (
                    !i.config.states.active.allowMultipleDataPointsSelection &&
                    i.globals.selectedDataPoints.length > 0
                  ) {
                    i.globals.selectedDataPoints = [];
                    var l = i.globals.dom.Paper.select(
                        ".apexcharts-series path"
                      ).members,
                      h = i.globals.dom.Paper.select(
                        ".apexcharts-series circle, .apexcharts-series rect"
                      ).members;
                    l.forEach(function (t) {
                      t.node.setAttribute("selected", "false"),
                        a.getDefaultFilter(t, s);
                    }),
                      h.forEach(function (t) {
                        t.node.setAttribute("selected", "false"),
                          a.getDefaultFilter(t, s);
                      });
                  }
                  t.node.setAttribute("selected", "true"),
                    (r = "true"),
                    void 0 === i.globals.selectedDataPoints[s] &&
                      (i.globals.selectedDataPoints[s] = []),
                    i.globals.selectedDataPoints[s].push(n);
                }
                if ("true" === r) {
                  var c = i.config.states.active.filter;
                  "none" !== c && a.applyFilter(t, s, c.type, c.value);
                } else
                  "none" !== i.config.states.active.filter.type &&
                    a.getDefaultFilter(t, s);
                "function" == typeof i.config.chart.events.dataPointSelection &&
                  i.config.chart.events.dataPointSelection(e, this.ctx, {
                    selectedDataPoints: i.globals.selectedDataPoints,
                    seriesIndex: s,
                    dataPointIndex: n,
                    w: i,
                  }),
                  e &&
                    this.ctx.fireEvent("dataPointSelection", [
                      e,
                      this.ctx,
                      {
                        selectedDataPoints: i.globals.selectedDataPoints,
                        seriesIndex: s,
                        dataPointIndex: n,
                        w: i,
                      },
                    ]);
              },
            },
            {
              key: "rotateAroundCenter",
              value: function (t) {
                var e = t.getBBox();
                return { x: e.x + e.width / 2, y: e.y + e.height / 2 };
              },
            },
            {
              key: "getTextRects",
              value: function (t, e, i, a) {
                var s =
                    !(arguments.length > 4 && void 0 !== arguments[4]) ||
                    arguments[4],
                  n = this.w,
                  r = this.drawText({
                    x: -200,
                    y: -200,
                    text: t,
                    textAnchor: "start",
                    fontSize: e,
                    fontFamily: i,
                    foreColor: "#fff",
                    opacity: 0,
                  });
                a && r.attr("transform", a), n.globals.dom.Paper.add(r);
                var o = r.bbox();
                return (
                  s || (o = r.node.getBoundingClientRect()),
                  r.remove(),
                  { width: o.width, height: o.height }
                );
              },
            },
            {
              key: "placeTextWithEllipsis",
              value: function (t, e, i) {
                if (
                  ((t.textContent = e),
                  e.length > 0 && t.getComputedTextLength() >= i)
                ) {
                  for (var a = e.length - 3; a > 0; a -= 3)
                    if (t.getSubStringLength(0, a) <= i)
                      return void (t.textContent = e.substring(0, a) + "...");
                  t.textContent = "...";
                }
              },
            },
          ],
          [
            {
              key: "setAttrs",
              value: function (t, e) {
                for (var i in e) e.hasOwnProperty(i) && t.setAttribute(i, e[i]);
              },
            },
          ]
        ),
        t
      );
    })();
  var x = {
      name: "en",
      options: {
        months: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ],
        shortMonths: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
        days: [
          "Sunday",
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday",
        ],
        shortDays: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        toolbar: {
          exportToSVG: "Download SVG",
          exportToPNG: "Download PNG",
          menu: "Menu",
          selection: "Selection",
          selectionZoom: "Selection Zoom",
          zoomIn: "Zoom In",
          zoomOut: "Zoom Out",
          pan: "Panning",
          reset: "Reset Zoom",
        },
      },
    },
    b = (function () {
      function t() {
        e(this, t),
          (this.yAxis = {
            show: !0,
            showAlways: !1,
            seriesName: void 0,
            opposite: !1,
            reversed: !1,
            logarithmic: !1,
            tickAmount: void 0,
            forceNiceScale: !1,
            max: void 0,
            min: void 0,
            floating: !1,
            decimalsInFloat: void 0,
            labels: {
              show: !0,
              minWidth: 0,
              maxWidth: 160,
              offsetX: 0,
              offsetY: 0,
              align: void 0,
              rotate: 0,
              padding: 20,
              style: {
                colors: [],
                fontSize: "11px",
                fontFamily: void 0,
                cssClass: "",
              },
              formatter: void 0,
            },
            axisBorder: { show: !1, color: "#78909C", offsetX: 0, offsetY: 0 },
            axisTicks: {
              show: !1,
              color: "#78909C",
              width: 6,
              offsetX: 0,
              offsetY: 0,
            },
            title: {
              text: void 0,
              rotate: 90,
              offsetY: 0,
              offsetX: 0,
              style: {
                color: void 0,
                fontSize: "11px",
                fontFamily: void 0,
                cssClass: "",
              },
            },
            tooltip: { enabled: !1, offsetX: 0 },
            crosshairs: {
              show: !0,
              position: "front",
              stroke: { color: "#b6b6b6", width: 1, dashArray: 0 },
            },
          }),
          (this.xAxisAnnotation = {
            x: 0,
            x2: null,
            strokeDashArray: 1,
            fillColor: "#c2c2c2",
            borderColor: "#c2c2c2",
            opacity: 0.3,
            offsetX: 0,
            offsetY: 0,
            label: {
              borderColor: "#c2c2c2",
              borderWidth: 1,
              text: void 0,
              textAnchor: "middle",
              orientation: "vertical",
              position: "top",
              offsetX: 0,
              offsetY: 0,
              style: {
                background: "#fff",
                color: void 0,
                fontSize: "11px",
                fontFamily: void 0,
                cssClass: "",
                padding: { left: 5, right: 5, top: 2, bottom: 2 },
              },
            },
          }),
          (this.yAxisAnnotation = {
            y: 0,
            y2: null,
            strokeDashArray: 1,
            fillColor: "#c2c2c2",
            borderColor: "#c2c2c2",
            opacity: 0.3,
            offsetX: 0,
            offsetY: 0,
            yAxisIndex: 0,
            label: {
              borderColor: "#c2c2c2",
              borderWidth: 1,
              text: void 0,
              textAnchor: "end",
              position: "right",
              offsetX: 0,
              offsetY: -3,
              style: {
                background: "#fff",
                color: void 0,
                fontSize: "11px",
                fontFamily: void 0,
                cssClass: "",
                padding: { left: 5, right: 5, top: 0, bottom: 2 },
              },
            },
          }),
          (this.pointAnnotation = {
            x: 0,
            y: null,
            yAxisIndex: 0,
            seriesIndex: 0,
            marker: {
              size: 4,
              fillColor: "#fff",
              strokeWidth: 2,
              strokeColor: "#333",
              shape: "circle",
              offsetX: 0,
              offsetY: 0,
              radius: 2,
              cssClass: "",
            },
            label: {
              borderColor: "#c2c2c2",
              borderWidth: 1,
              text: void 0,
              textAnchor: "middle",
              offsetX: 0,
              offsetY: -15,
              style: {
                background: "#fff",
                color: void 0,
                fontSize: "11px",
                fontFamily: void 0,
                cssClass: "",
                padding: { left: 5, right: 5, top: 0, bottom: 2 },
              },
            },
            customSVG: {
              SVG: void 0,
              cssClass: void 0,
              offsetX: 0,
              offsetY: 0,
            },
          });
      }
      return (
        a(t, [
          {
            key: "init",
            value: function () {
              return {
                annotations: {
                  position: "front",
                  yaxis: [this.yAxisAnnotation],
                  xaxis: [this.xAxisAnnotation],
                  points: [this.pointAnnotation],
                },
                chart: {
                  animations: {
                    enabled: !0,
                    easing: "easeinout",
                    speed: 800,
                    animateGradually: { delay: 150, enabled: !0 },
                    dynamicAnimation: { enabled: !0, speed: 350 },
                  },
                  background: "transparent",
                  locales: [x],
                  defaultLocale: "en",
                  dropShadow: {
                    enabled: !1,
                    enabledSeries: void 0,
                    top: 2,
                    left: 2,
                    blur: 4,
                    color: "#000",
                    opacity: 0.35,
                  },
                  events: {
                    animationEnd: void 0,
                    beforeMount: void 0,
                    mounted: void 0,
                    updated: void 0,
                    click: void 0,
                    mouseMove: void 0,
                    legendClick: void 0,
                    markerClick: void 0,
                    selection: void 0,
                    dataPointSelection: void 0,
                    dataPointMouseEnter: void 0,
                    dataPointMouseLeave: void 0,
                    beforeZoom: void 0,
                    zoomed: void 0,
                    scrolled: void 0,
                  },
                  foreColor: "#373d3f",
                  fontFamily: "Helvetica, Arial, sans-serif",
                  height: "auto",
                  parentHeightOffset: 15,
                  id: void 0,
                  group: void 0,
                  offsetX: 0,
                  offsetY: 0,
                  selection: {
                    enabled: !1,
                    type: "x",
                    fill: { color: "#24292e", opacity: 0.1 },
                    stroke: {
                      width: 1,
                      color: "#24292e",
                      opacity: 0.4,
                      dashArray: 3,
                    },
                    xaxis: { min: void 0, max: void 0 },
                    yaxis: { min: void 0, max: void 0 },
                  },
                  sparkline: { enabled: !1 },
                  brush: { enabled: !1, autoScaleYaxis: !0, target: void 0 },
                  stacked: !1,
                  stackType: "normal",
                  toolbar: {
                    show: !0,
                    tools: {
                      download: !0,
                      selection: !0,
                      zoom: !0,
                      zoomin: !0,
                      zoomout: !0,
                      pan: !0,
                      reset: !0,
                      customIcons: [],
                    },
                    autoSelected: "zoom",
                  },
                  type: "line",
                  width: "100%",
                  zoom: {
                    enabled: !0,
                    type: "x",
                    autoScaleYaxis: !1,
                    zoomedArea: {
                      fill: { color: "#90CAF9", opacity: 0.4 },
                      stroke: { color: "#0D47A1", opacity: 0.4, width: 1 },
                    },
                  },
                },
                plotOptions: {
                  bar: {
                    horizontal: !1,
                    columnWidth: "70%",
                    barHeight: "70%",
                    distributed: !1,
                    endingShape: "flat",
                    colors: {
                      ranges: [],
                      backgroundBarColors: [],
                      backgroundBarOpacity: 1,
                    },
                    dataLabels: {
                      position: "top",
                      maxItems: 100,
                      hideOverflowingLabels: !0,
                      orientation: "horizontal",
                    },
                  },
                  bubble: { minBubbleRadius: void 0, maxBubbleRadius: void 0 },
                  candlestick: {
                    colors: { upward: "#00B746", downward: "#EF403C" },
                    wick: { useFillColor: !0 },
                  },
                  heatmap: {
                    radius: 2,
                    enableShades: !0,
                    shadeIntensity: 0.5,
                    reverseNegativeShade: !0,
                    distributed: !1,
                    colorScale: {
                      inverse: !1,
                      ranges: [],
                      min: void 0,
                      max: void 0,
                    },
                  },
                  radialBar: {
                    size: void 0,
                    inverseOrder: !1,
                    startAngle: 0,
                    endAngle: 360,
                    offsetX: 0,
                    offsetY: 0,
                    hollow: {
                      margin: 5,
                      size: "50%",
                      background: "transparent",
                      image: void 0,
                      imageWidth: 150,
                      imageHeight: 150,
                      imageOffsetX: 0,
                      imageOffsetY: 0,
                      imageClipped: !0,
                      position: "front",
                      dropShadow: {
                        enabled: !1,
                        top: 0,
                        left: 0,
                        blur: 3,
                        color: "#000",
                        opacity: 0.5,
                      },
                    },
                    track: {
                      show: !0,
                      startAngle: void 0,
                      endAngle: void 0,
                      background: "#f2f2f2",
                      strokeWidth: "97%",
                      opacity: 1,
                      margin: 5,
                      dropShadow: {
                        enabled: !1,
                        top: 0,
                        left: 0,
                        blur: 3,
                        color: "#000",
                        opacity: 0.5,
                      },
                    },
                    dataLabels: {
                      show: !0,
                      name: {
                        show: !0,
                        fontSize: "16px",
                        fontFamily: void 0,
                        color: void 0,
                        offsetY: 0,
                      },
                      value: {
                        show: !0,
                        fontSize: "14px",
                        fontFamily: void 0,
                        color: void 0,
                        offsetY: 16,
                        formatter: function (t) {
                          return t + "%";
                        },
                      },
                      total: {
                        show: !1,
                        label: "Total",
                        color: void 0,
                        formatter: function (t) {
                          return (
                            t.globals.seriesTotals.reduce(function (t, e) {
                              return t + e;
                            }, 0) /
                              t.globals.series.length +
                            "%"
                          );
                        },
                      },
                    },
                  },
                  rangeBar: {},
                  pie: {
                    size: void 0,
                    customScale: 1,
                    offsetX: 0,
                    offsetY: 0,
                    expandOnClick: !0,
                    dataLabels: { offset: 0, minAngleToShowLabel: 10 },
                    donut: {
                      size: "65%",
                      background: "transparent",
                      labels: {
                        show: !1,
                        name: {
                          show: !0,
                          fontSize: "16px",
                          fontFamily: void 0,
                          color: void 0,
                          offsetY: -10,
                        },
                        value: {
                          show: !0,
                          fontSize: "20px",
                          fontFamily: void 0,
                          color: void 0,
                          offsetY: 10,
                          formatter: function (t) {
                            return t;
                          },
                        },
                        total: {
                          show: !1,
                          showAlways: !1,
                          label: "Total",
                          color: void 0,
                          formatter: function (t) {
                            return t.globals.seriesTotals.reduce(function (
                              t,
                              e
                            ) {
                              return t + e;
                            },
                            0);
                          },
                        },
                      },
                    },
                  },
                  radar: {
                    size: void 0,
                    offsetX: 0,
                    offsetY: 0,
                    polygons: {
                      strokeColors: "#e8e8e8",
                      connectorColors: "#e8e8e8",
                      fill: { colors: void 0 },
                    },
                  },
                },
                colors: void 0,
                dataLabels: {
                  enabled: !0,
                  enabledOnSeries: void 0,
                  formatter: function (t) {
                    return null !== t ? t : "";
                  },
                  textAnchor: "middle",
                  offsetX: 0,
                  offsetY: 0,
                  style: {
                    fontSize: "12px",
                    fontFamily: void 0,
                    colors: void 0,
                  },
                  dropShadow: {
                    enabled: !1,
                    top: 1,
                    left: 1,
                    blur: 1,
                    color: "#000",
                    opacity: 0.45,
                  },
                },
                fill: {
                  type: "solid",
                  colors: void 0,
                  opacity: 0.85,
                  gradient: {
                    shade: "dark",
                    type: "horizontal",
                    shadeIntensity: 0.5,
                    gradientToColors: void 0,
                    inverseColors: !0,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 50, 100],
                    colorStops: [],
                  },
                  image: { src: [], width: void 0, height: void 0 },
                  pattern: {
                    style: "sqaures",
                    width: 6,
                    height: 6,
                    strokeWidth: 2,
                  },
                },
                grid: {
                  show: !0,
                  borderColor: "#e0e0e0",
                  strokeDashArray: 0,
                  position: "back",
                  xaxis: { lines: { show: !1, animate: !1 } },
                  yaxis: { lines: { show: !0, animate: !1 } },
                  row: { colors: void 0, opacity: 0.5 },
                  column: { colors: void 0, opacity: 0.5 },
                  padding: { top: 0, right: 10, bottom: 0, left: 12 },
                },
                labels: [],
                legend: {
                  show: !0,
                  showForSingleSeries: !1,
                  showForNullSeries: !0,
                  showForZeroSeries: !0,
                  floating: !1,
                  position: "bottom",
                  horizontalAlign: "center",
                  inverseOrder: !1,
                  fontSize: "12px",
                  fontFamily: void 0,
                  width: void 0,
                  height: void 0,
                  formatter: void 0,
                  tooltipHoverFormatter: void 0,
                  offsetX: -20,
                  offsetY: 0,
                  labels: { colors: void 0, useSeriesColors: !1 },
                  markers: {
                    width: 12,
                    height: 12,
                    strokeWidth: 0,
                    fillColors: void 0,
                    strokeColor: "#fff",
                    radius: 12,
                    customHTML: void 0,
                    offsetX: 0,
                    offsetY: 0,
                    onClick: void 0,
                  },
                  itemMargin: { horizontal: 0, vertical: 5 },
                  onItemClick: { toggleDataSeries: !0 },
                  onItemHover: { highlightDataSeries: !0 },
                },
                markers: {
                  discrete: [],
                  size: 0,
                  colors: void 0,
                  strokeColors: "#fff",
                  strokeWidth: 2,
                  strokeOpacity: 0.9,
                  fillOpacity: 1,
                  shape: "circle",
                  radius: 2,
                  offsetX: 0,
                  offsetY: 0,
                  onClick: void 0,
                  onDblClick: void 0,
                  hover: { size: void 0, sizeOffset: 3 },
                },
                noData: {
                  text: void 0,
                  align: "center",
                  verticalAlign: "middle",
                  offsetX: 0,
                  offsetY: 0,
                  style: {
                    color: void 0,
                    fontSize: "14px",
                    fontFamily: void 0,
                  },
                },
                responsive: [],
                series: void 0,
                states: {
                  normal: { filter: { type: "none", value: 0 } },
                  hover: { filter: { type: "lighten", value: 0.15 } },
                  active: {
                    allowMultipleDataPointsSelection: !1,
                    filter: { type: "darken", value: 0.65 },
                  },
                },
                title: {
                  text: void 0,
                  align: "left",
                  margin: 10,
                  offsetX: 0,
                  offsetY: 0,
                  floating: !1,
                  style: {
                    fontSize: "14px",
                    fontFamily: void 0,
                    color: void 0,
                  },
                },
                subtitle: {
                  text: void 0,
                  align: "left",
                  margin: 10,
                  offsetX: 0,
                  offsetY: 30,
                  floating: !1,
                  style: {
                    fontSize: "12px",
                    fontFamily: void 0,
                    color: void 0,
                  },
                },
                stroke: {
                  show: !0,
                  curve: "smooth",
                  lineCap: "butt",
                  width: 2,
                  colors: void 0,
                  dashArray: 0,
                },
                tooltip: {
                  enabled: !0,
                  enabledOnSeries: void 0,
                  shared: !0,
                  followCursor: !1,
                  intersect: !1,
                  inverseOrder: !1,
                  custom: void 0,
                  fillSeriesColor: !1,
                  theme: "light",
                  style: { fontSize: "12px", fontFamily: void 0 },
                  onDatasetHover: { highlightDataSeries: !1 },
                  x: { show: !0, format: "dd MMM", formatter: void 0 },
                  y: {
                    formatter: void 0,
                    title: {
                      formatter: function (t) {
                        return t;
                      },
                    },
                  },
                  z: { formatter: void 0, title: "Size: " },
                  marker: { show: !0, fillColors: void 0 },
                  items: { display: "flex" },
                  fixed: {
                    enabled: !1,
                    position: "topRight",
                    offsetX: 0,
                    offsetY: 0,
                  },
                },
                xaxis: {
                  type: "category",
                  categories: [],
                  offsetX: 0,
                  offsetY: 0,
                  labels: {
                    show: !0,
                    rotate: -45,
                    rotateAlways: !1,
                    hideOverlappingLabels: !0,
                    trim: !0,
                    minHeight: void 0,
                    maxHeight: 120,
                    showDuplicates: !0,
                    style: {
                      colors: [],
                      fontSize: "12px",
                      fontFamily: void 0,
                      cssClass: "",
                    },
                    offsetX: 0,
                    offsetY: 0,
                    format: void 0,
                    formatter: void 0,
                    datetimeFormatter: {
                      year: "yyyy",
                      month: "MMM 'yy",
                      day: "dd MMM",
                      hour: "HH:mm",
                      minute: "HH:mm:ss",
                    },
                  },
                  axisBorder: {
                    show: !0,
                    color: "#78909C",
                    width: "100%",
                    height: 1,
                    offsetX: 0,
                    offsetY: 0,
                  },
                  axisTicks: {
                    show: !0,
                    color: "#78909C",
                    height: 6,
                    offsetX: 0,
                    offsetY: 0,
                  },
                  tickAmount: void 0,
                  tickPlacement: "on",
                  min: void 0,
                  max: void 0,
                  range: void 0,
                  floating: !1,
                  position: "bottom",
                  title: {
                    text: void 0,
                    offsetX: 0,
                    offsetY: 0,
                    style: {
                      color: void 0,
                      fontSize: "12px",
                      fontFamily: void 0,
                      cssClass: "",
                    },
                  },
                  crosshairs: {
                    show: !0,
                    width: 1,
                    position: "back",
                    opacity: 0.9,
                    stroke: { color: "#b6b6b6", width: 1, dashArray: 3 },
                    fill: {
                      type: "solid",
                      color: "#B1B9C4",
                      gradient: {
                        colorFrom: "#D8E3F0",
                        colorTo: "#BED1E6",
                        stops: [0, 100],
                        opacityFrom: 0.4,
                        opacityTo: 0.5,
                      },
                    },
                    dropShadow: {
                      enabled: !1,
                      left: 0,
                      top: 0,
                      blur: 1,
                      opacity: 0.4,
                    },
                  },
                  tooltip: {
                    enabled: !0,
                    offsetY: 0,
                    formatter: void 0,
                    style: { fontSize: "12px", fontFamily: void 0 },
                  },
                },
                yaxis: this.yAxis,
                theme: {
                  mode: "light",
                  palette: "palette1",
                  monochrome: {
                    enabled: !1,
                    color: "#008FFB",
                    shadeTo: "light",
                    shadeIntensity: 0.65,
                  },
                },
              };
            },
          },
        ]),
        t
      );
    })(),
    m = (function () {
      function t(i) {
        e(this, t),
          (this.ctx = i),
          (this.w = i.w),
          (this.graphics = new p(this.ctx)),
          this.w.globals.isBarHorizontal && (this.invertAxis = !0),
          (this.xDivision =
            this.w.globals.gridWidth / this.w.globals.dataPoints);
      }
      return (
        a(t, [
          {
            key: "drawAnnotations",
            value: function () {
              var t = this.w;
              if (t.globals.axisCharts) {
                for (
                  var e = this.drawYAxisAnnotations(),
                    i = this.drawXAxisAnnotations(),
                    a = this.drawPointAnnotations(),
                    s = t.config.chart.animations.enabled,
                    n = [e, i, a],
                    r = [i.node, e.node, a.node],
                    o = 0;
                  o < 3;
                  o++
                )
                  t.globals.dom.elGraphical.add(n[o]),
                    !s ||
                      t.globals.resized ||
                      t.globals.dataChanged ||
                      ("scatter" !== t.config.chart.type &&
                        "bubble" !== t.config.chart.type &&
                        r[o].classList.add("hidden")),
                    t.globals.delayedElements.push({ el: r[o], index: 0 });
                this.annotationsBackground();
              }
            },
          },
          {
            key: "getStringX",
            value: function (t) {
              var e = this.w,
                i = t,
                a = e.globals.labels.indexOf(t),
                s = e.globals.dom.baseEl.querySelector(
                  ".apexcharts-xaxis-texts-g text:nth-child(" + (a + 1) + ")"
                );
              return s && (i = parseFloat(s.getAttribute("x"))), i;
            },
          },
          {
            key: "addXaxisAnnotation",
            value: function (t, e, i) {
              var a = this.w,
                s = this.invertAxis ? a.globals.minY : a.globals.minX,
                n = this.invertAxis ? a.globals.yRange[0] : a.globals.xRange,
                r = (t.x - s) / (n / a.globals.gridWidth),
                o = t.label.text;
              ("category" !== a.config.xaxis.type &&
                !a.config.xaxis.convertedCatToNumeric) ||
                this.invertAxis ||
                a.globals.isXNumeric ||
                (r = this.getStringX(t.x));
              var l = t.strokeDashArray;
              if (!(r < 0 || r > a.globals.gridWidth)) {
                if (null === t.x2) {
                  var h = this.graphics.drawLine(
                    r + t.offsetX,
                    0 + t.offsetY,
                    r + t.offsetX,
                    a.globals.gridHeight + t.offsetY,
                    t.borderColor,
                    l
                  );
                  e.appendChild(h.node);
                } else {
                  var c = (t.x2 - s) / (n / a.globals.gridWidth);
                  if (
                    (("category" !== a.config.xaxis.type &&
                      !a.config.xaxis.convertedCatToNumeric) ||
                      this.invertAxis ||
                      a.globals.isXNumeric ||
                      (c = this.getStringX(t.x2)),
                    c < r)
                  ) {
                    var d = r;
                    (r = c), (c = d);
                  }
                  if (o) {
                    var u = this.graphics.drawRect(
                      r + t.offsetX,
                      0 + t.offsetY,
                      c - r,
                      a.globals.gridHeight + t.offsetY,
                      0,
                      t.fillColor,
                      t.opacity,
                      1,
                      t.borderColor,
                      l
                    );
                    e.appendChild(u.node);
                  }
                }
                var g = "top" === t.label.position ? -3 : a.globals.gridHeight,
                  f = new p(this.ctx).getTextRects(
                    o,
                    parseFloat(t.label.style.fontSize)
                  ),
                  x = this.graphics.drawText({
                    x: r + t.label.offsetX,
                    y:
                      g +
                      t.label.offsetY -
                      ("top" === t.label.position
                        ? f.width / 2 - 12
                        : -f.width / 2),
                    text: o,
                    textAnchor: t.label.textAnchor,
                    fontSize: t.label.style.fontSize,
                    fontFamily: t.label.style.fontFamily,
                    foreColor: t.label.style.color,
                    cssClass: "apexcharts-xaxis-annotation-label "
                      .concat(t.label.style.cssClass, " ")
                      .concat(t.id ? t.id : ""),
                  });
                x.attr({ rel: i }),
                  e.appendChild(x.node),
                  this.setOrientations(t, i);
              }
            },
          },
          {
            key: "drawXAxisAnnotations",
            value: function () {
              var t = this,
                e = this.w,
                i = this.graphics.group({
                  class: "apexcharts-xaxis-annotations",
                });
              return (
                e.config.annotations.xaxis.map(function (e, a) {
                  t.addXaxisAnnotation(e, i.node, a);
                }),
                i
              );
            },
          },
          {
            key: "addYaxisAnnotation",
            value: function (t, e, i) {
              var a,
                s,
                n = this.w,
                r = t.strokeDashArray;
              if (this.invertAxis) {
                var o = n.globals.labels.indexOf(t.y),
                  l = n.globals.dom.baseEl.querySelector(
                    ".apexcharts-yaxis-texts-g text:nth-child(" + (o + 1) + ")"
                  );
                l && (a = parseFloat(l.getAttribute("y")));
              } else
                (a =
                  n.globals.gridHeight -
                  (t.y - n.globals.minYArr[t.yAxisIndex]) /
                    (n.globals.yRange[t.yAxisIndex] / n.globals.gridHeight)),
                  n.config.yaxis[t.yAxisIndex] &&
                    n.config.yaxis[t.yAxisIndex].reversed &&
                    (a =
                      (t.y - n.globals.minYArr[t.yAxisIndex]) /
                      (n.globals.yRange[t.yAxisIndex] / n.globals.gridHeight));
              var h = t.label.text;
              if (null === t.y2) {
                var c = this.graphics.drawLine(
                  0 + t.offsetX,
                  a + t.offsetY,
                  n.globals.gridWidth + t.offsetX,
                  a + t.offsetY,
                  t.borderColor,
                  r
                );
                e.appendChild(c.node);
              } else {
                if (this.invertAxis) {
                  var d = n.globals.labels.indexOf(t.y2),
                    u = n.globals.dom.baseEl.querySelector(
                      ".apexcharts-yaxis-texts-g text:nth-child(" +
                        (d + 1) +
                        ")"
                    );
                  u && (s = parseFloat(u.getAttribute("y")));
                } else
                  (s =
                    n.globals.gridHeight -
                    (t.y2 - n.globals.minYArr[t.yAxisIndex]) /
                      (n.globals.yRange[t.yAxisIndex] / n.globals.gridHeight)),
                    n.config.yaxis[t.yAxisIndex] &&
                      n.config.yaxis[t.yAxisIndex].reversed &&
                      (s =
                        (t.y2 - n.globals.minYArr[t.yAxisIndex]) /
                        (n.globals.yRange[t.yAxisIndex] /
                          n.globals.gridHeight));
                if (s > a) {
                  var g = a;
                  (a = s), (s = g);
                }
                if (h) {
                  var f = this.graphics.drawRect(
                    0 + t.offsetX,
                    s + t.offsetY,
                    n.globals.gridWidth + t.offsetX,
                    a - s,
                    0,
                    t.fillColor,
                    t.opacity,
                    1,
                    t.borderColor,
                    r
                  );
                  e.appendChild(f.node);
                }
              }
              var p = "right" === t.label.position ? n.globals.gridWidth : 0,
                x = this.graphics.drawText({
                  x: p + t.label.offsetX,
                  y: (s || a) + t.label.offsetY - 3,
                  text: h,
                  textAnchor: t.label.textAnchor,
                  fontSize: t.label.style.fontSize,
                  fontFamily: t.label.style.fontFamily,
                  foreColor: t.label.style.color,
                  cssClass: "apexcharts-yaxis-annotation-label "
                    .concat(t.label.style.cssClass, " ")
                    .concat(t.id ? t.id : ""),
                });
              x.attr({ rel: i }), e.appendChild(x.node);
            },
          },
          {
            key: "drawYAxisAnnotations",
            value: function () {
              var t = this,
                e = this.w,
                i = this.graphics.group({
                  class: "apexcharts-yaxis-annotations",
                });
              return (
                e.config.annotations.yaxis.map(function (e, a) {
                  t.addYaxisAnnotation(e, i.node, a);
                }),
                i
              );
            },
          },
          {
            key: "clearAnnotations",
            value: function (t) {
              var e = t.w,
                i = e.globals.dom.baseEl.querySelectorAll(
                  ".apexcharts-yaxis-annotations, .apexcharts-xaxis-annotations, .apexcharts-point-annotations"
                );
              e.globals.memory.methodsToExec.map(function (t, i) {
                ("addText" !== t.label && "addAnnotation" !== t.label) ||
                  e.globals.memory.methodsToExec.splice(i, 1);
              }),
                (i = u.listToArray(i)).forEach(function (t) {
                  for (; t.firstChild; ) t.removeChild(t.firstChild);
                });
            },
          },
          {
            key: "removeAnnotation",
            value: function (t, e) {
              var i = t.w,
                a = i.globals.dom.baseEl.querySelectorAll(".".concat(e));
              a &&
                (i.globals.memory.methodsToExec.map(function (t, a) {
                  t.id === e && i.globals.memory.methodsToExec.splice(a, 1);
                }),
                a.forEach(function (t) {
                  t.parentElement.removeChild(t);
                }));
            },
          },
          {
            key: "addPointAnnotation",
            value: function (t, e, i) {
              var a = this.w,
                s = 0,
                n = 0,
                r = 0;
              if (
                (this.invertAxis &&
                  console.warn(
                    "Point annotation is not supported in horizontal bar charts."
                  ),
                "string" == typeof t.x)
              ) {
                var o = a.globals.labels.indexOf(t.x),
                  l = a.globals.dom.baseEl.querySelector(
                    ".apexcharts-xaxis-texts-g text:nth-child(" + (o + 1) + ")"
                  );
                s = parseFloat(l.getAttribute("x"));
                var h = t.y;
                null === t.y && (h = a.globals.series[t.seriesIndex][o]),
                  (n =
                    a.globals.gridHeight -
                    (h - a.globals.minYArr[t.yAxisIndex]) /
                      (a.globals.yRange[t.yAxisIndex] / a.globals.gridHeight) -
                    parseFloat(t.label.style.fontSize) -
                    t.marker.size),
                  (r =
                    a.globals.gridHeight -
                    (h - a.globals.minYArr[t.yAxisIndex]) /
                      (a.globals.yRange[t.yAxisIndex] / a.globals.gridHeight)),
                  a.config.yaxis[t.yAxisIndex] &&
                    a.config.yaxis[t.yAxisIndex].reversed &&
                    ((n =
                      (h - a.globals.minYArr[t.yAxisIndex]) /
                        (a.globals.yRange[t.yAxisIndex] /
                          a.globals.gridHeight) +
                      parseFloat(t.label.style.fontSize) +
                      t.marker.size),
                    (r =
                      (h - a.globals.minYArr[t.yAxisIndex]) /
                      (a.globals.yRange[t.yAxisIndex] / a.globals.gridHeight)));
              } else
                (s =
                  (t.x - a.globals.minX) /
                  (a.globals.xRange / a.globals.gridWidth)),
                  (n =
                    a.globals.gridHeight -
                    (parseFloat(t.y) - a.globals.minYArr[t.yAxisIndex]) /
                      (a.globals.yRange[t.yAxisIndex] / a.globals.gridHeight) -
                    parseFloat(t.label.style.fontSize) -
                    t.marker.size),
                  (r =
                    a.globals.gridHeight -
                    (t.y - a.globals.minYArr[t.yAxisIndex]) /
                      (a.globals.yRange[t.yAxisIndex] / a.globals.gridHeight)),
                  a.config.yaxis[t.yAxisIndex] &&
                    a.config.yaxis[t.yAxisIndex].reversed &&
                    ((n =
                      (parseFloat(t.y) - a.globals.minYArr[t.yAxisIndex]) /
                        (a.globals.yRange[t.yAxisIndex] /
                          a.globals.gridHeight) -
                      parseFloat(t.label.style.fontSize) -
                      t.marker.size),
                    (r =
                      (t.y - a.globals.minYArr[t.yAxisIndex]) /
                      (a.globals.yRange[t.yAxisIndex] / a.globals.gridHeight)));
              if (!(s < 0 || s > a.globals.gridWidth)) {
                var c = {
                    pSize: t.marker.size,
                    pWidth: t.marker.strokeWidth,
                    pointFillColor: t.marker.fillColor,
                    pointStrokeColor: t.marker.strokeColor,
                    shape: t.marker.shape,
                    radius: t.marker.radius,
                    class: "apexcharts-point-annotation-marker "
                      .concat(t.marker.cssClass, " ")
                      .concat(t.id ? t.id : ""),
                  },
                  d = this.graphics.drawMarker(
                    s + t.marker.offsetX,
                    r + t.marker.offsetY,
                    c
                  );
                e.appendChild(d.node);
                var u = t.label.text ? t.label.text : "",
                  g = this.graphics.drawText({
                    x: s + t.label.offsetX,
                    y: n + t.label.offsetY,
                    text: u,
                    textAnchor: t.label.textAnchor,
                    fontSize: t.label.style.fontSize,
                    fontFamily: t.label.style.fontFamily,
                    foreColor: t.label.style.color,
                    cssClass: "apexcharts-point-annotation-label "
                      .concat(t.label.style.cssClass, " ")
                      .concat(t.id ? t.id : ""),
                  });
                if (
                  (g.attr({ rel: i }), e.appendChild(g.node), t.customSVG.SVG)
                ) {
                  var f = this.graphics.group({
                    class:
                      "apexcharts-point-annotations-custom-svg " +
                      t.customSVG.cssClass,
                  });
                  f.attr({
                    transform: "translate("
                      .concat(s + t.customSVG.offsetX, ", ")
                      .concat(n + t.customSVG.offsetY, ")"),
                  }),
                    (f.node.innerHTML = t.customSVG.SVG),
                    e.appendChild(f.node);
                }
              }
            },
          },
          {
            key: "drawPointAnnotations",
            value: function () {
              var t = this,
                e = this.w,
                i = this.graphics.group({
                  class: "apexcharts-point-annotations",
                });
              return (
                e.config.annotations.points.map(function (e, a) {
                  t.addPointAnnotation(e, i.node, a);
                }),
                i
              );
            },
          },
          {
            key: "setOrientations",
            value: function (t) {
              var e =
                  arguments.length > 1 && void 0 !== arguments[1]
                    ? arguments[1]
                    : null,
                i = this.w;
              if ("vertical" === t.label.orientation) {
                var a = null !== e ? e : 0,
                  s = i.globals.dom.baseEl.querySelector(
                    ".apexcharts-xaxis-annotations .apexcharts-xaxis-annotation-label[rel='".concat(
                      a,
                      "']"
                    )
                  );
                if (null !== s) {
                  var n = s.getBoundingClientRect();
                  s.setAttribute(
                    "x",
                    parseFloat(s.getAttribute("x")) - n.height + 4
                  ),
                    "top" === t.label.position
                      ? s.setAttribute(
                          "y",
                          parseFloat(s.getAttribute("y")) + n.width
                        )
                      : s.setAttribute(
                          "y",
                          parseFloat(s.getAttribute("y")) - n.width
                        );
                  var r = this.graphics.rotateAroundCenter(s),
                    o = r.x,
                    l = r.y;
                  s.setAttribute(
                    "transform",
                    "rotate(-90 ".concat(o, " ").concat(l, ")")
                  );
                }
              }
            },
          },
          {
            key: "addBackgroundToAnno",
            value: function (t, e) {
              var i = this.w;
              if (!e.label.text || (e.label.text && !e.label.text.trim()))
                return null;
              var a = i.globals.dom.baseEl
                  .querySelector(".apexcharts-grid")
                  .getBoundingClientRect(),
                s = t.getBoundingClientRect(),
                n = e.label.style.padding.left,
                r = e.label.style.padding.right,
                o = e.label.style.padding.top,
                l = e.label.style.padding.bottom;
              "vertical" === e.label.orientation &&
                ((o = e.label.style.padding.left),
                (l = e.label.style.padding.right),
                (n = e.label.style.padding.top),
                (r = e.label.style.padding.bottom));
              var h = s.left - a.left - n,
                c = s.top - a.top - o,
                d = this.graphics.drawRect(
                  h,
                  c,
                  s.width + n + r,
                  s.height + o + l,
                  0,
                  e.label.style.background,
                  1,
                  e.label.borderWidth,
                  e.label.borderColor,
                  0
                );
              return e.id && d.node.classList.add(e.id), d;
            },
          },
          {
            key: "annotationsBackground",
            value: function () {
              var t = this,
                e = this.w,
                i = function (i, a, s) {
                  var n = e.globals.dom.baseEl.querySelector(
                    ".apexcharts-"
                      .concat(s, "-annotations .apexcharts-")
                      .concat(s, "-annotation-label[rel='")
                      .concat(a, "']")
                  );
                  if (n) {
                    var r = n.parentNode,
                      o = t.addBackgroundToAnno(n, i);
                    o && r.insertBefore(o.node, n);
                  }
                };
              e.config.annotations.xaxis.map(function (t, e) {
                i(t, e, "xaxis");
              }),
                e.config.annotations.yaxis.map(function (t, e) {
                  i(t, e, "yaxis");
                }),
                e.config.annotations.points.map(function (t, e) {
                  i(t, e, "point");
                });
            },
          },
          {
            key: "addText",
            value: function (t, e, i) {
              var a = t.x,
                s = t.y,
                n = t.text,
                r = t.textAnchor,
                o = t.appendTo,
                l = void 0 === o ? ".apexcharts-inner" : o,
                h = t.foreColor,
                c = t.fontSize,
                d = t.fontFamily,
                u = t.cssClass,
                g = t.backgroundColor,
                f = t.borderWidth,
                p = t.strokeDashArray,
                x = t.radius,
                b = t.borderColor,
                m = t.paddingLeft,
                v = void 0 === m ? 4 : m,
                y = t.paddingRight,
                w = void 0 === y ? 4 : y,
                k = t.paddingBottom,
                A = void 0 === k ? 2 : k,
                S = t.paddingTop,
                C = void 0 === S ? 2 : S,
                L = i,
                P = L.w,
                z = P.globals.dom.baseEl.querySelector(l),
                E = this.graphics.drawText({
                  x: a,
                  y: s,
                  text: n,
                  textAnchor: r || "start",
                  fontSize: c || "12px",
                  fontFamily: d || P.config.chart.fontFamily,
                  foreColor: h || P.config.chart.foreColor,
                  cssClass: u,
                });
              z.appendChild(E.node);
              var M = E.bbox();
              if (n) {
                var T = this.graphics.drawRect(
                  M.x - v,
                  M.y - C,
                  M.width + v + w,
                  M.height + A + C,
                  x,
                  g,
                  1,
                  f,
                  b,
                  p
                );
                E.before(T);
              }
              return (
                e &&
                  P.globals.memory.methodsToExec.push({
                    context: L,
                    method: L.addText,
                    label: "addText",
                    params: {
                      x: a,
                      y: s,
                      text: n,
                      textAnchor: r,
                      appendTo: l,
                      foreColor: h,
                      fontSize: c,
                      cssClass: u,
                      backgroundColor: g,
                      borderWidth: f,
                      strokeDashArray: p,
                      radius: x,
                      borderColor: b,
                      paddingLeft: v,
                      paddingRight: w,
                      paddingBottom: A,
                      paddingTop: C,
                    },
                  }),
                i
              );
            },
          },
          {
            key: "addPointAnnotationExternal",
            value: function (t, e, i) {
              return (
                void 0 === this.invertAxis &&
                  (this.invertAxis = i.w.globals.isBarHorizontal),
                this.addAnnotationExternal({
                  params: t,
                  pushToMemory: e,
                  context: i,
                  type: "point",
                  contextMethod: i.addPointAnnotation,
                }),
                i
              );
            },
          },
          {
            key: "addYaxisAnnotationExternal",
            value: function (t, e, i) {
              return (
                this.addAnnotationExternal({
                  params: t,
                  pushToMemory: e,
                  context: i,
                  type: "yaxis",
                  contextMethod: i.addYaxisAnnotation,
                }),
                i
              );
            },
          },
          {
            key: "addXaxisAnnotationExternal",
            value: function (t, e, i) {
              return (
                this.addAnnotationExternal({
                  params: t,
                  pushToMemory: e,
                  context: i,
                  type: "xaxis",
                  contextMethod: i.addXaxisAnnotation,
                }),
                i
              );
            },
          },
          {
            key: "addAnnotationExternal",
            value: function (t) {
              var e = t.params,
                i = t.pushToMemory,
                a = t.context,
                s = t.type,
                n = t.contextMethod,
                r = a,
                o = r.w,
                l = o.globals.dom.baseEl.querySelector(
                  ".apexcharts-".concat(s, "-annotations")
                ),
                h = l.childNodes.length + 1,
                c = new b(),
                d = Object.assign(
                  {},
                  "xaxis" === s
                    ? c.xAxisAnnotation
                    : "yaxis" === s
                    ? c.yAxisAnnotation
                    : c.pointAnnotation
                ),
                g = u.extend(d, e);
              switch (s) {
                case "xaxis":
                  this.addXaxisAnnotation(g, l, h);
                  break;
                case "yaxis":
                  this.addYaxisAnnotation(g, l, h);
                  break;
                case "point":
                  this.addPointAnnotation(g, l, h);
              }
              var f = o.globals.dom.baseEl.querySelector(
                  ".apexcharts-"
                    .concat(s, "-annotations .apexcharts-")
                    .concat(s, "-annotation-label[rel='")
                    .concat(h, "']")
                ),
                p = this.addBackgroundToAnno(f, g);
              return (
                p && l.insertBefore(p.node, f),
                i &&
                  o.globals.memory.methodsToExec.push({
                    context: r,
                    id: g.id ? g.id : u.randomId(),
                    method: n,
                    label: "addAnnotation",
                    params: e,
                  }),
                a
              );
            },
          },
        ]),
        t
      );
    })(),
    v = (function () {
      function t(i) {
        e(this, t),
          (this.ctx = i),
          (this.w = i.w),
          (this.months31 = [1, 3, 5, 7, 8, 10, 12]),
          (this.months30 = [2, 4, 6, 9, 11]),
          (this.daysCntOfYear = [
            0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334,
          ]);
      }
      return (
        a(t, [
          {
            key: "isValidDate",
            value: function (t) {
              return !isNaN(this.parseDate(t));
            },
          },
          {
            key: "getUTCTimeStamp",
            value: function (t) {
              return Date.parse(t)
                ? new Date(new Date(t).toISOString().substr(0, 25)).getTime()
                : t;
            },
          },
          {
            key: "parseDate",
            value: function (t) {
              var e = Date.parse(t);
              if (!isNaN(e)) return this.getUTCTimeStamp(t);
              var i = Date.parse(t.replace(/-/g, "/").replace(/[a-z]+/gi, " "));
              return (i = this.getUTCTimeStamp(i));
            },
          },
          {
            key: "treatAsUtc",
            value: function (t) {
              var e = new Date(t);
              return e.setMinutes(e.getMinutes() - e.getTimezoneOffset()), e;
            },
          },
          {
            key: "formatDate",
            value: function (t, e) {
              var i =
                  !(arguments.length > 2 && void 0 !== arguments[2]) ||
                  arguments[2],
                a =
                  !(arguments.length > 3 && void 0 !== arguments[3]) ||
                  arguments[3],
                s = this.w.globals.locale,
                n = ["\0"].concat(d(s.months)),
                r = ["\x01"].concat(d(s.shortMonths)),
                o = ["\x02"].concat(d(s.days)),
                l = ["\x03"].concat(d(s.shortDays));
              function h(t, e) {
                var i = t + "";
                for (e = e || 2; i.length < e; ) i = "0" + i;
                return i;
              }
              a && (t = this.treatAsUtc(t));
              var c = i ? t.getUTCFullYear() : t.getFullYear();
              e = (e = (e = e.replace(/(^|[^\\])yyyy+/g, "$1" + c)).replace(
                /(^|[^\\])yy/g,
                "$1" + c.toString().substr(2, 2)
              )).replace(/(^|[^\\])y/g, "$1" + c);
              var u = (i ? t.getUTCMonth() : t.getMonth()) + 1;
              e = (e = (e = (e = e.replace(
                /(^|[^\\])MMMM+/g,
                "$1" + n[0]
              )).replace(/(^|[^\\])MMM/g, "$1" + r[0])).replace(
                /(^|[^\\])MM/g,
                "$1" + h(u)
              )).replace(/(^|[^\\])M/g, "$1" + u);
              var g = i ? t.getUTCDate() : t.getDate();
              e = (e = (e = (e = e.replace(
                /(^|[^\\])dddd+/g,
                "$1" + o[0]
              )).replace(/(^|[^\\])ddd/g, "$1" + l[0])).replace(
                /(^|[^\\])dd/g,
                "$1" + h(g)
              )).replace(/(^|[^\\])d/g, "$1" + g);
              var f = i ? t.getUTCHours() : t.getHours(),
                p = f > 12 ? f - 12 : 0 === f ? 12 : f;
              e = (e = (e = (e = e.replace(
                /(^|[^\\])HH+/g,
                "$1" + h(f)
              )).replace(/(^|[^\\])H/g, "$1" + f)).replace(
                /(^|[^\\])hh+/g,
                "$1" + h(p)
              )).replace(/(^|[^\\])h/g, "$1" + p);
              var x = i ? t.getUTCMinutes() : t.getMinutes();
              e = (e = e.replace(/(^|[^\\])mm+/g, "$1" + h(x))).replace(
                /(^|[^\\])m/g,
                "$1" + x
              );
              var b = i ? t.getUTCSeconds() : t.getSeconds();
              e = (e = e.replace(/(^|[^\\])ss+/g, "$1" + h(b))).replace(
                /(^|[^\\])s/g,
                "$1" + b
              );
              var m = i ? t.getUTCMilliseconds() : t.getMilliseconds();
              (e = e.replace(/(^|[^\\])fff+/g, "$1" + h(m, 3))),
                (m = Math.round(m / 10)),
                (e = e.replace(/(^|[^\\])ff/g, "$1" + h(m))),
                (m = Math.round(m / 10));
              var v = f < 12 ? "AM" : "PM";
              e = (e = (e = e.replace(/(^|[^\\])f/g, "$1" + m)).replace(
                /(^|[^\\])TT+/g,
                "$1" + v
              )).replace(/(^|[^\\])T/g, "$1" + v.charAt(0));
              var y = v.toLowerCase();
              e = (e = e.replace(/(^|[^\\])tt+/g, "$1" + y)).replace(
                /(^|[^\\])t/g,
                "$1" + y.charAt(0)
              );
              var w = -t.getTimezoneOffset(),
                k = i || !w ? "Z" : w > 0 ? "+" : "-";
              if (!i) {
                var A = (w = Math.abs(w)) % 60;
                k += h(Math.floor(w / 60)) + ":" + h(A);
              }
              e = e.replace(/(^|[^\\])K/g, "$1" + k);
              var S = (i ? t.getUTCDay() : t.getDay()) + 1;
              return (e = (e = (e = (e = (e = e.replace(
                new RegExp(o[0], "g"),
                o[S]
              )).replace(new RegExp(l[0], "g"), l[S])).replace(
                new RegExp(n[0], "g"),
                n[u]
              )).replace(new RegExp(r[0], "g"), r[u])).replace(/\\(.)/g, "$1"));
            },
          },
          {
            key: "getTimeUnitsfromTimestamp",
            value: function (t, e) {
              var i = this.w;
              void 0 !== i.config.xaxis.min && (t = i.config.xaxis.min),
                void 0 !== i.config.xaxis.max && (e = i.config.xaxis.max);
              var a = new Date(t).getFullYear(),
                s = new Date(e).getFullYear(),
                n = new Date(t).getMonth(),
                r = new Date(e).getMonth(),
                o = new Date(t).getDate(),
                l = new Date(e).getDate(),
                h = new Date(t).getHours(),
                c = new Date(e).getHours();
              return {
                minMinute: new Date(t).getMinutes(),
                maxMinute: new Date(e).getMinutes(),
                minHour: h,
                maxHour: c,
                minDate: o,
                maxDate: l,
                minMonth: n,
                maxMonth: r,
                minYear: a,
                maxYear: s,
              };
            },
          },
          {
            key: "isLeapYear",
            value: function (t) {
              return (t % 4 == 0 && t % 100 != 0) || t % 400 == 0;
            },
          },
          {
            key: "calculcateLastDaysOfMonth",
            value: function (t, e, i) {
              return this.determineDaysOfMonths(t, e) - i;
            },
          },
          {
            key: "determineDaysOfYear",
            value: function (t) {
              var e = 365;
              return this.isLeapYear(t) && (e = 366), e;
            },
          },
          {
            key: "determineRemainingDaysOfYear",
            value: function (t, e, i) {
              var a = this.daysCntOfYear[e] + i;
              return e > 1 && this.isLeapYear() && a++, a;
            },
          },
          {
            key: "determineDaysOfMonths",
            value: function (t, e) {
              var i = 30;
              switch (((t = u.monthMod(t)), !0)) {
                case this.months30.indexOf(t) > -1:
                  2 === t && (i = this.isLeapYear(e) ? 29 : 28);
                  break;
                case this.months31.indexOf(t) > -1:
                default:
                  i = 31;
              }
              return i;
            },
          },
        ]),
        t
      );
    })(),
    y = (function () {
      function t(i) {
        e(this, t), (this.opts = i);
      }
      return (
        a(
          t,
          [
            {
              key: "line",
              value: function () {
                return {
                  chart: { animations: { easing: "swing" } },
                  dataLabels: { enabled: !1 },
                  stroke: { width: 5, curve: "straight" },
                  markers: { size: 0, hover: { sizeOffset: 6 } },
                  xaxis: { crosshairs: { width: 1 } },
                };
              },
            },
            {
              key: "sparkline",
              value: function (t) {
                (this.opts.yaxis[0].labels.show = !1),
                  (this.opts.yaxis[0].floating = !0);
                return u.extend(t, {
                  grid: {
                    show: !1,
                    padding: { left: 0, right: 0, top: 0, bottom: 0 },
                  },
                  legend: { show: !1 },
                  xaxis: {
                    labels: { show: !1 },
                    tooltip: { enabled: !1 },
                    axisBorder: { show: !1 },
                  },
                  chart: { toolbar: { show: !1 }, zoom: { enabled: !1 } },
                  dataLabels: { enabled: !1 },
                });
              },
            },
            {
              key: "bar",
              value: function () {
                return {
                  chart: { stacked: !1, animations: { easing: "swing" } },
                  plotOptions: { bar: { dataLabels: { position: "center" } } },
                  dataLabels: { style: { colors: ["#fff"] } },
                  stroke: { width: 0 },
                  fill: { opacity: 0.85 },
                  legend: { markers: { shape: "square", radius: 2, size: 8 } },
                  tooltip: { shared: !1 },
                  xaxis: {
                    tooltip: { enabled: !1 },
                    crosshairs: {
                      width: "barWidth",
                      position: "back",
                      fill: { type: "gradient" },
                      dropShadow: { enabled: !1 },
                      stroke: { width: 0 },
                    },
                  },
                };
              },
            },
            {
              key: "candlestick",
              value: function () {
                return {
                  stroke: { width: 1, colors: ["#333"] },
                  dataLabels: { enabled: !1 },
                  tooltip: {
                    shared: !0,
                    custom: function (t) {
                      var e = t.seriesIndex,
                        i = t.dataPointIndex,
                        a = t.w;
                      return (
                        '<div class="apexcharts-tooltip-candlestick"><div>Open: <span class="value">' +
                        a.globals.seriesCandleO[e][i] +
                        '</span></div><div>High: <span class="value">' +
                        a.globals.seriesCandleH[e][i] +
                        '</span></div><div>Low: <span class="value">' +
                        a.globals.seriesCandleL[e][i] +
                        '</span></div><div>Close: <span class="value">' +
                        a.globals.seriesCandleC[e][i] +
                        "</span></div></div>"
                      );
                    },
                  },
                  states: { active: { filter: { type: "none" } } },
                  xaxis: { crosshairs: { width: 1 } },
                };
              },
            },
            {
              key: "rangeBar",
              value: function () {
                return {
                  stroke: { width: 0 },
                  plotOptions: { bar: { dataLabels: { position: "center" } } },
                  dataLabels: {
                    enabled: !1,
                    formatter: function (t, e) {
                      e.ctx;
                      var i = e.seriesIndex,
                        a = e.dataPointIndex,
                        s = e.w,
                        n = s.globals.seriesRangeStart[i][a];
                      return s.globals.seriesRangeEnd[i][a] - n;
                    },
                    style: { colors: ["#fff"] },
                  },
                  tooltip: {
                    shared: !1,
                    followCursor: !0,
                    custom: function (t) {
                      var e = t.ctx,
                        i = t.seriesIndex,
                        a = t.dataPointIndex,
                        s = t.w,
                        n = s.globals.seriesRangeStart[i][a],
                        r = s.globals.seriesRangeEnd[i][a],
                        o = "",
                        l = "",
                        h = s.globals.colors[i];
                      if (void 0 === s.config.tooltip.x.formatter)
                        if ("datetime" === s.config.xaxis.type) {
                          var c = new v(e);
                          (o = c.formatDate(
                            new Date(n),
                            s.config.tooltip.x.format,
                            !0,
                            !0
                          )),
                            (l = c.formatDate(
                              new Date(r),
                              s.config.tooltip.x.format,
                              !0,
                              !0
                            ));
                        } else (o = n), (l = r);
                      else
                        (o = s.config.tooltip.x.formatter(n)),
                          (l = s.config.tooltip.x.formatter(r));
                      var d = s.globals.labels[a];
                      return (
                        '<div class="apexcharts-tooltip-rangebar"><div> <span class="series-name" style="color: ' +
                        h +
                        '">' +
                        (s.config.series[i].name
                          ? s.config.series[i].name
                          : "") +
                        '</span></div><div> <span class="category">' +
                        d +
                        ': </span> <span class="value start-value">' +
                        o +
                        '</span> <span class="separator">-</span> <span class="value end-value">' +
                        l +
                        "</span></div></div>"
                      );
                    },
                  },
                  xaxis: {
                    tooltip: { enabled: !1 },
                    crosshairs: { stroke: { width: 0 } },
                  },
                };
              },
            },
            {
              key: "area",
              value: function () {
                return {
                  stroke: { width: 4 },
                  fill: {
                    type: "gradient",
                    gradient: {
                      inverseColors: !1,
                      shade: "light",
                      type: "vertical",
                      opacityFrom: 0.65,
                      opacityTo: 0.5,
                      stops: [0, 100, 100],
                    },
                  },
                  markers: { size: 0, hover: { sizeOffset: 6 } },
                  tooltip: { followCursor: !1 },
                };
              },
            },
            {
              key: "brush",
              value: function (t) {
                return u.extend(t, {
                  chart: {
                    toolbar: { autoSelected: "selection", show: !1 },
                    zoom: { enabled: !1 },
                  },
                  dataLabels: { enabled: !1 },
                  stroke: { width: 1 },
                  tooltip: { enabled: !1 },
                  xaxis: { tooltip: { enabled: !1 } },
                });
              },
            },
            {
              key: "stacked100",
              value: function () {
                var t = this;
                (this.opts.dataLabels = this.opts.dataLabels || {}),
                  (this.opts.dataLabels.formatter =
                    this.opts.dataLabels.formatter || void 0);
                var e = this.opts.dataLabels.formatter;
                this.opts.yaxis.forEach(function (e, i) {
                  (t.opts.yaxis[i].min = 0), (t.opts.yaxis[i].max = 100);
                }),
                  "bar" === this.opts.chart.type &&
                    (this.opts.dataLabels.formatter =
                      e ||
                      function (t) {
                        return "number" == typeof t && t
                          ? t.toFixed(0) + "%"
                          : t;
                      });
              },
            },
            {
              key: "bubble",
              value: function () {
                return {
                  dataLabels: { style: { colors: ["#fff"] } },
                  tooltip: { shared: !1, intersect: !0 },
                  xaxis: { crosshairs: { width: 0 } },
                  fill: {
                    type: "solid",
                    gradient: {
                      shade: "light",
                      inverse: !0,
                      shadeIntensity: 0.55,
                      opacityFrom: 0.4,
                      opacityTo: 0.8,
                    },
                  },
                };
              },
            },
            {
              key: "scatter",
              value: function () {
                return {
                  dataLabels: { enabled: !1 },
                  tooltip: { shared: !1, intersect: !0 },
                  markers: {
                    size: 6,
                    strokeWidth: 2,
                    hover: { sizeOffset: 2 },
                  },
                };
              },
            },
            {
              key: "heatmap",
              value: function () {
                return {
                  chart: { stacked: !1, zoom: { enabled: !1 } },
                  fill: { opacity: 1 },
                  dataLabels: { style: { colors: ["#fff"] } },
                  stroke: { colors: ["#fff"] },
                  tooltip: {
                    followCursor: !0,
                    marker: { show: !1 },
                    x: { show: !1 },
                  },
                  legend: {
                    position: "top",
                    markers: { shape: "square", size: 10, offsetY: 2 },
                  },
                  grid: { padding: { right: 20 } },
                };
              },
            },
            {
              key: "pie",
              value: function () {
                return {
                  chart: { toolbar: { show: !1 } },
                  plotOptions: { pie: { donut: { labels: { show: !1 } } } },
                  dataLabels: {
                    formatter: function (t) {
                      return t.toFixed(1) + "%";
                    },
                    style: { colors: ["#fff"] },
                    dropShadow: { enabled: !0 },
                  },
                  stroke: { colors: ["#fff"] },
                  fill: {
                    opacity: 1,
                    gradient: {
                      shade: "dark",
                      shadeIntensity: 0.35,
                      inverseColors: !1,
                      stops: [0, 100, 100],
                    },
                  },
                  padding: { right: 0, left: 0 },
                  tooltip: { theme: "dark", fillSeriesColor: !0 },
                  legend: { position: "right" },
                };
              },
            },
            {
              key: "donut",
              value: function () {
                return {
                  chart: { toolbar: { show: !1 } },
                  dataLabels: {
                    formatter: function (t) {
                      return t.toFixed(1) + "%";
                    },
                    style: { colors: ["#fff"] },
                    dropShadow: { enabled: !0 },
                  },
                  stroke: { colors: ["#fff"] },
                  fill: {
                    opacity: 1,
                    gradient: {
                      shade: "dark",
                      shadeIntensity: 0.4,
                      inverseColors: !1,
                      type: "vertical",
                      opacityFrom: 1,
                      opacityTo: 1,
                      stops: [70, 98, 100],
                    },
                  },
                  padding: { right: 0, left: 0 },
                  tooltip: { theme: "dark", fillSeriesColor: !0 },
                  legend: { position: "right" },
                };
              },
            },
            {
              key: "radar",
              value: function () {
                return (
                  (this.opts.yaxis[0].labels.style.fontSize = "13px"),
                  (this.opts.yaxis[0].labels.offsetY = 6),
                  {
                    dataLabels: {
                      enabled: !0,
                      style: { colors: ["#a8a8a8"], fontSize: "11px" },
                    },
                    stroke: { width: 2 },
                    markers: { size: 3, strokeWidth: 1, strokeOpacity: 1 },
                    fill: { opacity: 0.2 },
                    tooltip: { shared: !1, intersect: !0, followCursor: !0 },
                    grid: { show: !1 },
                    xaxis: {
                      tooltip: { enabled: !1 },
                      crosshairs: { show: !1 },
                    },
                  }
                );
              },
            },
            {
              key: "radialBar",
              value: function () {
                return {
                  chart: {
                    animations: {
                      dynamicAnimation: { enabled: !0, speed: 800 },
                    },
                    toolbar: { show: !1 },
                  },
                  fill: {
                    gradient: {
                      shade: "dark",
                      shadeIntensity: 0.4,
                      inverseColors: !1,
                      type: "diagonal2",
                      opacityFrom: 1,
                      opacityTo: 1,
                      stops: [70, 98, 100],
                    },
                  },
                  padding: { right: 0, left: 0 },
                  legend: { show: !1, position: "right" },
                  tooltip: { enabled: !1, fillSeriesColor: !0 },
                };
              },
            },
          ],
          [
            {
              key: "convertCatToNumeric",
              value: function (t) {
                (t.xaxis.type = "numeric"),
                  (t.xaxis.convertedCatToNumeric = !0),
                  (t.xaxis.labels = t.xaxis.labels || {}),
                  (t.xaxis.labels.formatter =
                    t.xaxis.labels.formatter ||
                    function (t) {
                      return t;
                    }),
                  (t.chart = t.chart || {}),
                  (t.chart.zoom =
                    t.chart.zoom ||
                    (window.Apex.chart && window.Apex.chart.zoom) ||
                    {});
                var e = t.xaxis.labels.formatter,
                  i =
                    t.xaxis.categories && t.xaxis.categories.length
                      ? t.xaxis.categories
                      : t.labels;
                return (
                  i &&
                    i.length &&
                    (t.xaxis.labels.formatter = function (t) {
                      return e(i[t - 1]);
                    }),
                  (t.xaxis.categories = []),
                  (t.labels = []),
                  (t.chart.zoom.enabled = t.chart.zoom.enabled || !1),
                  t
                );
              },
            },
          ]
        ),
        t
      );
    })(),
    w = (function () {
      function t(i) {
        e(this, t), (this.ctx = i), (this.w = i.w);
      }
      return (
        a(
          t,
          [
            {
              key: "getStackedSeriesTotals",
              value: function () {
                var t = this.w,
                  e = [];
                if (0 === t.globals.series.length) return e;
                for (
                  var i = 0;
                  i < t.globals.series[t.globals.maxValsInArrayIndex].length;
                  i++
                ) {
                  for (var a = 0, s = 0; s < t.globals.series.length; s++)
                    a += t.globals.series[s][i];
                  e.push(a);
                }
                return (t.globals.stackedSeriesTotals = e), e;
              },
            },
            {
              key: "getSeriesTotalByIndex",
              value: function () {
                var t =
                  arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : null;
                return null === t
                  ? this.w.config.series.reduce(function (t, e) {
                      return t + e;
                    }, 0)
                  : this.w.globals.series[t].reduce(function (t, e) {
                      return t + e;
                    }, 0);
              },
            },
            {
              key: "isSeriesNull",
              value: function () {
                var t =
                  arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : null;
                return (
                  0 ===
                  (null === t
                    ? this.w.config.series.filter(function (t) {
                        return null !== t;
                      })
                    : this.w.globals.series[t].filter(function (t) {
                        return null !== t;
                      })
                  ).length
                );
              },
            },
            {
              key: "seriesHaveSameValues",
              value: function (t) {
                return this.w.globals.series[t].every(function (t, e, i) {
                  return t === i[0];
                });
              },
            },
            {
              key: "getLargestSeries",
              value: function () {
                var t = this.w;
                t.globals.maxValsInArrayIndex = t.globals.series
                  .map(function (t) {
                    return t.length;
                  })
                  .indexOf(
                    Math.max.apply(
                      Math,
                      t.globals.series.map(function (t) {
                        return t.length;
                      })
                    )
                  );
              },
            },
            {
              key: "getLargestMarkerSize",
              value: function () {
                var t = this.w,
                  e = 0;
                return (
                  t.globals.markers.size.forEach(function (t) {
                    e = Math.max(e, t);
                  }),
                  (t.globals.markers.largestSize = e),
                  e
                );
              },
            },
            {
              key: "getSeriesTotals",
              value: function () {
                var t = this.w;
                t.globals.seriesTotals = t.globals.series.map(function (t, e) {
                  var i = 0;
                  if (Array.isArray(t))
                    for (var a = 0; a < t.length; a++) i += t[a];
                  else i += t;
                  return i;
                });
              },
            },
            {
              key: "getSeriesTotalsXRange",
              value: function (t, e) {
                var i = this.w;
                return i.globals.series.map(function (a, s) {
                  for (var n = 0, r = 0; r < a.length; r++)
                    i.globals.seriesX[s][r] > t &&
                      i.globals.seriesX[s][r] < e &&
                      (n += a[r]);
                  return n;
                });
              },
            },
            {
              key: "getPercentSeries",
              value: function () {
                var t = this.w;
                t.globals.seriesPercent = t.globals.series.map(function (e, i) {
                  var a = [];
                  if (Array.isArray(e))
                    for (var s = 0; s < e.length; s++) {
                      var n = t.globals.stackedSeriesTotals[s],
                        r = 0;
                      n && (r = (100 * e[s]) / n), a.push(r);
                    }
                  else {
                    var o =
                      (100 * e) /
                      t.globals.seriesTotals.reduce(function (t, e) {
                        return t + e;
                      }, 0);
                    a.push(o);
                  }
                  return a;
                });
              },
            },
            {
              key: "getCalculatedRatios",
              value: function () {
                var t,
                  e,
                  i,
                  a,
                  s = this.w.globals,
                  n = [],
                  r = 0,
                  o = [],
                  l = 0.1,
                  h = 0;
                if (((s.yRange = []), s.isMultipleYAxis))
                  for (var c = 0; c < s.minYArr.length; c++)
                    s.yRange.push(Math.abs(s.minYArr[c] - s.maxYArr[c])),
                      o.push(0);
                else s.yRange.push(Math.abs(s.minY - s.maxY));
                (s.xRange = Math.abs(s.maxX - s.minX)),
                  (s.zRange = Math.abs(s.maxZ - s.minZ));
                for (var d = 0; d < s.yRange.length; d++)
                  n.push(s.yRange[d] / s.gridHeight);
                if (
                  ((e = s.xRange / s.gridWidth),
                  (i = Math.abs(s.initialmaxX - s.initialminX) / s.gridWidth),
                  (t = s.yRange / s.gridWidth),
                  (a = s.xRange / s.gridHeight),
                  (r = (s.zRange / s.gridHeight) * 16) || (r = 1),
                  s.minY !== Number.MIN_VALUE &&
                    0 !== Math.abs(s.minY) &&
                    (s.hasNegs = !0),
                  s.isMultipleYAxis)
                ) {
                  o = [];
                  for (var u = 0; u < n.length; u++)
                    o.push(-s.minYArr[u] / n[u]);
                } else
                  o.push(-s.minY / n[0]),
                    s.minY !== Number.MIN_VALUE &&
                      0 !== Math.abs(s.minY) &&
                      ((l = -s.minY / t), (h = s.minX / e));
                return {
                  yRatio: n,
                  invertedYRatio: t,
                  zRatio: r,
                  xRatio: e,
                  initialXRatio: i,
                  invertedXRatio: a,
                  baseLineInvertedY: l,
                  baseLineY: o,
                  baseLineX: h,
                };
              },
            },
            {
              key: "getLogSeries",
              value: function (t) {
                var e = this.w;
                return (
                  (e.globals.seriesLog = t.map(function (t, i) {
                    return e.config.yaxis[i] && e.config.yaxis[i].logarithmic
                      ? t.map(function (t) {
                          return null === t
                            ? null
                            : (Math.log(t) - Math.log(e.globals.minYArr[i])) /
                                (Math.log(e.globals.maxYArr[i]) -
                                  Math.log(e.globals.minYArr[i]));
                        })
                      : t;
                  })),
                  e.globals.seriesLog
                );
              },
            },
            {
              key: "getLogYRatios",
              value: function (t) {
                var e = this,
                  i = this.w,
                  a = this.w.globals;
                return (
                  (a.yLogRatio = t.slice()),
                  (a.logYRange = a.yRange.map(function (t, s) {
                    if (i.config.yaxis[s] && e.w.config.yaxis[s].logarithmic) {
                      var n,
                        r = -Number.MAX_VALUE,
                        o = Number.MIN_VALUE;
                      return (
                        a.seriesLog.forEach(function (t, e) {
                          t.forEach(function (t) {
                            i.config.yaxis[e] &&
                              i.config.yaxis[e].logarithmic &&
                              ((r = Math.max(t, r)), (o = Math.min(t, o)));
                          });
                        }),
                        (n = Math.pow(
                          a.yRange[s],
                          Math.abs(o - r) / a.yRange[s]
                        )),
                        (a.yLogRatio[s] = n / a.gridHeight),
                        n
                      );
                    }
                  })),
                  a.yLogRatio
                );
              },
            },
          ],
          [
            {
              key: "checkComboSeries",
              value: function (t) {
                var e = !1,
                  i = !1;
                return (
                  t.length &&
                    void 0 !== t[0].type &&
                    ((e = !0),
                    t.forEach(function (t) {
                      ("bar" !== t.type && "column" !== t.type) || (i = !0);
                    })),
                  { comboCharts: e, comboChartsHasBars: i }
                );
              },
            },
            {
              key: "extendArrayProps",
              value: function (t, e) {
                return (
                  e.yaxis && (e = t.extendYAxis(e)),
                  e.annotations &&
                    (e.annotations.yaxis && (e = t.extendYAxisAnnotations(e)),
                    e.annotations.xaxis && (e = t.extendXAxisAnnotations(e)),
                    e.annotations.points && (e = t.extendPointAnnotations(e))),
                  e
                );
              },
            },
          ]
        ),
        t
      );
    })(),
    k = (function () {
      function i(t) {
        e(this, i), (this.opts = t);
      }
      return (
        a(i, [
          {
            key: "init",
            value: function () {
              var e = this.opts,
                i = new b(),
                a = new y(e);
              (this.chartType = e.chart.type),
                "histogram" === this.chartType &&
                  ((e.chart.type = "bar"),
                  (e = u.extend(
                    { plotOptions: { bar: { columnWidth: "99.99%" } } },
                    e
                  ))),
                (e = this.extendYAxis(e)),
                (e = this.extendAnnotations(e));
              var s = i.init(),
                n = {};
              if (e && "object" === t(e)) {
                var r = {};
                switch (this.chartType) {
                  case "line":
                    r = a.line();
                    break;
                  case "area":
                    r = a.area();
                    break;
                  case "bar":
                    r = a.bar();
                    break;
                  case "candlestick":
                    r = a.candlestick();
                    break;
                  case "rangeBar":
                    r = a.rangeBar();
                    break;
                  case "histogram":
                    r = a.bar();
                    break;
                  case "bubble":
                    r = a.bubble();
                    break;
                  case "scatter":
                    r = a.scatter();
                    break;
                  case "heatmap":
                    r = a.heatmap();
                    break;
                  case "pie":
                    r = a.pie();
                    break;
                  case "donut":
                    r = a.donut();
                    break;
                  case "radar":
                    r = a.radar();
                    break;
                  case "radialBar":
                    r = a.radialBar();
                    break;
                  default:
                    r = a.line();
                }
                e.chart.brush && e.chart.brush.enabled && (r = a.brush(r)),
                  e.chart.stacked &&
                    "100%" === e.chart.stackType &&
                    a.stacked100(),
                  this.checkForDarkTheme(window.Apex),
                  this.checkForDarkTheme(e),
                  (e.xaxis = e.xaxis || window.Apex.xaxis || {});
                var o = w.checkComboSeries(e.series);
                ("line" !== e.chart.type &&
                  "area" !== e.chart.type &&
                  "scatter" !== e.chart.type) ||
                  o.comboChartsHasBars ||
                  "datetime" === e.xaxis.type ||
                  "numeric" === e.xaxis.type ||
                  "between" === e.xaxis.tickPlacement ||
                  (e = y.convertCatToNumeric(e)),
                  ((e.chart.sparkline && e.chart.sparkline.enabled) ||
                    (window.Apex.chart &&
                      window.Apex.chart.sparkline &&
                      window.Apex.chart.sparkline.enabled)) &&
                    (r = a.sparkline(r)),
                  (n = u.extend(s, r));
              }
              var l = u.extend(n, window.Apex);
              return (s = u.extend(l, e)), (s = this.handleUserInputErrors(s));
            },
          },
          {
            key: "extendYAxis",
            value: function (t) {
              var e = new b();
              return (
                void 0 === t.yaxis && (t.yaxis = {}),
                t.yaxis.constructor !== Array &&
                  window.Apex.yaxis &&
                  window.Apex.yaxis.constructor !== Array &&
                  (t.yaxis = u.extend(t.yaxis, window.Apex.yaxis)),
                t.yaxis.constructor !== Array
                  ? (t.yaxis = [u.extend(e.yAxis, t.yaxis)])
                  : (t.yaxis = u.extendArray(t.yaxis, e.yAxis)),
                t
              );
            },
          },
          {
            key: "extendAnnotations",
            value: function (t) {
              return (
                void 0 === t.annotations &&
                  ((t.annotations = {}),
                  (t.annotations.yaxis = []),
                  (t.annotations.xaxis = []),
                  (t.annotations.points = [])),
                (t = this.extendYAxisAnnotations(t)),
                (t = this.extendXAxisAnnotations(t)),
                (t = this.extendPointAnnotations(t))
              );
            },
          },
          {
            key: "extendYAxisAnnotations",
            value: function (t) {
              var e = new b();
              return (
                (t.annotations.yaxis = u.extendArray(
                  void 0 !== t.annotations.yaxis ? t.annotations.yaxis : [],
                  e.yAxisAnnotation
                )),
                t
              );
            },
          },
          {
            key: "extendXAxisAnnotations",
            value: function (t) {
              var e = new b();
              return (
                (t.annotations.xaxis = u.extendArray(
                  void 0 !== t.annotations.xaxis ? t.annotations.xaxis : [],
                  e.xAxisAnnotation
                )),
                t
              );
            },
          },
          {
            key: "extendPointAnnotations",
            value: function (t) {
              var e = new b();
              return (
                (t.annotations.points = u.extendArray(
                  void 0 !== t.annotations.points ? t.annotations.points : [],
                  e.pointAnnotation
                )),
                t
              );
            },
          },
          {
            key: "checkForDarkTheme",
            value: function (t) {
              t.theme &&
                "dark" === t.theme.mode &&
                (t.tooltip || (t.tooltip = {}),
                "light" !== t.tooltip.theme && (t.tooltip.theme = "dark"),
                t.chart.foreColor || (t.chart.foreColor = "#f6f7f8"),
                t.theme.palette || (t.theme.palette = "palette4"));
            },
          },
          {
            key: "handleUserInputErrors",
            value: function (t) {
              var e = t;
              if (e.tooltip.shared && e.tooltip.intersect)
                throw new Error(
                  "tooltip.shared cannot be enabled when tooltip.intersect is true. Turn off any other option by setting it to false."
                );
              if (
                (e.chart.scroller &&
                  console.warn(
                    "Scroller has been deprecated since v2.0.0. Please remove the configuration for chart.scroller"
                  ),
                ("bar" === e.chart.type || "rangeBar" === e.chart.type) &&
                  e.plotOptions.bar.horizontal)
              ) {
                if (e.yaxis.length > 1)
                  throw new Error(
                    "Multiple Y Axis for bars are not supported. Switch to column chart by setting plotOptions.bar.horizontal=false"
                  );
                e.yaxis[0].reversed && (e.yaxis[0].opposite = !0),
                  (e.xaxis.tooltip.enabled = !1),
                  (e.yaxis[0].tooltip.enabled = !1),
                  (e.chart.zoom.enabled = !1);
              }
              return (
                ("bar" !== e.chart.type && "rangeBar" !== e.chart.type) ||
                  (e.tooltip.shared &&
                    ("barWidth" === e.xaxis.crosshairs.width &&
                      e.series.length > 1 &&
                      (console.warn(
                        'crosshairs.width = "barWidth" is only supported in single series, not in a multi-series barChart.'
                      ),
                      (e.xaxis.crosshairs.width = "tickWidth")),
                    e.plotOptions.bar.horizontal &&
                      ((e.states.hover.type = "none"), (e.tooltip.shared = !1)),
                    e.tooltip.followCursor ||
                      (console.warn(
                        "followCursor option in shared columns cannot be turned off. Please set %ctooltip.followCursor: true",
                        "color: blue;"
                      ),
                      (e.tooltip.followCursor = !0)))),
                "candlestick" === e.chart.type &&
                  e.yaxis[0].reversed &&
                  (console.warn(
                    "Reversed y-axis in candlestick chart is not supported."
                  ),
                  (e.yaxis[0].reversed = !1)),
                e.chart.group &&
                  0 === e.yaxis[0].labels.minWidth &&
                  console.warn(
                    "It looks like you have multiple charts in synchronization. You must provide yaxis.labels.minWidth which must be EQUAL for all grouped charts to prevent incorrect behaviour."
                  ),
                Array.isArray(e.stroke.width) &&
                  "line" !== e.chart.type &&
                  "area" !== e.chart.type &&
                  (console.warn(
                    "stroke.width option accepts array only for line and area charts. Reverted back to Number"
                  ),
                  (e.stroke.width = e.stroke.width[0])),
                e
              );
            },
          },
        ]),
        i
      );
    })(),
    A = (function () {
      function t() {
        e(this, t);
      }
      return (
        a(t, [
          {
            key: "globalVars",
            value: function (t) {
              return {
                chartID: null,
                cuid: null,
                events: {
                  beforeMount: [],
                  mounted: [],
                  updated: [],
                  clicked: [],
                  selection: [],
                  dataPointSelection: [],
                  zoomed: [],
                  scrolled: [],
                },
                colors: [],
                clientX: null,
                clientY: null,
                fill: { colors: [] },
                stroke: { colors: [] },
                dataLabels: { style: { colors: [] } },
                radarPolygons: { fill: { colors: [] } },
                markers: { colors: [], size: t.markers.size, largestSize: 0 },
                animationEnded: !1,
                isTouchDevice:
                  "ontouchstart" in window || navigator.msMaxTouchPoints,
                isDirty: !1,
                isExecCalled: !1,
                initialConfig: null,
                series: [],
                seriesRangeStart: [],
                seriesRangeEnd: [],
                seriesPercent: [],
                seriesTotals: [],
                stackedSeriesTotals: [],
                seriesX: [],
                seriesZ: [],
                columnSeries: null,
                labels: [],
                timelineLabels: [],
                invertedTimelineLabels: [],
                seriesNames: [],
                noLabelsProvided: !1,
                allSeriesCollapsed: !1,
                collapsedSeries: [],
                collapsedSeriesIndices: [],
                ancillaryCollapsedSeries: [],
                ancillaryCollapsedSeriesIndices: [],
                risingSeries: [],
                dataFormatXNumeric: !1,
                capturedSeriesIndex: -1,
                capturedDataPointIndex: -1,
                selectedDataPoints: [],
                ignoreYAxisIndexes: [],
                yAxisSameScaleIndices: [],
                padHorizontal: 0,
                maxValsInArrayIndex: 0,
                radialSize: 0,
                zoomEnabled:
                  "zoom" === t.chart.toolbar.autoSelected &&
                  t.chart.toolbar.tools.zoom &&
                  t.chart.zoom.enabled,
                panEnabled:
                  "pan" === t.chart.toolbar.autoSelected &&
                  t.chart.toolbar.tools.pan,
                selectionEnabled:
                  "selection" === t.chart.toolbar.autoSelected &&
                  t.chart.toolbar.tools.selection,
                yaxis: null,
                minY: Number.MIN_VALUE,
                maxY: -Number.MAX_VALUE,
                minYArr: [],
                maxYArr: [],
                maxX: -Number.MAX_VALUE,
                initialmaxX: -Number.MAX_VALUE,
                minX: Number.MIN_VALUE,
                initialminX: Number.MIN_VALUE,
                minZ: Number.MIN_VALUE,
                maxZ: -Number.MAX_VALUE,
                minXDiff: Number.MAX_VALUE,
                mousedown: !1,
                lastClientPosition: {},
                visibleXRange: void 0,
                yRange: [],
                zRange: 0,
                xRange: 0,
                yValueDecimal: 0,
                total: 0,
                SVGNS: "http://www.w3.org/2000/svg",
                svgWidth: 0,
                svgHeight: 0,
                noData: !1,
                locale: {},
                dom: {},
                memory: { methodsToExec: [] },
                shouldAnimate: !0,
                skipLastTimelinelabel: !1,
                delayedElements: [],
                axisCharts: !0,
                isXNumeric: !1,
                isDataXYZ: !1,
                resized: !1,
                resizeTimer: null,
                comboCharts: !1,
                comboChartsHasBars: !1,
                dataChanged: !1,
                previousPaths: [],
                seriesXvalues: [],
                seriesYvalues: [],
                seriesCandleO: [],
                seriesCandleH: [],
                seriesCandleL: [],
                seriesCandleC: [],
                allSeriesHasEqualX: !0,
                dataPoints: 0,
                pointsArray: [],
                dataLabelsRects: [],
                lastDrawnDataLabelsIndexes: [],
                hasNullValues: !1,
                easing: null,
                zoomed: !1,
                gridWidth: 0,
                gridHeight: 0,
                yAxisScale: [],
                xAxisScale: null,
                xAxisTicksPositions: [],
                timescaleTicks: [],
                rotateXLabels: !1,
                defaultLabels: !1,
                xLabelFormatter: void 0,
                yLabelFormatters: [],
                xaxisTooltipFormatter: void 0,
                ttKeyFormatter: void 0,
                ttVal: void 0,
                ttZFormatter: void 0,
                LINE_HEIGHT_RATIO: 1.618,
                xAxisLabelsHeight: 0,
                yAxisLabelsWidth: 0,
                scaleX: 1,
                scaleY: 1,
                translateX: 0,
                translateY: 0,
                translateYAxisX: [],
                yLabelsCoords: [],
                yTitleCoords: [],
                yAxisWidths: [],
                translateXAxisY: 0,
                translateXAxisX: 0,
                tooltip: null,
                tooltipOpts: null,
              };
            },
          },
          {
            key: "init",
            value: function (t) {
              var e = this.globalVars(t);
              return (
                (e.initialConfig = u.extend({}, t)),
                (e.initialSeries = JSON.parse(
                  JSON.stringify(e.initialConfig.series)
                )),
                e
              );
            },
          },
        ]),
        t
      );
    })(),
    S = (function () {
      function t(i) {
        e(this, t), (this.opts = i);
      }
      return (
        a(t, [
          {
            key: "init",
            value: function () {
              var t = new k(this.opts).init();
              return { config: t, globals: new A().init(t) };
            },
          },
        ]),
        t
      );
    })(),
    C = (function () {
      function t(i) {
        e(this, t),
          (this.ctx = i),
          (this.w = i.w),
          (this.opts = null),
          (this.seriesIndex = 0);
      }
      return (
        a(t, [
          {
            key: "clippedImgArea",
            value: function (t) {
              var e = this.w,
                i = e.config,
                a = parseInt(e.globals.gridWidth),
                s = parseInt(e.globals.gridHeight),
                n = a > s ? a : s,
                r = t.image,
                o = 0,
                l = 0;
              void 0 === t.width && void 0 === t.height
                ? void 0 !== i.fill.image.width &&
                  void 0 !== i.fill.image.height
                  ? ((o = i.fill.image.width + 1), (l = i.fill.image.height))
                  : ((o = n + 1), (l = n))
                : ((o = t.width), (l = t.height));
              var h = document.createElementNS(e.globals.SVGNS, "pattern");
              p.setAttrs(h, {
                id: t.patternID,
                patternUnits: t.patternUnits
                  ? t.patternUnits
                  : "userSpaceOnUse",
                width: o + "px",
                height: l + "px",
              });
              var c = document.createElementNS(e.globals.SVGNS, "image");
              h.appendChild(c),
                c.setAttributeNS("http://www.w3.org/1999/xlink", "href", r),
                p.setAttrs(c, {
                  x: 0,
                  y: 0,
                  preserveAspectRatio: "none",
                  width: o + "px",
                  height: l + "px",
                }),
                (c.style.opacity = t.opacity),
                e.globals.dom.elDefs.node.appendChild(h);
            },
          },
          {
            key: "getSeriesIndex",
            value: function (t) {
              var e = this.w;
              return (
                ("bar" === e.config.chart.type &&
                  e.config.plotOptions.bar.distributed) ||
                "heatmap" === e.config.chart.type
                  ? (this.seriesIndex = t.seriesNumber)
                  : (this.seriesIndex =
                      t.seriesNumber % e.globals.series.length),
                this.seriesIndex
              );
            },
          },
          {
            key: "fillPath",
            value: function (t) {
              var e = this.w;
              this.opts = t;
              var i,
                a,
                s,
                n = this.w.config;
              this.seriesIndex = this.getSeriesIndex(t);
              var r = this.getFillColors()[this.seriesIndex];
              "function" == typeof r &&
                (r = r({
                  seriesIndex: this.seriesIndex,
                  value: t.value,
                  w: e,
                }));
              var o = this.getFillType(this.seriesIndex),
                l = Array.isArray(n.fill.opacity)
                  ? n.fill.opacity[this.seriesIndex]
                  : n.fill.opacity,
                h = r;
              return (
                t.color && (r = t.color),
                -1 === r.indexOf("rgb")
                  ? (h = u.hexToRgba(r, l))
                  : r.indexOf("rgba") > -1 &&
                    (l = "0." + u.getOpacityFromRGBA(r)),
                "pattern" === o && (a = this.handlePatternFill(a, r, l, h)),
                "gradient" === o &&
                  (s = this.handleGradientFill(s, r, l, this.seriesIndex)),
                n.fill.image.src.length > 0 && "image" === o
                  ? t.seriesNumber < n.fill.image.src.length
                    ? (this.clippedImgArea({
                        opacity: l,
                        image: n.fill.image.src[t.seriesNumber],
                        patternUnits: t.patternUnits,
                        patternID: "pattern"
                          .concat(e.globals.cuid)
                          .concat(t.seriesNumber + 1),
                      }),
                      (i = "url(#pattern"
                        .concat(e.globals.cuid)
                        .concat(t.seriesNumber + 1, ")")))
                    : (i = h)
                  : (i = "gradient" === o ? s : "pattern" === o ? a : h),
                t.solid && (i = h),
                i
              );
            },
          },
          {
            key: "getFillType",
            value: function (t) {
              var e = this.w;
              return Array.isArray(e.config.fill.type)
                ? e.config.fill.type[t]
                : e.config.fill.type;
            },
          },
          {
            key: "getFillColors",
            value: function () {
              var t = this.w,
                e = t.config,
                i = this.opts,
                a = [];
              return (
                t.globals.comboCharts
                  ? "line" === t.config.series[this.seriesIndex].type
                    ? t.globals.stroke.colors instanceof Array
                      ? (a = t.globals.stroke.colors)
                      : a.push(t.globals.stroke.colors)
                    : t.globals.fill.colors instanceof Array
                    ? (a = t.globals.fill.colors)
                    : a.push(t.globals.fill.colors)
                  : "line" === e.chart.type
                  ? t.globals.stroke.colors instanceof Array
                    ? (a = t.globals.stroke.colors)
                    : a.push(t.globals.stroke.colors)
                  : t.globals.fill.colors instanceof Array
                  ? (a = t.globals.fill.colors)
                  : a.push(t.globals.fill.colors),
                void 0 !== i.fillColors &&
                  ((a = []),
                  i.fillColors instanceof Array
                    ? (a = i.fillColors.slice())
                    : a.push(i.fillColors)),
                a
              );
            },
          },
          {
            key: "handlePatternFill",
            value: function (t, e, i, a) {
              var s = this.w.config,
                n = this.opts,
                r = new p(this.ctx),
                o =
                  void 0 === s.fill.pattern.strokeWidth
                    ? Array.isArray(s.stroke.width)
                      ? s.stroke.width[this.seriesIndex]
                      : s.stroke.width
                    : Array.isArray(s.fill.pattern.strokeWidth)
                    ? s.fill.pattern.strokeWidth[this.seriesIndex]
                    : s.fill.pattern.strokeWidth,
                l = e;
              s.fill.pattern.style instanceof Array
                ? (t =
                    void 0 !== s.fill.pattern.style[n.seriesNumber]
                      ? r.drawPattern(
                          s.fill.pattern.style[n.seriesNumber],
                          s.fill.pattern.width,
                          s.fill.pattern.height,
                          l,
                          o,
                          i
                        )
                      : a)
                : (t = r.drawPattern(
                    s.fill.pattern.style,
                    s.fill.pattern.width,
                    s.fill.pattern.height,
                    l,
                    o,
                    i
                  ));
              return t;
            },
          },
          {
            key: "handleGradientFill",
            value: function (t, e, i, a) {
              var s,
                n,
                r = this.w.config,
                o = this.opts,
                l = new p(this.ctx),
                h = new u(),
                c = r.fill.gradient.type,
                d =
                  void 0 === r.fill.gradient.opacityFrom
                    ? i
                    : Array.isArray(r.fill.gradient.opacityFrom)
                    ? r.fill.gradient.opacityFrom[a]
                    : r.fill.gradient.opacityFrom,
                g =
                  void 0 === r.fill.gradient.opacityTo
                    ? i
                    : Array.isArray(r.fill.gradient.opacityTo)
                    ? r.fill.gradient.opacityTo[a]
                    : r.fill.gradient.opacityTo;
              if (
                ((s = e),
                (n =
                  void 0 === r.fill.gradient.gradientToColors ||
                  0 === r.fill.gradient.gradientToColors.length
                    ? "dark" === r.fill.gradient.shade
                      ? h.shadeColor(
                          -1 * parseFloat(r.fill.gradient.shadeIntensity),
                          e
                        )
                      : h.shadeColor(
                          parseFloat(r.fill.gradient.shadeIntensity),
                          e
                        )
                    : r.fill.gradient.gradientToColors[o.seriesNumber]),
                r.fill.gradient.inverseColors)
              ) {
                var f = s;
                (s = n), (n = f);
              }
              return l.drawGradient(
                c,
                s,
                n,
                d,
                g,
                o.size,
                r.fill.gradient.stops,
                r.fill.gradient.colorStops,
                a
              );
            },
          },
        ]),
        t
      );
    })(),
    L = (function () {
      function t(i, a) {
        e(this, t), (this.ctx = i), (this.w = i.w);
      }
      return (
        a(t, [
          {
            key: "setGlobalMarkerSize",
            value: function () {
              var t = this.w;
              if (
                ((t.globals.markers.size = Array.isArray(t.config.markers.size)
                  ? t.config.markers.size
                  : [t.config.markers.size]),
                t.globals.markers.size.length > 0)
              ) {
                if (t.globals.markers.size.length < t.globals.series.length + 1)
                  for (var e = 0; e <= t.globals.series.length; e++)
                    void 0 === t.globals.markers.size[e] &&
                      t.globals.markers.size.push(t.globals.markers.size[0]);
              } else
                t.globals.markers.size = t.config.series.map(function (e) {
                  return t.config.markers.size;
                });
            },
          },
          {
            key: "plotChartMarkers",
            value: function (t, e, i) {
              var a,
                s = this.w,
                n = e,
                r = t,
                o = null,
                l = new p(this.ctx);
              if (
                (s.globals.markers.size[e] > 0 &&
                  (o = l.group({ class: "apexcharts-series-markers" })).attr(
                    "clip-path",
                    "url(#gridRectMarkerMask".concat(s.globals.cuid, ")")
                  ),
                r.x instanceof Array)
              )
                for (var h = 0; h < r.x.length; h++) {
                  var c = i;
                  1 === i && 0 === h && (c = 0), 1 === i && 1 === h && (c = 1);
                  var d = "apexcharts-marker";
                  if (
                    (("line" !== s.config.chart.type &&
                      "area" !== s.config.chart.type) ||
                      s.globals.comboCharts ||
                      s.config.tooltip.intersect ||
                      (d += " no-pointer-events"),
                    Array.isArray(s.config.markers.size)
                      ? s.globals.markers.size[e] > 0
                      : s.config.markers.size > 0)
                  ) {
                    u.isNumber(r.y[h])
                      ? (d += " w".concat(u.randomId()))
                      : (d = "apexcharts-nullpoint");
                    var f = this.getMarkerConfig(d, e, c);
                    s.config.series[n].data[i] &&
                      (s.config.series[n].data[i].fillColor &&
                        (f.pointFillColor =
                          s.config.series[n].data[i].fillColor),
                      s.config.series[n].data[i].strokeColor &&
                        (f.pointStrokeColor =
                          s.config.series[n].data[i].strokeColor)),
                      (a = l.drawMarker(r.x[h], r.y[h], f)).attr("rel", c),
                      a.attr("j", c),
                      a.attr("index", e),
                      a.node.setAttribute("default-marker-size", f.pSize),
                      new g(this.ctx).setSelectionFilter(a, e, c),
                      this.addEvents(a),
                      o && o.add(a);
                  } else
                    void 0 === s.globals.pointsArray[e] &&
                      (s.globals.pointsArray[e] = []),
                      s.globals.pointsArray[e].push([r.x[h], r.y[h]]);
                }
              return o;
            },
          },
          {
            key: "getMarkerConfig",
            value: function (t, e) {
              var i =
                  arguments.length > 2 && void 0 !== arguments[2]
                    ? arguments[2]
                    : null,
                a = this.w,
                s = this.getMarkerStyle(e),
                n = a.globals.markers.size[e],
                r = a.config.markers;
              null !== i &&
                r.discrete.length &&
                r.discrete.map(function (t) {
                  t.seriesIndex === e &&
                    t.dataPointIndex === i &&
                    ((s.pointStrokeColor = t.strokeColor),
                    (s.pointFillColor = t.fillColor),
                    (n = t.size));
                });
              var o =
                "bubble" === a.config.chart.type
                  ? a.config.stroke.width
                  : r.strokeWidth;
              return {
                pSize: n,
                pRadius: r.radius,
                pWidth: o instanceof Array ? o[e] : o,
                pointStrokeColor: s.pointStrokeColor,
                pointFillColor: s.pointFillColor,
                shape: r.shape instanceof Array ? r.shape[e] : r.shape,
                class: t,
                pointStrokeOpacity:
                  r.strokeOpacity instanceof Array
                    ? r.strokeOpacity[e]
                    : r.strokeOpacity,
                pointFillOpacity:
                  r.fillOpacity instanceof Array
                    ? r.fillOpacity[e]
                    : r.fillOpacity,
                seriesIndex: e,
              };
            },
          },
          {
            key: "addEvents",
            value: function (t) {
              var e = this.w,
                i = new p(this.ctx);
              t.node.addEventListener(
                "mouseenter",
                i.pathMouseEnter.bind(this.ctx, t)
              ),
                t.node.addEventListener(
                  "mouseleave",
                  i.pathMouseLeave.bind(this.ctx, t)
                ),
                t.node.addEventListener(
                  "mousedown",
                  i.pathMouseDown.bind(this.ctx, t)
                ),
                t.node.addEventListener("click", e.config.markers.onClick),
                t.node.addEventListener(
                  "dblclick",
                  e.config.markers.onDblClick
                ),
                t.node.addEventListener(
                  "touchstart",
                  i.pathMouseDown.bind(this.ctx, t),
                  { passive: !0 }
                );
            },
          },
          {
            key: "getMarkerStyle",
            value: function (t) {
              var e = this.w,
                i = e.globals.markers.colors,
                a =
                  e.config.markers.strokeColor || e.config.markers.strokeColors;
              return {
                pointStrokeColor: a instanceof Array ? a[t] : a,
                pointFillColor: i instanceof Array ? i[t] : i,
              };
            },
          },
        ]),
        t
      );
    })(),
    P = (function () {
      function t(i) {
        e(this, t),
          (this.ctx = i),
          (this.w = i.w),
          (this.initialAnim = this.w.config.chart.animations.enabled),
          (this.dynamicAnim =
            this.initialAnim &&
            this.w.config.chart.animations.dynamicAnimation.enabled);
      }
      return (
        a(t, [
          {
            key: "draw",
            value: function (t, e, i) {
              var a = this.w,
                s = new p(this.ctx),
                n = i.realIndex,
                r = i.pointsPos,
                o = i.zRatio,
                l = i.elParent,
                h = s.group({
                  class: "apexcharts-series-markers apexcharts-series-".concat(
                    a.config.chart.type
                  ),
                });
              if (
                (h.attr(
                  "clip-path",
                  "url(#gridRectMarkerMask".concat(a.globals.cuid, ")")
                ),
                r.x instanceof Array)
              )
                for (var c = 0; c < r.x.length; c++) {
                  var d = e + 1,
                    u = !0;
                  0 === e && 0 === c && (d = 0), 0 === e && 1 === c && (d = 1);
                  var g = 0,
                    f = a.globals.markers.size[n];
                  if (o !== 1 / 0) {
                    f = a.globals.seriesZ[n][d] / o;
                    var x = a.config.plotOptions.bubble;
                    x.minBubbleRadius &&
                      f < x.minBubbleRadius &&
                      (f = x.minBubbleRadius),
                      x.maxBubbleRadius &&
                        f > x.maxBubbleRadius &&
                        (f = x.maxBubbleRadius);
                  }
                  a.config.chart.animations.enabled || (g = f);
                  var b = r.x[c],
                    m = r.y[c];
                  if (
                    ((g = g || 0),
                    (null !== m && void 0 !== a.globals.series[n][d]) ||
                      (u = !1),
                    u)
                  ) {
                    var v = this.drawPoint(b, m, g, f, n, d, e);
                    h.add(v);
                  }
                  l.add(h);
                }
            },
          },
          {
            key: "drawPoint",
            value: function (t, e, i, a, s, n, r) {
              var o = this.w,
                l = s,
                h = new f(this.ctx),
                c = new g(this.ctx),
                d = new C(this.ctx),
                u = new L(this.ctx),
                x = new p(this.ctx),
                b = u.getMarkerConfig("apexcharts-marker", l),
                m = d.fillPath({
                  seriesNumber: s,
                  patternUnits: "objectBoundingBox",
                  value: o.globals.series[s][r],
                }),
                v = x.drawCircle(i);
              if (
                (o.config.series[l].data[n] &&
                  o.config.series[l].data[n].fillColor &&
                  (m = o.config.series[l].data[n].fillColor),
                v.attr({
                  cx: t,
                  cy: e,
                  fill: m,
                  stroke: b.pointStrokeColor,
                  "stroke-width": b.pWidth,
                }),
                o.config.chart.dropShadow.enabled)
              ) {
                var y = o.config.chart.dropShadow;
                c.dropShadow(v, y, s);
              }
              if (this.initialAnim && !o.globals.dataChanged) {
                var w = 1;
                o.globals.resized || (w = o.config.chart.animations.speed),
                  h.animateCircleRadius(v, 0, a, w, o.globals.easing);
              }
              if (o.globals.dataChanged)
                if (this.dynamicAnim) {
                  var k,
                    A,
                    S,
                    P,
                    z = o.config.chart.animations.dynamicAnimation.speed;
                  null !=
                    (P =
                      o.globals.previousPaths[s] &&
                      o.globals.previousPaths[s][r]) &&
                    ((k = P.x), (A = P.y), (S = void 0 !== P.r ? P.r : a));
                  for (var E = 0; E < o.globals.collapsedSeries.length; E++)
                    o.globals.collapsedSeries[E].index === s &&
                      ((z = 1), (a = 0));
                  0 === t && 0 === e && (a = 0),
                    h.animateCircle(
                      v,
                      { cx: k, cy: A, r: S },
                      { cx: t, cy: e, r: a },
                      z,
                      o.globals.easing
                    );
                } else v.attr({ r: a });
              return (
                v.attr({ rel: n, j: n, index: s, "default-marker-size": a }),
                c.setSelectionFilter(v, s, n),
                u.addEvents(v),
                v.node.classList.add("apexcharts-marker"),
                v
              );
            },
          },
          {
            key: "centerTextInBubble",
            value: function (t) {
              var e = this.w;
              return {
                y: (t += parseInt(e.config.dataLabels.style.fontSize) / 4),
              };
            },
          },
        ]),
        t
      );
    })(),
    z = (function () {
      function t(i) {
        e(this, t), (this.ctx = i), (this.w = i.w);
      }
      return (
        a(t, [
          {
            key: "dataLabelsCorrection",
            value: function (t, e, i, a, s, n, r) {
              var o = this.w,
                l = !1,
                h = new p(this.ctx).getTextRects(i, r),
                c = h.width,
                d = h.height;
              void 0 === o.globals.dataLabelsRects[a] &&
                (o.globals.dataLabelsRects[a] = []),
                o.globals.dataLabelsRects[a].push({
                  x: t,
                  y: e,
                  width: c,
                  height: d,
                });
              var u = o.globals.dataLabelsRects[a].length - 2,
                g =
                  void 0 !== o.globals.lastDrawnDataLabelsIndexes[a]
                    ? o.globals.lastDrawnDataLabelsIndexes[a][
                        o.globals.lastDrawnDataLabelsIndexes[a].length - 1
                      ]
                    : 0;
              if (void 0 !== o.globals.dataLabelsRects[a][u]) {
                var f = o.globals.dataLabelsRects[a][g];
                (t > f.x + f.width + 2 ||
                  e > f.y + f.height + 2 ||
                  t + c < f.x) &&
                  (l = !0);
              }
              return (
                (0 === s || n) && (l = !0),
                { x: t, y: e, textRects: h, drawnextLabel: l }
              );
            },
          },
          {
            key: "drawDataLabel",
            value: function (t, e, i) {
              var a =
                  arguments.length > 4 && void 0 !== arguments[4]
                    ? arguments[4]
                    : "top",
                s = this.w,
                n = new p(this.ctx),
                r = s.config.dataLabels,
                o = 0,
                l = 0,
                h = i,
                c = null;
              if (!r.enabled || t.x instanceof Array != !0) return c;
              c = n.group({ class: "apexcharts-data-labels" });
              for (var d = 0; d < t.x.length; d++)
                if (
                  ((o = t.x[d] + r.offsetX),
                  (l = t.y[d] + r.offsetY - s.globals.markers.size[e] - 5),
                  "bottom" === a &&
                    (l =
                      l +
                      2 * s.globals.markers.size[e] +
                      1.4 * parseInt(r.style.fontSize)),
                  !isNaN(o))
                ) {
                  1 === i && 0 === d && (h = 0), 1 === i && 1 === d && (h = 1);
                  var u = s.globals.series[e][h],
                    g = "";
                  if ("bubble" === s.config.chart.type)
                    (u = s.globals.seriesZ[e][h]),
                      (g = s.config.dataLabels.formatter(u, {
                        ctx: this.ctx,
                        seriesIndex: e,
                        dataPointIndex: h,
                        w: s,
                      })),
                      (l = t.y[d] + s.config.dataLabels.offsetY),
                      (l = new P(this.ctx).centerTextInBubble(l, e, h).y);
                  else
                    void 0 !== u &&
                      (g = s.config.dataLabels.formatter(u, {
                        ctx: this.ctx,
                        seriesIndex: e,
                        dataPointIndex: h,
                        w: s,
                      }));
                  this.plotDataLabelsText({
                    x: o,
                    y: l,
                    text: g,
                    i: e,
                    j: h,
                    parent: c,
                    offsetCorrection: !0,
                    dataLabelsConfig: s.config.dataLabels,
                  });
                }
              return c;
            },
          },
          {
            key: "plotDataLabelsText",
            value: function (t) {
              var e = this.w,
                i = new p(this.ctx),
                a = t.x,
                s = t.y,
                n = t.i,
                r = t.j,
                o = t.text,
                l = t.textAnchor,
                h = t.parent,
                c = t.dataLabelsConfig,
                d = t.alwaysDrawDataLabel,
                u = t.offsetCorrection;
              if (
                !(
                  Array.isArray(e.config.dataLabels.enabledOnSeries) &&
                  e.config.dataLabels.enabledOnSeries.indexOf(n) < 0
                )
              ) {
                var f = { x: a, y: s, drawnextLabel: !0 };
                if (
                  (u &&
                    (f = this.dataLabelsCorrection(
                      a,
                      s,
                      o,
                      n,
                      r,
                      d,
                      parseInt(c.style.fontSize)
                    )),
                  e.globals.zoomed || ((a = f.x), (s = f.y)),
                  f.textRects &&
                    (a + f.textRects.width < 10 ||
                      a > e.globals.gridWidth + 10) &&
                    (o = ""),
                  f.drawnextLabel)
                ) {
                  var x = i.drawText({
                    width: 100,
                    height: parseInt(c.style.fontSize),
                    x: a,
                    y: s,
                    foreColor: e.globals.dataLabels.style.colors[n],
                    textAnchor: l || c.textAnchor,
                    text: o,
                    fontSize: c.style.fontSize,
                    fontFamily: c.style.fontFamily,
                  });
                  if (
                    (x.attr({ class: "apexcharts-datalabel", cx: a, cy: s }),
                    c.dropShadow.enabled)
                  ) {
                    var b = c.dropShadow;
                    new g(this.ctx).dropShadow(x, b);
                  }
                  h.add(x),
                    void 0 === e.globals.lastDrawnDataLabelsIndexes[n] &&
                      (e.globals.lastDrawnDataLabelsIndexes[n] = []),
                    e.globals.lastDrawnDataLabelsIndexes[n].push(r);
                }
              }
            },
          },
        ]),
        t
      );
    })(),
    E = (function () {
      function t(i, a) {
        e(this, t), (this.ctx = i), (this.w = i.w);
        var s = this.w;
        (this.barOptions = s.config.plotOptions.bar),
          (this.isHorizontal = this.barOptions.horizontal),
          (this.strokeWidth = s.config.stroke.width),
          (this.isNullValue = !1),
          (this.xyRatios = a),
          null !== this.xyRatios &&
            ((this.xRatio = a.xRatio),
            (this.yRatio = a.yRatio),
            (this.invertedXRatio = a.invertedXRatio),
            (this.invertedYRatio = a.invertedYRatio),
            (this.baseLineY = a.baseLineY),
            (this.baseLineInvertedY = a.baseLineInvertedY)),
          (this.yaxisIndex = 0),
          (this.seriesLen = 0);
      }
      return (
        a(t, [
          {
            key: "draw",
            value: function (t, e) {
              var i = this.w,
                a = new p(this.ctx),
                s = new w(this.ctx, i);
              (t = s.getLogSeries(t)),
                (this.series = t),
                (this.yRatio = s.getLogYRatios(this.yRatio)),
                this.initVariables(t);
              var n = a.group({
                class: "apexcharts-bar-series apexcharts-plot-series",
              });
              i.config.dataLabels.enabled &&
                this.totalItems > this.barOptions.dataLabels.maxItems &&
                console.warn(
                  "WARNING: DataLabels are enabled but there are too many to display. This may cause performance issue when rendering."
                );
              for (var r = 0, o = 0; r < t.length; r++, o++) {
                var l,
                  h,
                  c,
                  d,
                  g = void 0,
                  f = void 0,
                  x = void 0,
                  b = void 0,
                  m = [],
                  v = [],
                  y = i.globals.comboCharts ? e[r] : r,
                  k = a.group({
                    class: "apexcharts-series",
                    rel: r + 1,
                    seriesName: u.escapeString(i.globals.seriesNames[y]),
                    "data:realIndex": y,
                  });
                this.ctx.series.addCollapsedClassToSeries(k, y),
                  t[r].length > 0 && (this.visibleI = this.visibleI + 1);
                var A = 0,
                  S = 0,
                  C = 0;
                this.yRatio.length > 1 && (this.yaxisIndex = y),
                  (this.isReversed =
                    i.config.yaxis[this.yaxisIndex] &&
                    i.config.yaxis[this.yaxisIndex].reversed);
                var L = this.initialPositions();
                (b = L.y),
                  (S = L.barHeight),
                  (h = L.yDivision),
                  (d = L.zeroW),
                  (x = L.x),
                  (C = L.barWidth),
                  (l = L.xDivision),
                  (c = L.zeroH),
                  this.horizontal || v.push(x + C / 2);
                for (
                  var P = a.group({ class: "apexcharts-datalabels" }),
                    z = 0,
                    E = i.globals.dataPoints;
                  z < i.globals.dataPoints;
                  z++, E--
                ) {
                  void 0 === this.series[r][z] || null === t[r][z]
                    ? (this.isNullValue = !0)
                    : (this.isNullValue = !1),
                    i.config.stroke.show &&
                      (A = this.isNullValue
                        ? 0
                        : Array.isArray(this.strokeWidth)
                        ? this.strokeWidth[y]
                        : this.strokeWidth);
                  var M = null;
                  this.isHorizontal
                    ? ((M = this.drawBarPaths({
                        indexes: { i: r, j: z, realIndex: y, bc: o },
                        barHeight: S,
                        strokeWidth: A,
                        pathTo: g,
                        pathFrom: f,
                        zeroW: d,
                        x: x,
                        y: b,
                        yDivision: h,
                        elSeries: k,
                      })),
                      (C = this.series[r][z] / this.invertedYRatio))
                    : ((M = this.drawColumnPaths({
                        indexes: { i: r, j: z, realIndex: y, bc: o },
                        x: x,
                        y: b,
                        xDivision: l,
                        pathTo: g,
                        pathFrom: f,
                        barWidth: C,
                        zeroH: c,
                        strokeWidth: A,
                        elSeries: k,
                      })),
                      (S = this.series[r][z] / this.yRatio[this.yaxisIndex])),
                    (g = M.pathTo),
                    (f = M.pathFrom),
                    (b = M.y),
                    (x = M.x),
                    z > 0 && v.push(x + C / 2),
                    m.push(b);
                  var T = this.getPathFillColor(t, r, z, y);
                  k = this.renderSeries({
                    realIndex: y,
                    pathFill: T,
                    j: z,
                    i: r,
                    pathFrom: f,
                    pathTo: g,
                    strokeWidth: A,
                    elSeries: k,
                    x: x,
                    y: b,
                    series: t,
                    barHeight: S,
                    barWidth: C,
                    elDataLabelsWrap: P,
                    visibleSeries: this.visibleI,
                    type: "bar",
                  });
                }
                (i.globals.seriesXvalues[y] = v),
                  (i.globals.seriesYvalues[y] = m),
                  n.add(k);
              }
              return n;
            },
          },
          {
            key: "getPathFillColor",
            value: function (t, e, i, a) {
              var s = this.w,
                n = new C(this.ctx),
                r = null,
                o = this.barOptions.distributed ? i : e;
              this.barOptions.colors.ranges.length > 0 &&
                this.barOptions.colors.ranges.map(function (a) {
                  t[e][i] >= a.from && t[e][i] <= a.to && (r = a.color);
                });
              return (
                s.config.series[e].data[i] &&
                  s.config.series[e].data[i].fillColor &&
                  (r = s.config.series[e].data[i].fillColor),
                n.fillPath({
                  seriesNumber: this.barOptions.distributed ? o : a,
                  color: r,
                  value: t[e][i],
                })
              );
            },
          },
          {
            key: "renderSeries",
            value: function (t) {
              var e = t.realIndex,
                i = t.pathFill,
                a = t.lineFill,
                s = t.j,
                n = t.i,
                r = t.pathFrom,
                o = t.pathTo,
                l = t.strokeWidth,
                h = t.elSeries,
                c = t.x,
                d = t.y,
                u = t.series,
                f = t.barHeight,
                x = t.barWidth,
                b = t.elDataLabelsWrap,
                m = t.visibleSeries,
                v = t.type,
                y = this.w,
                w = new p(this.ctx);
              a ||
                (a = this.barOptions.distributed
                  ? y.globals.stroke.colors[s]
                  : y.globals.stroke.colors[e]),
                y.config.series[n].data[s] &&
                  y.config.series[n].data[s].strokeColor &&
                  (a = y.config.series[n].data[s].strokeColor),
                this.isNullValue && (i = "none");
              var k =
                  ((s / y.config.chart.animations.animateGradually.delay) *
                    (y.config.chart.animations.speed / y.globals.dataPoints)) /
                  2.4,
                A = w.renderPaths({
                  i: n,
                  j: s,
                  realIndex: e,
                  pathFrom: r,
                  pathTo: o,
                  stroke: a,
                  strokeWidth: l,
                  strokeLineCap: y.config.stroke.lineCap,
                  fill: i,
                  animationDelay: k,
                  initialSpeed: y.config.chart.animations.speed,
                  dataChangeSpeed:
                    y.config.chart.animations.dynamicAnimation.speed,
                  className: "apexcharts-".concat(v, "-area"),
                });
              A.attr(
                "clip-path",
                "url(#gridRectMask".concat(y.globals.cuid, ")")
              ),
                new g(this.ctx).setSelectionFilter(A, e, s),
                h.add(A);
              var S = this.calculateDataLabelsPos({
                x: c,
                y: d,
                i: n,
                j: s,
                series: u,
                realIndex: e,
                barHeight: f,
                barWidth: x,
                renderedPath: A,
                visibleSeries: m,
              });
              return null !== S && b.add(S), h.add(b), h;
            },
          },
          {
            key: "initVariables",
            value: function (t) {
              var e = this.w;
              (this.series = t),
                (this.totalItems = 0),
                (this.seriesLen = 0),
                (this.visibleI = -1),
                (this.visibleItems = 1);
              for (var i = 0; i < t.length; i++)
                if (
                  (t[i].length > 0 &&
                    ((this.seriesLen = this.seriesLen + 1),
                    (this.totalItems += t[i].length)),
                  e.globals.isXNumeric)
                )
                  for (var a = 0; a < t[i].length; a++)
                    e.globals.seriesX[i][a] > e.globals.minX &&
                      e.globals.seriesX[i][a] < e.globals.maxX &&
                      this.visibleItems++;
                else this.visibleItems = e.globals.dataPoints;
              0 === this.seriesLen && (this.seriesLen = 1);
            },
          },
          {
            key: "initialPositions",
            value: function () {
              var t,
                e,
                i,
                a,
                s,
                n,
                r,
                o,
                l = this.w;
              return (
                this.isHorizontal
                  ? ((s =
                      (i = l.globals.gridHeight / l.globals.dataPoints) /
                      this.seriesLen),
                    l.globals.isXNumeric &&
                      (s =
                        (i = l.globals.gridHeight / this.totalItems) /
                        this.seriesLen),
                    (s = (s * parseInt(this.barOptions.barHeight)) / 100),
                    (o =
                      this.baseLineInvertedY +
                      l.globals.padHorizontal +
                      (this.isReversed ? l.globals.gridWidth : 0) -
                      (this.isReversed ? 2 * this.baseLineInvertedY : 0)),
                    (e = (i - s * this.seriesLen) / 2))
                  : ((n =
                      (((a = l.globals.gridWidth / this.visibleItems) /
                        this.seriesLen) *
                        parseInt(this.barOptions.columnWidth)) /
                      100),
                    l.globals.isXNumeric &&
                      (l.globals.minXDiff &&
                        l.globals.minXDiff / this.xRatio > 0 &&
                        (a = l.globals.minXDiff / this.xRatio),
                      (n =
                        ((a / this.seriesLen) *
                          parseInt(this.barOptions.columnWidth)) /
                        100) < 1 && (n = 1)),
                    (r =
                      l.globals.gridHeight -
                      this.baseLineY[this.yaxisIndex] -
                      (this.isReversed ? l.globals.gridHeight : 0) +
                      (this.isReversed
                        ? 2 * this.baseLineY[this.yaxisIndex]
                        : 0)),
                    (t =
                      l.globals.padHorizontal + (a - n * this.seriesLen) / 2)),
                {
                  x: t,
                  y: e,
                  yDivision: i,
                  xDivision: a,
                  barHeight: s,
                  barWidth: n,
                  zeroH: r,
                  zeroW: o,
                }
              );
            },
          },
          {
            key: "drawBarPaths",
            value: function (t) {
              var e = t.indexes,
                i = t.barHeight,
                a = t.strokeWidth,
                s = t.pathTo,
                n = t.pathFrom,
                r = t.zeroW,
                o = t.x,
                l = t.y,
                h = t.yDivision,
                c = t.elSeries,
                d = this.w,
                u = new p(this.ctx),
                g = e.i,
                f = e.j,
                x = e.realIndex,
                b = e.bc;
              d.globals.isXNumeric &&
                (l =
                  (d.globals.seriesX[g][f] - d.globals.minX) /
                    this.invertedXRatio -
                  i);
              var m = l + i * this.visibleI;
              (s = u.move(r, m)),
                (n = u.move(r, m)),
                d.globals.previousPaths.length > 0 &&
                  (n = this.getPathFrom(x, f));
              var v = {
                  barHeight: i,
                  strokeWidth: a,
                  barYPosition: m,
                  x: (o =
                    void 0 === this.series[g][f] || null === this.series[g][f]
                      ? r
                      : r +
                        this.series[g][f] / this.invertedYRatio -
                        2 *
                          (this.isReversed
                            ? this.series[g][f] / this.invertedYRatio
                            : 0)),
                  zeroW: r,
                },
                y = this.barEndingShape(d, v, this.series, g, f);
              if (
                ((s =
                  s +
                  u.line(y.newX, m) +
                  y.path +
                  u.line(r, m + i - a) +
                  u.line(r, m)),
                (n =
                  n +
                  u.line(r, m) +
                  y.ending_p_from +
                  u.line(r, m + i - a) +
                  u.line(r, m + i - a) +
                  u.line(r, m)),
                d.globals.isXNumeric || (l += h),
                this.barOptions.colors.backgroundBarColors.length > 0 &&
                  0 === g)
              ) {
                b >= this.barOptions.colors.backgroundBarColors.length &&
                  (b = 0);
                var w = this.barOptions.colors.backgroundBarColors[b],
                  k = u.drawRect(
                    0,
                    m - i * this.visibleI,
                    d.globals.gridWidth,
                    i * this.seriesLen,
                    0,
                    w,
                    this.barOptions.colors.backgroundBarOpacity
                  );
                c.add(k), k.node.classList.add("apexcharts-backgroundBar");
              }
              return { pathTo: s, pathFrom: n, x: o, y: l, barYPosition: m };
            },
          },
          {
            key: "drawColumnPaths",
            value: function (t) {
              var e = t.indexes,
                i = t.x,
                a = t.y,
                s = t.xDivision,
                n = t.pathTo,
                r = t.pathFrom,
                o = t.barWidth,
                l = t.zeroH,
                h = t.strokeWidth,
                c = t.elSeries,
                d = this.w,
                u = new p(this.ctx),
                g = e.i,
                f = e.j,
                x = e.realIndex,
                b = e.bc;
              if (d.globals.isXNumeric) {
                var m = g;
                d.globals.seriesX[g].length ||
                  (m = d.globals.maxValsInArrayIndex),
                  (i =
                    (d.globals.seriesX[m][f] - d.globals.minX) / this.xRatio -
                    o / 2);
              }
              var v = i + o * this.visibleI;
              (n = u.move(v, l)),
                (r = u.move(v, l)),
                d.globals.previousPaths.length > 0 &&
                  (r = this.getPathFrom(x, f));
              var y = {
                  barWidth: o,
                  strokeWidth: h,
                  barXPosition: v,
                  y: (a =
                    void 0 === this.series[g][f] || null === this.series[g][f]
                      ? l
                      : l -
                        this.series[g][f] / this.yRatio[this.yaxisIndex] +
                        2 *
                          (this.isReversed
                            ? this.series[g][f] / this.yRatio[this.yaxisIndex]
                            : 0)),
                  zeroH: l,
                },
                w = this.barEndingShape(d, y, this.series, g, f);
              if (
                ((n =
                  n +
                  u.line(v, w.newY) +
                  w.path +
                  u.line(v + o - h, l) +
                  u.line(v - h / 2, l)),
                (r =
                  r +
                  u.line(v, l) +
                  w.ending_p_from +
                  u.line(v + o - h, l) +
                  u.line(v + o - h, l) +
                  u.line(v - h / 2, l)),
                d.globals.isXNumeric || (i += s),
                this.barOptions.colors.backgroundBarColors.length > 0 &&
                  0 === g)
              ) {
                b >= this.barOptions.colors.backgroundBarColors.length &&
                  (b = 0);
                var k = this.barOptions.colors.backgroundBarColors[b],
                  A = u.drawRect(
                    v - o * this.visibleI,
                    0,
                    o * this.seriesLen,
                    d.globals.gridHeight,
                    0,
                    k,
                    this.barOptions.colors.backgroundBarOpacity
                  );
                c.add(A), A.node.classList.add("apexcharts-backgroundBar");
              }
              return { pathTo: n, pathFrom: r, x: i, y: a, barXPosition: v };
            },
          },
          {
            key: "getPathFrom",
            value: function (t, e) {
              for (
                var i, a = this.w, s = 0;
                s < a.globals.previousPaths.length;
                s++
              ) {
                var n = a.globals.previousPaths[s];
                n.paths &&
                  n.paths.length > 0 &&
                  parseInt(n.realIndex) === parseInt(t) &&
                  void 0 !== a.globals.previousPaths[s].paths[e] &&
                  (i = a.globals.previousPaths[s].paths[e].d);
              }
              return i;
            },
          },
          {
            key: "calculateDataLabelsPos",
            value: function (t) {
              var e = t.x,
                i = t.y,
                a = t.i,
                s = t.j,
                n = t.realIndex,
                r = t.series,
                o = t.barHeight,
                l = t.barWidth,
                h = t.visibleSeries,
                c = t.renderedPath,
                d = this.w,
                u = new p(this.ctx),
                g = Array.isArray(this.strokeWidth)
                  ? this.strokeWidth[n]
                  : this.strokeWidth,
                f = e + parseFloat(l * h),
                x = i + parseFloat(o * h);
              d.globals.isXNumeric &&
                !d.globals.isBarHorizontal &&
                ((f = e + parseFloat(l * (h + 1))),
                (x = i + parseFloat(o * (h + 1)) - g));
              var b = e,
                m = i,
                v = {},
                y = d.config.dataLabels,
                w = this.barOptions.dataLabels,
                k = y.offsetX,
                A = y.offsetY,
                S = { width: 0, height: 0 };
              return (
                d.config.dataLabels.enabled &&
                  (S = u.getTextRects(
                    d.globals.yLabelFormatters[0](d.globals.maxY),
                    parseFloat(y.style.fontSize)
                  )),
                (v = this.isHorizontal
                  ? this.calculateBarsDataLabelsPosition({
                      x: e,
                      y: i,
                      i: a,
                      j: s,
                      renderedPath: c,
                      bcy: x,
                      barHeight: o,
                      barWidth: l,
                      textRects: S,
                      strokeWidth: g,
                      dataLabelsX: b,
                      dataLabelsY: m,
                      barDataLabelsConfig: w,
                      offX: k,
                      offY: A,
                    })
                  : this.calculateColumnsDataLabelsPosition({
                      x: e,
                      y: i,
                      i: a,
                      j: s,
                      renderedPath: c,
                      realIndex: n,
                      bcx: f,
                      bcy: x,
                      barHeight: o,
                      barWidth: l,
                      textRects: S,
                      strokeWidth: g,
                      dataLabelsY: m,
                      barDataLabelsConfig: w,
                      offX: k,
                      offY: A,
                    })),
                c.attr({
                  cy: v.bcy,
                  cx: v.bcx,
                  j: s,
                  val: r[a][s],
                  barHeight: o,
                  barWidth: l,
                }),
                this.drawCalculatedDataLabels({
                  x: v.dataLabelsX,
                  y: v.dataLabelsY,
                  val: r[a][s],
                  i: n,
                  j: s,
                  barWidth: l,
                  barHeight: o,
                  textRects: S,
                  dataLabelsConfig: y,
                })
              );
            },
          },
          {
            key: "calculateColumnsDataLabelsPosition",
            value: function (t) {
              var e,
                i = this.w,
                a = t.i,
                s = t.j,
                n = t.y,
                r = t.bcx,
                o = t.barWidth,
                l = t.barHeight,
                h = t.textRects,
                c = t.dataLabelsY,
                d = t.barDataLabelsConfig,
                u = t.strokeWidth,
                g = t.offX,
                f = t.offY,
                p =
                  "vertical" ===
                  i.config.plotOptions.bar.dataLabels.orientation;
              r -= u / 2;
              var x = i.globals.gridWidth / i.globals.dataPoints;
              if (
                ((e = i.globals.isXNumeric ? r - o / 2 + g : r - x + o / 2 + g),
                p)
              ) {
                e = e + h.height / 2 - u / 2 - 2;
              }
              var b = this.series[a][s] <= 0;
              switch ((this.isReversed && (n -= l), d.position)) {
                case "center":
                  c = p
                    ? b
                      ? n + l / 2 + f
                      : n + l / 2 - f
                    : b
                    ? n + l / 2 + h.height / 2 + f
                    : n + l / 2 + h.height / 2 - f;
                  break;
                case "bottom":
                  c = p
                    ? b
                      ? n + l + f
                      : n + l - f
                    : b
                    ? n + l + h.height + u + f
                    : n + l - h.height / 2 + u - f;
                  break;
                case "top":
                  c = p
                    ? b
                      ? n + f
                      : n - f
                    : b
                    ? n - h.height / 2 - f
                    : n + h.height + f;
              }
              return (
                i.config.chart.stacked ||
                  (c < 0
                    ? (c = 0 + u)
                    : c + h.height / 3 > i.globals.gridHeight &&
                      (c = i.globals.gridHeight - u)),
                { bcx: r, bcy: n, dataLabelsX: e, dataLabelsY: c }
              );
            },
          },
          {
            key: "calculateBarsDataLabelsPosition",
            value: function (t) {
              var e = this.w,
                i = t.x,
                a = t.i,
                s = t.j,
                n = t.bcy,
                r = t.barHeight,
                o = t.barWidth,
                l = t.textRects,
                h = t.dataLabelsX,
                c = t.strokeWidth,
                d = t.barDataLabelsConfig,
                u = t.offX,
                g = t.offY,
                f =
                  n -
                  e.globals.gridHeight / e.globals.dataPoints +
                  r / 2 +
                  l.height / 2 +
                  g -
                  3,
                p = this.series[a][s] <= 0;
              switch ((this.isReversed && (i += o), d.position)) {
                case "center":
                  h = p ? i - o / 2 - u : i - o / 2 + u;
                  break;
                case "bottom":
                  h = p
                    ? i - o - c - Math.round(l.width / 2) - u
                    : i - o + c + Math.round(l.width / 2) + u;
                  break;
                case "top":
                  h = p
                    ? i - c + Math.round(l.width / 2) - u
                    : i - c - Math.round(l.width / 2) + u;
              }
              return (
                e.config.chart.stacked ||
                  (h < 0
                    ? (h = h + l.width + c)
                    : h + l.width / 2 > e.globals.gridWidth &&
                      (h = e.globals.gridWidth - l.width - c)),
                { bcx: i, bcy: n, dataLabelsX: h, dataLabelsY: f }
              );
            },
          },
          {
            key: "drawCalculatedDataLabels",
            value: function (t) {
              var e = t.x,
                i = t.y,
                a = t.val,
                s = t.i,
                n = t.j,
                o = t.textRects,
                l = t.barHeight,
                h = t.barWidth,
                c = t.dataLabelsConfig,
                d = this.w,
                u = "rotate(0)";
              "vertical" === d.config.plotOptions.bar.dataLabels.orientation &&
                (u = "rotate(-90, ".concat(e, ", ").concat(i, ")"));
              var g = new z(this.ctx),
                f = new p(this.ctx),
                x = c.formatter,
                b = null,
                m = d.globals.collapsedSeriesIndices.indexOf(s) > -1;
              if (c.enabled && !m) {
                b = f.group({ class: "apexcharts-data-labels", transform: u });
                var v = "";
                void 0 !== a &&
                  (v = x(a, { seriesIndex: s, dataPointIndex: n, w: d })),
                  0 === a && d.config.chart.stacked && (v = "");
                var y = this.series[s][n] <= 0,
                  w = d.config.plotOptions.bar.dataLabels.position;
                "vertical" ===
                  d.config.plotOptions.bar.dataLabels.orientation &&
                  ("top" == w && (c.textAnchor = y ? "end" : "start"),
                  "center" == w && (c.textAnchor = "middle"),
                  "bottom" == w && (c.textAnchor = y ? "end" : "start")),
                  d.config.chart.stacked &&
                    this.barOptions.dataLabels.hideOverflowingLabels &&
                    (this.isHorizontal
                      ? (((h =
                          this.series[s][n] / this.yRatio[this.yaxisIndex]) >
                          0 &&
                          o.width / 1.6 > h) ||
                          (h < 0 && o.width / 1.6 < h)) &&
                        (v = "")
                      : ((l = this.series[s][n] / this.yRatio[this.yaxisIndex]),
                        o.height / 1.6 > l && (v = "")));
                var k = r({}, c);
                this.isHorizontal &&
                  a < 0 &&
                  ("start" === c.textAnchor
                    ? (k.textAnchor = "end")
                    : "end" === c.textAnchor && (k.textAnchor = "start")),
                  g.plotDataLabelsText({
                    x: e,
                    y: i,
                    text: v,
                    i: this.barOptions.distributed ? n : s,
                    j: n,
                    parent: b,
                    dataLabelsConfig: k,
                    alwaysDrawDataLabel: !0,
                    offsetCorrection: !0,
                  });
              }
              return b;
            },
          },
          {
            key: "barEndingShape",
            value: function (t, e, i, a, s) {
              var n = new p(this.ctx);
              if (this.isHorizontal) {
                var r = null,
                  o = e.x;
                if (void 0 !== i[a][s] || null !== i[a][s]) {
                  var l = i[a][s] < 0,
                    h = e.barHeight / 2 - e.strokeWidth;
                  switch (
                    (l && (h = -e.barHeight / 2 - e.strokeWidth),
                    t.config.chart.stacked ||
                      ("rounded" === this.barOptions.endingShape &&
                        (o = e.x - h / 2)),
                    this.barOptions.endingShape)
                  ) {
                    case "flat":
                      r = n.line(
                        o,
                        e.barYPosition + e.barHeight - e.strokeWidth
                      );
                      break;
                    case "rounded":
                      r = n.quadraticCurve(
                        o + h,
                        e.barYPosition + (e.barHeight - e.strokeWidth) / 2,
                        o,
                        e.barYPosition + e.barHeight - e.strokeWidth
                      );
                  }
                }
                return { path: r, ending_p_from: "", newX: o };
              }
              var c = null,
                d = e.y;
              if (void 0 !== i[a][s] || null !== i[a][s]) {
                var u = i[a][s] < 0,
                  g = e.barWidth / 2 - e.strokeWidth;
                switch (
                  (u && (g = -e.barWidth / 2 - e.strokeWidth),
                  t.config.chart.stacked ||
                    ("rounded" === this.barOptions.endingShape && (d += g / 2)),
                  this.barOptions.endingShape)
                ) {
                  case "flat":
                    c = n.line(e.barXPosition + e.barWidth - e.strokeWidth, d);
                    break;
                  case "rounded":
                    c = n.quadraticCurve(
                      e.barXPosition + (e.barWidth - e.strokeWidth) / 2,
                      d - g,
                      e.barXPosition + e.barWidth - e.strokeWidth,
                      d
                    );
                }
              }
              return { path: c, ending_p_from: "", newY: d };
            },
          },
        ]),
        t
      );
    })(),
    M = (function (t) {
      function i() {
        return e(this, i), c(this, l(i).apply(this, arguments));
      }
      return (
        o(i, E),
        a(i, [
          {
            key: "draw",
            value: function (t, e) {
              var i = this.w;
              (this.graphics = new p(this.ctx)),
                (this.fill = new C(this.ctx)),
                (this.bar = new E(this.ctx, this.xyRatios));
              var a = new w(this.ctx, i);
              (t = a.getLogSeries(t)),
                (this.yRatio = a.getLogYRatios(this.yRatio)),
                this.initVariables(t),
                "100%" === i.config.chart.stackType &&
                  (t = i.globals.seriesPercent.slice()),
                (this.series = t),
                (this.totalItems = 0),
                (this.prevY = []),
                (this.prevX = []),
                (this.prevYF = []),
                (this.prevXF = []),
                (this.prevYVal = []),
                (this.prevXVal = []),
                (this.xArrj = []),
                (this.xArrjF = []),
                (this.xArrjVal = []),
                (this.yArrj = []),
                (this.yArrjF = []),
                (this.yArrjVal = []);
              for (var s = 0; s < t.length; s++)
                t[s].length > 0 && (this.totalItems += t[s].length);
              for (
                var n = this.graphics.group({
                    class: "apexcharts-bar-series apexcharts-plot-series",
                  }),
                  r = 0,
                  o = 0,
                  l = 0,
                  h = 0;
                l < t.length;
                l++, h++
              ) {
                var c = void 0,
                  d = void 0,
                  g = void 0,
                  f = void 0,
                  x = void 0,
                  b = void 0,
                  m = [],
                  v = [],
                  y = i.globals.comboCharts ? e[l] : l;
                this.yRatio.length > 1 && (this.yaxisIndex = y),
                  (this.isReversed =
                    i.config.yaxis[this.yaxisIndex] &&
                    i.config.yaxis[this.yaxisIndex].reversed);
                var k = this.graphics.group({
                    class: "apexcharts-series",
                    seriesName: u.escapeString(i.globals.seriesNames[y]),
                    rel: l + 1,
                    "data:realIndex": y,
                  }),
                  A = this.graphics.group({ class: "apexcharts-datalabels" }),
                  S = 0,
                  L = 0,
                  P = 0,
                  z = this.initialPositions(r, o, g, f, x, b);
                (o = z.y),
                  (L = z.barHeight),
                  (f = z.yDivision),
                  (b = z.zeroW),
                  (r = z.x),
                  (P = z.barWidth),
                  (g = z.xDivision),
                  (x = z.zeroH),
                  (this.yArrj = []),
                  (this.yArrjF = []),
                  (this.yArrjVal = []),
                  (this.xArrj = []),
                  (this.xArrjF = []),
                  (this.xArrjVal = []);
                for (var M = 0; M < i.globals.dataPoints; M++) {
                  i.config.stroke.show &&
                    (S = this.isNullValue
                      ? 0
                      : Array.isArray(this.strokeWidth)
                      ? this.strokeWidth[y]
                      : this.strokeWidth);
                  var T = null;
                  this.isHorizontal
                    ? ((T = this.drawBarPaths({
                        indexes: { i: l, j: M, realIndex: y, bc: h },
                        barHeight: L,
                        strokeWidth: S,
                        pathTo: c,
                        pathFrom: d,
                        zeroW: b,
                        x: r,
                        y: o,
                        yDivision: f,
                        elSeries: k,
                      })),
                      (P = this.series[l][M] / this.invertedYRatio))
                    : ((T = this.drawColumnPaths({
                        indexes: { i: l, j: M, realIndex: y, bc: h },
                        x: r,
                        y: o,
                        xDivision: g,
                        pathTo: c,
                        pathFrom: d,
                        barWidth: P,
                        zeroH: x,
                        strokeWidth: S,
                        elSeries: k,
                      })),
                      (L = this.series[l][M] / this.yRatio[this.yaxisIndex])),
                    (c = T.pathTo),
                    (d = T.pathFrom),
                    (o = T.y),
                    (r = T.x),
                    m.push(r),
                    v.push(o);
                  var I = this.bar.getPathFillColor(t, l, M, y);
                  k = this.renderSeries({
                    realIndex: y,
                    pathFill: I,
                    j: M,
                    i: l,
                    pathFrom: d,
                    pathTo: c,
                    strokeWidth: S,
                    elSeries: k,
                    x: r,
                    y: o,
                    series: t,
                    barHeight: L,
                    barWidth: P,
                    elDataLabelsWrap: A,
                    type: "bar",
                    visibleSeries: 0,
                  });
                }
                (i.globals.seriesXvalues[y] = m),
                  (i.globals.seriesYvalues[y] = v),
                  this.prevY.push(this.yArrj),
                  this.prevYF.push(this.yArrjF),
                  this.prevYVal.push(this.yArrjVal),
                  this.prevX.push(this.xArrj),
                  this.prevXF.push(this.xArrjF),
                  this.prevXVal.push(this.xArrjVal),
                  n.add(k);
              }
              return n;
            },
          },
          {
            key: "initialPositions",
            value: function (t, e, i, a, s, n) {
              var r,
                o,
                l = this.w;
              return (
                this.isHorizontal
                  ? ((r =
                      ((r = a = l.globals.gridHeight / l.globals.dataPoints) *
                        parseInt(l.config.plotOptions.bar.barHeight)) /
                      100),
                    (n =
                      this.baseLineInvertedY +
                      l.globals.padHorizontal +
                      (this.isReversed ? l.globals.gridWidth : 0) -
                      (this.isReversed ? 2 * this.baseLineInvertedY : 0)),
                    (e = (a - r) / 2))
                  : ((o = i = l.globals.gridWidth / l.globals.dataPoints),
                    (o = l.globals.isXNumeric
                      ? ((i = l.globals.minXDiff / this.xRatio) *
                          parseInt(this.barOptions.columnWidth)) /
                        100
                      : (o * parseInt(l.config.plotOptions.bar.columnWidth)) /
                        100),
                    (s =
                      this.baseLineY[this.yaxisIndex] +
                      (this.isReversed ? l.globals.gridHeight : 0) -
                      (this.isReversed
                        ? 2 * this.baseLineY[this.yaxisIndex]
                        : 0)),
                    (t = l.globals.padHorizontal + (i - o) / 2)),
                {
                  x: t,
                  y: e,
                  yDivision: a,
                  xDivision: i,
                  barHeight: r,
                  barWidth: o,
                  zeroH: s,
                  zeroW: n,
                }
              );
            },
          },
          {
            key: "drawBarPaths",
            value: function (t) {
              for (
                var e,
                  i = t.indexes,
                  a = t.barHeight,
                  s = t.strokeWidth,
                  n = t.pathTo,
                  r = t.pathFrom,
                  o = t.zeroW,
                  l = t.x,
                  h = t.y,
                  c = t.yDivision,
                  d = t.elSeries,
                  u = this.w,
                  g = h,
                  f = i.i,
                  p = i.j,
                  x = i.realIndex,
                  b = i.bc,
                  m = 0,
                  v = 0;
                v < this.prevXF.length;
                v++
              )
                m += this.prevXF[v][p];
              if (f > 0) {
                var y = o;
                this.prevXVal[f - 1][p] < 0
                  ? (y =
                      this.series[f][p] >= 0
                        ? this.prevX[f - 1][p] +
                          m -
                          2 * (this.isReversed ? m : 0)
                        : this.prevX[f - 1][p])
                  : this.prevXVal[f - 1][p] >= 0 &&
                    (y =
                      this.series[f][p] >= 0
                        ? this.prevX[f - 1][p]
                        : this.prevX[f - 1][p] -
                          m +
                          2 * (this.isReversed ? m : 0)),
                  (e = y);
              } else e = o;
              l =
                null === this.series[f][p]
                  ? e
                  : e +
                    this.series[f][p] / this.invertedYRatio -
                    2 *
                      (this.isReversed
                        ? this.series[f][p] / this.invertedYRatio
                        : 0);
              var w = {
                  barHeight: a,
                  strokeWidth: s,
                  invertedYRatio: this.invertedYRatio,
                  barYPosition: g,
                  x: l,
                },
                k = this.bar.barEndingShape(u, w, this.series, f, p);
              if (
                (this.series.length > 1 &&
                  f !== this.endingShapeOnSeriesNumber &&
                  (k.path = this.graphics.line(k.newX, g + a - s)),
                this.xArrj.push(k.newX),
                this.xArrjF.push(Math.abs(e - k.newX)),
                this.xArrjVal.push(this.series[f][p]),
                (n = this.graphics.move(e, g)),
                (r = this.graphics.move(e, g)),
                u.globals.previousPaths.length > 0 &&
                  (r = this.bar.getPathFrom(x, p, !1)),
                (n =
                  n +
                  this.graphics.line(k.newX, g) +
                  k.path +
                  this.graphics.line(e, g + a - s) +
                  this.graphics.line(e, g)),
                (r =
                  r +
                  this.graphics.line(e, g) +
                  this.graphics.line(e, g + a - s) +
                  this.graphics.line(e, g + a - s) +
                  this.graphics.line(e, g + a - s) +
                  this.graphics.line(e, g)),
                u.config.plotOptions.bar.colors.backgroundBarColors.length >
                  0 && 0 === f)
              ) {
                b >=
                  u.config.plotOptions.bar.colors.backgroundBarColors.length &&
                  (b = 0);
                var A = u.config.plotOptions.bar.colors.backgroundBarColors[b],
                  S = this.graphics.drawRect(
                    0,
                    g,
                    u.globals.gridWidth,
                    a,
                    0,
                    A,
                    u.config.plotOptions.bar.colors.backgroundBarOpacity
                  );
                d.add(S), S.node.classList.add("apexcharts-backgroundBar");
              }
              return { pathTo: n, pathFrom: r, x: l, y: (h += c) };
            },
          },
          {
            key: "drawColumnPaths",
            value: function (t) {
              var e = t.indexes,
                i = t.x,
                a = t.y,
                s = t.xDivision,
                n = t.pathTo,
                r = t.pathFrom,
                o = t.barWidth,
                l = t.zeroH,
                h = t.strokeWidth,
                c = t.elSeries,
                d = this.w,
                u = e.i,
                g = e.j,
                f = e.realIndex,
                p = e.bc;
              if (d.globals.isXNumeric) {
                var x = d.globals.seriesX[u][g];
                x || (x = 0), (i = (x - d.globals.minX) / this.xRatio - o / 2);
              }
              for (var b, m = i, v = 0, y = 0; y < this.prevYF.length; y++)
                v += this.prevYF[y][g];
              if (
                (u > 0 && !d.globals.isXNumeric) ||
                (u > 0 &&
                  d.globals.isXNumeric &&
                  d.globals.seriesX[u - 1][g] === d.globals.seriesX[u][g])
              ) {
                var w = this.prevY[u - 1][g];
                b =
                  this.prevYVal[u - 1][g] < 0
                    ? this.series[u][g] >= 0
                      ? w - v + 2 * (this.isReversed ? v : 0)
                      : w
                    : this.series[u][g] >= 0
                    ? w
                    : w + v - 2 * (this.isReversed ? v : 0);
              } else b = d.globals.gridHeight - l;
              a =
                b -
                this.series[u][g] / this.yRatio[this.yaxisIndex] +
                2 *
                  (this.isReversed
                    ? this.series[u][g] / this.yRatio[this.yaxisIndex]
                    : 0);
              var k = {
                  barWidth: o,
                  strokeWidth: h,
                  yRatio: this.yRatio[this.yaxisIndex],
                  barXPosition: m,
                  y: a,
                },
                A = this.bar.barEndingShape(d, k, this.series, u, g);
              if (
                (this.yArrj.push(A.newY),
                this.yArrjF.push(Math.abs(b - A.newY)),
                this.yArrjVal.push(this.series[u][g]),
                (n = this.graphics.move(m, b)),
                (r = this.graphics.move(m, b)),
                d.globals.previousPaths.length > 0 &&
                  (r = this.bar.getPathFrom(f, g, !1)),
                (n =
                  n +
                  this.graphics.line(m, A.newY) +
                  A.path +
                  this.graphics.line(m + o - h, b) +
                  this.graphics.line(m - h / 2, b)),
                (r =
                  r +
                  this.graphics.line(m, b) +
                  this.graphics.line(m + o - h, b) +
                  this.graphics.line(m + o - h, b) +
                  this.graphics.line(m + o - h, b) +
                  this.graphics.line(m - h / 2, b)),
                d.config.plotOptions.bar.colors.backgroundBarColors.length >
                  0 && 0 === u)
              ) {
                p >=
                  d.config.plotOptions.bar.colors.backgroundBarColors.length &&
                  (p = 0);
                var S = d.config.plotOptions.bar.colors.backgroundBarColors[p],
                  C = this.graphics.drawRect(
                    m,
                    0,
                    o,
                    d.globals.gridHeight,
                    0,
                    S,
                    d.config.plotOptions.bar.colors.backgroundBarOpacity
                  );
                c.add(C), C.node.classList.add("apexcharts-backgroundBar");
              }
              return (
                (i += s),
                {
                  pathTo: n,
                  pathFrom: r,
                  x: d.globals.isXNumeric ? i - s : i,
                  y: a,
                }
              );
            },
          },
          {
            key: "checkZeroSeries",
            value: function (t) {
              for (var e = t.series, i = this.w, a = 0; a < e.length; a++) {
                for (
                  var s = 0, n = 0;
                  n < e[i.globals.maxValsInArrayIndex].length;
                  n++
                )
                  s += e[a][n];
                0 === s && this.zeroSerieses.push(a);
              }
              for (var r = e.length - 1; r >= 0; r--)
                this.zeroSerieses.indexOf(r) > -1 &&
                  r === this.endingShapeOnSeriesNumber &&
                  (this.endingShapeOnSeriesNumber -= 1);
            },
          },
        ]),
        i
      );
    })(),
    T = (function (t) {
      function i() {
        return e(this, i), c(this, l(i).apply(this, arguments));
      }
      return (
        o(i, E),
        a(i, [
          {
            key: "draw",
            value: function (t, e) {
              var i = this.w,
                a = new p(this.ctx),
                s = new C(this.ctx);
              this.candlestickOptions = this.w.config.plotOptions.candlestick;
              var n = new w(this.ctx, i);
              (t = n.getLogSeries(t)),
                (this.series = t),
                (this.yRatio = n.getLogYRatios(this.yRatio)),
                this.initVariables(t);
              for (
                var r = a.group({
                    class:
                      "apexcharts-candlestick-series apexcharts-plot-series",
                  }),
                  o = 0,
                  l = 0;
                o < t.length;
                o++, l++
              ) {
                var h,
                  c,
                  d = void 0,
                  g = void 0,
                  f = void 0,
                  x = void 0,
                  b = [],
                  m = [],
                  v = i.globals.comboCharts ? e[o] : o,
                  y = a.group({
                    class: "apexcharts-series",
                    seriesName: u.escapeString(i.globals.seriesNames[v]),
                    rel: o + 1,
                    "data:realIndex": v,
                  });
                t[o].length > 0 && (this.visibleI = this.visibleI + 1);
                var k,
                  A,
                  S = 0;
                this.yRatio.length > 1 && (this.yaxisIndex = v);
                var L = this.initialPositions();
                (x = L.y),
                  (k = L.barHeight),
                  (f = L.x),
                  (A = L.barWidth),
                  (h = L.xDivision),
                  (c = L.zeroH),
                  m.push(f + A / 2);
                for (
                  var P = a.group({ class: "apexcharts-datalabels" }),
                    z = 0,
                    E = i.globals.dataPoints;
                  z < i.globals.dataPoints;
                  z++, E--
                ) {
                  void 0 === this.series[o][z] || null === t[o][z]
                    ? (this.isNullValue = !0)
                    : (this.isNullValue = !1),
                    i.config.stroke.show &&
                      (S = this.isNullValue
                        ? 0
                        : Array.isArray(this.strokeWidth)
                        ? this.strokeWidth[v]
                        : this.strokeWidth);
                  var M,
                    T = this.drawCandleStickPaths({
                      indexes: { i: o, j: z, realIndex: v, bc: l },
                      x: f,
                      y: x,
                      xDivision: h,
                      pathTo: d,
                      pathFrom: g,
                      barWidth: A,
                      zeroH: c,
                      strokeWidth: S,
                      elSeries: y,
                    });
                  (d = T.pathTo),
                    (g = T.pathFrom),
                    (x = T.y),
                    (f = T.x),
                    (M = T.color),
                    z > 0 && m.push(f + A / 2),
                    b.push(x);
                  var I = s.fillPath({
                      seriesNumber: v,
                      color: M,
                      value: t[o][z],
                    }),
                    X = this.candlestickOptions.wick.useFillColor ? M : void 0;
                  y = this.renderSeries({
                    realIndex: v,
                    pathFill: I,
                    lineFill: X,
                    j: z,
                    i: o,
                    pathFrom: g,
                    pathTo: d,
                    strokeWidth: S,
                    elSeries: y,
                    x: f,
                    y: x,
                    series: t,
                    barHeight: k,
                    barWidth: A,
                    elDataLabelsWrap: P,
                    visibleSeries: this.visibleI,
                    type: "candlestick",
                  });
                }
                (i.globals.seriesXvalues[v] = m),
                  (i.globals.seriesYvalues[v] = b),
                  r.add(y);
              }
              return r;
            },
          },
          {
            key: "drawCandleStickPaths",
            value: function (t) {
              var e = t.indexes,
                i = t.x,
                a = (t.y, t.xDivision),
                s = t.pathTo,
                n = t.pathFrom,
                r = t.barWidth,
                o = t.zeroH,
                l = t.strokeWidth,
                h = this.w,
                c = new p(this.ctx),
                d = e.i,
                u = e.j,
                g = !0,
                f = h.config.plotOptions.candlestick.colors.upward,
                x = h.config.plotOptions.candlestick.colors.downward,
                b = this.yRatio[this.yaxisIndex],
                m = e.realIndex,
                v = this.getOHLCValue(m, u),
                y = o,
                w = o;
              v.o > v.c && (g = !1);
              var k = Math.min(v.o, v.c),
                A = Math.max(v.o, v.c);
              h.globals.isXNumeric &&
                (i =
                  (h.globals.seriesX[m][u] - h.globals.minX) / this.xRatio -
                  r / 2);
              var S = i + r * this.visibleI;
              return (
                void 0 === this.series[d][u] || null === this.series[d][u]
                  ? (k = o)
                  : ((k = o - k / b),
                    (A = o - A / b),
                    (y = o - v.h / b),
                    (w = o - v.l / b)),
                c.move(S, o),
                (n = c.move(S, k)),
                h.globals.previousPaths.length > 0 &&
                  (n = this.getPathFrom(m, u, !0)),
                (s =
                  c.move(S, A) +
                  c.line(S + r / 2, A) +
                  c.line(S + r / 2, y) +
                  c.line(S + r / 2, A) +
                  c.line(S + r, A) +
                  c.line(S + r, k) +
                  c.line(S + r / 2, k) +
                  c.line(S + r / 2, w) +
                  c.line(S + r / 2, k) +
                  c.line(S, k) +
                  c.line(S, A - l / 2)),
                (n += c.move(S, k)),
                h.globals.isXNumeric || (i += a),
                {
                  pathTo: s,
                  pathFrom: n,
                  x: i,
                  y: A,
                  barXPosition: S,
                  color: g ? f : x,
                }
              );
            },
          },
          {
            key: "getOHLCValue",
            value: function (t, e) {
              var i = this.w;
              return {
                o: i.globals.seriesCandleO[t][e],
                h: i.globals.seriesCandleH[t][e],
                l: i.globals.seriesCandleL[t][e],
                c: i.globals.seriesCandleC[t][e],
              };
            },
          },
        ]),
        i
      );
    })(),
    I = (function () {
      function t(i) {
        e(this, t), (this.ctx = i), (this.w = i.w);
      }
      return (
        a(t, [
          {
            key: "drawXCrosshairs",
            value: function () {
              var t = this.w,
                e = new p(this.ctx),
                i = new g(this.ctx),
                a = t.config.xaxis.crosshairs.fill.gradient,
                s = t.config.xaxis.crosshairs.dropShadow,
                n = t.config.xaxis.crosshairs.fill.type,
                r = a.colorFrom,
                o = a.colorTo,
                l = a.opacityFrom,
                h = a.opacityTo,
                c = a.stops,
                d = s.enabled,
                f = s.left,
                x = s.top,
                b = s.blur,
                m = s.color,
                v = s.opacity,
                y = t.config.xaxis.crosshairs.fill.color;
              if (t.config.xaxis.crosshairs.show) {
                "gradient" === n &&
                  (y = e.drawGradient("vertical", r, o, l, h, null, c, null));
                var w = e.drawRect();
                1 === t.config.xaxis.crosshairs.width && (w = e.drawLine()),
                  w.attr({
                    class: "apexcharts-xcrosshairs",
                    x: 0,
                    y: 0,
                    y2: t.globals.gridHeight,
                    width: u.isNumber(t.config.xaxis.crosshairs.width)
                      ? t.config.xaxis.crosshairs.width
                      : 0,
                    height: t.globals.gridHeight,
                    fill: y,
                    filter: "none",
                    "fill-opacity": t.config.xaxis.crosshairs.opacity,
                    stroke: t.config.xaxis.crosshairs.stroke.color,
                    "stroke-width": t.config.xaxis.crosshairs.stroke.width,
                    "stroke-dasharray":
                      t.config.xaxis.crosshairs.stroke.dashArray,
                  }),
                  d &&
                    (w = i.dropShadow(w, {
                      left: f,
                      top: x,
                      blur: b,
                      color: m,
                      opacity: v,
                    })),
                  t.globals.dom.elGraphical.add(w);
              }
            },
          },
          {
            key: "drawYCrosshairs",
            value: function () {
              var t = this.w,
                e = new p(this.ctx),
                i = t.config.yaxis[0].crosshairs;
              if (t.config.yaxis[0].crosshairs.show) {
                var a = e.drawLine(
                  0,
                  0,
                  t.globals.gridWidth,
                  0,
                  i.stroke.color,
                  i.stroke.dashArray,
                  i.stroke.width
                );
                a.attr({ class: "apexcharts-ycrosshairs" }),
                  t.globals.dom.elGraphical.add(a);
              }
              var s = e.drawLine(
                0,
                0,
                t.globals.gridWidth,
                0,
                i.stroke.color,
                0,
                0
              );
              s.attr({ class: "apexcharts-ycrosshairs-hidden" }),
                t.globals.dom.elGraphical.add(s);
            },
          },
        ]),
        t
      );
    })(),
    X = (function () {
      function t(i, a) {
        e(this, t),
          (this.ctx = i),
          (this.w = i.w),
          (this.xRatio = a.xRatio),
          (this.yRatio = a.yRatio),
          (this.negRange = !1),
          (this.dynamicAnim = this.w.config.chart.animations.dynamicAnimation),
          (this.rectRadius = this.w.config.plotOptions.heatmap.radius),
          (this.strokeWidth = this.w.config.stroke.width);
      }
      return (
        a(t, [
          {
            key: "draw",
            value: function (t) {
              var e = this.w,
                i = new p(this.ctx),
                a = i.group({ class: "apexcharts-heatmap" });
              a.attr(
                "clip-path",
                "url(#gridRectMask".concat(e.globals.cuid, ")")
              );
              var s = e.globals.gridWidth / e.globals.dataPoints,
                n = e.globals.gridHeight / e.globals.series.length,
                r = 0,
                o = !1;
              this.checkColorRange();
              var l = t.slice();
              e.config.yaxis[0].reversed && ((o = !0), l.reverse());
              for (
                var h = o ? 0 : l.length - 1;
                o ? h < l.length : h >= 0;
                o ? h++ : h--
              ) {
                var c = i.group({
                  class: "apexcharts-series apexcharts-heatmap-series",
                  seriesName: u.escapeString(e.globals.seriesNames[h]),
                  rel: h + 1,
                  "data:realIndex": h,
                });
                if (e.config.chart.dropShadow.enabled) {
                  var d = e.config.chart.dropShadow;
                  new g(this.ctx).dropShadow(c, d, h);
                }
                for (var f = 0, x = 0; x < l[h].length; x++) {
                  var b = 1,
                    m = this.determineHeatColor(h, x);
                  if (e.globals.hasNegs || this.negRange) {
                    var v = e.config.plotOptions.heatmap.shadeIntensity;
                    b = e.config.plotOptions.heatmap.reverseNegativeShade
                      ? m.percent < 0
                        ? (m.percent / 100) * (1.25 * v)
                        : (1 - m.percent / 100) * (1.25 * v)
                      : m.percent < 0
                      ? 1 - (1 + m.percent / 100) * v
                      : (1 - m.percent / 100) * v;
                  } else b = 1 - m.percent / 100;
                  var y = m.color;
                  if (e.config.plotOptions.heatmap.enableShades) {
                    var w = new u();
                    y = u.hexToRgba(
                      w.shadeColor(b, m.color),
                      e.config.fill.opacity
                    );
                  }
                  var k = this.rectRadius,
                    A = i.drawRect(f, r, s, n, k);
                  if (
                    (A.attr({ cx: f, cy: r }),
                    A.node.classList.add("apexcharts-heatmap-rect"),
                    c.add(A),
                    A.attr({
                      fill: y,
                      i: h,
                      index: h,
                      j: x,
                      val: l[h][x],
                      "stroke-width": this.strokeWidth,
                      stroke: e.globals.stroke.colors[0],
                      color: y,
                    }),
                    A.node.addEventListener(
                      "mouseenter",
                      i.pathMouseEnter.bind(this, A)
                    ),
                    A.node.addEventListener(
                      "mouseleave",
                      i.pathMouseLeave.bind(this, A)
                    ),
                    A.node.addEventListener(
                      "mousedown",
                      i.pathMouseDown.bind(this, A)
                    ),
                    e.config.chart.animations.enabled && !e.globals.dataChanged)
                  ) {
                    var S = 1;
                    e.globals.resized || (S = e.config.chart.animations.speed),
                      this.animateHeatMap(A, f, r, s, n, S);
                  }
                  if (e.globals.dataChanged) {
                    var C = 1;
                    if (this.dynamicAnim.enabled && e.globals.shouldAnimate) {
                      C = this.dynamicAnim.speed;
                      var L =
                        e.globals.previousPaths[h] &&
                        e.globals.previousPaths[h][x] &&
                        e.globals.previousPaths[h][x].color;
                      L || (L = "rgba(255, 255, 255, 0)"),
                        this.animateHeatColor(
                          A,
                          u.isColorHex(L) ? L : u.rgb2hex(L),
                          u.isColorHex(y) ? y : u.rgb2hex(y),
                          C
                        );
                    }
                  }
                  var P = this.calculateHeatmapDataLabels({
                    x: f,
                    y: r,
                    i: h,
                    j: x,
                    series: l,
                    rectHeight: n,
                    rectWidth: s,
                  });
                  null !== P && c.add(P), (f += s);
                }
                (r += n), a.add(c);
              }
              var z = e.globals.yAxisScale[0].result.slice();
              e.config.yaxis[0].reversed ? z.unshift("") : z.push(""),
                (e.globals.yAxisScale[0].result = z);
              var E = e.globals.gridHeight / e.globals.series.length;
              return (e.config.yaxis[0].labels.offsetY = -E / 2), a;
            },
          },
          {
            key: "checkColorRange",
            value: function () {
              var t = this,
                e = this.w.config.plotOptions.heatmap;
              e.colorScale.ranges.length > 0 &&
                e.colorScale.ranges.map(function (e, i) {
                  e.from < 0 && (t.negRange = !0);
                });
            },
          },
          {
            key: "determineHeatColor",
            value: function (t, e) {
              var i = this.w,
                a = i.globals.series[t][e],
                s = i.config.plotOptions.heatmap,
                n = s.colorScale.inverse ? e : t,
                r = i.globals.colors[n],
                o = Math.min.apply(Math, d(i.globals.series[t])),
                l = Math.max.apply(Math, d(i.globals.series[t]));
              s.distributed || ((o = i.globals.minY), (l = i.globals.maxY)),
                void 0 !== s.colorScale.min &&
                  ((o =
                    s.colorScale.min < i.globals.minY
                      ? s.colorScale.min
                      : i.globals.minY),
                  (l =
                    s.colorScale.max > i.globals.maxY
                      ? s.colorScale.max
                      : i.globals.maxY));
              var h = Math.abs(l) + Math.abs(o),
                c = (100 * a) / (0 === h ? h - 1e-6 : h);
              s.colorScale.ranges.length > 0 &&
                s.colorScale.ranges.map(function (t, e) {
                  if (a >= t.from && a <= t.to) {
                    (r = t.color), (o = t.from), (l = t.to);
                    var i = Math.abs(l) + Math.abs(o);
                    c = (100 * a) / (0 === i ? i - 1e-6 : i);
                  }
                });
              return { color: r, percent: c };
            },
          },
          {
            key: "calculateHeatmapDataLabels",
            value: function (t) {
              var e = t.x,
                i = t.y,
                a = t.i,
                s = t.j,
                n = (t.series, t.rectHeight),
                r = t.rectWidth,
                o = this.w,
                l = o.config.dataLabels,
                h = new p(this.ctx),
                c = new z(this.ctx),
                d = l.formatter,
                u = null;
              if (l.enabled) {
                u = h.group({ class: "apexcharts-data-labels" });
                var g = l.offsetX,
                  f = l.offsetY,
                  x = e + r / 2 + g,
                  b = i + n / 2 + parseFloat(l.style.fontSize) / 3 + f,
                  m = d(o.globals.series[a][s], {
                    seriesIndex: a,
                    dataPointIndex: s,
                    w: o,
                  });
                c.plotDataLabelsText({
                  x: x,
                  y: b,
                  text: m,
                  i: a,
                  j: s,
                  parent: u,
                  dataLabelsConfig: l,
                });
              }
              return u;
            },
          },
          {
            key: "animateHeatMap",
            value: function (t, e, i, a, s, n) {
              var r = new f(this.ctx);
              r.animateRect(
                t,
                { x: e + a / 2, y: i + s / 2, width: 0, height: 0 },
                { x: e, y: i, width: a, height: s },
                n,
                function () {
                  r.animationCompleted(t);
                }
              );
            },
          },
          {
            key: "animateHeatColor",
            value: function (t, e, i, a) {
              t.attr({ fill: e }).animate(a).attr({ fill: i });
            },
          },
        ]),
        t
      );
    })(),
    Y = (function () {
      function t(i) {
        e(this, t),
          (this.ctx = i),
          (this.w = i.w),
          (this.chartType = this.w.config.chart.type),
          (this.initialAnim = this.w.config.chart.animations.enabled),
          (this.dynamicAnim =
            this.initialAnim &&
            this.w.config.chart.animations.dynamicAnimation.enabled),
          (this.animBeginArr = [0]),
          (this.animDur = 0),
          (this.donutDataLabels = this.w.config.plotOptions.pie.donut.labels);
        var a = this.w;
        (this.lineColorArr =
          void 0 !== a.globals.stroke.colors
            ? a.globals.stroke.colors
            : a.globals.colors),
          (this.defaultSize =
            a.globals.svgHeight < a.globals.svgWidth
              ? a.globals.svgHeight - 35
              : a.globals.gridWidth),
          (this.centerY = this.defaultSize / 2),
          (this.centerX = a.globals.gridWidth / 2),
          (this.fullAngle = 360),
          (a.globals.radialSize =
            this.defaultSize / 2.05 -
            a.config.stroke.width -
            a.config.chart.dropShadow.blur),
          void 0 !== a.config.plotOptions.pie.size &&
            (a.globals.radialSize = a.config.plotOptions.pie.size),
          (this.donutSize =
            (a.globals.radialSize *
              parseInt(a.config.plotOptions.pie.donut.size)) /
            100),
          (this.sliceLabels = []),
          (this.prevSectorAngleArr = []);
      }
      return (
        a(t, [
          {
            key: "draw",
            value: function (t) {
              var e = this.w,
                i = new p(this.ctx),
                a = i.group({ class: "apexcharts-pie" });
              if (e.globals.noData) return a;
              for (var s = 0, n = 0; n < t.length; n++) s += u.negToZero(t[n]);
              var r = [],
                o = i.group();
              0 === s && (s = 1e-5);
              for (var l = 0; l < t.length; l++) {
                var h = (this.fullAngle * u.negToZero(t[l])) / s;
                r.push(h);
              }
              if (e.globals.dataChanged) {
                for (
                  var c, d = 0, g = 0;
                  g < e.globals.previousPaths.length;
                  g++
                )
                  d += u.negToZero(e.globals.previousPaths[g]);
                for (var f = 0; f < e.globals.previousPaths.length; f++)
                  (c =
                    (this.fullAngle * u.negToZero(e.globals.previousPaths[f])) /
                    d),
                    this.prevSectorAngleArr.push(c);
              }
              this.donutSize < 0 && (this.donutSize = 0);
              var x = e.config.plotOptions.pie.customScale,
                b = e.globals.gridWidth / 2,
                m = e.globals.gridHeight / 2,
                v = b - (e.globals.gridWidth / 2) * x,
                y = m - (e.globals.gridHeight / 2) * x;
              if ("donut" === e.config.chart.type) {
                var w = i.drawCircle(this.donutSize);
                w.attr({
                  cx: this.centerX,
                  cy: this.centerY,
                  fill: e.config.plotOptions.pie.donut.background,
                }),
                  o.add(w);
              }
              var k = this.drawArcs(r, t);
              if (
                (this.sliceLabels.forEach(function (t) {
                  k.add(t);
                }),
                o.attr({
                  transform: "translate("
                    .concat(v, ", ")
                    .concat(y - 5, ") scale(")
                    .concat(x, ")"),
                }),
                a.attr({
                  "data:innerTranslateX": v,
                  "data:innerTranslateY": y - 25,
                }),
                o.add(k),
                a.add(o),
                this.donutDataLabels.show)
              ) {
                var A = this.renderInnerDataLabels(this.donutDataLabels, {
                  hollowSize: this.donutSize,
                  centerX: this.centerX,
                  centerY: this.centerY,
                  opacity: this.donutDataLabels.show,
                  translateX: v,
                  translateY: y,
                });
                a.add(A);
              }
              return a;
            },
          },
          {
            key: "drawArcs",
            value: function (t, e) {
              var i = this.w,
                a = new g(this.ctx),
                s = new p(this.ctx),
                n = new C(this.ctx),
                r = s.group({ class: "apexcharts-slices" }),
                o = 0,
                l = 0,
                h = 0,
                c = 0;
              this.strokeWidth = i.config.stroke.show
                ? i.config.stroke.width
                : 0;
              for (var d = 0; d < t.length; d++) {
                var f = s.group({
                  class: "apexcharts-series apexcharts-pie-series",
                  seriesName: u.escapeString(i.globals.seriesNames[d]),
                  rel: d + 1,
                  "data:realIndex": d,
                });
                r.add(f),
                  (l = c),
                  (h = (o = h) + t[d]),
                  (c = l + this.prevSectorAngleArr[d]);
                var x = h - o,
                  b = n.fillPath({
                    seriesNumber: d,
                    size: i.globals.radialSize,
                    value: e[d],
                  }),
                  m = this.getChangedPath(l, c),
                  v = s.drawPath({
                    d: m,
                    stroke:
                      this.lineColorArr instanceof Array
                        ? this.lineColorArr[d]
                        : this.lineColorArr,
                    strokeWidth: this.strokeWidth,
                    fill: b,
                    fillOpacity: i.config.fill.opacity,
                    classes: "apexcharts-pie-area apexcharts-"
                      .concat(i.config.chart.type, "-slice-")
                      .concat(d),
                  });
                if (
                  (v.attr({ index: 0, j: d }),
                  i.config.chart.dropShadow.enabled)
                ) {
                  var y = i.config.chart.dropShadow;
                  a.dropShadow(v, y, d);
                }
                this.addListeners(v, this.donutDataLabels),
                  p.setAttrs(v.node, {
                    "data:angle": x,
                    "data:startAngle": o,
                    "data:strokeWidth": this.strokeWidth,
                    "data:value": e[d],
                  });
                var w = { x: 0, y: 0 };
                "pie" === i.config.chart.type
                  ? (w = u.polarToCartesian(
                      this.centerX,
                      this.centerY,
                      i.globals.radialSize / 1.25 +
                        i.config.plotOptions.pie.dataLabels.offset,
                      o + (h - o) / 2
                    ))
                  : "donut" === i.config.chart.type &&
                    (w = u.polarToCartesian(
                      this.centerX,
                      this.centerY,
                      (i.globals.radialSize + this.donutSize) / 2 +
                        i.config.plotOptions.pie.dataLabels.offset,
                      o + (h - o) / 2
                    )),
                  f.add(v);
                var k = 0;
                if (
                  (!this.initialAnim ||
                  i.globals.resized ||
                  i.globals.dataChanged
                    ? this.animBeginArr.push(0)
                    : ((k =
                        ((h - o) / this.fullAngle) *
                        i.config.chart.animations.speed),
                      (this.animDur = k + this.animDur),
                      this.animBeginArr.push(this.animDur)),
                  this.dynamicAnim && i.globals.dataChanged
                    ? this.animatePaths(v, {
                        size: i.globals.radialSize,
                        endAngle: h,
                        startAngle: o,
                        prevStartAngle: l,
                        prevEndAngle: c,
                        animateStartingPos: !0,
                        i: d,
                        animBeginArr: this.animBeginArr,
                        dur: i.config.chart.animations.dynamicAnimation.speed,
                      })
                    : this.animatePaths(v, {
                        size: i.globals.radialSize,
                        endAngle: h,
                        startAngle: o,
                        i: d,
                        totalItems: t.length - 1,
                        animBeginArr: this.animBeginArr,
                        dur: k,
                      }),
                  i.config.plotOptions.pie.expandOnClick &&
                    v.click(this.pieClicked.bind(this, d)),
                  i.config.dataLabels.enabled)
                ) {
                  var A = w.x,
                    S = w.y,
                    L = (100 * (h - o)) / 360 + "%";
                  if (
                    0 !== x &&
                    i.config.plotOptions.pie.dataLabels.minAngleToShowLabel <
                      t[d]
                  ) {
                    var P = i.config.dataLabels.formatter;
                    void 0 !== P &&
                      (L = P(i.globals.seriesPercent[d][0], {
                        seriesIndex: d,
                        w: i,
                      }));
                    var z = i.globals.dataLabels.style.colors[d],
                      E = s.drawText({
                        x: A,
                        y: S,
                        text: L,
                        textAnchor: "middle",
                        fontSize: i.config.dataLabels.style.fontSize,
                        fontFamily: i.config.dataLabels.style.fontFamily,
                        foreColor: z,
                      });
                    if (i.config.dataLabels.dropShadow.enabled) {
                      var M = i.config.dataLabels.dropShadow;
                      new g(this.ctx).dropShadow(E, M);
                    }
                    E.node.classList.add("apexcharts-pie-label"),
                      i.config.chart.animations.animate &&
                        !1 === i.globals.resized &&
                        (E.node.classList.add("apexcharts-pie-label-delay"),
                        (E.node.style.animationDelay =
                          i.config.chart.animations.speed / 940 + "s")),
                      this.sliceLabels.push(E);
                  }
                }
              }
              return r;
            },
          },
          {
            key: "addListeners",
            value: function (t, e) {
              var i = new p(this.ctx);
              t.node.addEventListener(
                "mouseenter",
                i.pathMouseEnter.bind(this, t)
              ),
                t.node.addEventListener(
                  "mouseleave",
                  i.pathMouseLeave.bind(this, t)
                ),
                t.node.addEventListener(
                  "mouseleave",
                  this.revertDataLabelsInner.bind(this, t.node, e)
                ),
                t.node.addEventListener(
                  "mousedown",
                  i.pathMouseDown.bind(this, t)
                ),
                this.donutDataLabels.total.showAlways ||
                  (t.node.addEventListener(
                    "mouseenter",
                    this.printDataLabelsInner.bind(this, t.node, e)
                  ),
                  t.node.addEventListener(
                    "mousedown",
                    this.printDataLabelsInner.bind(this, t.node, e)
                  ));
            },
          },
          {
            key: "animatePaths",
            value: function (t, e) {
              var i = this.w,
                a = e.endAngle - e.startAngle,
                s = a,
                n = e.startAngle,
                r = e.startAngle;
              void 0 !== e.prevStartAngle &&
                void 0 !== e.prevEndAngle &&
                ((n = e.prevEndAngle), (s = e.prevEndAngle - e.prevStartAngle)),
                e.i === i.config.series.length - 1 &&
                  (a + r > this.fullAngle
                    ? (e.endAngle = e.endAngle - (a + r))
                    : a + r < this.fullAngle &&
                      (e.endAngle = e.endAngle + (this.fullAngle - (a + r)))),
                a === this.fullAngle && (a = this.fullAngle - 0.01),
                this.animateArc(t, n, r, a, s, e);
            },
          },
          {
            key: "animateArc",
            value: function (t, e, i, a, s, n) {
              var r,
                o = this,
                l = this.w,
                h = new f(this.ctx),
                c = n.size;
              (isNaN(e) || isNaN(s)) && ((e = i), (s = a), (n.dur = 0));
              var d = a,
                u = i,
                g = e - i;
              l.globals.dataChanged &&
                n.shouldSetPrevPaths &&
                ((r = o.getPiePath({
                  me: o,
                  startAngle: u,
                  angle: s,
                  size: c,
                })),
                t.attr({ d: r })),
                0 !== n.dur
                  ? t
                      .animate(n.dur, l.globals.easing, n.animBeginArr[n.i])
                      .afterAll(function () {
                        ("pie" !== l.config.chart.type &&
                          "donut" !== l.config.chart.type) ||
                          this.animate(300).attr({
                            "stroke-width": l.config.stroke.width,
                          }),
                          n.i === l.config.series.length - 1 &&
                            h.animationCompleted(t);
                      })
                      .during(function (l) {
                        (d = g + (a - g) * l),
                          n.animateStartingPos &&
                            ((d = s + (a - s) * l),
                            (u = e - s + (i - (e - s)) * l)),
                          (r = o.getPiePath({
                            me: o,
                            startAngle: u,
                            angle: d,
                            size: c,
                          })),
                          t.node.setAttribute("data:pathOrig", r),
                          t.attr({ d: r });
                      })
                  : ((r = o.getPiePath({
                      me: o,
                      startAngle: u,
                      angle: a,
                      size: c,
                    })),
                    n.isTrack || (l.globals.animationEnded = !0),
                    t.node.setAttribute("data:pathOrig", r),
                    t.attr({ d: r }));
            },
          },
          {
            key: "pieClicked",
            value: function (t) {
              var e,
                i = this.w,
                a = this.w.globals.radialSize + 4,
                s = i.globals.dom.Paper.select(
                  ".apexcharts-"
                    .concat(i.config.chart.type.toLowerCase(), "-slice-")
                    .concat(t)
                ).members[0],
                n = s.attr("d");
              if ("true" !== s.attr("data:pieClicked")) {
                var r = i.globals.dom.baseEl.querySelectorAll(
                  ".apexcharts-pie-area"
                );
                Array.prototype.forEach.call(r, function (t) {
                  t.setAttribute("data:pieClicked", "false");
                  var e = t.getAttribute("data:pathOrig");
                  t.setAttribute("d", e);
                }),
                  s.attr("data:pieClicked", "true");
                var o = parseInt(s.attr("data:startAngle")),
                  l = parseInt(s.attr("data:angle"));
                (e = this.getPiePath({
                  me: this,
                  startAngle: o,
                  angle: l,
                  size: a,
                })),
                  360 !== l &&
                    s.plot(e).animate(1).plot(n).animate(100).plot(e);
              } else {
                s.attr({ "data:pieClicked": "false" }),
                  this.revertDataLabelsInner(s.node, this.donutDataLabels);
                var h = s.attr("data:pathOrig");
                s.attr({ d: h });
              }
            },
          },
          {
            key: "getChangedPath",
            value: function (t, e) {
              var i = "";
              return (
                this.dynamicAnim &&
                  this.w.globals.dataChanged &&
                  (i = this.getPiePath({
                    me: this,
                    startAngle: t,
                    angle: e - t,
                    size: this.size,
                  })),
                i
              );
            },
          },
          {
            key: "getPiePath",
            value: function (t) {
              var e = t.me,
                i = t.startAngle,
                a = t.angle,
                s = t.size,
                n = this.w,
                r = i,
                o = (Math.PI * (r - 90)) / 180,
                l = a + i;
              Math.ceil(l) >= 360 && (l = 359.99);
              var h = (Math.PI * (l - 90)) / 180,
                c = e.centerX + s * Math.cos(o),
                d = e.centerY + s * Math.sin(o),
                g = e.centerX + s * Math.cos(h),
                f = e.centerY + s * Math.sin(h),
                p = u.polarToCartesian(e.centerX, e.centerY, e.donutSize, l),
                x = u.polarToCartesian(e.centerX, e.centerY, e.donutSize, r),
                b = a > 180 ? 1 : 0;
              return "donut" === n.config.chart.type
                ? [
                    "M",
                    c,
                    d,
                    "A",
                    s,
                    s,
                    0,
                    b,
                    1,
                    g,
                    f,
                    "L",
                    p.x,
                    p.y,
                    "A",
                    e.donutSize,
                    e.donutSize,
                    0,
                    b,
                    0,
                    x.x,
                    x.y,
                    "L",
                    c,
                    d,
                    "z",
                  ].join(" ")
                : "pie" === n.config.chart.type
                ? [
                    "M",
                    c,
                    d,
                    "A",
                    s,
                    s,
                    0,
                    b,
                    1,
                    g,
                    f,
                    "L",
                    e.centerX,
                    e.centerY,
                    "L",
                    c,
                    d,
                  ].join(" ")
                : ["M", c, d, "A", s, s, 0, b, 1, g, f].join(" ");
            },
          },
          {
            key: "renderInnerDataLabels",
            value: function (t, e) {
              var i = this.w,
                a = new p(this.ctx),
                s = a.group({
                  class: "apexcharts-datalabels-group",
                  transform: "translate("
                    .concat(e.translateX ? e.translateX : 0, ", ")
                    .concat(e.translateY ? e.translateY : 0, ")"),
                }),
                n = t.total.show;
              s.node.style.opacity = e.opacity;
              var r,
                o,
                l = e.centerX,
                h = e.centerY;
              (r =
                void 0 === t.name.color ? i.globals.colors[0] : t.name.color),
                (o =
                  void 0 === t.value.color
                    ? i.config.chart.foreColor
                    : t.value.color);
              var c = t.value.formatter,
                d = "",
                u = "";
              if (
                (n
                  ? ((r = t.total.color),
                    (u = t.total.label),
                    (d = t.total.formatter(i)))
                  : 1 === i.globals.series.length &&
                    ((d = c(i.globals.series[0], i)),
                    (u = i.globals.seriesNames[0])),
                t.name.show)
              ) {
                var g = a.drawText({
                  x: l,
                  y: h + parseFloat(t.name.offsetY),
                  text: u,
                  textAnchor: "middle",
                  foreColor: r,
                  fontSize: t.name.fontSize,
                  fontFamily: t.name.fontFamily,
                });
                g.node.classList.add("apexcharts-datalabel-label"), s.add(g);
              }
              if (t.value.show) {
                var f = t.name.show
                    ? parseFloat(t.value.offsetY) + 16
                    : t.value.offsetY,
                  x = a.drawText({
                    x: l,
                    y: h + f,
                    text: d,
                    textAnchor: "middle",
                    foreColor: o,
                    fontSize: t.value.fontSize,
                    fontFamily: t.value.fontFamily,
                  });
                x.node.classList.add("apexcharts-datalabel-value"), s.add(x);
              }
              return s;
            },
          },
          {
            key: "printInnerLabels",
            value: function (t, e, i, a) {
              var s,
                n = this.w;
              a
                ? (s =
                    void 0 === t.name.color
                      ? n.globals.colors[
                          parseInt(a.parentNode.getAttribute("rel")) - 1
                        ]
                      : t.name.color)
                : n.globals.series.length > 1 &&
                  t.total.show &&
                  (s = t.total.color);
              var r = n.globals.dom.baseEl.querySelector(
                  ".apexcharts-datalabel-label"
                ),
                o = n.globals.dom.baseEl.querySelector(
                  ".apexcharts-datalabel-value"
                );
              (i = (0, t.value.formatter)(i, n)),
                a ||
                  "function" != typeof t.total.formatter ||
                  (i = t.total.formatter(n)),
                null !== r && (r.textContent = e),
                null !== o && (o.textContent = i),
                null !== r && (r.style.fill = s);
            },
          },
          {
            key: "printDataLabelsInner",
            value: function (t, e) {
              var i = this.w,
                a = t.getAttribute("data:value"),
                s =
                  i.globals.seriesNames[
                    parseInt(t.parentNode.getAttribute("rel")) - 1
                  ];
              i.globals.series.length > 1 && this.printInnerLabels(e, s, a, t);
              var n = i.globals.dom.baseEl.querySelector(
                ".apexcharts-datalabels-group"
              );
              null !== n && (n.style.opacity = 1);
            },
          },
          {
            key: "revertDataLabelsInner",
            value: function (e, i, a) {
              var s = this,
                n = this.w,
                r = n.globals.dom.baseEl.querySelector(
                  ".apexcharts-datalabels-group"
                );
              if (i.total.show && n.globals.series.length > 1) {
                new t(this.ctx).printInnerLabels(
                  i,
                  i.total.label,
                  i.total.formatter(n)
                );
              } else {
                var o = document.querySelectorAll(".apexcharts-pie-area"),
                  l = !1;
                if (
                  (Array.prototype.forEach.call(o, function (t) {
                    "true" === t.getAttribute("data:pieClicked") &&
                      ((l = !0), s.printDataLabelsInner(t, i));
                  }),
                  !l)
                )
                  if (
                    n.globals.selectedDataPoints.length &&
                    n.globals.series.length > 1
                  )
                    if (n.globals.selectedDataPoints[0].length > 0) {
                      var h = n.globals.selectedDataPoints[0],
                        c = n.globals.dom.baseEl.querySelector(
                          ".apexcharts-"
                            .concat(
                              n.config.chart.type.toLowerCase(),
                              "-slice-"
                            )
                            .concat(h)
                        );
                      this.printDataLabelsInner(c, i);
                    } else
                      r &&
                        n.globals.selectedDataPoints.length &&
                        0 === n.globals.selectedDataPoints[0].length &&
                        (r.style.opacity = 0);
                  else
                    r && n.globals.series.length > 1 && (r.style.opacity = 0);
              }
            },
          },
        ]),
        t
      );
    })(),
    F = (function () {
      function t(i) {
        e(this, t),
          (this.ctx = i),
          (this.w = i.w),
          (this.chartType = this.w.config.chart.type),
          (this.initialAnim = this.w.config.chart.animations.enabled),
          (this.dynamicAnim =
            this.initialAnim &&
            this.w.config.chart.animations.dynamicAnimation.enabled),
          (this.animDur = 0);
        var a = this.w;
        (this.graphics = new p(this.ctx)),
          (this.lineColorArr =
            void 0 !== a.globals.stroke.colors
              ? a.globals.stroke.colors
              : a.globals.colors),
          (this.defaultSize =
            a.globals.svgHeight < a.globals.svgWidth
              ? a.globals.svgHeight - 35
              : a.globals.gridWidth),
          (this.maxValue = this.w.globals.maxY),
          (this.polygons = a.config.plotOptions.radar.polygons),
          (this.maxLabelWidth = 20);
        var s = a.globals.labels.slice().sort(function (t, e) {
            return e.length - t.length;
          })[0],
          n = this.graphics.getTextRects(s, a.config.dataLabels.style.fontSize);
        (this.size =
          this.defaultSize / 2.1 -
          a.config.stroke.width -
          a.config.chart.dropShadow.blur -
          n.width / 1.75),
          void 0 !== a.config.plotOptions.radar.size &&
            (this.size = a.config.plotOptions.radar.size),
          (this.dataRadiusOfPercent = []),
          (this.dataRadius = []),
          (this.angleArr = []),
          (this.yaxisLabelsTextsPos = []);
      }
      return (
        a(t, [
          {
            key: "draw",
            value: function (t) {
              var e = this,
                i = this.w,
                a = new C(this.ctx),
                s = [];
              t.length &&
                (this.dataPointsLen = t[i.globals.maxValsInArrayIndex].length),
                (this.disAngle = (2 * Math.PI) / this.dataPointsLen);
              var n = i.globals.gridWidth / 2,
                o = i.globals.gridHeight / 2,
                l = this.graphics.group({
                  class: "apexcharts-radar-series",
                  "data:innerTranslateX": n,
                  "data:innerTranslateY": o - 25,
                  transform: "translate("
                    .concat(n || 0, ", ")
                    .concat(o || 0, ")"),
                }),
                h = [],
                c = null;
              if (
                ((this.yaxisLabels = this.graphics.group({
                  class: "apexcharts-yaxis",
                })),
                t.forEach(function (t, n) {
                  var o = e.graphics.group().attr({
                    class: "apexcharts-series",
                    seriesName: u.escapeString(i.globals.seriesNames[n]),
                    rel: n + 1,
                    "data:realIndex": n,
                  });
                  (e.dataRadiusOfPercent[n] = []),
                    (e.dataRadius[n] = []),
                    (e.angleArr[n] = []),
                    t.forEach(function (t, i) {
                      (e.dataRadiusOfPercent[n][i] = t / e.maxValue),
                        (e.dataRadius[n][i] =
                          e.dataRadiusOfPercent[n][i] * e.size),
                        (e.angleArr[n][i] = i * e.disAngle);
                    }),
                    (h = e.getDataPointsPos(e.dataRadius[n], e.angleArr[n]));
                  var l = e.createPaths(h, { x: 0, y: 0 });
                  (c = e.graphics.group({
                    class: "apexcharts-series-markers-wrap hidden",
                  })),
                    i.globals.delayedElements.push({ el: c.node, index: n });
                  var d = {
                      i: n,
                      realIndex: n,
                      animationDelay: n,
                      initialSpeed: i.config.chart.animations.speed,
                      dataChangeSpeed:
                        i.config.chart.animations.dynamicAnimation.speed,
                      className: "apexcharts-radar",
                      shouldClipToGrid: !1,
                      bindEventsOnPaths: !1,
                      stroke: i.globals.stroke.colors[n],
                      strokeLineCap: i.config.stroke.lineCap,
                    },
                    f = null;
                  i.globals.previousPaths.length > 0 && (f = e.getPathFrom(n));
                  for (var p = 0; p < l.linePathsTo.length; p++) {
                    var x = e.graphics.renderPaths(
                      r({}, d, {
                        pathFrom: null === f ? l.linePathsFrom[p] : f,
                        pathTo: l.linePathsTo[p],
                        strokeWidth: Array.isArray(i.config.stroke.width)
                          ? i.config.stroke.width[n]
                          : i.config.stroke.width,
                        fill: "none",
                        drawShadow: !1,
                      })
                    );
                    o.add(x);
                    var b = a.fillPath({ seriesNumber: n }),
                      m = e.graphics.renderPaths(
                        r({}, d, {
                          pathFrom: null === f ? l.areaPathsFrom[p] : f,
                          pathTo: l.areaPathsTo[p],
                          strokeWidth: 0,
                          fill: b,
                          drawShadow: !1,
                        })
                      );
                    if (i.config.chart.dropShadow.enabled) {
                      var v = new g(e.ctx),
                        y = i.config.chart.dropShadow;
                      v.dropShadow(
                        m,
                        Object.assign({}, y, { noUserSpaceOnUse: !0 }),
                        n
                      );
                    }
                    o.add(m);
                  }
                  t.forEach(function (t, i) {
                    var a = new L(e.ctx).getMarkerConfig(
                        "apexcharts-marker",
                        n,
                        i
                      ),
                      s = e.graphics.drawMarker(h[i].x, h[i].y, a);
                    s.attr("rel", i),
                      s.attr("j", i),
                      s.attr("index", n),
                      s.node.setAttribute("default-marker-size", a.pSize);
                    var r = e.graphics.group({
                      class: "apexcharts-series-markers",
                    });
                    r && r.add(s), c.add(r), o.add(c);
                  }),
                    s.push(o);
                }),
                this.drawPolygons({ parent: l }),
                i.config.dataLabels.enabled)
              ) {
                var d = this.drawLabels();
                l.add(d);
              }
              return (
                l.add(this.yaxisLabels),
                s.forEach(function (t) {
                  l.add(t);
                }),
                l
              );
            },
          },
          {
            key: "drawPolygons",
            value: function (t) {
              for (
                var e = this,
                  i = this.w,
                  a = t.parent,
                  s = i.globals.yAxisScale[0].result.reverse(),
                  n = s.length,
                  r = [],
                  o = this.size / (n - 1),
                  l = 0;
                l < n;
                l++
              )
                r[l] = o * l;
              r.reverse();
              var h = [],
                c = [];
              r.forEach(function (t, i) {
                var a = e.getPolygonPos(t),
                  s = "";
                a.forEach(function (t, a) {
                  if (0 === i) {
                    var n = e.graphics.drawLine(
                      t.x,
                      t.y,
                      0,
                      0,
                      Array.isArray(e.polygons.connectorColors)
                        ? e.polygons.connectorColors[a]
                        : e.polygons.connectorColors
                    );
                    c.push(n);
                  }
                  0 === a && e.yaxisLabelsTextsPos.push({ x: t.x, y: t.y }),
                    (s += t.x + "," + t.y + " ");
                }),
                  h.push(s);
              }),
                h.forEach(function (t, s) {
                  var n = e.polygons.strokeColors,
                    r = e.graphics.drawPolygon(
                      t,
                      Array.isArray(n) ? n[s] : n,
                      i.globals.radarPolygons.fill.colors[s]
                    );
                  a.add(r);
                }),
                c.forEach(function (t) {
                  a.add(t);
                }),
                i.config.yaxis[0].show &&
                  this.yaxisLabelsTextsPos.forEach(function (t, i) {
                    var a = e.drawYAxisText(t.x, t.y, i, s[i]);
                    e.yaxisLabels.add(a);
                  });
            },
          },
          {
            key: "drawYAxisText",
            value: function (t, e, i, a) {
              var s = this.w,
                n = s.config.yaxis[0],
                r = s.globals.yLabelFormatters[0];
              return this.graphics.drawText({
                x: t + n.labels.offsetX,
                y: e + n.labels.offsetY,
                text: r(a, i),
                textAnchor: "middle",
                fontSize: n.labels.style.fontSize,
                fontFamily: n.labels.style.fontFamily,
                foreColor: n.labels.style.color,
              });
            },
          },
          {
            key: "drawLabels",
            value: function () {
              var t = this,
                e = this.w,
                i = "middle",
                a = e.config.dataLabels,
                s = this.graphics.group({ class: "apexcharts-datalabels" }),
                n = this.getPolygonPos(this.size),
                r = 0,
                o = 0;
              return (
                e.globals.labels.forEach(function (l, h) {
                  var c = a.formatter,
                    d = new z(t.ctx);
                  if (n[h]) {
                    (r = n[h].x),
                      (o = n[h].y),
                      Math.abs(n[h].x) >= 10
                        ? n[h].x > 0
                          ? ((i = "start"), (r += 10))
                          : n[h].x < 0 && ((i = "end"), (r -= 10))
                        : (i = "middle"),
                      Math.abs(n[h].y) >= t.size - 10 &&
                        (n[h].y < 0 ? (o -= 10) : n[h].y > 0 && (o += 10));
                    var u = c(l, { seriesIndex: -1, dataPointIndex: h, w: e });
                    d.plotDataLabelsText({
                      x: r,
                      y: o,
                      text: u,
                      textAnchor: i,
                      i: h,
                      j: h,
                      parent: s,
                      dataLabelsConfig: a,
                      offsetCorrection: !1,
                    });
                  }
                }),
                s
              );
            },
          },
          {
            key: "createPaths",
            value: function (t, e) {
              var i = this,
                a = [],
                s = [],
                n = [],
                r = [];
              if (t.length) {
                (s = [this.graphics.move(e.x, e.y)]),
                  (r = [this.graphics.move(e.x, e.y)]);
                var o = this.graphics.move(t[0].x, t[0].y),
                  l = this.graphics.move(t[0].x, t[0].y);
                t.forEach(function (e, a) {
                  (o += i.graphics.line(e.x, e.y)),
                    (l += i.graphics.line(e.x, e.y)),
                    a === t.length - 1 && ((o += "Z"), (l += "Z"));
                }),
                  a.push(o),
                  n.push(l);
              }
              return {
                linePathsFrom: s,
                linePathsTo: a,
                areaPathsFrom: r,
                areaPathsTo: n,
              };
            },
          },
          {
            key: "getPathFrom",
            value: function (t) {
              for (
                var e = this.w, i = null, a = 0;
                a < e.globals.previousPaths.length;
                a++
              ) {
                var s = e.globals.previousPaths[a];
                s.paths.length > 0 &&
                  parseInt(s.realIndex) === parseInt(t) &&
                  void 0 !== e.globals.previousPaths[a].paths[0] &&
                  (i = e.globals.previousPaths[a].paths[0].d);
              }
              return i;
            },
          },
          {
            key: "getDataPointsPos",
            value: function (t, e) {
              var i =
                arguments.length > 2 && void 0 !== arguments[2]
                  ? arguments[2]
                  : this.dataPointsLen;
              (t = t || []), (e = e || []);
              for (var a = [], s = 0; s < i; s++) {
                var n = {};
                (n.x = t[s] * Math.sin(e[s])),
                  (n.y = -t[s] * Math.cos(e[s])),
                  a.push(n);
              }
              return a;
            },
          },
          {
            key: "getPolygonPos",
            value: function (t) {
              for (
                var e = [], i = (2 * Math.PI) / this.dataPointsLen, a = 0;
                a < this.dataPointsLen;
                a++
              ) {
                var s = {};
                (s.x = t * Math.sin(a * i)),
                  (s.y = -t * Math.cos(a * i)),
                  e.push(s);
              }
              return e;
            },
          },
        ]),
        t
      );
    })(),
    R = (function (t) {
      function i(t) {
        var a;
        e(this, i),
          ((a = c(this, l(i).call(this, t))).ctx = t),
          (a.w = t.w),
          (a.animBeginArr = [0]),
          (a.animDur = 0);
        var s = a.w;
        return (
          (a.startAngle = s.config.plotOptions.radialBar.startAngle),
          (a.endAngle = s.config.plotOptions.radialBar.endAngle),
          (a.trackStartAngle = s.config.plotOptions.radialBar.track.startAngle),
          (a.trackEndAngle = s.config.plotOptions.radialBar.track.endAngle),
          (a.radialDataLabels = s.config.plotOptions.radialBar.dataLabels),
          a.trackStartAngle || (a.trackStartAngle = a.startAngle),
          a.trackEndAngle || (a.trackEndAngle = a.endAngle),
          360 === a.endAngle && (a.endAngle = 359.99),
          (a.fullAngle =
            360 -
            s.config.plotOptions.radialBar.endAngle -
            s.config.plotOptions.radialBar.startAngle),
          (a.margin = parseInt(s.config.plotOptions.radialBar.track.margin)),
          a
        );
      }
      return (
        o(i, Y),
        a(i, [
          {
            key: "draw",
            value: function (t) {
              var e = this.w,
                i = new p(this.ctx),
                a = i.group({ class: "apexcharts-radialbar" });
              if (e.globals.noData) return a;
              var s = i.group(),
                n = this.defaultSize / 2,
                r = e.globals.gridWidth / 2,
                o =
                  this.defaultSize / 2.05 -
                  e.config.stroke.width -
                  e.config.chart.dropShadow.blur;
              void 0 !== e.config.plotOptions.radialBar.size &&
                (o = e.config.plotOptions.radialBar.size);
              var l = e.globals.fill.colors;
              if (e.config.plotOptions.radialBar.track.show) {
                var h = this.drawTracks({
                  size: o,
                  centerX: r,
                  centerY: n,
                  colorArr: l,
                  series: t,
                });
                s.add(h);
              }
              var c = this.drawArcs({
                  size: o,
                  centerX: r,
                  centerY: n,
                  colorArr: l,
                  series: t,
                }),
                d = 360;
              e.config.plotOptions.radialBar.startAngle < 0 &&
                (d = Math.abs(
                  e.config.plotOptions.radialBar.endAngle -
                    e.config.plotOptions.radialBar.startAngle
                ));
              var u = (360 - d) / 360;
              if (
                ((e.globals.radialSize = o - o * u),
                this.radialDataLabels.value.show)
              ) {
                var g = Math.max(
                  this.radialDataLabels.value.offsetY,
                  this.radialDataLabels.name.offsetY
                );
                e.globals.radialSize += g * u;
              }
              return (
                s.add(c.g),
                "front" === e.config.plotOptions.radialBar.hollow.position &&
                  (c.g.add(c.elHollow), c.dataLabels && c.g.add(c.dataLabels)),
                a.add(s),
                a
              );
            },
          },
          {
            key: "drawTracks",
            value: function (t) {
              var e = this.w,
                i = new p(this.ctx),
                a = i.group({ class: "apexcharts-tracks" }),
                s = new g(this.ctx),
                n = new C(this.ctx),
                r = this.getStrokeWidth(t);
              t.size = t.size - r / 2;
              for (var o = 0; o < t.series.length; o++) {
                var l = i.group({
                  class: "apexcharts-radialbar-track apexcharts-track",
                });
                a.add(l),
                  l.attr({ rel: o + 1 }),
                  (t.size = t.size - r - this.margin);
                var h = e.config.plotOptions.radialBar.track,
                  c = n.fillPath({
                    seriesNumber: 0,
                    size: t.size,
                    fillColors: Array.isArray(h.background)
                      ? h.background[o]
                      : h.background,
                    solid: !0,
                  }),
                  d = this.trackStartAngle,
                  u = this.trackEndAngle;
                Math.abs(u) + Math.abs(d) >= 360 &&
                  (u = 360 - Math.abs(this.startAngle) - 0.1);
                var f = i.drawPath({
                  d: "",
                  stroke: c,
                  strokeWidth: (r * parseInt(h.strokeWidth)) / 100,
                  fill: "none",
                  strokeOpacity: h.opacity,
                  classes: "apexcharts-radialbar-area",
                });
                if (h.dropShadow.enabled) {
                  var x = h.dropShadow;
                  s.dropShadow(f, x);
                }
                l.add(f),
                  f.attr("id", "apexcharts-radialbarTrack-" + o),
                  this.animatePaths(f, {
                    centerX: t.centerX,
                    centerY: t.centerY,
                    endAngle: u,
                    startAngle: d,
                    size: t.size,
                    i: o,
                    totalItems: 2,
                    animBeginArr: 0,
                    dur: 0,
                    isTrack: !0,
                    easing: e.globals.easing,
                  });
              }
              return a;
            },
          },
          {
            key: "drawArcs",
            value: function (t) {
              var e = this.w,
                i = new p(this.ctx),
                a = new C(this.ctx),
                s = new g(this.ctx),
                n = i.group(),
                r = this.getStrokeWidth(t);
              t.size = t.size - r / 2;
              var o = e.config.plotOptions.radialBar.hollow.background,
                l =
                  t.size -
                  r * t.series.length -
                  this.margin * t.series.length -
                  (r *
                    parseInt(
                      e.config.plotOptions.radialBar.track.strokeWidth
                    )) /
                    100 /
                    2,
                h = l - e.config.plotOptions.radialBar.hollow.margin;
              void 0 !== e.config.plotOptions.radialBar.hollow.image &&
                (o = this.drawHollowImage(t, n, l, o));
              var c = this.drawHollow({
                size: h,
                centerX: t.centerX,
                centerY: t.centerY,
                fill: o,
              });
              if (e.config.plotOptions.radialBar.hollow.dropShadow.enabled) {
                var d = e.config.plotOptions.radialBar.hollow.dropShadow;
                s.dropShadow(c, d);
              }
              var f = 1;
              !this.radialDataLabels.total.show &&
                e.globals.series.length > 1 &&
                (f = 0);
              var x = null;
              this.radialDataLabels.show &&
                (x = this.renderInnerDataLabels(this.radialDataLabels, {
                  hollowSize: l,
                  centerX: t.centerX,
                  centerY: t.centerY,
                  opacity: f,
                })),
                "back" === e.config.plotOptions.radialBar.hollow.position &&
                  (n.add(c), x && n.add(x));
              var b = !1;
              e.config.plotOptions.radialBar.inverseOrder && (b = !0);
              for (
                var m = b ? t.series.length - 1 : 0;
                b ? m >= 0 : m < t.series.length;
                b ? m-- : m++
              ) {
                var v = i.group({
                  class: "apexcharts-series apexcharts-radial-series",
                  seriesName: u.escapeString(e.globals.seriesNames[m]),
                });
                n.add(v),
                  v.attr({ rel: m + 1, "data:realIndex": m }),
                  this.ctx.series.addCollapsedClassToSeries(v, m),
                  (t.size = t.size - r - this.margin);
                var y = a.fillPath({
                    seriesNumber: m,
                    size: t.size,
                    value: t.series[m],
                  }),
                  w = this.startAngle,
                  k = void 0,
                  A = Math.abs(
                    e.config.plotOptions.radialBar.endAngle -
                      e.config.plotOptions.radialBar.startAngle
                  ),
                  S = u.negToZero(t.series[m] > 100 ? 100 : t.series[m]) / 100,
                  L = Math.round(A * S) + this.startAngle,
                  P = void 0;
                e.globals.dataChanged &&
                  ((k = this.startAngle),
                  (P =
                    Math.round(
                      (A * u.negToZero(e.globals.previousPaths[m])) / 100
                    ) + k)),
                  Math.abs(L) + Math.abs(w) >= 360 && (L -= 0.01),
                  Math.abs(P) + Math.abs(k) >= 360 && (P -= 0.01);
                var z = L - w,
                  E = Array.isArray(e.config.stroke.dashArray)
                    ? e.config.stroke.dashArray[m]
                    : e.config.stroke.dashArray,
                  M = i.drawPath({
                    d: "",
                    stroke: y,
                    strokeWidth: r,
                    fill: "none",
                    fillOpacity: e.config.fill.opacity,
                    classes:
                      "apexcharts-radialbar-area apexcharts-radialbar-slice-" +
                      m,
                    strokeDashArray: E,
                  });
                if (
                  (p.setAttrs(M.node, {
                    "data:angle": z,
                    "data:value": t.series[m],
                  }),
                  e.config.chart.dropShadow.enabled)
                ) {
                  var T = e.config.chart.dropShadow;
                  s.dropShadow(M, T, m);
                }
                this.addListeners(M, this.radialDataLabels),
                  v.add(M),
                  M.attr({ index: 0, j: m });
                var I = 0;
                !this.initialAnim ||
                  e.globals.resized ||
                  e.globals.dataChanged ||
                  ((I = ((L - w) / 360) * e.config.chart.animations.speed),
                  (this.animDur = I / (1.2 * t.series.length) + this.animDur),
                  this.animBeginArr.push(this.animDur)),
                  e.globals.dataChanged &&
                    ((I =
                      ((L - w) / 360) *
                      e.config.chart.animations.dynamicAnimation.speed),
                    (this.animDur = I / (1.2 * t.series.length) + this.animDur),
                    this.animBeginArr.push(this.animDur)),
                  this.animatePaths(M, {
                    centerX: t.centerX,
                    centerY: t.centerY,
                    endAngle: L,
                    startAngle: w,
                    prevEndAngle: P,
                    prevStartAngle: k,
                    size: t.size,
                    i: m,
                    totalItems: 2,
                    animBeginArr: this.animBeginArr,
                    dur: I,
                    shouldSetPrevPaths: !0,
                    easing: e.globals.easing,
                  });
              }
              return { g: n, elHollow: c, dataLabels: x };
            },
          },
          {
            key: "drawHollow",
            value: function (t) {
              var e = new p(this.ctx).drawCircle(2 * t.size);
              return (
                e.attr({
                  class: "apexcharts-radialbar-hollow",
                  cx: t.centerX,
                  cy: t.centerY,
                  r: t.size,
                  fill: t.fill,
                }),
                e
              );
            },
          },
          {
            key: "drawHollowImage",
            value: function (t, e, i, a) {
              var s = this.w,
                n = new C(this.ctx),
                r = u.randomId(),
                o = s.config.plotOptions.radialBar.hollow.image;
              if (s.config.plotOptions.radialBar.hollow.imageClipped)
                n.clippedImgArea({
                  width: i,
                  height: i,
                  image: o,
                  patternID: "pattern".concat(s.globals.cuid).concat(r),
                }),
                  (a = "url(#pattern".concat(s.globals.cuid).concat(r, ")"));
              else {
                var l = s.config.plotOptions.radialBar.hollow.imageWidth,
                  h = s.config.plotOptions.radialBar.hollow.imageHeight;
                if (void 0 === l && void 0 === h) {
                  var c = s.globals.dom.Paper.image(o).loaded(function (e) {
                    this.move(
                      t.centerX -
                        e.width / 2 +
                        s.config.plotOptions.radialBar.hollow.imageOffsetX,
                      t.centerY -
                        e.height / 2 +
                        s.config.plotOptions.radialBar.hollow.imageOffsetY
                    );
                  });
                  e.add(c);
                } else {
                  var d = s.globals.dom.Paper.image(o).loaded(function (e) {
                    this.move(
                      t.centerX -
                        l / 2 +
                        s.config.plotOptions.radialBar.hollow.imageOffsetX,
                      t.centerY -
                        h / 2 +
                        s.config.plotOptions.radialBar.hollow.imageOffsetY
                    ),
                      this.size(l, h);
                  });
                  e.add(d);
                }
              }
              return a;
            },
          },
          {
            key: "getStrokeWidth",
            value: function (t) {
              var e = this.w;
              return (
                (t.size *
                  (100 -
                    parseInt(e.config.plotOptions.radialBar.hollow.size))) /
                  100 /
                  (t.series.length + 1) -
                this.margin
              );
            },
          },
        ]),
        i
      );
    })(),
    D = (function (t) {
      function i() {
        return e(this, i), c(this, l(i).apply(this, arguments));
      }
      return (
        o(i, E),
        a(i, [
          {
            key: "draw",
            value: function (t, e) {
              var i = this.w,
                a = new p(this.ctx),
                s = new C(this.ctx);
              (this.rangeBarOptions = this.w.config.plotOptions.rangeBar),
                (this.series = t),
                (this.seriesRangeStart = i.globals.seriesRangeStart),
                (this.seriesRangeEnd = i.globals.seriesRangeEnd),
                this.initVariables(t);
              for (
                var n = a.group({
                    class: "apexcharts-rangebar-series apexcharts-plot-series",
                  }),
                  r = 0,
                  o = 0;
                r < t.length;
                r++, o++
              ) {
                var l,
                  h,
                  c,
                  d,
                  g = void 0,
                  f = void 0,
                  x = void 0,
                  b = void 0,
                  m = i.globals.comboCharts ? e[r] : r,
                  v = a.group({
                    class: "apexcharts-series",
                    seriesName: u.escapeString(i.globals.seriesNames[m]),
                    rel: r + 1,
                    "data:realIndex": m,
                  });
                t[r].length > 0 && (this.visibleI = this.visibleI + 1);
                var y = 0,
                  w = 0,
                  k = 0;
                this.yRatio.length > 1 && (this.yaxisIndex = m);
                var A = this.initialPositions();
                (b = A.y),
                  (h = A.yDivision),
                  (w = A.barHeight),
                  (d = A.zeroW),
                  (x = A.x),
                  (k = A.barWidth),
                  (l = A.xDivision),
                  (c = A.zeroH);
                for (
                  var S = a.group({ class: "apexcharts-datalabels" }),
                    L = 0,
                    P = i.globals.dataPoints;
                  L < i.globals.dataPoints;
                  L++, P--
                ) {
                  (this.isNullValue = !1),
                    (void 0 !== this.series[r][L] && null !== t[r][L]) ||
                      (this.isNullValue = !0),
                    i.config.stroke.show &&
                      (y = this.isNullValue
                        ? 0
                        : Array.isArray(this.strokeWidth)
                        ? this.strokeWidth[m]
                        : this.strokeWidth);
                  var z = null;
                  this.isHorizontal
                    ? (k = (z = this.drawRangeBarPaths({
                        indexes: { i: r, j: L, realIndex: m, bc: o },
                        barHeight: w,
                        strokeWidth: y,
                        pathTo: g,
                        pathFrom: f,
                        zeroW: d,
                        x: x,
                        y: b,
                        yDivision: h,
                        elSeries: v,
                      })).barWidth)
                    : (w = (z = this.drawRangeColumnPaths({
                        indexes: { i: r, j: L, realIndex: m, bc: o },
                        x: x,
                        y: b,
                        xDivision: l,
                        pathTo: g,
                        pathFrom: f,
                        barWidth: k,
                        zeroH: c,
                        strokeWidth: y,
                        elSeries: v,
                      })).barHeight),
                    (g = z.pathTo),
                    (f = z.pathFrom),
                    (b = z.y),
                    (x = z.x);
                  var E = s.fillPath({ seriesNumber: m }),
                    M = i.globals.stroke.colors[m];
                  v = this.renderSeries({
                    realIndex: m,
                    pathFill: E,
                    lineFill: M,
                    j: L,
                    i: r,
                    pathFrom: f,
                    pathTo: g,
                    strokeWidth: y,
                    elSeries: v,
                    x: x,
                    y: b,
                    series: t,
                    barHeight: w,
                    barWidth: k,
                    elDataLabelsWrap: S,
                    visibleSeries: this.visibleI,
                    type: "rangebar",
                  });
                }
                n.add(v);
              }
              return n;
            },
          },
          {
            key: "drawRangeColumnPaths",
            value: function (t) {
              var e = t.indexes,
                i = t.x,
                a = (t.y, t.strokeWidth),
                s = t.xDivision,
                n = t.pathTo,
                r = t.pathFrom,
                o = t.barWidth,
                l = t.zeroH,
                h = this.w,
                c = new p(this.ctx),
                d = e.i,
                u = e.j,
                g = this.yRatio[this.yaxisIndex],
                f = e.realIndex,
                x = this.getRangeValue(f, u),
                b = Math.min(x.start, x.end),
                m = Math.max(x.start, x.end);
              h.globals.isXNumeric &&
                (i =
                  (h.globals.seriesX[d][u] - h.globals.minX) / this.xRatio -
                  o / 2);
              var v = i + o * this.visibleI;
              void 0 === this.series[d][u] || null === this.series[d][u]
                ? (b = l)
                : ((b = l - b / g), (m = l - m / g));
              var y = Math.abs(m - b);
              return (
                c.move(v, l),
                (r = c.move(v, b)),
                h.globals.previousPaths.length > 0 &&
                  (r = this.getPathFrom(f, u, !0)),
                (n =
                  c.move(v, m) +
                  c.line(v + o, m) +
                  c.line(v + o, b) +
                  c.line(v, b) +
                  c.line(v, m - a / 2)),
                (r =
                  r +
                  c.move(v, b) +
                  c.line(v + o, b) +
                  c.line(v + o, b) +
                  c.line(v, b)),
                h.globals.isXNumeric || (i += s),
                {
                  pathTo: n,
                  pathFrom: r,
                  barHeight: y,
                  x: i,
                  y: m,
                  barXPosition: v,
                }
              );
            },
          },
          {
            key: "drawRangeBarPaths",
            value: function (t) {
              var e = t.indexes,
                i = (t.x, t.y),
                a = t.yDivision,
                s = t.pathTo,
                n = t.pathFrom,
                r = t.barHeight,
                o = t.zeroW,
                l = this.w,
                h = new p(this.ctx),
                c = e.i,
                d = e.j,
                u = e.realIndex,
                g = o,
                f = o;
              l.globals.isXNumeric &&
                (i =
                  (l.globals.seriesX[c][d] - l.globals.minX) /
                    this.invertedXRatio -
                  r);
              var x = i + r * this.visibleI;
              void 0 !== this.series[c][d] &&
                null !== this.series[c][d] &&
                ((g = o + this.seriesRangeStart[c][d] / this.invertedYRatio),
                (f = o + this.seriesRangeEnd[c][d] / this.invertedYRatio)),
                h.move(o, x),
                (n = h.move(o, x)),
                l.globals.previousPaths.length > 0 &&
                  (n = this.getPathFrom(u, d));
              var b = Math.abs(f - g);
              return (
                (s =
                  h.move(g, x) +
                  h.line(f, x) +
                  h.line(f, x + r) +
                  h.line(g, x + r) +
                  h.line(g, x)),
                (n =
                  n +
                  h.line(g, x) +
                  h.line(g, x + r) +
                  h.line(g, x + r) +
                  h.line(g, x)),
                l.globals.isXNumeric || (i += a),
                {
                  pathTo: s,
                  pathFrom: n,
                  barWidth: b,
                  x: f,
                  y: i,
                  barYPosition: x,
                }
              );
            },
          },
          {
            key: "getRangeValue",
            value: function (t, e) {
              var i = this.w;
              return {
                start: i.globals.seriesRangeStart[t][e],
                end: i.globals.seriesRangeEnd[t][e],
              };
            },
          },
        ]),
        i
      );
    })(),
    O = (function () {
      function t(i) {
        e(this, t),
          (this.ctx = i),
          (this.w = i.w),
          (this.tooltipKeyFormat = "dd MMM");
      }
      return (
        a(t, [
          {
            key: "xLabelFormat",
            value: function (t, e, i) {
              var a = this.w;
              if (
                "datetime" === a.config.xaxis.type &&
                void 0 === a.config.xaxis.labels.formatter &&
                void 0 === a.config.tooltip.x.formatter
              )
                return new v(this.ctx).formatDate(
                  new Date(e),
                  a.config.tooltip.x.format,
                  !0,
                  !0
                );
              return t(e, i);
            },
          },
          {
            key: "setLabelFormatters",
            value: function () {
              var t = this.w;
              return (
                (t.globals.xLabelFormatter = function (t) {
                  return t;
                }),
                (t.globals.xaxisTooltipFormatter = function (t) {
                  return t;
                }),
                (t.globals.ttKeyFormatter = function (t) {
                  return t;
                }),
                (t.globals.ttZFormatter = function (t) {
                  return t;
                }),
                (t.globals.legendFormatter = function (t) {
                  return t;
                }),
                void 0 !== t.config.xaxis.labels.formatter
                  ? (t.globals.xLabelFormatter =
                      t.config.xaxis.labels.formatter)
                  : (t.globals.xLabelFormatter = function (e) {
                      if (u.isNumber(e)) {
                        if (
                          "numeric" === t.config.xaxis.type &&
                          t.globals.dataPoints < 50
                        )
                          return e.toFixed(1);
                        if (t.globals.isBarHorizontal)
                          if (t.globals.maxY - t.globals.minYArr < 4)
                            return e.toFixed(1);
                        return e.toFixed(0);
                      }
                      return e;
                    }),
                "function" == typeof t.config.tooltip.x.formatter
                  ? (t.globals.ttKeyFormatter = t.config.tooltip.x.formatter)
                  : (t.globals.ttKeyFormatter = t.globals.xLabelFormatter),
                "function" == typeof t.config.xaxis.tooltip.formatter &&
                  (t.globals.xaxisTooltipFormatter =
                    t.config.xaxis.tooltip.formatter),
                Array.isArray(t.config.tooltip.y)
                  ? (t.globals.ttVal = t.config.tooltip.y)
                  : void 0 !== t.config.tooltip.y.formatter &&
                    (t.globals.ttVal = t.config.tooltip.y),
                void 0 !== t.config.tooltip.z.formatter &&
                  (t.globals.ttZFormatter = t.config.tooltip.z.formatter),
                void 0 !== t.config.legend.formatter &&
                  (t.globals.legendFormatter = t.config.legend.formatter),
                t.config.yaxis.forEach(function (e, i) {
                  void 0 !== e.labels.formatter
                    ? (t.globals.yLabelFormatters[i] = e.labels.formatter)
                    : (t.globals.yLabelFormatters[i] = function (a) {
                        return t.globals.xyCharts && u.isNumber(a)
                          ? 0 !== t.globals.yValueDecimal
                            ? a.toFixed(
                                void 0 !== e.decimalsInFloat
                                  ? e.decimalsInFloat
                                  : t.globals.yValueDecimal
                              )
                            : t.globals.maxYArr[i] - t.globals.minYArr[i] < 10
                            ? a.toFixed(1)
                            : a.toFixed(0)
                          : a;
                      });
                }),
                t.globals
              );
            },
          },
          {
            key: "heatmapLabelFormatters",
            value: function () {
              var t = this.w;
              if ("heatmap" === t.config.chart.type) {
                t.globals.yAxisScale[0].result = t.globals.seriesNames.slice();
                var e = t.globals.seriesNames.reduce(function (t, e) {
                  return t.length > e.length ? t : e;
                }, 0);
                (t.globals.yAxisScale[0].niceMax = e),
                  (t.globals.yAxisScale[0].niceMin = e);
              }
            },
          },
        ]),
        t
      );
    })(),
    N = (function () {
      function t(i) {
        e(this, t), (this.ctx = i), (this.w = i.w);
      }
      return (
        a(t, [
          {
            key: "getLabel",
            value: function (t, e, i, a) {
              var s,
                n =
                  arguments.length > 4 && void 0 !== arguments[4]
                    ? arguments[4]
                    : [],
                r = this.w,
                o = void 0 === t[a] ? "" : t[a],
                l = r.globals.xLabelFormatter,
                h = r.config.xaxis.labels.formatter,
                c = !1,
                d = o;
              (s = new O(this.ctx).xLabelFormat(l, o, d)),
                void 0 !== h && (s = h(o, t[a], a));
              var u, g;
              return (
                e.length > 0
                  ? ((u = e[a].unit),
                    (g = null),
                    e.forEach(function (t) {
                      "month" === t.unit
                        ? (g = "year")
                        : "day" === t.unit
                        ? (g = "month")
                        : "hour" === t.unit
                        ? (g = "day")
                        : "minute" === t.unit && (g = "hour");
                    }),
                    (c = g === u),
                    (i = e[a].position),
                    (s = e[a].value))
                  : "datetime" === r.config.xaxis.type &&
                    void 0 === h &&
                    (s = ""),
                void 0 === s && (s = ""),
                (0 === (s = s.toString()).indexOf("NaN") ||
                  0 === s.toLowerCase().indexOf("invalid") ||
                  s.toLowerCase().indexOf("infinity") >= 0 ||
                  (n.indexOf(s) >= 0 &&
                    !r.config.xaxis.labels.showDuplicates)) &&
                  (s = ""),
                { x: i, text: s, isBold: c }
              );
            },
          },
          {
            key: "drawYAxisTicks",
            value: function (t, e, i, a, s, n, r) {
              var o = this.w,
                l = new p(this.ctx),
                h = o.globals.translateY;
              if (a.show) {
                !0 === o.config.yaxis[s].opposite && (t += a.width);
                for (var c = e; c >= 0; c--) {
                  var d = h + e / 10 + o.config.yaxis[s].labels.offsetY - 1;
                  o.globals.isBarHorizontal && (d = n * c);
                  var u = l.drawLine(
                    t + i.offsetX - a.width + a.offsetX,
                    d + a.offsetY,
                    t + i.offsetX + a.offsetX,
                    d + a.offsetY,
                    i.color
                  );
                  r.add(u), (h += n);
                }
              }
            },
          },
        ]),
        t
      );
    })(),
    H = (function () {
      function t(i) {
        e(this, t), (this.ctx = i), (this.w = i.w);
        var a = this.w;
        (this.xaxisFontSize = a.config.xaxis.labels.style.fontSize),
          (this.axisFontFamily = a.config.xaxis.labels.style.fontFamily),
          (this.xaxisForeColors = a.config.xaxis.labels.style.colors),
          (this.xAxisoffX = 0),
          "bottom" === a.config.xaxis.position &&
            (this.xAxisoffX = a.globals.gridHeight),
          (this.drawnLabels = []),
          (this.axesUtils = new N(i));
      }
      return (
        a(t, [
          {
            key: "drawYaxis",
            value: function (t) {
              var e = this.w,
                i = new p(this.ctx),
                a = e.config.yaxis[t].labels.style.fontSize,
                s = e.config.yaxis[t].labels.style.fontFamily,
                n = i.group({
                  class: "apexcharts-yaxis",
                  rel: t,
                  transform:
                    "translate(" + e.globals.translateYAxisX[t] + ", 0)",
                });
              if (!e.config.yaxis[t].show) return n;
              var r = i.group({ class: "apexcharts-yaxis-texts-g" });
              n.add(r);
              var o = e.globals.yAxisScale[t].result.length - 1,
                l = e.globals.gridHeight / o + 0.1,
                h = e.globals.translateY,
                c = e.globals.yLabelFormatters[t],
                d = e.globals.yAxisScale[t].result.slice();
              if (
                (e.config.yaxis[t] && e.config.yaxis[t].reversed && d.reverse(),
                e.config.yaxis[t].labels.show)
              )
                for (var u = o; u >= 0; u--) {
                  var g = d[u];
                  g = c(g, u);
                  var f = e.config.yaxis[t].labels.padding;
                  e.config.yaxis[t].opposite &&
                    0 !== e.config.yaxis.length &&
                    (f *= -1);
                  var x = i.drawText({
                    x: f,
                    y: h + o / 10 + e.config.yaxis[t].labels.offsetY + 1,
                    text: g,
                    textAnchor: e.config.yaxis[t].opposite ? "start" : "end",
                    fontSize: a,
                    fontFamily: s,
                    foreColor: e.config.yaxis[t].labels.style.color,
                    cssClass:
                      "apexcharts-yaxis-label " +
                      e.config.yaxis[t].labels.style.cssClass,
                  });
                  r.add(x);
                  var b = i.rotateAroundCenter(x.node);
                  0 !== e.config.yaxis[t].labels.rotate &&
                    x.node.setAttribute(
                      "transform",
                      "rotate("
                        .concat(e.config.yaxis[t].labels.rotate, " ")
                        .concat(b.x, " ")
                        .concat(b.y, ")")
                    ),
                    (h += l);
                }
              if (void 0 !== e.config.yaxis[t].title.text) {
                var m = i.group({ class: "apexcharts-yaxis-title" }),
                  v = 0;
                e.config.yaxis[t].opposite &&
                  (v = e.globals.translateYAxisX[t]);
                var y = i.drawText({
                  x: v,
                  y:
                    e.globals.gridHeight / 2 +
                    e.globals.translateY +
                    e.config.yaxis[t].title.offsetY,
                  text: e.config.yaxis[t].title.text,
                  textAnchor: "end",
                  foreColor: e.config.yaxis[t].title.style.color,
                  fontSize: e.config.yaxis[t].title.style.fontSize,
                  fontFamily: e.config.yaxis[t].title.style.fontFamily,
                  cssClass:
                    "apexcharts-yaxis-title-text " +
                    e.config.yaxis[t].title.style.cssClass,
                });
                m.add(y), n.add(m);
              }
              var w = e.config.yaxis[t].axisBorder;
              if (w.show) {
                var k = 31 + w.offsetX;
                e.config.yaxis[t].opposite && (k = -31 - w.offsetX);
                var A = i.drawLine(
                  k,
                  e.globals.translateY + w.offsetY - 2,
                  k,
                  e.globals.gridHeight + e.globals.translateY + w.offsetY + 2,
                  w.color
                );
                n.add(A),
                  this.axesUtils.drawYAxisTicks(
                    k,
                    o,
                    w,
                    e.config.yaxis[t].axisTicks,
                    t,
                    l,
                    n
                  );
              }
              return n;
            },
          },
          {
            key: "drawYaxisInversed",
            value: function (t) {
              var e = this.w,
                i = new p(this.ctx),
                a = i.group({
                  class: "apexcharts-xaxis apexcharts-yaxis-inversed",
                }),
                s = i.group({
                  class: "apexcharts-xaxis-texts-g",
                  transform: "translate("
                    .concat(e.globals.translateXAxisX, ", ")
                    .concat(e.globals.translateXAxisY, ")"),
                });
              a.add(s);
              var n = e.globals.yAxisScale[t].result.length - 1,
                r = e.globals.gridWidth / n + 0.1,
                o = r + e.config.xaxis.labels.offsetX,
                l = e.globals.xLabelFormatter,
                h = e.globals.yAxisScale[t].result.slice(),
                c = e.globals.invertedTimelineLabels;
              c.length > 0 &&
                ((this.xaxisLabels = c.slice()), (n = (h = c.slice()).length)),
                e.config.yaxis[t] && e.config.yaxis[t].reversed && h.reverse();
              var d = c.length;
              if (e.config.xaxis.labels.show)
                for (var u = d ? 0 : n; d ? u < d - 1 : u >= 0; d ? u++ : u--) {
                  var g = h[u];
                  g = l(g, u);
                  var f =
                    e.globals.gridWidth +
                    e.globals.padHorizontal -
                    (o - r + e.config.xaxis.labels.offsetX);
                  if (c.length) {
                    var x = this.axesUtils.getLabel(
                      h,
                      c,
                      f,
                      u,
                      this.drawnLabels
                    );
                    (f = x.x), (g = x.text), this.drawnLabels.push(x.text);
                  }
                  var b = i.drawText({
                    x: f,
                    y: this.xAxisoffX + e.config.xaxis.labels.offsetY + 30,
                    text: "",
                    textAnchor: "middle",
                    foreColor: Array.isArray(this.xaxisForeColors)
                      ? this.xaxisForeColors[t]
                      : this.xaxisForeColors,
                    fontSize: this.xaxisFontSize,
                    fontFamily: this.xaxisFontFamily,
                    cssClass:
                      "apexcharts-xaxis-label " +
                      e.config.xaxis.labels.style.cssClass,
                  });
                  s.add(b), b.tspan(g);
                  var m = document.createElementNS(e.globals.SVGNS, "title");
                  (m.textContent = g), b.node.appendChild(m), (o += r);
                }
              if (void 0 !== e.config.xaxis.title.text) {
                var v = i.group({
                    class:
                      "apexcharts-xaxis-title apexcharts-yaxis-title-inversed",
                  }),
                  y = i.drawText({
                    x: e.globals.gridWidth / 2,
                    y:
                      this.xAxisoffX +
                      parseFloat(this.xaxisFontSize) +
                      parseFloat(e.config.xaxis.title.style.fontSize) +
                      20,
                    text: e.config.xaxis.title.text,
                    textAnchor: "middle",
                    fontSize: e.config.xaxis.title.style.fontSize,
                    fontFamily: e.config.xaxis.title.style.fontFamily,
                    cssClass:
                      "apexcharts-xaxis-title-text " +
                      e.config.xaxis.title.style.cssClass,
                  });
                v.add(y), a.add(v);
              }
              var w = e.config.yaxis[t].axisBorder;
              if (w.show) {
                var k = i.drawLine(
                  e.globals.padHorizontal + w.offsetX,
                  1 + w.offsetY,
                  e.globals.padHorizontal + w.offsetX,
                  e.globals.gridHeight + w.offsetY,
                  w.color
                );
                a.add(k);
              }
              return a;
            },
          },
          {
            key: "yAxisTitleRotate",
            value: function (t, e) {
              var i = this.w,
                a = new p(this.ctx),
                s = { width: 0, height: 0 },
                n = { width: 0, height: 0 },
                r = i.globals.dom.baseEl.querySelector(
                  " .apexcharts-yaxis[rel='".concat(
                    t,
                    "'] .apexcharts-yaxis-texts-g"
                  )
                );
              null !== r && (s = r.getBoundingClientRect());
              var o = i.globals.dom.baseEl.querySelector(
                ".apexcharts-yaxis[rel='".concat(
                  t,
                  "'] .apexcharts-yaxis-title text"
                )
              );
              if ((null !== o && (n = o.getBoundingClientRect()), null !== o)) {
                var l = this.xPaddingForYAxisTitle(t, s, n, e);
                o.setAttribute("x", l.xPos - (e ? 10 : 0));
              }
              if (null !== o) {
                var h = a.rotateAroundCenter(o);
                e
                  ? o.setAttribute(
                      "transform",
                      "rotate("
                        .concat(i.config.yaxis[t].title.rotate, " ")
                        .concat(h.x, " ")
                        .concat(h.y, ")")
                    )
                  : o.setAttribute(
                      "transform",
                      "rotate(-"
                        .concat(i.config.yaxis[t].title.rotate, " ")
                        .concat(h.x, " ")
                        .concat(h.y, ")")
                    );
              }
            },
          },
          {
            key: "xPaddingForYAxisTitle",
            value: function (t, e, i, a) {
              var s = this.w,
                n = 0,
                r = 0,
                o = 10;
              return void 0 === s.config.yaxis[t].title.text || t < 0
                ? { xPos: r, padd: 0 }
                : (a
                    ? ((r =
                        e.width +
                        s.config.yaxis[t].title.offsetX +
                        i.width / 2 +
                        o / 2),
                      0 === (n += 1) && (r -= o / 2))
                    : ((r =
                        -1 * e.width +
                        s.config.yaxis[t].title.offsetX +
                        o / 2 +
                        i.width / 2),
                      s.globals.isBarHorizontal &&
                        ((o = 25),
                        (r =
                          -1 * e.width - s.config.yaxis[t].title.offsetX - o))),
                  { xPos: r, padd: o });
            },
          },
          {
            key: "setYAxisXPosition",
            value: function (t, e) {
              var i = this.w,
                a = 0,
                s = 0,
                n = 21,
                r = 1;
              i.config.yaxis.length > 1 && (this.multipleYs = !0),
                i.config.yaxis.map(function (o, l) {
                  var h =
                      i.globals.ignoreYAxisIndexes.indexOf(l) > -1 ||
                      !o.show ||
                      o.floating ||
                      0 === t[l].width,
                    c = t[l].width + e[l].width;
                  o.opposite
                    ? i.globals.isBarHorizontal
                      ? ((s = i.globals.gridWidth + i.globals.translateX - 1),
                        (i.globals.translateYAxisX[l] = s - o.labels.offsetX))
                      : ((s = i.globals.gridWidth + i.globals.translateX + r),
                        h || (r = r + c + 20),
                        (i.globals.translateYAxisX[l] =
                          s - o.labels.offsetX + 20))
                    : ((a = i.globals.translateX - n),
                      h || (n = n + c + 20),
                      (i.globals.translateYAxisX[l] = a + o.labels.offsetX));
                });
            },
          },
          {
            key: "setYAxisTextAlignments",
            value: function () {
              var t = this.w,
                e = t.globals.dom.baseEl.querySelectorAll(".apexcharts-yaxis");
              (e = u.listToArray(e)).forEach(function (e, i) {
                var a = t.config.yaxis[i];
                if (void 0 !== a.labels.align) {
                  var s = t.globals.dom.baseEl.querySelector(
                      ".apexcharts-yaxis[rel='".concat(
                        i,
                        "'] .apexcharts-yaxis-texts-g"
                      )
                    ),
                    n = t.globals.dom.baseEl.querySelectorAll(
                      ".apexcharts-yaxis[rel='".concat(
                        i,
                        "'] .apexcharts-yaxis-label"
                      )
                    );
                  n = u.listToArray(n);
                  var r = s.getBoundingClientRect();
                  "left" === a.labels.align
                    ? (n.forEach(function (t, e) {
                        t.setAttribute("text-anchor", "start");
                      }),
                      a.opposite ||
                        s.setAttribute(
                          "transform",
                          "translate(-".concat(r.width, ", 0)")
                        ))
                    : "center" === a.labels.align
                    ? (n.forEach(function (t, e) {
                        t.setAttribute("text-anchor", "middle");
                      }),
                      s.setAttribute(
                        "transform",
                        "translate(".concat(
                          (r.width / 2) * (a.opposite ? 1 : -1),
                          ", 0)"
                        )
                      ))
                    : "right" === a.labels.align &&
                      (n.forEach(function (t, e) {
                        t.setAttribute("text-anchor", "end");
                      }),
                      a.opposite &&
                        s.setAttribute(
                          "transform",
                          "translate(".concat(r.width, ", 0)")
                        ));
                }
              });
            },
          },
        ]),
        t
      );
    })(),
    W = (function () {
      function t(i) {
        e(this, t),
          (this.ctx = i),
          (this.w = i.w),
          (this.lgRect = {}),
          (this.yAxisWidth = 0),
          (this.xAxisHeight = 0),
          (this.isSparkline = this.w.config.chart.sparkline.enabled),
          (this.xPadRight = 0),
          (this.xPadLeft = 0);
      }
      return (
        a(t, [
          {
            key: "plotCoords",
            value: function () {
              var t = this.w,
                e = t.globals,
                i = this.getLegendsRect();
              e.axisCharts
                ? this.setGridCoordsForAxisCharts(i)
                : this.setGridCoordsForNonAxisCharts(i),
                this.titleSubtitleOffset(),
                (e.gridHeight =
                  e.gridHeight -
                  t.config.grid.padding.top -
                  t.config.grid.padding.bottom),
                (e.gridWidth =
                  e.gridWidth -
                  t.config.grid.padding.left -
                  t.config.grid.padding.right -
                  this.xPadRight -
                  this.xPadLeft),
                (e.translateX =
                  e.translateX + t.config.grid.padding.left + this.xPadLeft),
                (e.translateY = e.translateY + t.config.grid.padding.top);
            },
          },
          {
            key: "conditionalChecksForAxisCoords",
            value: function (t, e) {
              var i = this.w;
              (this.xAxisHeight =
                (t.height + e.height) * i.globals.LINE_HEIGHT_RATIO + 15),
                (this.xAxisWidth = t.width),
                this.xAxisHeight - e.height > i.config.xaxis.labels.maxHeight &&
                  (this.xAxisHeight = i.config.xaxis.labels.maxHeight),
                i.config.xaxis.labels.minHeight &&
                  this.xAxisHeight < i.config.xaxis.labels.minHeight &&
                  (this.xAxisHeight = i.config.xaxis.labels.minHeight),
                i.config.xaxis.floating && (this.xAxisHeight = 0),
                i.globals.isBarHorizontal
                  ? (this.yAxisWidth =
                      i.globals.yLabelsCoords[0].width +
                      i.globals.yTitleCoords[0].width +
                      15)
                  : (this.yAxisWidth = this.getTotalYAxisWidth());
              var a = 0,
                s = 0;
              i.config.yaxis.forEach(function (t) {
                (a += t.labels.minWidth), (s += t.labels.maxWidth);
              }),
                this.yAxisWidth < a && (this.yAxisWidth = a),
                this.yAxisWidth > s && (this.yAxisWidth = s);
            },
          },
          {
            key: "setGridCoordsForAxisCharts",
            value: function (t) {
              var e = this.w,
                i = e.globals,
                a = this.getyAxisLabelsCoords(),
                s = this.getxAxisLabelsCoords(),
                n = this.getyAxisTitleCoords(),
                r = this.getxAxisTitleCoords();
              (e.globals.yLabelsCoords = []),
                (e.globals.yTitleCoords = []),
                e.config.yaxis.map(function (t, i) {
                  e.globals.yLabelsCoords.push({ width: a[i].width, index: i }),
                    e.globals.yTitleCoords.push({
                      width: n[i].width,
                      index: i,
                    });
                }),
                this.conditionalChecksForAxisCoords(s, r),
                (i.translateXAxisY = e.globals.rotateXLabels
                  ? this.xAxisHeight / 8
                  : -4),
                (i.translateXAxisX =
                  e.globals.rotateXLabels &&
                  e.globals.isXNumeric &&
                  e.config.xaxis.labels.rotate <= -45
                    ? -this.xAxisWidth / 4
                    : 0),
                e.globals.isBarHorizontal &&
                  ((i.rotateXLabels = !1),
                  (i.translateXAxisY =
                    (parseInt(e.config.xaxis.labels.style.fontSize) / 1.5) *
                    -1)),
                (i.translateXAxisY =
                  i.translateXAxisY + e.config.xaxis.labels.offsetY),
                (i.translateXAxisX =
                  i.translateXAxisX + e.config.xaxis.labels.offsetX);
              var o = this.yAxisWidth,
                l = this.xAxisHeight;
              (i.xAxisLabelsHeight = this.xAxisHeight),
                (i.xAxisHeight = this.xAxisHeight);
              var h = 10;
              switch (
                ((e.config.grid.show && "radar" !== e.config.chart.type) ||
                  ((o = 0), (l = 35)),
                this.isSparkline &&
                  ((t = { height: 0, width: 0 }), (l = 0), (o = 0), (h = 0)),
                this.additionalPaddingXLabels(s),
                e.config.legend.position)
              ) {
                case "bottom":
                  (i.translateY = h),
                    (i.translateX = o),
                    (i.gridHeight =
                      i.svgHeight -
                      t.height -
                      l -
                      (this.isSparkline
                        ? 0
                        : e.globals.rotateXLabels
                        ? 10
                        : 15)),
                    (i.gridWidth = i.svgWidth - o);
                  break;
                case "top":
                  (i.translateY = t.height + h),
                    (i.translateX = o),
                    (i.gridHeight =
                      i.svgHeight -
                      t.height -
                      l -
                      (this.isSparkline
                        ? 0
                        : e.globals.rotateXLabels
                        ? 10
                        : 15)),
                    (i.gridWidth = i.svgWidth - o);
                  break;
                case "left":
                  (i.translateY = h),
                    (i.translateX = t.width + o),
                    (i.gridHeight = i.svgHeight - l - 12),
                    (i.gridWidth = i.svgWidth - t.width - o);
                  break;
                case "right":
                  (i.translateY = h),
                    (i.translateX = o),
                    (i.gridHeight = i.svgHeight - l - 12),
                    (i.gridWidth = i.svgWidth - t.width - o - 5);
                  break;
                default:
                  throw new Error("Legend position not supported");
              }
              this.setGridXPosForDualYAxis(n, a),
                new H(this.ctx).setYAxisXPosition(a, n);
            },
          },
          {
            key: "setGridCoordsForNonAxisCharts",
            value: function (t) {
              var e = this.w,
                i = e.globals,
                a = 0;
              e.config.legend.show && !e.config.legend.floating && (a = 20);
              var s = 10,
                n = 0;
              if (
                ("pie" === e.config.chart.type ||
                "donut" === e.config.chart.type
                  ? ((s += e.config.plotOptions.pie.offsetY),
                    (n += e.config.plotOptions.pie.offsetX))
                  : "radialBar" === e.config.chart.type &&
                    ((s += e.config.plotOptions.radialBar.offsetY),
                    (n += e.config.plotOptions.radialBar.offsetX)),
                !e.config.legend.show)
              )
                return (
                  (i.gridHeight = i.svgHeight - 35),
                  (i.gridWidth = i.gridHeight),
                  (i.translateY = s - 10),
                  void (i.translateX = n + (i.svgWidth - i.gridWidth) / 2)
                );
              switch (e.config.legend.position) {
                case "bottom":
                  (i.gridHeight = i.svgHeight - t.height - 35),
                    (i.gridWidth = i.gridHeight),
                    (i.translateY = s - 20),
                    (i.translateX = n + (i.svgWidth - i.gridWidth) / 2);
                  break;
                case "top":
                  (i.gridHeight = i.svgHeight - t.height - 35),
                    (i.gridWidth = i.gridHeight),
                    (i.translateY = t.height + s + 10),
                    (i.translateX = n + (i.svgWidth - i.gridWidth) / 2);
                  break;
                case "left":
                  (i.gridWidth = i.svgWidth - t.width - a),
                    (i.gridHeight = i.gridWidth),
                    (i.translateY = s),
                    (i.translateX = n + t.width + a);
                  break;
                case "right":
                  (i.gridWidth = i.svgWidth - t.width - a - 5),
                    (i.gridHeight = i.gridWidth),
                    (i.translateY = s),
                    (i.translateX = n + 10);
                  break;
                default:
                  throw new Error("Legend position not supported");
              }
            },
          },
          {
            key: "setGridXPosForDualYAxis",
            value: function (t, e) {
              var i = this.w;
              i.config.yaxis.map(function (a, s) {
                -1 === i.globals.ignoreYAxisIndexes.indexOf(s) &&
                  !i.config.yaxis[s].floating &&
                  i.config.yaxis[s].show &&
                  a.opposite &&
                  (i.globals.translateX =
                    i.globals.translateX -
                    (e[s].width + t[s].width) -
                    parseInt(i.config.yaxis[s].labels.style.fontSize) / 1.2 -
                    12);
              });
            },
          },
          {
            key: "additionalPaddingXLabels",
            value: function (t) {
              var e = this,
                i = this.w;
              if (
                ("category" === i.config.xaxis.type &&
                  i.globals.isBarHorizontal) ||
                "numeric" === i.config.xaxis.type ||
                "datetime" === i.config.xaxis.type
              ) {
                var a = i.globals.isXNumeric;
                i.config.yaxis.forEach(function (s, n) {
                  var r;
                  (!s.show ||
                    s.floating ||
                    -1 !== i.globals.collapsedSeriesIndices.indexOf(n) ||
                    a ||
                    (s.opposite && i.globals.isBarHorizontal)) &&
                    (((a &&
                      i.globals.isMultipleYAxis &&
                      -1 !== i.globals.collapsedSeriesIndices.indexOf(n)) ||
                      (i.globals.isBarHorizontal && s.opposite)) &&
                      ((r = t),
                      i.config.grid.padding.left < r.width &&
                        (e.xPadLeft = r.width / 2 + 1)),
                    ((!i.globals.isBarHorizontal &&
                      s.opposite &&
                      -1 !== i.globals.collapsedSeriesIndices.indexOf(n)) ||
                      (a && !i.globals.isMultipleYAxis)) &&
                      (function (t) {
                        e.timescaleLabels
                          ? e.timescaleLabels[e.timescaleLabels.length - 1]
                              .position +
                              t.width >
                            i.globals.gridWidth
                            ? (i.globals.skipLastTimelinelabel = !0)
                            : (i.globals.skipLastTimelinelabel = !1)
                          : "datetime" === i.config.xaxis.type
                          ? i.config.grid.padding.right < t.width &&
                            (i.globals.skipLastTimelinelabel = !0)
                          : "datetime" !== i.config.xaxis.type &&
                            i.config.grid.padding.right < t.width &&
                            (e.xPadRight = t.width / 2 + 1);
                      })(t));
                });
              }
              i.globals.isBarHorizontal && (this.xPadRight = t.width / 2 + 1);
            },
          },
          {
            key: "titleSubtitleOffset",
            value: function () {
              var t = this.w,
                e = t.globals,
                i = this.isSparkline || !t.globals.axisCharts ? 0 : 10;
              void 0 !== t.config.title.text
                ? (i += t.config.title.margin)
                : (i += this.isSparkline || !t.globals.axisCharts ? 0 : 5),
                void 0 !== t.config.subtitle.text
                  ? (i += t.config.subtitle.margin)
                  : (i += this.isSparkline || !t.globals.axisCharts ? 0 : 5),
                t.config.legend.show &&
                  "bottom" === t.config.legend.position &&
                  !t.config.legend.floating &&
                  (t.config.series.length > 1 ||
                    !t.globals.axisCharts ||
                    t.config.legend.showForSingleSeries) &&
                  (i += 10);
              var a = this.getTitleSubtitleCoords("title"),
                s = this.getTitleSubtitleCoords("subtitle");
              (e.gridHeight = e.gridHeight - a.height - s.height - i),
                (e.translateY = e.translateY + a.height + s.height + i);
            },
          },
          {
            key: "getTotalYAxisWidth",
            value: function () {
              var t = this.w,
                e = 0,
                i = 10,
                a = function (e) {
                  return t.globals.ignoreYAxisIndexes.indexOf(e) > -1;
                };
              return (
                t.globals.yLabelsCoords.map(function (s, n) {
                  var r = t.config.yaxis[n].floating;
                  s.width > 0 && !r
                    ? ((e = e + s.width + i), a(n) && (e = e - s.width - i))
                    : (e += r || !t.config.yaxis[n].show ? 0 : 5);
                }),
                t.globals.yTitleCoords.map(function (s, n) {
                  var r = t.config.yaxis[n].floating;
                  (i = parseInt(t.config.yaxis[n].title.style.fontSize)),
                    s.width > 0 && !r
                      ? ((e = e + s.width + i), a(n) && (e = e - s.width - i))
                      : (e += r || !t.config.yaxis[n].show ? 0 : 5);
                }),
                e
              );
            },
          },
          {
            key: "getxAxisTimeScaleLabelsCoords",
            value: function () {
              var t,
                e = this.w;
              (this.timescaleLabels = e.globals.timelineLabels.slice()),
                e.globals.isBarHorizontal &&
                  "datetime" === e.config.xaxis.type &&
                  (this.timescaleLabels =
                    e.globals.invertedTimelineLabels.slice());
              var i = this.timescaleLabels.map(function (t) {
                  return t.value;
                }),
                a = i.reduce(function (t, e) {
                  return void 0 === t
                    ? (console.error(
                        "You have possibly supplied invalid Date format. Please supply a valid JavaScript Date"
                      ),
                      0)
                    : t.length > e.length
                    ? t
                    : e;
                }, 0);
              return (
                1.05 *
                  (t = new p(this.ctx).getTextRects(
                    a,
                    e.config.xaxis.labels.style.fontSize
                  )).width *
                  i.length >
                  e.globals.gridWidth &&
                  0 !== e.config.xaxis.labels.rotate &&
                  (e.globals.overlappingXLabels = !0),
                t
              );
            },
          },
          {
            key: "getxAxisLabelsCoords",
            value: function () {
              var t,
                e = this.w,
                i = e.globals.labels.slice();
              if (e.globals.timelineLabels.length > 0) {
                var a = this.getxAxisTimeScaleLabelsCoords();
                t = { width: a.width, height: a.height };
              } else {
                var s =
                    "left" !== e.config.legend.position ||
                    "right" !== e.config.legend.position ||
                    e.config.legend.floating
                      ? 0
                      : this.lgRect.width,
                  n = e.globals.xLabelFormatter,
                  r = i.reduce(function (t, e) {
                    return t.length > e.length ? t : e;
                  }, 0);
                e.globals.isBarHorizontal &&
                  (r = e.globals.yAxisScale[0].result.reduce(function (t, e) {
                    return t.length > e.length ? t : e;
                  }, 0));
                var o = r;
                r = new O(this.ctx).xLabelFormat(n, r, o);
                var l = new p(this.ctx),
                  h = l.getTextRects(r, e.config.xaxis.labels.style.fontSize);
                (t = { width: h.width, height: h.height }).width * i.length >
                  e.globals.svgWidth - s - this.yAxisWidth &&
                0 !== e.config.xaxis.labels.rotate
                  ? e.globals.isBarHorizontal ||
                    ((e.globals.rotateXLabels = !0),
                    (h = l.getTextRects(
                      r,
                      e.config.xaxis.labels.style.fontSize,
                      e.config.xaxis.labels.style.fontFamily,
                      "rotate(".concat(e.config.xaxis.labels.rotate, " 0 0)"),
                      !1
                    )),
                    (t.height = h.height / 1.66))
                  : (e.globals.rotateXLabels = !1);
              }
              return (
                e.config.xaxis.labels.show || (t = { width: 0, height: 0 }),
                { width: t.width, height: t.height }
              );
            },
          },
          {
            key: "getyAxisLabelsCoords",
            value: function () {
              var t = this,
                e = this.w,
                i = [],
                a = 10;
              return (
                e.config.yaxis.map(function (s, n) {
                  if (
                    s.show &&
                    s.labels.show &&
                    e.globals.yAxisScale[n].result.length
                  ) {
                    var r = e.globals.yLabelFormatters[n],
                      o = r(e.globals.yAxisScale[n].niceMax, {
                        seriesIndex: n,
                        dataPointIndex: -1,
                        w: e,
                      });
                    if (
                      ((void 0 !== o && 0 !== o.length) ||
                        (o = e.globals.yAxisScale[n].niceMax),
                      e.globals.isBarHorizontal)
                    )
                      (a = 0),
                        (o = r(
                          (o = e.globals.labels.slice().reduce(function (t, e) {
                            return t.length > e.length ? t : e;
                          }, 0)),
                          { seriesIndex: n, dataPointIndex: -1, w: e }
                        ));
                    var l = new p(t.ctx).getTextRects(
                      o,
                      s.labels.style.fontSize
                    );
                    i.push({ width: l.width + a, height: l.height });
                  } else i.push({ width: 0, height: 0 });
                }),
                i
              );
            },
          },
          {
            key: "getxAxisTitleCoords",
            value: function () {
              var t = this.w,
                e = 0,
                i = 0;
              if (void 0 !== t.config.xaxis.title.text) {
                var a = new p(this.ctx).getTextRects(
                  t.config.xaxis.title.text,
                  t.config.xaxis.title.style.fontSize
                );
                (e = a.width), (i = a.height);
              }
              return { width: e, height: i };
            },
          },
          {
            key: "getyAxisTitleCoords",
            value: function () {
              var t = this,
                e = this.w,
                i = [];
              return (
                e.config.yaxis.map(function (e, a) {
                  if (e.show && void 0 !== e.title.text) {
                    var s = new p(t.ctx).getTextRects(
                      e.title.text,
                      e.title.style.fontSize,
                      e.title.style.fontFamily,
                      "rotate(-90 0 0)",
                      !1
                    );
                    i.push({ width: s.width, height: s.height });
                  } else i.push({ width: 0, height: 0 });
                }),
                i
              );
            },
          },
          {
            key: "getTitleSubtitleCoords",
            value: function (t) {
              var e = this.w,
                i = 0,
                a = 0,
                s =
                  "title" === t
                    ? e.config.title.floating
                    : e.config.subtitle.floating,
                n = e.globals.dom.baseEl.querySelector(
                  ".apexcharts-".concat(t, "-text")
                );
              if (null !== n && !s) {
                var r = n.getBoundingClientRect();
                (i = r.width),
                  (a = e.globals.axisCharts ? r.height + 5 : r.height);
              }
              return { width: i, height: a };
            },
          },
          {
            key: "getLegendsRect",
            value: function () {
              var t = this.w,
                e = t.globals.dom.baseEl.querySelector(".apexcharts-legend"),
                i = Object.assign({}, u.getBoundingClientRect(e));
              return (
                null !== e && !t.config.legend.floating && t.config.legend.show
                  ? (this.lgRect = {
                      x: i.x,
                      y: i.y,
                      height: i.height,
                      width: 0 === i.height ? 0 : i.width,
                    })
                  : (this.lgRect = { x: 0, y: 0, height: 0, width: 0 }),
                this.lgRect
              );
            },
          },
        ]),
        t
      );
    })(),
    B = (function () {
      function t(i) {
        e(this, t), (this.ctx = i), (this.w = i.w);
      }
      return (
        a(t, [
          {
            key: "getAllSeriesEls",
            value: function () {
              return this.w.globals.dom.baseEl.querySelectorAll(
                ".apexcharts-series"
              );
            },
          },
          {
            key: "getSeriesByName",
            value: function (t) {
              return this.w.globals.dom.baseEl.querySelector(
                "[seriesName='".concat(u.escapeString(t), "']")
              );
            },
          },
          {
            key: "isSeriesHidden",
            value: function (t) {
              var e = this.getSeriesByName(t),
                i = parseInt(e.getAttribute("data:realIndex"));
              return {
                isHidden: e.classList.contains("apexcharts-series-collapsed"),
                realIndex: i,
              };
            },
          },
          {
            key: "addCollapsedClassToSeries",
            value: function (t, e) {
              var i = this.w;
              function a(i) {
                for (var a = 0; a < i.length; a++)
                  i[a].index === e &&
                    t.node.classList.add("apexcharts-series-collapsed");
              }
              a(i.globals.collapsedSeries),
                a(i.globals.ancillaryCollapsedSeries);
            },
          },
          {
            key: "resetSeries",
            value: function () {
              var t =
                  !(arguments.length > 0 && void 0 !== arguments[0]) ||
                  arguments[0],
                e = this.w,
                i = e.globals.initialSeries.slice();
              (e.config.series = i),
                (e.globals.collapsedSeries = []),
                (e.globals.ancillaryCollapsedSeries = []),
                (e.globals.collapsedSeriesIndices = []),
                (e.globals.ancillaryCollapsedSeriesIndices = []),
                (e.globals.previousPaths = []),
                t &&
                  this.ctx._updateSeries(
                    i,
                    e.config.chart.animations.dynamicAnimation.enabled
                  );
            },
          },
          {
            key: "toggleSeriesOnHover",
            value: function (t, e) {
              var i = this.w,
                a = i.globals.dom.baseEl.querySelectorAll(".apexcharts-series");
              if ("mousemove" === t.type) {
                var s = parseInt(e.getAttribute("rel")) - 1,
                  n = null;
                n =
                  i.globals.axisCharts || "radialBar" === i.config.chart.type
                    ? i.globals.axisCharts
                      ? i.globals.dom.baseEl.querySelector(
                          ".apexcharts-series[data\\:realIndex='".concat(
                            s,
                            "']"
                          )
                        )
                      : i.globals.dom.baseEl.querySelector(
                          ".apexcharts-series[rel='".concat(s + 1, "']")
                        )
                    : i.globals.dom.baseEl.querySelector(
                        ".apexcharts-series[rel='".concat(s + 1, "'] path")
                      );
                for (var r = 0; r < a.length; r++)
                  a[r].classList.add("legend-mouseover-inactive");
                null !== n &&
                  (i.globals.axisCharts ||
                    n.parentNode.classList.remove("legend-mouseover-inactive"),
                  n.classList.remove("legend-mouseover-inactive"));
              } else if ("mouseout" === t.type)
                for (var o = 0; o < a.length; o++)
                  a[o].classList.remove("legend-mouseover-inactive");
            },
          },
          {
            key: "highlightRangeInSeries",
            value: function (t, e) {
              var i = this.w,
                a = i.globals.dom.baseEl.querySelectorAll(
                  ".apexcharts-heatmap-rect"
                ),
                s = function () {
                  for (var t = 0; t < a.length; t++)
                    a[t].classList.remove("legend-mouseover-inactive");
                };
              if ("mousemove" === t.type) {
                var n = parseInt(e.getAttribute("rel")) - 1;
                s(),
                  (function () {
                    for (var t = 0; t < a.length; t++)
                      a[t].classList.add("legend-mouseover-inactive");
                  })(),
                  (function (t) {
                    for (var e = 0; e < a.length; e++) {
                      var i = parseInt(a[e].getAttribute("val"));
                      i >= t.from &&
                        i <= t.to &&
                        a[e].classList.remove("legend-mouseover-inactive");
                    }
                  })(i.config.plotOptions.heatmap.colorScale.ranges[n]);
              } else "mouseout" === t.type && s();
            },
          },
          {
            key: "getActiveSeriesIndex",
            value: function () {
              var t = this.w,
                e = 0;
              if (t.globals.series.length > 1)
                for (
                  var i = t.globals.series.map(function (e, i) {
                      return e.length > 0 &&
                        "bar" !== t.config.series[i].type &&
                        "column" !== t.config.series[i].type
                        ? i
                        : -1;
                    }),
                    a = 0;
                  a < i.length;
                  a++
                )
                  if (-1 !== i[a]) {
                    e = i[a];
                    break;
                  }
              return e;
            },
          },
          {
            key: "getActiveConfigSeriesIndex",
            value: function () {
              var t = this.w,
                e = 0;
              if (t.config.series.length > 1)
                for (
                  var i = t.config.series.map(function (t, e) {
                      return t.data && t.data.length > 0 ? e : -1;
                    }),
                    a = 0;
                  a < i.length;
                  a++
                )
                  if (-1 !== i[a]) {
                    e = i[a];
                    break;
                  }
              return e;
            },
          },
          {
            key: "getPreviousPaths",
            value: function () {
              var t = this.w;
              function e(e, i, a) {
                for (
                  var s = e[i].childNodes,
                    n = {
                      type: a,
                      paths: [],
                      realIndex: e[i].getAttribute("data:realIndex"),
                    },
                    r = 0;
                  r < s.length;
                  r++
                )
                  if (s[r].hasAttribute("pathTo")) {
                    var o = s[r].getAttribute("pathTo");
                    n.paths.push({ d: o });
                  }
                t.globals.previousPaths.push(n);
              }
              t.globals.previousPaths = [];
              var i = t.globals.dom.baseEl.querySelectorAll(
                ".apexcharts-line-series .apexcharts-series"
              );
              if (i.length > 0)
                for (var a = i.length - 1; a >= 0; a--) e(i, a, "line");
              var s = t.globals.dom.baseEl.querySelectorAll(
                ".apexcharts-area-series .apexcharts-series"
              );
              if (s.length > 0)
                for (var n = s.length - 1; n >= 0; n--) e(s, n, "area");
              var r = t.globals.dom.baseEl.querySelectorAll(
                ".apexcharts-bar-series .apexcharts-series"
              );
              if (r.length > 0)
                for (var o = 0; o < r.length; o++) e(r, o, "bar");
              var l = t.globals.dom.baseEl.querySelectorAll(
                ".apexcharts-candlestick-series .apexcharts-series"
              );
              if (l.length > 0)
                for (var h = 0; h < l.length; h++) e(l, h, "candlestick");
              var c = t.globals.dom.baseEl.querySelectorAll(
                ".apexcharts-radar-series .apexcharts-series"
              );
              if (c.length > 0)
                for (var d = 0; d < c.length; d++) e(c, d, "radar");
              var u = t.globals.dom.baseEl.querySelectorAll(
                ".apexcharts-bubble-series .apexcharts-series"
              );
              if (u.length > 0)
                for (var g = 0; g < u.length; g++) {
                  for (
                    var f = t.globals.dom.baseEl.querySelectorAll(
                        ".apexcharts-bubble-series .apexcharts-series[data\\:realIndex='".concat(
                          g,
                          "'] circle"
                        )
                      ),
                      p = [],
                      x = 0;
                    x < f.length;
                    x++
                  )
                    p.push({
                      x: f[x].getAttribute("cx"),
                      y: f[x].getAttribute("cy"),
                      r: f[x].getAttribute("r"),
                    });
                  t.globals.previousPaths.push(p);
                }
              var b = t.globals.dom.baseEl.querySelectorAll(
                ".apexcharts-scatter-series .apexcharts-series"
              );
              if (b.length > 0)
                for (var m = 0; m < b.length; m++) {
                  for (
                    var v = t.globals.dom.baseEl.querySelectorAll(
                        ".apexcharts-scatter-series .apexcharts-series[data\\:realIndex='".concat(
                          m,
                          "'] circle"
                        )
                      ),
                      y = [],
                      w = 0;
                    w < v.length;
                    w++
                  )
                    y.push({
                      x: v[w].getAttribute("cx"),
                      y: v[w].getAttribute("cy"),
                      r: v[w].getAttribute("r"),
                    });
                  t.globals.previousPaths.push(y);
                }
              var k = t.globals.dom.baseEl.querySelectorAll(
                ".apexcharts-heatmap .apexcharts-series"
              );
              if (k.length > 0)
                for (var A = 0; A < k.length; A++) {
                  for (
                    var S = t.globals.dom.baseEl.querySelectorAll(
                        ".apexcharts-heatmap .apexcharts-series[data\\:realIndex='".concat(
                          A,
                          "'] rect"
                        )
                      ),
                      C = [],
                      L = 0;
                    L < S.length;
                    L++
                  )
                    C.push({ color: S[L].getAttribute("color") });
                  t.globals.previousPaths.push(C);
                }
              t.globals.axisCharts ||
                (t.globals.previousPaths = t.globals.series);
            },
          },
          {
            key: "handleNoData",
            value: function () {
              var t = this.w,
                e = t.config.noData,
                i = new p(this.ctx),
                a = t.globals.svgWidth / 2,
                s = t.globals.svgHeight / 2,
                n = "middle";
              if (
                ((t.globals.noData = !0),
                (t.globals.animationEnded = !0),
                "left" === e.align
                  ? ((a = 10), (n = "start"))
                  : "right" === e.align &&
                    ((a = t.globals.svgWidth - 10), (n = "end")),
                "top" === e.verticalAlign
                  ? (s = 50)
                  : "bottom" === e.verticalAlign &&
                    (s = t.globals.svgHeight - 50),
                (a += e.offsetX),
                (s = s + parseInt(e.style.fontSize) + 2),
                void 0 !== e.text && "" !== e.text)
              ) {
                var r = i.drawText({
                  x: a,
                  y: s,
                  text: e.text,
                  textAnchor: n,
                  fontSize: e.style.fontSize,
                  fontFamily: e.style.fontFamily,
                  foreColor: e.style.color,
                  opacity: 1,
                  class: "apexcharts-text-nodata",
                });
                r.node.setAttribute("class", "apexcharts-title-text"),
                  t.globals.dom.Paper.add(r);
              }
            },
          },
          {
            key: "setNullSeriesToZeroValues",
            value: function (t) {
              for (var e = this.w, i = 0; i < t.length; i++)
                if (0 === t[i].length)
                  for (
                    var a = 0;
                    a < t[e.globals.maxValsInArrayIndex].length;
                    a++
                  )
                    t[i].push(0);
              return t;
            },
          },
          {
            key: "hasAllSeriesEqualX",
            value: function () {
              for (
                var t = !0, e = this.w, i = this.filteredSeriesX(), a = 0;
                a < i.length - 1;
                a++
              )
                if (i[a][0] !== i[a + 1][0]) {
                  t = !1;
                  break;
                }
              return (e.globals.allSeriesHasEqualX = t), t;
            },
          },
          {
            key: "filteredSeriesX",
            value: function () {
              var t = this.w.globals.seriesX.map(function (t, e) {
                return t.length > 0 ? t : [];
              });
              return t;
            },
          },
        ]),
        t
      );
    })(),
    V = (function () {
      function t(i, a) {
        e(this, t),
          (this.ctx = i),
          (this.w = i.w),
          (this.onLegendClick = this.onLegendClick.bind(this)),
          (this.onLegendHovered = this.onLegendHovered.bind(this));
      }
      return (
        a(t, [
          {
            key: "init",
            value: function () {
              var t = this.w,
                e = t.globals,
                i = t.config;
              if (
                ((i.legend.showForSingleSeries && 1 === e.series.length) ||
                  e.series.length > 1 ||
                  !e.axisCharts) &&
                i.legend.show
              ) {
                for (; e.dom.elLegendWrap.firstChild; )
                  e.dom.elLegendWrap.removeChild(e.dom.elLegendWrap.firstChild);
                this.drawLegends(),
                  u.isIE11()
                    ? document
                        .getElementsByTagName("head")[0]
                        .appendChild(this.getLegendStyles())
                    : this.appendToForeignObject(),
                  "bottom" === i.legend.position || "top" === i.legend.position
                    ? this.legendAlignHorizontal()
                    : ("right" !== i.legend.position &&
                        "left" !== i.legend.position) ||
                      this.legendAlignVertical();
              }
            },
          },
          {
            key: "getLegendStyles",
            value: function () {
              var t = document.createElement("style");
              t.setAttribute("type", "text/css");
              var e = document.createTextNode(
                "\t\n    \t\n      .apexcharts-legend {\t\n        display: flex;\t\n        overflow: auto;\t\n        padding: 0 10px;\t\n      }\t\n      .apexcharts-legend.position-bottom, .apexcharts-legend.position-top {\t\n        flex-wrap: wrap\t\n      }\t\n      .apexcharts-legend.position-right, .apexcharts-legend.position-left {\t\n        flex-direction: column;\t\n        bottom: 0;\t\n      }\t\n      .apexcharts-legend.position-bottom.left, .apexcharts-legend.position-top.left, .apexcharts-legend.position-right, .apexcharts-legend.position-left {\t\n        justify-content: flex-start;\t\n      }\t\n      .apexcharts-legend.position-bottom.center, .apexcharts-legend.position-top.center {\t\n        justify-content: center;  \t\n      }\t\n      .apexcharts-legend.position-bottom.right, .apexcharts-legend.position-top.right {\t\n        justify-content: flex-end;\t\n      }\t\n      .apexcharts-legend-series {\t\n        cursor: pointer;\t\n        line-height: normal;\t\n      }\t\n      .apexcharts-legend.position-bottom .apexcharts-legend-series, .apexcharts-legend.position-top .apexcharts-legend-series{\t\n        display: flex;\t\n        align-items: center;\t\n      }\t\n      .apexcharts-legend-text {\t\n        position: relative;\t\n        font-size: 14px;\t\n      }\t\n      .apexcharts-legend-text *, .apexcharts-legend-marker * {\t\n        pointer-events: none;\t\n      }\t\n      .apexcharts-legend-marker {\t\n        position: relative;\t\n        display: inline-block;\t\n        cursor: pointer;\t\n        margin-right: 3px;\t\n      }\t\n      \t\n      .apexcharts-legend.right .apexcharts-legend-series, .apexcharts-legend.left .apexcharts-legend-series{\t\n        display: inline-block;\t\n      }\t\n      .apexcharts-legend-series.no-click {\t\n        cursor: auto;\t\n      }\t\n      .apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {\t\n        display: none !important;\t\n      }\t\n      .inactive-legend {\t\n        opacity: 0.45;\t\n      }"
              );
              return t.appendChild(e), t;
            },
          },
          {
            key: "appendToForeignObject",
            value: function () {
              var t = this.w.globals;
              t.dom.elLegendForeign = document.createElementNS(
                t.SVGNS,
                "foreignObject"
              );
              var e = t.dom.elLegendForeign;
              e.setAttribute("x", 0),
                e.setAttribute("y", 0),
                e.setAttribute("width", t.svgWidth),
                e.setAttribute("height", t.svgHeight),
                t.dom.elLegendWrap.setAttribute(
                  "xmlns",
                  "http://www.w3.org/1999/xhtml"
                ),
                e.appendChild(t.dom.elLegendWrap),
                e.appendChild(this.getLegendStyles()),
                t.dom.Paper.node.insertBefore(e, t.dom.elGraphical.node);
            },
          },
          {
            key: "drawLegends",
            value: function () {
              var t = this.w,
                e = t.config.legend.fontFamily,
                i = t.globals.seriesNames,
                a = t.globals.colors.slice();
              if ("heatmap" === t.config.chart.type) {
                var s = t.config.plotOptions.heatmap.colorScale.ranges;
                (i = s.map(function (t) {
                  return t.name ? t.name : t.from + " - " + t.to;
                })),
                  (a = s.map(function (t) {
                    return t.color;
                  }));
              }
              for (
                var n = t.globals.legendFormatter,
                  r = t.config.legend.inverseOrder,
                  o = r ? i.length - 1 : 0;
                r ? o >= 0 : o <= i.length - 1;
                r ? o-- : o++
              ) {
                var l = n(i[o], { seriesIndex: o, w: t }),
                  h = !1,
                  c = !1;
                if (t.globals.collapsedSeries.length > 0)
                  for (var d = 0; d < t.globals.collapsedSeries.length; d++)
                    t.globals.collapsedSeries[d].index === o && (h = !0);
                if (t.globals.ancillaryCollapsedSeriesIndices.length > 0)
                  for (
                    var u = 0;
                    u < t.globals.ancillaryCollapsedSeriesIndices.length;
                    u++
                  )
                    t.globals.ancillaryCollapsedSeriesIndices[u] === o &&
                      (c = !0);
                var g = document.createElement("span");
                g.classList.add("apexcharts-legend-marker");
                var f = t.config.legend.markers.offsetX,
                  x = t.config.legend.markers.offsetY,
                  b = t.config.legend.markers.height,
                  m = t.config.legend.markers.width,
                  v = t.config.legend.markers.strokeWidth,
                  y = t.config.legend.markers.strokeColor,
                  k = t.config.legend.markers.radius,
                  A = g.style;
                (A.background = a[o]),
                  (A.color = a[o]),
                  t.config.legend.markers.fillColors &&
                    t.config.legend.markers.fillColors[o] &&
                    (A.background = t.config.legend.markers.fillColors[o]),
                  (A.height = Array.isArray(b)
                    ? parseFloat(b[o]) + "px"
                    : parseFloat(b) + "px"),
                  (A.width = Array.isArray(m)
                    ? parseFloat(m[o]) + "px"
                    : parseFloat(m) + "px"),
                  (A.left = Array.isArray(f) ? f[o] : f),
                  (A.top = Array.isArray(x) ? x[o] : x),
                  (A.borderWidth = Array.isArray(v) ? v[o] : v),
                  (A.borderColor = Array.isArray(y) ? y[o] : y),
                  (A.borderRadius = Array.isArray(k)
                    ? parseFloat(k[o]) + "px"
                    : parseFloat(k) + "px"),
                  t.config.legend.markers.customHTML &&
                    (Array.isArray(t.config.legend.markers.customHTML)
                      ? (g.innerHTML = t.config.legend.markers.customHTML[o]())
                      : (g.innerHTML = t.config.legend.markers.customHTML())),
                  p.setAttrs(g, { rel: o + 1, "data:collapsed": h || c }),
                  (h || c) && g.classList.add("inactive-legend");
                var S = document.createElement("div"),
                  C = document.createElement("span");
                C.classList.add("apexcharts-legend-text"), (C.innerHTML = l);
                var L = t.config.legend.labels.useSeriesColors
                  ? t.globals.colors[o]
                  : t.config.legend.labels.colors;
                L || (L = t.config.chart.foreColor),
                  (C.style.color = L),
                  (C.style.fontSize =
                    parseFloat(t.config.legend.fontSize) + "px"),
                  (C.style.fontFamily = e || t.config.chart.fontFamily),
                  p.setAttrs(C, {
                    rel: o + 1,
                    i: o,
                    "data:default-text": encodeURIComponent(l),
                    "data:collapsed": h || c,
                  }),
                  S.appendChild(g),
                  S.appendChild(C);
                var P = new w(this.ctx);
                if (!t.config.legend.showForZeroSeries)
                  0 === P.getSeriesTotalByIndex(o) &&
                    P.seriesHaveSameValues(o) &&
                    !P.isSeriesNull(o) &&
                    -1 === t.globals.collapsedSeriesIndices.indexOf(o) &&
                    -1 ===
                      t.globals.ancillaryCollapsedSeriesIndices.indexOf(o) &&
                    S.classList.add("apexcharts-hidden-zero-series");
                t.config.legend.showForNullSeries ||
                  (P.isSeriesNull(o) &&
                    -1 === t.globals.collapsedSeriesIndices.indexOf(o) &&
                    -1 ===
                      t.globals.ancillaryCollapsedSeriesIndices.indexOf(o) &&
                    S.classList.add("apexcharts-hidden-null-series")),
                  t.globals.dom.elLegendWrap.appendChild(S),
                  t.globals.dom.elLegendWrap.classList.add(
                    t.config.legend.horizontalAlign
                  ),
                  t.globals.dom.elLegendWrap.classList.add(
                    "position-" + t.config.legend.position
                  ),
                  S.classList.add("apexcharts-legend-series"),
                  (S.style.margin = ""
                    .concat(t.config.legend.itemMargin.horizontal, "px ")
                    .concat(t.config.legend.itemMargin.vertical, "px")),
                  (t.globals.dom.elLegendWrap.style.width = t.config.legend
                    .width
                    ? t.config.legend.width + "px"
                    : ""),
                  (t.globals.dom.elLegendWrap.style.height = t.config.legend
                    .height
                    ? t.config.legend.height + "px"
                    : ""),
                  p.setAttrs(S, { rel: o + 1, "data:collapsed": h || c }),
                  (h || c) && S.classList.add("inactive-legend"),
                  t.config.legend.onItemClick.toggleDataSeries ||
                    S.classList.add("no-click");
              }
              "heatmap" !== t.config.chart.type &&
                t.config.legend.onItemClick.toggleDataSeries &&
                t.globals.dom.elWrap.addEventListener(
                  "click",
                  this.onLegendClick,
                  !0
                ),
                t.config.legend.onItemHover.highlightDataSeries &&
                  (t.globals.dom.elWrap.addEventListener(
                    "mousemove",
                    this.onLegendHovered,
                    !0
                  ),
                  t.globals.dom.elWrap.addEventListener(
                    "mouseout",
                    this.onLegendHovered,
                    !0
                  ));
            },
          },
          {
            key: "getLegendBBox",
            value: function () {
              var t = this.w.globals.dom.baseEl
                  .querySelector(".apexcharts-legend")
                  .getBoundingClientRect(),
                e = t.width;
              return { clwh: t.height, clww: e };
            },
          },
          {
            key: "setLegendWrapXY",
            value: function (t, e) {
              var i = this.w,
                a = i.globals.dom.baseEl.querySelector(".apexcharts-legend"),
                s = a.getBoundingClientRect(),
                n = 0,
                r = 0;
              if ("bottom" === i.config.legend.position)
                r += i.globals.svgHeight - s.height / 2;
              else if ("top" === i.config.legend.position) {
                var o = new W(this.ctx),
                  l = o.getTitleSubtitleCoords("title").height,
                  h = o.getTitleSubtitleCoords("subtitle").height;
                r = r + (l > 0 ? l - 10 : 0) + (h > 0 ? h - 10 : 0);
              }
              (a.style.position = "absolute"),
                (n = n + t + i.config.legend.offsetX),
                (r = r + e + i.config.legend.offsetY),
                (a.style.left = n + "px"),
                (a.style.top = r + "px"),
                "bottom" === i.config.legend.position
                  ? ((a.style.top = "auto"),
                    (a.style.bottom = 10 + i.config.legend.offsetY + "px"))
                  : "right" === i.config.legend.position &&
                    ((a.style.left = "auto"),
                    (a.style.right = 25 + i.config.legend.offsetX + "px")),
                a.style.width &&
                  (a.style.width = parseInt(i.config.legend.width) + "px"),
                a.style.height &&
                  (a.style.height = parseInt(i.config.legend.height) + "px");
            },
          },
          {
            key: "legendAlignHorizontal",
            value: function () {
              var t = this.w;
              t.globals.dom.baseEl.querySelector(
                ".apexcharts-legend"
              ).style.right = 0;
              var e = this.getLegendBBox(),
                i = new W(this.ctx),
                a = i.getTitleSubtitleCoords("title"),
                s = i.getTitleSubtitleCoords("subtitle"),
                n = 0;
              "bottom" === t.config.legend.position
                ? (n = -e.clwh / 1.8)
                : "top" === t.config.legend.position &&
                  (n =
                    a.height +
                    s.height +
                    t.config.title.margin +
                    t.config.subtitle.margin -
                    15),
                this.setLegendWrapXY(20, n);
            },
          },
          {
            key: "legendAlignVertical",
            value: function () {
              var t = this.w,
                e = this.getLegendBBox(),
                i = 0;
              "left" === t.config.legend.position && (i = 20),
                "right" === t.config.legend.position &&
                  (i = t.globals.svgWidth - e.clww - 10),
                this.setLegendWrapXY(i, 20);
            },
          },
          {
            key: "onLegendHovered",
            value: function (t) {
              var e = this.w,
                i =
                  t.target.classList.contains("apexcharts-legend-text") ||
                  t.target.classList.contains("apexcharts-legend-marker");
              if ("heatmap" !== e.config.chart.type)
                !t.target.classList.contains("inactive-legend") &&
                  i &&
                  new B(this.ctx).toggleSeriesOnHover(t, t.target);
              else if (i) {
                var a = parseInt(t.target.getAttribute("rel")) - 1;
                this.ctx.fireEvent("legendHover", [this.ctx, a, this.w]),
                  new B(this.ctx).highlightRangeInSeries(t, t.target);
              }
            },
          },
          {
            key: "onLegendClick",
            value: function (t) {
              if (
                t.target.classList.contains("apexcharts-legend-text") ||
                t.target.classList.contains("apexcharts-legend-marker")
              ) {
                var e = parseInt(t.target.getAttribute("rel")) - 1,
                  i = "true" === t.target.getAttribute("data:collapsed"),
                  a = this.w.config.chart.events.legendClick;
                "function" == typeof a && a(this.ctx, e, this.w),
                  this.ctx.fireEvent("legendClick", [this.ctx, e, this.w]);
                var s = this.w.config.legend.markers.onClick;
                "function" == typeof s &&
                  t.target.classList.contains("apexcharts-legend-marker") &&
                  (s(this.ctx, e, this.w),
                  this.ctx.fireEvent("legendMarkerClick", [
                    this.ctx,
                    e,
                    this.w,
                  ])),
                  this.toggleDataSeries(e, i);
              }
            },
          },
          {
            key: "toggleDataSeries",
            value: function (t, e) {
              var i = this.w;
              if (i.globals.axisCharts || "radialBar" === i.config.chart.type) {
                i.globals.resized = !0;
                var a = null,
                  s = null;
                if (
                  ((i.globals.risingSeries = []),
                  i.globals.axisCharts
                    ? ((a = i.globals.dom.baseEl.querySelector(
                        ".apexcharts-series[data\\:realIndex='".concat(t, "']")
                      )),
                      (s = parseInt(a.getAttribute("data:realIndex"))))
                    : ((a = i.globals.dom.baseEl.querySelector(
                        ".apexcharts-series[rel='".concat(t + 1, "']")
                      )),
                      (s = parseInt(a.getAttribute("rel")) - 1)),
                  e)
                )
                  this.riseCollapsedSeries(
                    i.globals.collapsedSeries,
                    i.globals.collapsedSeriesIndices,
                    s
                  ),
                    this.riseCollapsedSeries(
                      i.globals.ancillaryCollapsedSeries,
                      i.globals.ancillaryCollapsedSeriesIndices,
                      s
                    );
                else {
                  if (i.globals.axisCharts) {
                    var n = !1;
                    if (
                      (i.config.yaxis[s] &&
                        i.config.yaxis[s].show &&
                        i.config.yaxis[s].showAlways &&
                        ((n = !0),
                        i.globals.ancillaryCollapsedSeriesIndices.indexOf(s) <
                          0 &&
                          (i.globals.ancillaryCollapsedSeries.push({
                            index: s,
                            data: i.config.series[s].data.slice(),
                            type: a.parentNode.className.baseVal.split("-")[1],
                          }),
                          i.globals.ancillaryCollapsedSeriesIndices.push(s))),
                      !n)
                    ) {
                      i.globals.collapsedSeries.push({
                        index: s,
                        data: i.config.series[s].data.slice(),
                        type: a.parentNode.className.baseVal.split("-")[1],
                      }),
                        i.globals.collapsedSeriesIndices.push(s);
                      var r = i.globals.risingSeries.indexOf(s);
                      i.globals.risingSeries.splice(r, 1);
                    }
                    i.config.series[s].data = [];
                  } else
                    i.globals.collapsedSeries.push({
                      index: s,
                      data: i.config.series[s],
                    }),
                      i.globals.collapsedSeriesIndices.push(s),
                      (i.config.series[s] = 0);
                  for (var o = a.childNodes, l = 0; l < o.length; l++)
                    o[l].classList.contains("apexcharts-series-markers-wrap") &&
                      (o[l].classList.contains("apexcharts-hide")
                        ? o[l].classList.remove("apexcharts-hide")
                        : o[l].classList.add("apexcharts-hide"));
                  (i.globals.allSeriesCollapsed =
                    i.globals.collapsedSeries.length ===
                    i.globals.series.length),
                    this.ctx._updateSeries(
                      i.config.series,
                      i.config.chart.animations.dynamicAnimation.enabled
                    );
                }
              } else {
                var h = i.globals.dom.Paper.select(
                    " .apexcharts-series[rel='".concat(t + 1, "'] path")
                  ),
                  c = i.config.chart.type;
                if ("pie" === c || "donut" === c) {
                  var d = i.config.plotOptions.pie.donut.labels,
                    u = new p(this.ctx),
                    g = new Y(this.ctx);
                  u.pathMouseDown(h.members[0], null),
                    g.printDataLabelsInner(h.members[0].node, d);
                }
                h.fire("click");
              }
            },
          },
          {
            key: "riseCollapsedSeries",
            value: function (t, e, i) {
              var a = this.w;
              if (t.length > 0)
                for (var s = 0; s < t.length; s++)
                  t[s].index === i &&
                    (a.globals.axisCharts
                      ? ((a.config.series[i].data = t[s].data.slice()),
                        t.splice(s, 1),
                        e.splice(s, 1),
                        a.globals.risingSeries.push(i))
                      : ((a.config.series[i] = t[s].data),
                        t.splice(s, 1),
                        e.splice(s, 1),
                        a.globals.risingSeries.push(i)),
                    this.ctx._updateSeries(
                      a.config.series,
                      a.config.chart.animations.dynamicAnimation.enabled
                    ));
            },
          },
        ]),
        t
      );
    })(),
    G = (function () {
      function t(i, a, s) {
        e(this, t),
          (this.ctx = i),
          (this.w = i.w),
          (this.xyRatios = a),
          (this.pointsChart =
            !(
              "bubble" !== this.w.config.chart.type &&
              "scatter" !== this.w.config.chart.type
            ) || s),
          (this.scatter = new P(this.ctx)),
          (this.noNegatives = this.w.globals.minX === Number.MAX_VALUE),
          (this.yaxisIndex = 0);
      }
      return (
        a(t, [
          {
            key: "draw",
            value: function (t, e, i) {
              var a = this.w,
                s = new p(this.ctx),
                n = new C(this.ctx),
                o = a.globals.comboCharts ? e : a.config.chart.type,
                l = s.group({
                  class: "apexcharts-".concat(
                    o,
                    "-series apexcharts-plot-series"
                  ),
                }),
                h = new w(this.ctx, a);
              t = h.getLogSeries(t);
              var c = this.xyRatios.yRatio;
              c = h.getLogYRatios(c);
              for (
                var d = this.xyRatios.zRatio,
                  g = this.xyRatios.xRatio,
                  f = this.xyRatios.baseLineY,
                  x = [],
                  b = [],
                  m = 0,
                  v = 0;
                v < t.length;
                v++
              ) {
                if (
                  "line" === o &&
                  ("gradient" === a.config.fill.type ||
                    "gradient" === a.config.fill.type[v]) &&
                  h.seriesHaveSameValues(v)
                ) {
                  var y = t[v].slice();
                  (y[y.length - 1] = y[y.length - 1] + 1e-6), (t[v] = y);
                }
                var k = a.globals.gridWidth / a.globals.dataPoints,
                  A = a.globals.comboCharts ? i[v] : v;
                c.length > 1 && (this.yaxisIndex = A),
                  (this.isReversed =
                    a.config.yaxis[this.yaxisIndex] &&
                    a.config.yaxis[this.yaxisIndex].reversed);
                var S = [],
                  P = [],
                  E =
                    a.globals.gridHeight -
                    f[this.yaxisIndex] -
                    (this.isReversed ? a.globals.gridHeight : 0) +
                    (this.isReversed ? 2 * f[this.yaxisIndex] : 0),
                  M = E;
                E > a.globals.gridHeight && (M = a.globals.gridHeight),
                  (m = k / 2);
                var T = a.globals.padHorizontal + m,
                  I = 1;
                a.globals.isXNumeric &&
                  a.globals.seriesX.length > 0 &&
                  (T = (a.globals.seriesX[A][0] - a.globals.minX) / g),
                  P.push(T);
                var X = void 0,
                  Y = void 0,
                  F = void 0,
                  R = void 0,
                  D = [],
                  O = [],
                  N = s.group({
                    class: "apexcharts-series",
                    seriesName: u.escapeString(a.globals.seriesNames[A]),
                  }),
                  H = s.group({ class: "apexcharts-series-markers-wrap" }),
                  W = s.group({ class: "apexcharts-datalabels" });
                this.ctx.series.addCollapsedClassToSeries(N, A);
                var B = t[v].length === a.globals.dataPoints;
                N.attr({
                  "data:longestSeries": B,
                  rel: v + 1,
                  "data:realIndex": A,
                }),
                  (this.appendPathFrom = !0);
                var V = T,
                  G = void 0,
                  _ = V,
                  j = E,
                  U = 0;
                if (
                  ((j = this.determineFirstPrevY({
                    i: v,
                    series: t,
                    yRatio: c[this.yaxisIndex],
                    zeroY: E,
                    prevY: j,
                    prevSeriesY: b,
                    lineYPosition: U,
                  }).prevY),
                  S.push(j),
                  (G = j),
                  null === t[v][0])
                ) {
                  for (var q = 0; q < t[v].length; q++)
                    if (null !== t[v][q]) {
                      (_ = k * q),
                        (j = E - t[v][q] / c[this.yaxisIndex]),
                        (X = s.move(_, j)),
                        (Y = s.move(_, M));
                      break;
                    }
                } else (X = s.move(_, j)), (Y = s.move(_, M) + s.line(_, j));
                if (
                  ((F = s.move(-1, E) + s.line(-1, E)),
                  (R = s.move(-1, E) + s.line(-1, E)),
                  a.globals.previousPaths.length > 0)
                ) {
                  var Z = this.checkPreviousPaths({
                    pathFromLine: F,
                    pathFromArea: R,
                    realIndex: A,
                  });
                  (F = Z.pathFromLine), (R = Z.pathFromArea);
                }
                for (
                  var $ =
                      a.globals.dataPoints > 1
                        ? a.globals.dataPoints - 1
                        : a.globals.dataPoints,
                    J = 0;
                  J < $;
                  J++
                ) {
                  if (a.globals.isXNumeric) {
                    var Q = a.globals.seriesX[A][J + 1];
                    void 0 === a.globals.seriesX[A][J + 1] &&
                      (Q = a.globals.seriesX[A][$ - 1]),
                      (T = (Q - a.globals.minX) / g);
                  } else T += k;
                  var K = u.isNumber(a.globals.minYArr[A])
                    ? a.globals.minYArr[A]
                    : a.globals.minY;
                  a.config.chart.stacked
                    ? ((U =
                        v > 0 &&
                        a.globals.collapsedSeries.length <
                          a.config.series.length - 1
                          ? b[v - 1][J + 1]
                          : E),
                      (I =
                        void 0 === t[v][J + 1] || null === t[v][J + 1]
                          ? U -
                            K / c[this.yaxisIndex] +
                            2 * (this.isReversed ? K / c[this.yaxisIndex] : 0)
                          : U -
                            t[v][J + 1] / c[this.yaxisIndex] +
                            2 *
                              (this.isReversed
                                ? t[v][J + 1] / c[this.yaxisIndex]
                                : 0)))
                    : (I =
                        void 0 === t[v][J + 1] || null === t[v][J + 1]
                          ? E -
                            K / c[this.yaxisIndex] +
                            2 * (this.isReversed ? K / c[this.yaxisIndex] : 0)
                          : E -
                            t[v][J + 1] / c[this.yaxisIndex] +
                            2 *
                              (this.isReversed
                                ? t[v][J + 1] / c[this.yaxisIndex]
                                : 0)),
                    P.push(T),
                    S.push(I);
                  var tt = this.createPaths({
                    series: t,
                    i: v,
                    j: J,
                    x: T,
                    y: I,
                    xDivision: k,
                    pX: V,
                    pY: G,
                    areaBottomY: M,
                    linePath: X,
                    areaPath: Y,
                    linePaths: D,
                    areaPaths: O,
                    seriesIndex: i,
                  });
                  (O = tt.areaPaths),
                    (D = tt.linePaths),
                    (V = tt.pX),
                    (G = tt.pY),
                    (Y = tt.areaPath),
                    (X = tt.linePath),
                    this.appendPathFrom &&
                      ((F += s.line(T, E)), (R += s.line(T, E)));
                  var et = this.calculatePoints({
                    series: t,
                    x: T,
                    y: I,
                    realIndex: A,
                    i: v,
                    j: J,
                    prevY: j,
                    categoryAxisCorrection: m,
                    xRatio: g,
                  });
                  if (this.pointsChart)
                    this.scatter.draw(N, J, {
                      realIndex: A,
                      pointsPos: et,
                      zRatio: d,
                      elParent: H,
                    });
                  else {
                    var it = new L(this.ctx);
                    a.globals.dataPoints > 1 && H.node.classList.add("hidden");
                    var at = it.plotChartMarkers(et, A, J + 1);
                    null !== at && H.add(at);
                  }
                  var st =
                      !t[v][J + 1] || t[v][J + 1] > t[v][J] ? "top" : "bottom",
                    nt = new z(this.ctx).drawDataLabel(et, A, J + 1, null, st);
                  null !== nt && W.add(nt);
                }
                b.push(S),
                  (a.globals.seriesXvalues[A] = P),
                  (a.globals.seriesYvalues[A] = S),
                  this.pointsChart ||
                    a.globals.delayedElements.push({ el: H.node, index: A });
                var rt = {
                  i: v,
                  realIndex: A,
                  animationDelay: v,
                  initialSpeed: a.config.chart.animations.speed,
                  dataChangeSpeed:
                    a.config.chart.animations.dynamicAnimation.speed,
                  className: "apexcharts-".concat(o),
                };
                if ("area" === o)
                  for (
                    var ot = n.fillPath({ seriesNumber: A }), lt = 0;
                    lt < O.length;
                    lt++
                  ) {
                    var ht = s.renderPaths(
                      r({}, rt, {
                        pathFrom: R,
                        pathTo: O[lt],
                        stroke: "none",
                        strokeWidth: 0,
                        strokeLineCap: null,
                        fill: ot,
                      })
                    );
                    N.add(ht);
                  }
                if (a.config.stroke.show && !this.pointsChart) {
                  var ct = null;
                  ct =
                    "line" === o
                      ? n.fillPath({ seriesNumber: A, i: v })
                      : a.globals.stroke.colors[A];
                  for (var dt = 0; dt < D.length; dt++) {
                    var ut = s.renderPaths(
                      r({}, rt, {
                        pathFrom: F,
                        pathTo: D[dt],
                        stroke: ct,
                        strokeWidth: Array.isArray(a.config.stroke.width)
                          ? a.config.stroke.width[A]
                          : a.config.stroke.width,
                        strokeLineCap: a.config.stroke.lineCap,
                        fill: "none",
                      })
                    );
                    N.add(ut);
                  }
                }
                N.add(H), N.add(W), x.push(N);
              }
              for (var gt = x.length; gt > 0; gt--) l.add(x[gt - 1]);
              return l;
            },
          },
          {
            key: "createPaths",
            value: function (t) {
              var e = t.series,
                i = t.i,
                a = t.j,
                s = t.x,
                n = t.y,
                r = t.pX,
                o = t.pY,
                l = t.xDivision,
                h = t.areaBottomY,
                c = t.linePath,
                d = t.areaPath,
                u = t.linePaths,
                g = t.areaPaths,
                f = t.seriesIndex,
                x = this.w,
                b = new p(this.ctx),
                m = x.config.stroke.curve;
              if (
                (Array.isArray(x.config.stroke.curve) &&
                  (m = Array.isArray(f)
                    ? x.config.stroke.curve[f[i]]
                    : x.config.stroke.curve[i]),
                "smooth" === m)
              ) {
                var v = 0.35 * (s - r);
                x.globals.hasNullValues
                  ? (null !== e[i][a] &&
                      (null !== e[i][a + 1]
                        ? ((c =
                            b.move(r, o) +
                            b.curve(r + v, o, s - v, n, s + 1, n)),
                          (d =
                            b.move(r + 1, o) +
                            b.curve(r + v, o, s - v, n, s + 1, n) +
                            b.line(s, h) +
                            b.line(r, h) +
                            "z"))
                        : ((c = b.move(r, o)), (d = b.move(r, o) + "z"))),
                    u.push(c),
                    g.push(d))
                  : ((c += b.curve(r + v, o, s - v, n, s, n)),
                    (d += b.curve(r + v, o, s - v, n, s, n))),
                  (r = s),
                  (o = n),
                  a === e[i].length - 2 &&
                    ((d = d + b.curve(r, o, s, n, s, h) + b.move(s, n) + "z"),
                    x.globals.hasNullValues || (u.push(c), g.push(d)));
              } else
                null === e[i][a + 1] &&
                  ((c += b.move(s, n)),
                  (d = d + b.line(s - l, h) + b.move(s, n))),
                  null === e[i][a] &&
                    ((c += b.move(s, n)), (d += b.move(s, h))),
                  "stepline" === m
                    ? ((c = c + b.line(s, null, "H") + b.line(null, n, "V")),
                      (d = d + b.line(s, null, "H") + b.line(null, n, "V")))
                    : "straight" === m &&
                      ((c += b.line(s, n)), (d += b.line(s, n))),
                  a === e[i].length - 2 &&
                    ((d = d + b.line(s, h) + b.move(s, n) + "z"),
                    u.push(c),
                    g.push(d));
              return {
                linePaths: u,
                areaPaths: g,
                pX: r,
                pY: o,
                linePath: c,
                areaPath: d,
              };
            },
          },
          {
            key: "calculatePoints",
            value: function (t) {
              var e = t.series,
                i = t.realIndex,
                a = t.x,
                s = t.y,
                n = t.i,
                r = t.j,
                o = t.prevY,
                l = t.categoryAxisCorrection,
                h = t.xRatio,
                c = this.w,
                d = [],
                g = [];
              if (0 === r) {
                var f = l + c.config.markers.offsetX;
                c.globals.isXNumeric &&
                  (f =
                    (c.globals.seriesX[i][0] - c.globals.minX) / h +
                    c.config.markers.offsetX),
                  d.push(f),
                  g.push(
                    u.isNumber(e[n][0]) ? o + c.config.markers.offsetY : null
                  ),
                  d.push(a + c.config.markers.offsetX),
                  g.push(
                    u.isNumber(e[n][r + 1])
                      ? s + c.config.markers.offsetY
                      : null
                  );
              } else
                d.push(a + c.config.markers.offsetX),
                  g.push(
                    u.isNumber(e[n][r + 1])
                      ? s + c.config.markers.offsetY
                      : null
                  );
              return { x: d, y: g };
            },
          },
          {
            key: "checkPreviousPaths",
            value: function (t) {
              for (
                var e = t.pathFromLine,
                  i = t.pathFromArea,
                  a = t.realIndex,
                  s = this.w,
                  n = 0;
                n < s.globals.previousPaths.length;
                n++
              ) {
                var r = s.globals.previousPaths[n];
                ("line" === r.type || "area" === r.type) &&
                  r.paths.length > 0 &&
                  parseInt(r.realIndex) === parseInt(a) &&
                  ("line" === r.type
                    ? ((this.appendPathFrom = !1),
                      (e = s.globals.previousPaths[n].paths[0].d))
                    : "area" === r.type &&
                      ((this.appendPathFrom = !1),
                      (i = s.globals.previousPaths[n].paths[0].d),
                      s.config.stroke.show &&
                        (e = s.globals.previousPaths[n].paths[1].d)));
              }
              return { pathFromLine: e, pathFromArea: i };
            },
          },
          {
            key: "determineFirstPrevY",
            value: function (t) {
              var e = t.i,
                i = t.series,
                a = t.yRatio,
                s = t.zeroY,
                n = t.prevY,
                r = t.prevSeriesY,
                o = t.lineYPosition,
                l = this.w;
              if (void 0 !== i[e][0])
                n = l.config.chart.stacked
                  ? (o = e > 0 ? r[e - 1][0] : s) -
                    i[e][0] / a +
                    2 * (this.isReversed ? i[e][0] / a : 0)
                  : s - i[e][0] / a + 2 * (this.isReversed ? i[e][0] / a : 0);
              else if (l.config.chart.stacked && e > 0 && void 0 === i[e][0])
                for (var h = e - 1; h >= 0; h--)
                  if (null !== i[h][0] && void 0 !== i[h][0]) {
                    n = o = r[h][0];
                    break;
                  }
              return { prevY: n, lineYPosition: o };
            },
          },
        ]),
        t
      );
    })(),
    _ = (function () {
      function t(i) {
        e(this, t), (this.ctx = i), (this.w = i.w);
        var a = this.w;
        (this.xaxisLabels = a.globals.labels.slice()),
          a.globals.timelineLabels.length > 0 &&
            (this.xaxisLabels = a.globals.timelineLabels.slice()),
          (this.drawnLabels = []),
          "top" === a.config.xaxis.position
            ? (this.offY = 0)
            : (this.offY = a.globals.gridHeight + 1),
          (this.offY = this.offY + a.config.xaxis.axisBorder.offsetY),
          (this.xaxisFontSize = a.config.xaxis.labels.style.fontSize),
          (this.xaxisFontFamily = a.config.xaxis.labels.style.fontFamily),
          (this.xaxisForeColors = a.config.xaxis.labels.style.colors),
          (this.xaxisBorderWidth = a.config.xaxis.axisBorder.width),
          this.xaxisBorderWidth.indexOf("%") > -1
            ? (this.xaxisBorderWidth =
                (a.globals.gridWidth * parseInt(this.xaxisBorderWidth)) / 100)
            : (this.xaxisBorderWidth = parseInt(this.xaxisBorderWidth)),
          (this.xaxisBorderHeight = a.config.xaxis.axisBorder.height),
          (this.yaxis = a.config.yaxis[0]),
          (this.axesUtils = new N(i));
      }
      return (
        a(t, [
          {
            key: "drawXaxis",
            value: function () {
              var t,
                e = this.w,
                i = new p(this.ctx),
                a = i.group({
                  class: "apexcharts-xaxis",
                  transform: "translate("
                    .concat(e.config.xaxis.offsetX, ", ")
                    .concat(e.config.xaxis.offsetY, ")"),
                }),
                s = i.group({
                  class: "apexcharts-xaxis-texts-g",
                  transform: "translate("
                    .concat(e.globals.translateXAxisX, ", ")
                    .concat(e.globals.translateXAxisY, ")"),
                });
              a.add(s);
              for (
                var n = e.globals.padHorizontal, r = [], o = 0;
                o < this.xaxisLabels.length;
                o++
              )
                r.push(this.xaxisLabels[o]);
              n = e.globals.isXNumeric
                ? n +
                  (t = e.globals.gridWidth / (r.length - 1)) / 2 +
                  e.config.xaxis.labels.offsetX
                : n +
                  (t = e.globals.gridWidth / r.length) +
                  e.config.xaxis.labels.offsetX;
              var l = r.length;
              if (e.config.xaxis.labels.show)
                for (var h = 0; h <= l - 1; h++) {
                  var c = n - t / 2 + e.config.xaxis.labels.offsetX,
                    d = this.axesUtils.getLabel(
                      r,
                      e.globals.timelineLabels,
                      c,
                      h,
                      this.drawnLabels
                    );
                  this.drawnLabels.push(d.text);
                  var u = 28;
                  e.globals.rotateXLabels && (u = 22);
                  var g = i.drawText({
                    x: d.x,
                    y: this.offY + e.config.xaxis.labels.offsetY + u,
                    text: "",
                    textAnchor: "middle",
                    fontWeight: d.isBold ? 600 : 400,
                    fontSize: this.xaxisFontSize,
                    fontFamily: this.xaxisFontFamily,
                    foreColor: Array.isArray(this.xaxisForeColors)
                      ? this.xaxisForeColors[h]
                      : this.xaxisForeColors,
                    cssClass:
                      "apexcharts-xaxis-label " +
                      e.config.xaxis.labels.style.cssClass,
                  });
                  h === l - 1 &&
                    e.globals.skipLastTimelinelabel &&
                    (d.text = ""),
                    s.add(g),
                    i.addTspan(g, d.text, this.xaxisFontFamily);
                  var f = document.createElementNS(e.globals.SVGNS, "title");
                  (f.textContent = d.text), g.node.appendChild(f), (n += t);
                }
              if (void 0 !== e.config.xaxis.title.text) {
                var x = i.group({ class: "apexcharts-xaxis-title" }),
                  b = i.drawText({
                    x: e.globals.gridWidth / 2 + e.config.xaxis.title.offsetX,
                    y:
                      this.offY -
                      parseFloat(this.xaxisFontSize) +
                      e.globals.xAxisLabelsHeight +
                      e.config.xaxis.title.offsetY,
                    text: e.config.xaxis.title.text,
                    textAnchor: "middle",
                    fontSize: e.config.xaxis.title.style.fontSize,
                    fontFamily: e.config.xaxis.title.style.fontFamily,
                    foreColor: e.config.xaxis.title.style.color,
                    cssClass:
                      "apexcharts-xaxis-title-text " +
                      e.config.xaxis.title.style.cssClass,
                  });
                x.add(b), a.add(x);
              }
              if (e.config.xaxis.axisBorder.show) {
                var m = 0;
                "bar" === e.config.chart.type &&
                  e.globals.isXNumeric &&
                  (m -= 15);
                var v = i.drawLine(
                  e.globals.padHorizontal +
                    m +
                    e.config.xaxis.axisBorder.offsetX,
                  this.offY,
                  this.xaxisBorderWidth,
                  this.offY,
                  e.config.xaxis.axisBorder.color,
                  0,
                  this.xaxisBorderHeight
                );
                a.add(v);
              }
              return a;
            },
          },
          {
            key: "drawXaxisInversed",
            value: function (t) {
              var e,
                i,
                a = this.w,
                s = new p(this.ctx),
                n = a.config.yaxis[0].opposite
                  ? a.globals.translateYAxisX[t]
                  : 0,
                r = s.group({
                  class: "apexcharts-yaxis apexcharts-xaxis-inversed",
                  rel: t,
                }),
                o = s.group({
                  class:
                    "apexcharts-yaxis-texts-g apexcharts-xaxis-inversed-texts-g",
                  transform: "translate(" + n + ", 0)",
                });
              r.add(o);
              for (var l = [], h = 0; h < this.xaxisLabels.length; h++)
                l.push(this.xaxisLabels[h]);
              i = -(e = a.globals.gridHeight / l.length) / 2.2;
              var c = a.globals.yLabelFormatters[0],
                d = a.config.yaxis[0].labels;
              if (d.show)
                for (var u = 0; u <= l.length - 1; u++) {
                  var g = void 0 === l[u] ? "" : l[u];
                  g = c(g, { seriesIndex: t, dataPointIndex: u, w: a });
                  var f = s.drawText({
                    x: d.offsetX - 15,
                    y: i + e + d.offsetY,
                    text: g,
                    textAnchor: this.yaxis.opposite ? "start" : "end",
                    foreColor: d.style.color
                      ? d.style.color
                      : d.style.colors[u],
                    fontSize: d.style.fontSize,
                    fontFamily: d.style.fontFamily,
                    cssClass: "apexcharts-yaxis-label " + d.style.cssClass,
                  });
                  if ((o.add(f), 0 !== a.config.yaxis[t].labels.rotate)) {
                    var x = s.rotateAroundCenter(f.node);
                    f.node.setAttribute(
                      "transform",
                      "rotate("
                        .concat(a.config.yaxis[t].labels.rotate, " ")
                        .concat(x.x, " ")
                        .concat(x.y, ")")
                    );
                  }
                  i += e;
                }
              if (void 0 !== a.config.yaxis[0].title.text) {
                var b = s.group({
                    class:
                      "apexcharts-yaxis-title apexcharts-xaxis-title-inversed",
                    transform: "translate(" + n + ", 0)",
                  }),
                  m = s.drawText({
                    x: 0,
                    y: a.globals.gridHeight / 2,
                    text: a.config.yaxis[0].title.text,
                    textAnchor: "middle",
                    foreColor: a.config.yaxis[0].title.style.color,
                    fontSize: a.config.yaxis[0].title.style.fontSize,
                    fontFamily: a.config.yaxis[0].title.style.fontFamily,
                    cssClass:
                      "apexcharts-yaxis-title-text " +
                      a.config.yaxis[0].title.style.cssClass,
                  });
                b.add(m), r.add(b);
              }
              if (a.config.xaxis.axisBorder.show) {
                var v = s.drawLine(
                  a.globals.padHorizontal + a.config.xaxis.axisBorder.offsetX,
                  this.offY,
                  this.xaxisBorderWidth,
                  this.offY,
                  this.yaxis.axisBorder.color,
                  0,
                  this.xaxisBorderHeight
                );
                r.add(v),
                  this.axesUtils.drawYAxisTicks(
                    0,
                    l.length,
                    a.config.yaxis[0].axisBorder,
                    a.config.yaxis[0].axisTicks,
                    0,
                    e,
                    r
                  );
              }
              return r;
            },
          },
          {
            key: "drawXaxisTicks",
            value: function (t, e) {
              var i = this.w,
                a = t;
              if (!(t < 0 || t > i.globals.gridWidth)) {
                var s = this.offY + i.config.xaxis.axisTicks.offsetY,
                  n = s + i.config.xaxis.axisTicks.height;
                if (i.config.xaxis.axisTicks.show) {
                  var r = new p(this.ctx).drawLine(
                    t + i.config.xaxis.axisTicks.offsetX,
                    s + i.config.xaxis.offsetY,
                    a + i.config.xaxis.axisTicks.offsetX,
                    n + i.config.xaxis.offsetY,
                    i.config.xaxis.axisTicks.color
                  );
                  e.add(r), r.node.classList.add("apexcharts-xaxis-tick");
                }
              }
            },
          },
          {
            key: "getXAxisTicksPositions",
            value: function () {
              var t = this.w,
                e = [],
                i = this.xaxisLabels.length,
                a = t.globals.padHorizontal;
              if (t.globals.timelineLabels.length > 0)
                for (var s = 0; s < i; s++)
                  (a = this.xaxisLabels[s].position), e.push(a);
              else
                for (var n = i, r = 0; r < n; r++) {
                  var o = n;
                  t.globals.isXNumeric &&
                    "bar" !== t.config.chart.type &&
                    (o -= 1),
                    (a += t.globals.gridWidth / o),
                    e.push(a);
                }
              return e;
            },
          },
          {
            key: "xAxisLabelCorrections",
            value: function () {
              var t = this.w,
                e = new p(this.ctx),
                i = t.globals.dom.baseEl.querySelector(
                  ".apexcharts-xaxis-texts-g"
                ),
                a = t.globals.dom.baseEl.querySelectorAll(
                  ".apexcharts-xaxis-texts-g text"
                ),
                s = t.globals.dom.baseEl.querySelectorAll(
                  ".apexcharts-yaxis-inversed text"
                ),
                n = t.globals.dom.baseEl.querySelectorAll(
                  ".apexcharts-xaxis-inversed-texts-g text"
                );
              if (t.globals.rotateXLabels || t.config.xaxis.labels.rotateAlways)
                for (var r = 0; r < a.length; r++) {
                  var o = e.rotateAroundCenter(a[r]);
                  (o.y = o.y - 1),
                    (o.x = o.x + 1),
                    a[r].setAttribute(
                      "transform",
                      "rotate("
                        .concat(t.config.xaxis.labels.rotate, " ")
                        .concat(o.x, " ")
                        .concat(o.y, ")")
                    ),
                    a[r].setAttribute("text-anchor", "end");
                  i.setAttribute("transform", "translate(0, ".concat(-10, ")"));
                  var l = a[r].childNodes;
                  t.config.xaxis.labels.trim &&
                    e.placeTextWithEllipsis(
                      l[0],
                      l[0].textContent,
                      t.config.xaxis.labels.maxHeight -
                        ("bottom" === t.config.legend.position ? 20 : 10)
                    );
                }
              else
                for (
                  var h = t.globals.gridWidth / t.globals.labels.length, c = 0;
                  c < a.length;
                  c++
                ) {
                  var d = a[c].childNodes;
                  t.config.xaxis.labels.trim &&
                    "datetime" !== t.config.xaxis.type &&
                    e.placeTextWithEllipsis(d[0], d[0].textContent, h);
                }
              if (s.length > 0) {
                var u = s[s.length - 1].getBBox(),
                  g = s[0].getBBox();
                u.x < -20 &&
                  s[s.length - 1].parentNode.removeChild(s[s.length - 1]),
                  g.x + g.width > t.globals.gridWidth &&
                    !t.globals.isBarHorizontal &&
                    s[0].parentNode.removeChild(s[0]);
                for (var f = 0; f < n.length; f++)
                  e.placeTextWithEllipsis(
                    n[f],
                    n[f].textContent,
                    t.config.yaxis[0].labels.maxWidth -
                      2 * parseFloat(t.config.yaxis[0].title.style.fontSize) -
                      20
                  );
              }
            },
          },
        ]),
        t
      );
    })(),
    j = (function () {
      function t(i) {
        e(this, t), (this.ctx = i), (this.w = i.w);
      }
      return (
        a(t, [
          {
            key: "niceScale",
            value: function (t, e, i) {
              var a =
                  arguments.length > 3 && void 0 !== arguments[3]
                    ? arguments[3]
                    : 0,
                s =
                  arguments.length > 4 && void 0 !== arguments[4]
                    ? arguments[4]
                    : 10,
                n = this.w,
                r =
                  (void 0 === this.w.config.yaxis[a].max &&
                    void 0 === this.w.config.yaxis[a].min) ||
                  this.w.config.yaxis[a].forceNiceScale;
              if (
                (t === Number.MIN_VALUE && 0 === e) ||
                (!u.isNumber(t) && !u.isNumber(e)) ||
                (t === Number.MIN_VALUE && e === -Number.MAX_VALUE)
              )
                return (t = 0), (e = s), this.linearScale(t, e, s);
              t > e
                ? (console.warn("yaxis.min cannot be greater than yaxis.max"),
                  (e = t + 0.1))
                : t === e &&
                  ((t = 0 === t ? 0 : t - 0.5), (e = 0 === e ? 2 : e + 0.5));
              var o = [],
                l = Math.abs(e - t);
              l < 1 &&
                r &&
                ("candlestick" === n.config.chart.type ||
                  "candlestick" === n.config.series[a].type ||
                  n.globals.isRangeData) &&
                (e *= 1.01);
              var h = s + 1;
              h < 2 ? (h = 2) : h > 2 && (h -= 2);
              var c = l / h,
                d = Math.floor(u.log10(c)),
                g = Math.pow(10, d),
                f = Math.round(c / g);
              f < 1 && (f = 1);
              var p = f * g,
                x = p * Math.floor(t / p),
                b = p * Math.ceil(e / p),
                m = x;
              if (r && l > 2) {
                for (; o.push(m), !((m += p) > b); );
                return { result: o, niceMin: o[0], niceMax: o[o.length - 1] };
              }
              var v = t;
              (o = []).push(v);
              for (var y = Math.abs(e - t) / s, w = 0; w <= s; w++)
                (v += y), o.push(v);
              return (
                o[o.length - 2] >= e && o.pop(),
                { result: o, niceMin: o[0], niceMax: o[o.length - 1] }
              );
            },
          },
          {
            key: "linearScale",
            value: function (t, e) {
              var i =
                  arguments.length > 2 && void 0 !== arguments[2]
                    ? arguments[2]
                    : 10,
                a = Math.abs(e - t) / i;
              i === Number.MAX_VALUE && ((i = 10), (a = 1));
              for (var s = [], n = t; i >= 0; ) s.push(n), (n += a), (i -= 1);
              return { result: s, niceMin: s[0], niceMax: s[s.length - 1] };
            },
          },
          {
            key: "logarithmicScale",
            value: function (t, e, i, a) {
              (e < 0 || e === Number.MIN_VALUE) && (e = 0.01);
              for (
                var s = Math.log(e) / Math.log(10),
                  n = Math.log(i) / Math.log(10),
                  r = Math.abs(i - e) / a,
                  o = [],
                  l = e;
                a >= 0;

              )
                o.push(l), (l += r), (a -= 1);
              var h = o.map(function (t, a) {
                t <= 0 && (t = 0.01);
                var r = (n - s) / (i - e),
                  o = Math.pow(10, s + r * (t - s));
                return (
                  Math.round(o / u.roundToBase(o, 10)) * u.roundToBase(o, 10)
                );
              });
              return (
                0 === h[0] && (h[0] = 1),
                { result: h, niceMin: h[0], niceMax: h[h.length - 1] }
              );
            },
          },
          {
            key: "setYScaleForIndex",
            value: function (t, e, i) {
              var a = this.w.globals,
                s = this.w.config,
                n = a.isBarHorizontal ? s.xaxis : s.yaxis[t];
              if (
                (void 0 === a.yAxisScale[t] && (a.yAxisScale[t] = []),
                n.logarithmic)
              )
                (a.allSeriesCollapsed = !1),
                  (a.yAxisScale[t] = this.logarithmicScale(
                    t,
                    e,
                    i,
                    n.tickAmount ? n.tickAmount : Math.floor(Math.log10(i))
                  ));
              else if (i !== -Number.MAX_VALUE && u.isNumber(i))
                if (
                  ((a.allSeriesCollapsed = !1),
                  (void 0 === n.min && void 0 === n.max) || n.forceNiceScale)
                ) {
                  var r = Math.abs(i - e);
                  a.yAxisScale[t] = this.niceScale(
                    e,
                    i,
                    r,
                    t,
                    n.tickAmount ? n.tickAmount : r < 5 && r > 1 ? r + 1 : 5
                  );
                } else a.yAxisScale[t] = this.linearScale(e, i, n.tickAmount);
              else a.yAxisScale[t] = this.linearScale(0, 5, 5);
            },
          },
          {
            key: "setMultipleYScales",
            value: function () {
              var t = this,
                e = this.w.globals,
                i = this.w.config,
                a = e.minYArr.concat([]),
                s = e.maxYArr.concat([]),
                n = [];
              i.yaxis.forEach(function (r, o) {
                var l = o;
                i.series.forEach(function (t, i) {
                  t.name === r.seriesName &&
                    -1 === e.collapsedSeriesIndices.indexOf(i) &&
                    ((l = i),
                    o !== i
                      ? n.push({ index: i, similarIndex: o, alreadyExists: !0 })
                      : n.push({ index: i }));
                });
                var h = a[l],
                  c = s[l];
                t.setYScaleForIndex(o, h, c);
              }),
                this.sameScaleInMultipleAxes(a, s, n);
            },
          },
          {
            key: "sameScaleInMultipleAxes",
            value: function (t, e, i) {
              var a = this,
                s = this.w.config,
                n = this.w.globals,
                r = [];
              i.forEach(function (t) {
                t.alreadyExists &&
                  (void 0 === r[t.index] && (r[t.index] = []),
                  r[t.index].push(t.index),
                  r[t.index].push(t.similarIndex));
              }),
                (n.yAxisSameScaleIndices = r),
                r.forEach(function (t, e) {
                  r.forEach(function (i, a) {
                    var s, n;
                    e !== a &&
                      ((s = t),
                      (n = i),
                      s.filter(function (t) {
                        return -1 !== n.indexOf(t);
                      })).length > 0 &&
                      (r[e] = r[e].concat(r[a]));
                  });
                });
              var o = r
                .map(function (t) {
                  return t.filter(function (e, i) {
                    return t.indexOf(e) === i;
                  });
                })
                .map(function (t) {
                  return t.sort();
                });
              r = r.filter(function (t) {
                return !!t;
              });
              var l = o.slice(),
                h = l.map(function (t) {
                  return JSON.stringify(t);
                });
              l = l.filter(function (t, e) {
                return h.indexOf(JSON.stringify(t)) === e;
              });
              var c = [],
                d = [];
              t.forEach(function (t, i) {
                l.forEach(function (a, s) {
                  a.indexOf(i) > -1 &&
                    (void 0 === c[s] && ((c[s] = []), (d[s] = [])),
                    c[s].push({ key: i, value: t }),
                    d[s].push({ key: i, value: e[i] }));
                });
              });
              var u = Array.apply(null, Array(l.length)).map(
                  Number.prototype.valueOf,
                  Number.MIN_VALUE
                ),
                g = Array.apply(null, Array(l.length)).map(
                  Number.prototype.valueOf,
                  -Number.MAX_VALUE
                );
              c.forEach(function (t, e) {
                t.forEach(function (t, i) {
                  u[e] = Math.min(t.value, u[e]);
                });
              }),
                d.forEach(function (t, e) {
                  t.forEach(function (t, i) {
                    g[e] = Math.max(t.value, g[e]);
                  });
                }),
                t.forEach(function (t, e) {
                  d.forEach(function (t, i) {
                    var r = u[i],
                      o = g[i];
                    s.chart.stacked &&
                      ((o = 0),
                      t.forEach(function (t, e) {
                        (o += t.value),
                          r !== Number.MIN_VALUE && (r += c[i][e].value);
                      })),
                      t.forEach(function (i, l) {
                        t[l].key === e &&
                          (void 0 !== s.yaxis[e].min &&
                            (r =
                              "function" == typeof s.yaxis[e].min
                                ? s.yaxis[e].min(n.minY)
                                : s.yaxis[e].min),
                          void 0 !== s.yaxis[e].max &&
                            (o =
                              "function" == typeof s.yaxis[e].max
                                ? s.yaxis[e].max(n.maxY)
                                : s.yaxis[e].max),
                          a.setYScaleForIndex(e, r, o));
                      });
                  });
                });
            },
          },
          {
            key: "autoScaleY",
            value: function (t, e, i) {
              t || (t = this);
              var a = t.w;
              if (a.globals.isMultipleYAxis || a.globals.collapsedSeries.length)
                return (
                  console.warn(
                    "autoScaleYaxis is not supported in a multi-yaxis chart."
                  ),
                  e
                );
              var s = a.globals.seriesX[0],
                n = a.config.chart.stacked;
              return (
                e.forEach(function (t, r) {
                  for (var o = 0, l = 0; l < s.length; l++)
                    if (s[l] >= i.xaxis.min) {
                      o = l;
                      break;
                    }
                  var h,
                    c,
                    d = a.globals.minYArr[r],
                    u = a.globals.maxYArr[r],
                    g = a.globals.stackedSeriesTotals;
                  a.globals.series.forEach(function (r, l) {
                    var f = r[o];
                    n
                      ? ((f = g[o]),
                        (h = c = f),
                        g.forEach(function (t, e) {
                          s[e] <= i.xaxis.max &&
                            s[e] >= i.xaxis.min &&
                            (t > c && null !== t && (c = t),
                            r[e] < h && null !== r[e] && (h = r[e]));
                        }))
                      : ((h = c = f),
                        r.forEach(function (t, e) {
                          if (s[e] <= i.xaxis.max && s[e] >= i.xaxis.min) {
                            var n = t,
                              r = t;
                            a.globals.series.forEach(function (i, a) {
                              null !== t &&
                                ((n = Math.min(i[e], n)),
                                (r = Math.max(i[e], r)));
                            }),
                              r > c && null !== r && (c = r),
                              n < h && null !== n && (h = n);
                          }
                        })),
                      void 0 === h && void 0 === c && ((h = d), (c = u)),
                      (c *= c < 0 ? 0.9 : 1.1) < 0 && c < u && (c = u),
                      (h *= h < 0 ? 1.1 : 0.9) < 0 && h > d && (h = d),
                      e.length > 1
                        ? ((e[l].min = void 0 === t.min ? h : t.min),
                          (e[l].max = void 0 === t.max ? c : t.max))
                        : ((e[0].min = void 0 === t.min ? h : t.min),
                          (e[0].max = void 0 === t.max ? c : t.max));
                  });
                }),
                e
              );
            },
          },
        ]),
        t
      );
    })(),
    U = (function () {
      function t(i) {
        e(this, t), (this.ctx = i), (this.w = i.w), (this.scales = new j(i));
      }
      return (
        a(t, [
          {
            key: "init",
            value: function () {
              this.setYRange(), this.setXRange(), this.setZRange();
            },
          },
          {
            key: "getMinYMaxY",
            value: function (t) {
              var e =
                  arguments.length > 1 && void 0 !== arguments[1]
                    ? arguments[1]
                    : Number.MAX_VALUE,
                i =
                  arguments.length > 2 && void 0 !== arguments[2]
                    ? arguments[2]
                    : -Number.MAX_VALUE,
                a =
                  arguments.length > 3 && void 0 !== arguments[3]
                    ? arguments[3]
                    : null,
                s = this.w.globals,
                n = -Number.MAX_VALUE,
                r = Number.MIN_VALUE;
              null === a && (a = t + 1);
              var o = s.series,
                l = o,
                h = o;
              "candlestick" === this.w.config.chart.type
                ? ((l = s.seriesCandleL), (h = s.seriesCandleH))
                : s.isRangeData &&
                  ((l = s.seriesRangeStart), (h = s.seriesRangeEnd));
              for (var c = t; c < a; c++) {
                s.dataPoints = Math.max(s.dataPoints, o[c].length);
                for (var d = 0; d < s.series[c].length; d++) {
                  var g = o[c][d];
                  null !== g && u.isNumber(g)
                    ? ((n = Math.max(n, h[c][d])),
                      (e = Math.min(e, l[c][d])),
                      (i = Math.max(i, l[c][d])),
                      "candlestick" === this.w.config.chart.type &&
                        ((n = Math.max(n, s.seriesCandleO[c][d])),
                        (n = Math.max(n, s.seriesCandleH[c][d])),
                        (n = Math.max(n, s.seriesCandleL[c][d])),
                        (i = n = Math.max(n, s.seriesCandleC[c][d]))),
                      u.isFloat(g) &&
                        ((g = u.noExponents(g)),
                        (s.yValueDecimal = Math.max(
                          s.yValueDecimal,
                          g.toString().split(".")[1].length
                        ))),
                      r > l[c][d] && l[c][d] < 0 && (r = l[c][d]))
                    : (s.hasNullValues = !0);
                }
              }
              return { minY: r, maxY: n, lowestY: e, highestY: i };
            },
          },
          {
            key: "setYRange",
            value: function () {
              var t = this.w.globals,
                e = this.w.config;
              (t.maxY = -Number.MAX_VALUE), (t.minY = Number.MIN_VALUE);
              var i = Number.MAX_VALUE;
              if (t.isMultipleYAxis)
                for (var a = 0; a < t.series.length; a++) {
                  var s = this.getMinYMaxY(a, i, null, a + 1);
                  t.minYArr.push(s.minY),
                    t.maxYArr.push(s.maxY),
                    (i = s.lowestY);
                }
              var n = this.getMinYMaxY(0, i, null, t.series.length);
              if (
                ((t.minY = n.minY),
                (t.maxY = n.maxY),
                (i = n.lowestY),
                e.chart.stacked)
              ) {
                var r = [],
                  o = [];
                if (t.series.length)
                  for (
                    var l = 0;
                    l < t.series[t.maxValsInArrayIndex].length;
                    l++
                  )
                    for (var h = 0, c = 0, d = 0; d < t.series.length; d++)
                      null !== t.series[d][l] &&
                        u.isNumber(t.series[d][l]) &&
                        (t.series[d][l] > 0
                          ? (h = h + parseFloat(t.series[d][l]) + 1e-4)
                          : (c += parseFloat(t.series[d][l]))),
                        d === t.series.length - 1 && (r.push(h), o.push(c));
                for (var g = 0; g < r.length; g++)
                  (t.maxY = Math.max(t.maxY, r[g])),
                    (t.minY = Math.min(t.minY, o[g]));
              }
              if (
                ("line" === e.chart.type ||
                  "area" === e.chart.type ||
                  "candlestick" === e.chart.type) &&
                t.minY === Number.MIN_VALUE &&
                i !== -Number.MAX_VALUE &&
                i !== t.maxY
              ) {
                var f = t.maxY - i;
                i >= 0 && i <= 10 && (f = 0),
                  (t.minY = i - (5 * f) / 100),
                  (t.maxY = t.maxY + (5 * f) / 100);
              }
              return (
                e.yaxis.map(function (e, i) {
                  void 0 !== e.max &&
                    ("number" == typeof e.max
                      ? (t.maxYArr[i] = e.max)
                      : "function" == typeof e.max &&
                        (t.maxYArr[i] = e.max(t.maxY)),
                    (t.maxY = t.maxYArr[i])),
                    void 0 !== e.min &&
                      ("number" == typeof e.min
                        ? (t.minYArr[i] = e.min)
                        : "function" == typeof e.min &&
                          (t.minYArr[i] = e.min(t.minY)),
                      (t.minY = t.minYArr[i]));
                }),
                t.isBarHorizontal &&
                  (void 0 !== e.xaxis.min &&
                    "number" == typeof e.xaxis.min &&
                    (t.minY = e.xaxis.min),
                  void 0 !== e.xaxis.max &&
                    "number" == typeof e.xaxis.max &&
                    (t.maxY = e.xaxis.max)),
                t.isMultipleYAxis
                  ? (this.scales.setMultipleYScales(),
                    (t.minY = i),
                    t.yAxisScale.forEach(function (e, i) {
                      (t.minYArr[i] = e.niceMin), (t.maxYArr[i] = e.niceMax);
                    }))
                  : (this.scales.setYScaleForIndex(0, t.minY, t.maxY),
                    (t.minY = t.yAxisScale[0].niceMin),
                    (t.maxY = t.yAxisScale[0].niceMax),
                    (t.minYArr[0] = t.yAxisScale[0].niceMin),
                    (t.maxYArr[0] = t.yAxisScale[0].niceMax)),
                {
                  minY: t.minY,
                  maxY: t.maxY,
                  minYArr: t.minYArr,
                  maxYArr: t.maxYArr,
                }
              );
            },
          },
          {
            key: "setXRange",
            value: function () {
              var t,
                e = this.w.globals,
                i = this.w.config,
                a =
                  "numeric" === i.xaxis.type ||
                  "datetime" === i.xaxis.type ||
                  ("category" === i.xaxis.type && !e.noLabelsProvided) ||
                  e.noLabelsProvided ||
                  e.isXNumeric;
              if (e.isXNumeric)
                for (var s = 0; s < e.series.length; s++)
                  if (e.labels[s])
                    for (var n = 0; n < e.labels[s].length; n++)
                      null !== e.labels[s][n] &&
                        u.isNumber(e.labels[s][n]) &&
                        ((e.maxX = Math.max(e.maxX, e.labels[s][n])),
                        (e.initialmaxX = Math.max(e.maxX, e.labels[s][n])),
                        (e.minX = Math.min(e.minX, e.labels[s][n])),
                        (e.initialminX = Math.min(e.minX, e.labels[s][n])));
              if (
                (e.noLabelsProvided &&
                  0 === i.xaxis.categories.length &&
                  ((e.maxX = e.labels[e.labels.length - 1]),
                  (e.initialmaxX = e.labels[e.labels.length - 1]),
                  (e.minX = 1),
                  (e.initialminX = 1)),
                (e.comboChartsHasBars ||
                  "candlestick" === i.chart.type ||
                  ("bar" === i.chart.type && e.isXNumeric)) &&
                  ("category" !== i.xaxis.type || e.isXNumeric))
              ) {
                var r =
                    (e.svgWidth / e.dataPoints) *
                    (Math.abs(e.maxX - e.minX) / e.svgWidth),
                  o = e.minX - r / 2;
                (e.minX = o), (e.initialminX = o);
                var l = e.maxX + r / ((e.series.length + 1) / e.series.length);
                (e.maxX = l), (e.initialmaxX = l);
              }
              (!e.isXNumeric && !e.noLabelsProvided) ||
                (i.xaxis.convertedCatToNumeric && !e.dataFormatXNumeric) ||
                (void 0 === i.xaxis.tickAmount
                  ? ((t = Math.round(e.svgWidth / 150)),
                    "numeric" === i.xaxis.type &&
                      e.dataPoints < 20 &&
                      (t = e.dataPoints - 1),
                    t > e.dataPoints &&
                      0 !== e.dataPoints &&
                      (t = e.dataPoints - 1))
                  : (t =
                      "dataPoints" === i.xaxis.tickAmount
                        ? e.series[e.maxValsInArrayIndex].length - 1
                        : i.xaxis.tickAmount),
                void 0 !== i.xaxis.max &&
                  "number" == typeof i.xaxis.max &&
                  (e.maxX = i.xaxis.max),
                void 0 !== i.xaxis.min &&
                  "number" == typeof i.xaxis.min &&
                  (e.minX = i.xaxis.min),
                void 0 !== i.xaxis.range && (e.minX = e.maxX - i.xaxis.range),
                e.minX !== Number.MAX_VALUE && e.maxX !== -Number.MAX_VALUE
                  ? (e.xAxisScale = this.scales.linearScale(e.minX, e.maxX, t))
                  : ((e.xAxisScale = this.scales.linearScale(1, t, t)),
                    e.noLabelsProvided &&
                      e.labels.length > 0 &&
                      ((e.xAxisScale = this.scales.linearScale(
                        1,
                        e.labels.length,
                        t - 1
                      )),
                      (e.seriesX = e.labels.slice()))),
                a && (e.labels = e.xAxisScale.result.slice()));
              if (e.minX === e.maxX)
                if ("datetime" === i.xaxis.type) {
                  var h = new Date(e.minX);
                  h.setDate(h.getDate() - 2), (e.minX = new Date(h).getTime());
                  var c = new Date(e.maxX);
                  c.setDate(c.getDate() + 2), (e.maxX = new Date(c).getTime());
                } else
                  ("numeric" === i.xaxis.type ||
                    ("category" === i.xaxis.type && !e.noLabelsProvided)) &&
                    ((e.minX = e.minX - 2), (e.maxX = e.maxX + 2));
              return (
                e.isXNumeric &&
                  e.seriesX.forEach(function (t, i) {
                    1 === t.length &&
                      t.push(
                        e.seriesX[e.maxValsInArrayIndex][
                          e.seriesX[e.maxValsInArrayIndex].length - 1
                        ]
                      );
                    var a = t.slice();
                    a.sort(function (t, e) {
                      return t - e;
                    }),
                      a.forEach(function (t, a) {
                        if (a > 0) {
                          var s = t - e.seriesX[i][a - 1];
                          e.minXDiff = Math.min(s, e.minXDiff);
                        }
                      });
                  }),
                { minX: e.minX, maxX: e.maxX }
              );
            },
          },
          {
            key: "setZRange",
            value: function () {
              var t = this.w.globals;
              if (t.isDataXYZ)
                for (var e = 0; e < t.series.length; e++)
                  if (void 0 !== t.seriesZ[e])
                    for (var i = 0; i < t.seriesZ[e].length; i++)
                      null !== t.seriesZ[e][i] &&
                        u.isNumber(t.seriesZ[e][i]) &&
                        ((t.maxZ = Math.max(t.maxZ, t.seriesZ[e][i])),
                        (t.minZ = Math.min(t.minZ, t.seriesZ[e][i])));
            },
          },
        ]),
        t
      );
    })(),
    q = (function () {
      function t(i) {
        e(this, t), (this.ctx = i), (this.w = i.w), (this.timeScaleArray = []);
      }
      return (
        a(t, [
          {
            key: "calculateTimeScaleTicks",
            value: function (t, e) {
              var i = this,
                a = this.w;
              if (a.globals.allSeriesCollapsed)
                return (
                  (a.globals.labels = []), (a.globals.timelineLabels = []), []
                );
              var s = new v(this.ctx),
                n = (e - t) / 864e5;
              this.determineInterval(n),
                (a.globals.disableZoomIn = !1),
                (a.globals.disableZoomOut = !1),
                n < 0.005
                  ? (a.globals.disableZoomIn = !0)
                  : n > 5e4 && (a.globals.disableZoomOut = !0);
              var o = s.getTimeUnitsfromTimestamp(t, e),
                l = a.globals.gridWidth / n,
                h = l / 24,
                c = h / 60,
                d = Math.floor(24 * n),
                u = Math.floor(24 * n * 60),
                g = Math.floor(n),
                f = Math.floor(n / 30),
                p = Math.floor(n / 365),
                x = {
                  minMinute: o.minMinute,
                  minHour: o.minHour,
                  minDate: o.minDate,
                  minMonth: o.minMonth,
                  minYear: o.minYear,
                },
                b = {
                  firstVal: x,
                  currentMinute: x.minMinute,
                  currentHour: x.minHour,
                  currentMonthDate: x.minDate,
                  currentDate: x.minDate,
                  currentMonth: x.minMonth,
                  currentYear: x.minYear,
                  daysWidthOnXAxis: l,
                  hoursWidthOnXAxis: h,
                  minutesWidthOnXAxis: c,
                  numberOfMinutes: u,
                  numberOfHours: d,
                  numberOfDays: g,
                  numberOfMonths: f,
                  numberOfYears: p,
                };
              switch (this.tickInterval) {
                case "years":
                  this.generateYearScale(b);
                  break;
                case "months":
                case "half_year":
                  this.generateMonthScale(b);
                  break;
                case "months_days":
                case "months_fortnight":
                case "days":
                case "week_days":
                  this.generateDayScale(b);
                  break;
                case "hours":
                  this.generateHourScale(b);
                  break;
                case "minutes":
                  this.generateMinuteScale(b);
              }
              var m = this.timeScaleArray.map(function (t) {
                var e = {
                  position: t.position,
                  unit: t.unit,
                  year: t.year,
                  day: t.day ? t.day : 1,
                  hour: t.hour ? t.hour : 0,
                  month: t.month + 1,
                };
                return "month" === t.unit
                  ? r({}, e, { day: 1, value: t.value + 1 })
                  : "day" === t.unit || "hour" === t.unit
                  ? r({}, e, { value: t.value })
                  : "minute" === t.unit
                  ? r({}, e, { value: t.value, minute: t.value })
                  : t;
              });
              return m.filter(function (t) {
                var e = 1,
                  s = Math.ceil(a.globals.gridWidth / 120),
                  n = t.value;
                void 0 !== a.config.xaxis.tickAmount &&
                  (s = a.config.xaxis.tickAmount),
                  m.length > s && (e = Math.floor(m.length / s));
                var r = !1,
                  o = !1;
                switch (i.tickInterval) {
                  case "half_year":
                    (e = 7), "year" === t.unit && (r = !0);
                    break;
                  case "months":
                    (e = 1), "year" === t.unit && (r = !0);
                    break;
                  case "months_fortnight":
                    (e = 15),
                      ("year" !== t.unit && "month" !== t.unit) || (r = !0),
                      30 === n && (o = !0);
                    break;
                  case "months_days":
                    (e = 10),
                      "month" === t.unit && (r = !0),
                      30 === n && (o = !0);
                    break;
                  case "week_days":
                    (e = 8), "month" === t.unit && (r = !0);
                    break;
                  case "days":
                    (e = 1), "month" === t.unit && (r = !0);
                    break;
                  case "hours":
                    "day" === t.unit && (r = !0);
                    break;
                  case "minutes":
                    n % 5 != 0 && (o = !0);
                }
                if (
                  "minutes" === i.tickInterval ||
                  "hours" === i.tickInterval
                ) {
                  if (!o) return !0;
                } else if ((n % e == 0 || r) && !o) return !0;
              });
            },
          },
          {
            key: "recalcDimensionsBasedOnFormat",
            value: function (t, e) {
              var i = this.w,
                a = this.formatDates(t),
                s = this.removeOverlappingTS(a);
              e
                ? (i.globals.invertedTimelineLabels = s.slice())
                : (i.globals.timelineLabels = s.slice()),
                new W(this.ctx).plotCoords();
            },
          },
          {
            key: "determineInterval",
            value: function (t) {
              switch (!0) {
                case t > 1825:
                  this.tickInterval = "years";
                  break;
                case t > 800 && t <= 1825:
                  this.tickInterval = "half_year";
                  break;
                case t > 180 && t <= 800:
                  this.tickInterval = "months";
                  break;
                case t > 90 && t <= 180:
                  this.tickInterval = "months_fortnight";
                  break;
                case t > 60 && t <= 90:
                  this.tickInterval = "months_days";
                  break;
                case t > 30 && t <= 60:
                  this.tickInterval = "week_days";
                  break;
                case t > 2 && t <= 30:
                  this.tickInterval = "days";
                  break;
                case t > 0.1 && t <= 2:
                  this.tickInterval = "hours";
                  break;
                case t < 0.1:
                  this.tickInterval = "minutes";
                  break;
                default:
                  this.tickInterval = "days";
              }
            },
          },
          {
            key: "generateYearScale",
            value: function (t) {
              var e = t.firstVal,
                i = t.currentMonth,
                a = t.currentYear,
                s = t.daysWidthOnXAxis,
                n = t.numberOfYears,
                r = e.minYear,
                o = 0,
                l = new v(this.ctx);
              if (e.minDate > 1 && e.minMonth > 0) {
                var h = l.determineRemainingDaysOfYear(
                  e.minYear,
                  e.minMonth,
                  e.minDate
                );
                (o = (l.determineDaysOfYear(e.minYear) - h + 1) * s),
                  (r = e.minYear + 1),
                  this.timeScaleArray.push({
                    position: o,
                    value: r,
                    unit: "year",
                    year: r,
                    month: u.monthMod(i + 1),
                  });
              } else
                1 === e.minDate &&
                  0 === e.minMonth &&
                  this.timeScaleArray.push({
                    position: o,
                    value: r,
                    unit: "year",
                    year: a,
                    month: u.monthMod(i + 1),
                  });
              for (var c = r, d = o, g = 0; g < n; g++)
                c++,
                  (d = l.determineDaysOfYear(c - 1) * s + d),
                  this.timeScaleArray.push({
                    position: d,
                    value: c,
                    unit: "year",
                    year: c,
                    month: 1,
                  });
            },
          },
          {
            key: "generateMonthScale",
            value: function (t) {
              var e = t.firstVal,
                i = t.currentMonthDate,
                a = t.currentMonth,
                s = t.currentYear,
                n = t.daysWidthOnXAxis,
                r = t.numberOfMonths,
                o = a,
                l = 0,
                h = new v(this.ctx),
                c = "month",
                d = 0;
              if (e.minDate > 1) {
                (l = (h.determineDaysOfMonths(a + 1, e.minYear) - i + 1) * n),
                  (o = u.monthMod(a + 1));
                var g = s + d,
                  f = u.monthMod(o),
                  p = o;
                0 === o && ((c = "year"), (p = g), (f = 1), (g += d += 1)),
                  this.timeScaleArray.push({
                    position: l,
                    value: p,
                    unit: c,
                    year: g,
                    month: f,
                  });
              } else
                this.timeScaleArray.push({
                  position: l,
                  value: o,
                  unit: c,
                  year: s,
                  month: u.monthMod(a),
                });
              for (var x = o + 1, b = l, m = 0, y = 1; m < r; m++, y++) {
                0 === (x = u.monthMod(x))
                  ? ((c = "year"), (d += 1))
                  : (c = "month");
                var w = s + Math.floor(x / 12) + d;
                b = h.determineDaysOfMonths(x, w) * n + b;
                var k = 0 === x ? w : x;
                this.timeScaleArray.push({
                  position: b,
                  value: k,
                  unit: c,
                  year: w,
                  month: 0 === x ? 1 : x,
                }),
                  x++;
              }
            },
          },
          {
            key: "generateDayScale",
            value: function (t) {
              var e = t.firstVal,
                i = t.currentMonth,
                a = t.currentYear,
                s = t.hoursWidthOnXAxis,
                n = t.numberOfDays,
                r = new v(this.ctx),
                o = "day",
                l = (24 - e.minHour) * s,
                h = e.minDate + 1,
                c = h,
                d = function (t, e, i) {
                  return t > r.determineDaysOfMonths(e + 1, i)
                    ? ((g = 1), (o = "month"), (c = e += 1), e)
                    : e;
                },
                g = h,
                f = d(g, i, a);
              this.timeScaleArray.push({
                position: l,
                value: c,
                unit: o,
                year: a,
                month: u.monthMod(f),
                day: g,
              });
              for (var p = l, x = 0; x < n; x++) {
                (o = "day"), (f = d((g += 1), f, a + Math.floor(f / 12) + 0));
                var b = a + Math.floor(f / 12) + 0;
                p = 24 * s + p;
                var m = 1 === g ? u.monthMod(f) : g;
                this.timeScaleArray.push({
                  position: p,
                  value: m,
                  unit: o,
                  year: b,
                  month: u.monthMod(f),
                  day: m,
                });
              }
            },
          },
          {
            key: "generateHourScale",
            value: function (t) {
              var e = t.firstVal,
                i = t.currentDate,
                a = t.currentMonth,
                s = t.currentYear,
                n = t.minutesWidthOnXAxis,
                r = t.numberOfHours,
                o = new v(this.ctx),
                l = "hour",
                h = function (t, e) {
                  return (
                    t > o.determineDaysOfMonths(e + 1, s) &&
                      ((x = 1), (e += 1)),
                    { month: e, date: x }
                  );
                },
                c = function (t, e) {
                  return t > o.determineDaysOfMonths(e + 1, s) ? (e += 1) : e;
                },
                d = 60 - e.minMinute,
                g = d * n,
                f = e.minHour + 1,
                p = f + 1;
              60 === d && ((g = 0), (p = (f = e.minHour) + 1));
              var x = i,
                b = c(x, a);
              this.timeScaleArray.push({
                position: g,
                value: f,
                unit: l,
                day: x,
                hour: p,
                year: s,
                month: u.monthMod(b),
              });
              for (var m = g, y = 0; y < r; y++) {
                if (((l = "hour"), p >= 24))
                  (p = 0),
                    (l = "day"),
                    (b = h((x += 1), b).month),
                    (b = c(x, b));
                var w = s + Math.floor(b / 12) + 0;
                m = 0 === p && 0 === y ? d * n : 60 * n + m;
                var k = 0 === p ? x : p;
                this.timeScaleArray.push({
                  position: m,
                  value: k,
                  unit: l,
                  hour: p,
                  day: x,
                  year: w,
                  month: u.monthMod(b),
                }),
                  p++;
              }
            },
          },
          {
            key: "generateMinuteScale",
            value: function (t) {
              var e = t.firstVal,
                i = t.currentMinute,
                a = t.currentHour,
                s = t.currentDate,
                n = t.currentMonth,
                r = t.currentYear,
                o = t.minutesWidthOnXAxis,
                l = t.numberOfMinutes,
                h = o - (i - e.minMinute),
                c = e.minMinute + 1,
                d = c + 1,
                g = s,
                f = n,
                p = r,
                x = a;
              this.timeScaleArray.push({
                position: h,
                value: c,
                unit: "minute",
                day: g,
                hour: x,
                minute: d,
                year: p,
                month: u.monthMod(f),
              });
              for (var b = h, m = 0; m < l; m++) {
                d >= 60 && ((d = 0), 24 === (x += 1) && (x = 0));
                var v = r + Math.floor(f / 12) + 0;
                b = o + b;
                var y = d;
                this.timeScaleArray.push({
                  position: b,
                  value: y,
                  unit: "minute",
                  hour: x,
                  minute: d,
                  day: g,
                  year: v,
                  month: u.monthMod(f),
                }),
                  d++;
              }
            },
          },
          {
            key: "createRawDateString",
            value: function (t, e) {
              var i = t.year;
              return (
                (i += "-" + ("0" + t.month.toString()).slice(-2)),
                "day" === t.unit
                  ? (i += "day" === t.unit ? "-" + ("0" + e).slice(-2) : "-01")
                  : (i += "-" + ("0" + (t.day ? t.day : "1")).slice(-2)),
                "hour" === t.unit
                  ? (i += "hour" === t.unit ? "T" + ("0" + e).slice(-2) : "T00")
                  : (i += "T" + ("0" + (t.hour ? t.hour : "0")).slice(-2)),
                (i +=
                  "minute" === t.unit
                    ? ":" + ("0" + e).slice(-2) + ":00.000Z"
                    : ":00:00.000Z")
              );
            },
          },
          {
            key: "formatDates",
            value: function (t) {
              var e = this,
                i = this.w;
              return t.map(function (t) {
                var a = t.value.toString(),
                  s = new v(e.ctx),
                  n = e.createRawDateString(t, a),
                  r = new Date(Date.parse(n));
                if (void 0 === i.config.xaxis.labels.format) {
                  var o = "dd MMM",
                    l = i.config.xaxis.labels.datetimeFormatter;
                  "year" === t.unit && (o = l.year),
                    "month" === t.unit && (o = l.month),
                    "day" === t.unit && (o = l.day),
                    "hour" === t.unit && (o = l.hour),
                    "minute" === t.unit && (o = l.minute),
                    (a = s.formatDate(r, o, !0, !1));
                } else a = s.formatDate(r, i.config.xaxis.labels.format);
                return {
                  dateString: n,
                  position: t.position,
                  value: a,
                  unit: t.unit,
                  year: t.year,
                  month: t.month,
                };
              });
            },
          },
          {
            key: "removeOverlappingTS",
            value: function (t) {
              var e = this,
                i = new p(this.ctx),
                a = 0,
                s = t.map(function (s, n) {
                  if (n > 0 && e.w.config.xaxis.labels.hideOverlappingLabels) {
                    var r = i.getTextRects(t[a].value).width,
                      o = t[a].position;
                    return s.position > o + r + 10 ? ((a = n), s) : null;
                  }
                  return s;
                });
              return (s = s.filter(function (t) {
                return null !== t;
              }));
            },
          },
        ]),
        t
      );
    })(),
    Z = (function () {
      function t(i, a) {
        e(this, t),
          (this.ctx = a),
          (this.w = a.w),
          (this.el = i),
          (this.coreUtils = new w(this.ctx)),
          (this.twoDSeries = []),
          (this.threeDSeries = []),
          (this.twoDSeriesX = []);
      }
      return (
        a(t, [
          {
            key: "setupElements",
            value: function () {
              var t = this.w.globals,
                e = this.w.config,
                i = e.chart.type;
              (t.axisCharts =
                [
                  "line",
                  "area",
                  "bar",
                  "rangeBar",
                  "candlestick",
                  "radar",
                  "scatter",
                  "bubble",
                  "heatmap",
                ].indexOf(i) > -1),
                (t.xyCharts =
                  [
                    "line",
                    "area",
                    "bar",
                    "rangeBar",
                    "candlestick",
                    "scatter",
                    "bubble",
                  ].indexOf(i) > -1),
                (t.isBarHorizontal =
                  ("bar" === e.chart.type || "rangeBar" === e.chart.type) &&
                  e.plotOptions.bar.horizontal),
                (t.chartClass = ".apexcharts" + t.cuid),
                (t.dom.baseEl = this.el),
                (t.dom.elWrap = document.createElement("div")),
                p.setAttrs(t.dom.elWrap, {
                  id: t.chartClass.substring(1),
                  class: "apexcharts-canvas " + t.chartClass.substring(1),
                }),
                this.el.appendChild(t.dom.elWrap),
                (t.dom.Paper = new window.SVG.Doc(t.dom.elWrap)),
                t.dom.Paper.attr({
                  class: "apexcharts-svg",
                  "xmlns:data": "ApexChartsNS",
                  transform: "translate("
                    .concat(e.chart.offsetX, ", ")
                    .concat(e.chart.offsetY, ")"),
                }),
                (t.dom.Paper.node.style.background = e.chart.background),
                this.setSVGDimensions(),
                (t.dom.elGraphical = t.dom.Paper.group().attr({
                  class: "apexcharts-inner apexcharts-graphical",
                })),
                (t.dom.elDefs = t.dom.Paper.defs()),
                (t.dom.elLegendWrap = document.createElement("div")),
                t.dom.elLegendWrap.classList.add("apexcharts-legend"),
                t.dom.elWrap.appendChild(t.dom.elLegendWrap),
                t.dom.Paper.add(t.dom.elGraphical),
                t.dom.elGraphical.add(t.dom.elDefs);
            },
          },
          {
            key: "plotChartType",
            value: function (t, e) {
              var i = this.w,
                a = i.config,
                s = i.globals,
                n = { series: [], i: [] },
                r = { series: [], i: [] },
                o = { series: [], i: [] },
                l = { series: [], i: [] },
                h = { series: [], i: [] },
                c = { series: [], i: [] };
              s.series.map(function (e, a) {
                void 0 !== t[a].type
                  ? ("column" === t[a].type || "bar" === t[a].type
                      ? ((i.config.plotOptions.bar.horizontal = !1),
                        h.series.push(e),
                        h.i.push(a),
                        (i.globals.columnSeries = h.series))
                      : "area" === t[a].type
                      ? (r.series.push(e), r.i.push(a))
                      : "line" === t[a].type
                      ? (n.series.push(e), n.i.push(a))
                      : "scatter" === t[a].type
                      ? (o.series.push(e), o.i.push(a))
                      : "bubble" === t[a].type
                      ? (l.series.push(e), l.i.push(a))
                      : "candlestick" === t[a].type
                      ? (c.series.push(e), c.i.push(a))
                      : console.warn(
                          "You have specified an unrecognized chart type. Available types for this propery are line/area/column/bar/scatter/bubble"
                        ),
                    (s.comboCharts = !0))
                  : (n.series.push(e), n.i.push(a));
              });
              var d = new G(this.ctx, e),
                u = new T(this.ctx, e),
                g = new Y(this.ctx),
                f = new R(this.ctx),
                p = new D(this.ctx, e),
                x = new F(this.ctx),
                b = [];
              if (s.comboCharts) {
                if (
                  (r.series.length > 0 && b.push(d.draw(r.series, "area", r.i)),
                  h.series.length > 0)
                )
                  if (i.config.chart.stacked) {
                    var m = new M(this.ctx, e);
                    b.push(m.draw(h.series, h.i));
                  } else {
                    var v = new E(this.ctx, e);
                    b.push(v.draw(h.series, h.i));
                  }
                if (
                  (n.series.length > 0 && b.push(d.draw(n.series, "line", n.i)),
                  c.series.length > 0 && b.push(u.draw(c.series, c.i)),
                  o.series.length > 0)
                ) {
                  var y = new G(this.ctx, e, !0);
                  b.push(y.draw(o.series, "scatter", o.i));
                }
                if (l.series.length > 0) {
                  var w = new G(this.ctx, e, !0);
                  b.push(w.draw(l.series, "bubble", l.i));
                }
              } else
                switch (a.chart.type) {
                  case "line":
                    b = d.draw(s.series, "line");
                    break;
                  case "area":
                    b = d.draw(s.series, "area");
                    break;
                  case "bar":
                    if (a.chart.stacked) b = new M(this.ctx, e).draw(s.series);
                    else b = new E(this.ctx, e).draw(s.series);
                    break;
                  case "candlestick":
                    b = new T(this.ctx, e).draw(s.series);
                    break;
                  case "rangeBar":
                    b = p.draw(s.series);
                    break;
                  case "heatmap":
                    b = new X(this.ctx, e).draw(s.series);
                    break;
                  case "pie":
                  case "donut":
                    b = g.draw(s.series);
                    break;
                  case "radialBar":
                    b = f.draw(s.series);
                    break;
                  case "radar":
                    b = x.draw(s.series);
                    break;
                  default:
                    b = d.draw(s.series);
                }
              return b;
            },
          },
          {
            key: "setSVGDimensions",
            value: function () {
              var t = this.w.globals,
                e = this.w.config;
              (t.svgWidth = e.chart.width), (t.svgHeight = e.chart.height);
              var i = u.getDimensions(this.el),
                a = e.chart.width
                  .toString()
                  .split(/[0-9]+/g)
                  .pop();
              if (
                ("%" === a
                  ? u.isNumber(i[0]) &&
                    (0 === i[0].width &&
                      (i = u.getDimensions(this.el.parentNode)),
                    (t.svgWidth = (i[0] * parseInt(e.chart.width)) / 100))
                  : ("px" !== a && "" !== a) ||
                    (t.svgWidth = parseInt(e.chart.width)),
                "auto" !== t.svgHeight && "" !== t.svgHeight)
              )
                if (
                  "%" ===
                  e.chart.height
                    .toString()
                    .split(/[0-9]+/g)
                    .pop()
                ) {
                  var s = u.getDimensions(this.el.parentNode);
                  t.svgHeight = (s[1] * parseInt(e.chart.height)) / 100;
                } else t.svgHeight = parseInt(e.chart.height);
              else
                t.axisCharts
                  ? (t.svgHeight = t.svgWidth / 1.61)
                  : (t.svgHeight = t.svgWidth);
              t.svgWidth < 0 && (t.svgWidth = 0),
                t.svgHeight < 0 && (t.svgHeight = 0),
                p.setAttrs(t.dom.Paper.node, {
                  width: t.svgWidth,
                  height: t.svgHeight,
                });
              var n = e.chart.sparkline.enabled
                ? 0
                : t.axisCharts
                ? e.chart.parentHeightOffset
                : 0;
              (t.dom.Paper.node.parentNode.parentNode.style.minHeight =
                t.svgHeight + n + "px"),
                (t.dom.elWrap.style.width = t.svgWidth + "px"),
                (t.dom.elWrap.style.height = t.svgHeight + "px");
            },
          },
          {
            key: "shiftGraphPosition",
            value: function () {
              var t = this.w.globals,
                e = t.translateY,
                i = { transform: "translate(" + t.translateX + ", " + e + ")" };
              p.setAttrs(t.dom.elGraphical.node, i);
            },
          },
          {
            key: "resizeNonAxisCharts",
            value: function () {
              var t = this.w,
                e = t.globals,
                i = 0;
              ("top" !== t.config.legend.position &&
                "bottom" !== t.config.legend.position) ||
                (i = new V(this.ctx).getLegendBBox().clwh + 10);
              var a = t.globals.dom.baseEl.querySelector(
                  ".apexcharts-radialbar .apexcharts-tracks"
                ),
                s = t.globals.dom.baseEl.querySelector(
                  ".apexcharts-radialbar .apexcharts-datalabels-group"
                ),
                n = 2 * t.globals.radialSize;
              if (a) {
                var r = u.getBoundingClientRect(a);
                if (((n = r.bottom), s)) {
                  var o = u.getBoundingClientRect(s),
                    l = Math.max(r.bottom, o.bottom) - r.top + o.height;
                  n = Math.max(2 * t.globals.radialSize, l);
                }
              }
              var h = n + e.translateY + i + 20;
              e.dom.elLegendForeign &&
                e.dom.elLegendForeign.setAttribute("height", h),
                (e.dom.elWrap.style.height = h + "px"),
                p.setAttrs(e.dom.Paper.node, { height: h }),
                (e.dom.Paper.node.parentNode.parentNode.style.minHeight =
                  h + "px");
            },
          },
          {
            key: "coreCalculations",
            value: function () {
              new U(this.ctx).init();
            },
          },
          {
            key: "resetGlobals",
            value: function () {
              var t = this,
                e = this.w.globals;
              (e.series = []),
                (e.seriesCandleO = []),
                (e.seriesCandleH = []),
                (e.seriesCandleL = []),
                (e.seriesCandleC = []),
                (e.seriesRangeStart = []),
                (e.seriesRangeEnd = []),
                (e.seriesPercent = []),
                (e.seriesX = []),
                (e.seriesZ = []),
                (e.seriesNames = []),
                (e.seriesTotals = []),
                (e.stackedSeriesTotals = []),
                (e.labels = []),
                (e.timelineLabels = []),
                (e.noLabelsProvided = !1),
                (e.timescaleTicks = []),
                (e.resizeTimer = null),
                (e.selectionResizeTimer = null),
                (e.seriesXvalues = t.w.config.series.map(function (t) {
                  return [];
                })),
                (e.seriesYvalues = t.w.config.series.map(function (t) {
                  return [];
                })),
                (e.delayedElements = []),
                (e.pointsArray = []),
                (e.dataLabelsRects = []),
                (e.isXNumeric = !1),
                (e.isDataXYZ = !1),
                (e.maxY = -Number.MAX_VALUE),
                (e.minY = Number.MIN_VALUE),
                (e.minYArr = []),
                (e.maxYArr = []),
                (e.maxX = -Number.MAX_VALUE),
                (e.minX = Number.MAX_VALUE),
                (e.initialmaxX = -Number.MAX_VALUE),
                (e.initialminX = Number.MAX_VALUE),
                (e.maxDate = 0),
                (e.minDate = Number.MAX_VALUE),
                (e.minZ = Number.MAX_VALUE),
                (e.maxZ = -Number.MAX_VALUE),
                (e.minXDiff = Number.MAX_VALUE),
                (e.yAxisScale = []),
                (e.xAxisScale = null),
                (e.xAxisTicksPositions = []),
                (e.yLabelsCoords = []),
                (e.yTitleCoords = []),
                (e.xRange = 0),
                (e.yRange = []),
                (e.zRange = 0),
                (e.dataPoints = 0);
            },
          },
          {
            key: "isMultipleY",
            value: function () {
              if (
                this.w.config.yaxis.constructor === Array &&
                this.w.config.yaxis.length > 1
              )
                return (this.w.globals.isMultipleYAxis = !0), !0;
            },
          },
          {
            key: "excludeCollapsedSeriesInYAxis",
            value: function () {
              var t = this,
                e = this.w;
              e.globals.ignoreYAxisIndexes = e.globals.collapsedSeries.map(
                function (e, i) {
                  if (t.w.globals.isMultipleYAxis) return e.index;
                }
              );
            },
          },
          {
            key: "isMultiFormat",
            value: function () {
              return this.isFormatXY() || this.isFormat2DArray();
            },
          },
          {
            key: "isFormatXY",
            value: function () {
              var t = this.w.config.series.slice(),
                e = new B(this.ctx);
              if (
                ((this.activeSeriesIndex = e.getActiveConfigSeriesIndex()),
                void 0 !== t[this.activeSeriesIndex].data &&
                  t[this.activeSeriesIndex].data.length > 0 &&
                  null !== t[this.activeSeriesIndex].data[0] &&
                  void 0 !== t[this.activeSeriesIndex].data[0].x &&
                  null !== t[this.activeSeriesIndex].data[0])
              )
                return !0;
            },
          },
          {
            key: "isFormat2DArray",
            value: function () {
              var t = this.w.config.series.slice(),
                e = new B(this.ctx);
              if (
                ((this.activeSeriesIndex = e.getActiveConfigSeriesIndex()),
                void 0 !== t[this.activeSeriesIndex].data &&
                  t[this.activeSeriesIndex].data.length > 0 &&
                  void 0 !== t[this.activeSeriesIndex].data[0] &&
                  null !== t[this.activeSeriesIndex].data[0] &&
                  t[this.activeSeriesIndex].data[0].constructor === Array)
              )
                return !0;
            },
          },
          {
            key: "handleFormat2DArray",
            value: function (t, e) {
              for (
                var i = this.w.config, a = this.w.globals, s = 0;
                s < t[e].data.length;
                s++
              )
                if (
                  (void 0 !== t[e].data[s][1] &&
                    (Array.isArray(t[e].data[s][1]) &&
                    4 === t[e].data[s][1].length
                      ? this.twoDSeries.push(u.parseNumber(t[e].data[s][1][3]))
                      : 5 === t[e].data[s].length
                      ? this.twoDSeries.push(u.parseNumber(t[e].data[s][4]))
                      : this.twoDSeries.push(u.parseNumber(t[e].data[s][1])),
                    (a.dataFormatXNumeric = !0)),
                  "datetime" === i.xaxis.type)
                ) {
                  var n = new Date(t[e].data[s][0]);
                  (n = new Date(n).getTime()), this.twoDSeriesX.push(n);
                } else this.twoDSeriesX.push(t[e].data[s][0]);
              for (var r = 0; r < t[e].data.length; r++)
                void 0 !== t[e].data[r][2] &&
                  (this.threeDSeries.push(t[e].data[r][2]), (a.isDataXYZ = !0));
            },
          },
          {
            key: "handleFormatXY",
            value: function (t, e) {
              var i = this.w.config,
                a = this.w.globals,
                s = new v(this.ctx),
                n = e;
              a.collapsedSeriesIndices.indexOf(e) > -1 &&
                (n = this.activeSeriesIndex);
              for (var r = 0; r < t[e].data.length; r++)
                void 0 !== t[e].data[r].y &&
                  (Array.isArray(t[e].data[r].y)
                    ? this.twoDSeries.push(
                        u.parseNumber(t[e].data[r].y[t[e].data[r].y.length - 1])
                      )
                    : this.twoDSeries.push(u.parseNumber(t[e].data[r].y)));
              for (var o = 0; o < t[n].data.length; o++) {
                var l = "string" == typeof t[n].data[o].x,
                  h = !!s.isValidDate(t[n].data[o].x.toString());
                l || h
                  ? l
                    ? "datetime" !== i.xaxis.type || a.isRangeData
                      ? ((this.fallbackToCategory = !0),
                        this.twoDSeriesX.push(t[n].data[o].x))
                      : this.twoDSeriesX.push(s.parseDate(t[n].data[o].x))
                    : "datetime" === i.xaxis.type
                    ? this.twoDSeriesX.push(
                        s.parseDate(t[n].data[o].x.toString())
                      )
                    : ((a.dataFormatXNumeric = !0),
                      (a.isXNumeric = !0),
                      this.twoDSeriesX.push(parseFloat(t[n].data[o].x)))
                  : ((a.isXNumeric = !0),
                    (a.dataFormatXNumeric = !0),
                    this.twoDSeriesX.push(t[n].data[o].x));
              }
              if (t[e].data[0] && void 0 !== t[e].data[0].z) {
                for (var c = 0; c < t[e].data.length; c++)
                  this.threeDSeries.push(t[e].data[c].z);
                a.isDataXYZ = !0;
              }
            },
          },
          {
            key: "handleRangeData",
            value: function (t, e) {
              var i = this.w.globals,
                a = {};
              return (
                this.isFormat2DArray()
                  ? (a = this.handleRangeDataFormat("array", t, e))
                  : this.isFormatXY() &&
                    (a = this.handleRangeDataFormat("xy", t, e)),
                i.seriesRangeStart.push(a.start),
                i.seriesRangeEnd.push(a.end),
                a
              );
            },
          },
          {
            key: "handleCandleStickData",
            value: function (t, e) {
              var i = this.w.globals,
                a = {};
              return (
                this.isFormat2DArray()
                  ? (a = this.handleCandleStickDataFormat("array", t, e))
                  : this.isFormatXY() &&
                    (a = this.handleCandleStickDataFormat("xy", t, e)),
                (i.seriesCandleO[e] = a.o),
                (i.seriesCandleH[e] = a.h),
                (i.seriesCandleL[e] = a.l),
                (i.seriesCandleC[e] = a.c),
                a
              );
            },
          },
          {
            key: "handleRangeDataFormat",
            value: function (t, e, i) {
              var a = [],
                s = [],
                n =
                  "Please provide [Start, End] values in valid format. Read more https://apexcharts.com/docs/series/#rangecharts",
                r = new B(this.ctx).getActiveConfigSeriesIndex();
              if ("array" === t) {
                if (2 !== e[r].data[0][1].length) throw new Error(n);
                for (var o = 0; o < e[i].data.length; o++)
                  a.push(e[i].data[o][1][0]), s.push(e[i].data[o][1][1]);
              } else if ("xy" === t) {
                if (2 !== e[r].data[0].y.length) throw new Error(n);
                for (var l = 0; l < e[i].data.length; l++)
                  a.push(e[i].data[l].y[0]), s.push(e[i].data[l].y[1]);
              }
              return { start: a, end: s };
            },
          },
          {
            key: "handleCandleStickDataFormat",
            value: function (t, e, i) {
              var a = [],
                s = [],
                n = [],
                r = [],
                o =
                  "Please provide [Open, High, Low and Close] values in valid format. Read more https://apexcharts.com/docs/series/#candlestick";
              if ("array" === t) {
                if (
                  (!Array.isArray(e[i].data[0][1]) &&
                    5 !== e[i].data[0].length) ||
                  (Array.isArray(e[i].data[0][1]) &&
                    4 !== e[i].data[0][1].length)
                )
                  throw new Error(o);
                if (5 === e[i].data[0].length)
                  for (var l = 0; l < e[i].data.length; l++)
                    a.push(e[i].data[l][1]),
                      s.push(e[i].data[l][2]),
                      n.push(e[i].data[l][3]),
                      r.push(e[i].data[l][4]);
                else
                  for (var h = 0; h < e[i].data.length; h++)
                    a.push(e[i].data[h][1][0]),
                      s.push(e[i].data[h][1][1]),
                      n.push(e[i].data[h][1][2]),
                      r.push(e[i].data[h][1][3]);
              } else if ("xy" === t) {
                if (4 !== e[i].data[0].y.length) throw new Error(o);
                for (var c = 0; c < e[i].data.length; c++)
                  a.push(e[i].data[c].y[0]),
                    s.push(e[i].data[c].y[1]),
                    n.push(e[i].data[c].y[2]),
                    r.push(e[i].data[c].y[3]);
              }
              return { o: a, h: s, l: n, c: r };
            },
          },
          {
            key: "parseDataAxisCharts",
            value: function (t) {
              for (
                var e =
                    arguments.length > 1 && void 0 !== arguments[1]
                      ? arguments[1]
                      : this.ctx,
                  i = this.w.config,
                  a = this.w.globals,
                  s = new v(e),
                  n = 0;
                n < t.length;
                n++
              ) {
                if (
                  ((this.twoDSeries = []),
                  (this.twoDSeriesX = []),
                  (this.threeDSeries = []),
                  void 0 === t[n].data)
                )
                  return void console.error(
                    "It is a possibility that you may have not included 'data' property in series."
                  );
                if (
                  (("rangeBar" !== i.chart.type &&
                    "rangeArea" !== i.chart.type &&
                    "rangeBar" !== t[n].type &&
                    "rangeArea" !== t[n].type) ||
                    ((a.isRangeData = !0), this.handleRangeData(t, n)),
                  this.isMultiFormat())
                )
                  this.isFormat2DArray()
                    ? this.handleFormat2DArray(t, n)
                    : this.isFormatXY() && this.handleFormatXY(t, n),
                    ("candlestick" !== i.chart.type &&
                      "candlestick" !== t[n].type) ||
                      this.handleCandleStickData(t, n),
                    a.series.push(this.twoDSeries),
                    a.labels.push(this.twoDSeriesX),
                    a.seriesX.push(this.twoDSeriesX),
                    this.fallbackToCategory || (a.isXNumeric = !0);
                else {
                  if ("datetime" === i.xaxis.type) {
                    a.isXNumeric = !0;
                    for (
                      var r =
                          i.labels.length > 0
                            ? i.labels.slice()
                            : i.xaxis.categories.slice(),
                        o = 0;
                      o < r.length;
                      o++
                    )
                      if ("string" == typeof r[o]) {
                        if (!s.isValidDate(r[o]))
                          throw new Error(
                            "You have provided invalid Date format. Please provide a valid JavaScript Date"
                          );
                        this.twoDSeriesX.push(s.parseDate(r[o]));
                      } else {
                        if (13 !== String(r[o]).length)
                          throw new Error(
                            "Please provide a valid JavaScript timestamp"
                          );
                        this.twoDSeriesX.push(r[o]);
                      }
                    a.seriesX.push(this.twoDSeriesX);
                  } else if ("numeric" === i.xaxis.type) {
                    a.isXNumeric = !0;
                    var l =
                      i.labels.length > 0
                        ? i.labels.slice()
                        : i.xaxis.categories.slice();
                    l.length > 0 &&
                      ((this.twoDSeriesX = l),
                      a.seriesX.push(this.twoDSeriesX));
                  }
                  a.labels.push(this.twoDSeriesX);
                  var h = t[n].data.map(function (t) {
                    return u.parseNumber(t);
                  });
                  a.series.push(h);
                }
                a.seriesZ.push(this.threeDSeries),
                  void 0 !== t[n].name
                    ? a.seriesNames.push(t[n].name)
                    : a.seriesNames.push("series-" + parseInt(n + 1));
              }
              return this.w;
            },
          },
          {
            key: "parseDataNonAxisCharts",
            value: function (t) {
              var e = this.w.globals,
                i = this.w.config;
              (e.series = t.slice()), (e.seriesNames = i.labels.slice());
              for (var a = 0; a < e.series.length; a++)
                void 0 === e.seriesNames[a] &&
                  e.seriesNames.push("series-" + (a + 1));
              return this.w;
            },
          },
          {
            key: "handleExternalLabelsData",
            value: function (t) {
              var e = this.w.config,
                i = this.w.globals;
              if (e.xaxis.categories.length > 0) i.labels = e.xaxis.categories;
              else if (e.labels.length > 0) i.labels = e.labels.slice();
              else if (this.fallbackToCategory) i.labels = i.labels[0];
              else {
                var a = [];
                if (i.axisCharts) {
                  if (i.series.length > 0)
                    for (
                      var s = 0;
                      s < i.series[i.maxValsInArrayIndex].length;
                      s++
                    )
                      a.push(s + 1);
                  for (var n = 0; n < t.length; n++) i.seriesX.push(a);
                  i.isXNumeric = !0;
                }
                if (0 === a.length) {
                  a = [0, 10];
                  for (var r = 0; r < t.length; r++) i.seriesX.push(a);
                }
                (i.labels = a), (i.noLabelsProvided = !0);
              }
            },
          },
          {
            key: "parseData",
            value: function (t) {
              var e = this.w,
                i = e.config,
                a = e.globals;
              if (
                (this.excludeCollapsedSeriesInYAxis(),
                (this.fallbackToCategory = !1),
                this.resetGlobals(),
                this.isMultipleY(),
                a.axisCharts
                  ? this.parseDataAxisCharts(t)
                  : this.parseDataNonAxisCharts(t),
                this.coreUtils.getLargestSeries(),
                "bar" === i.chart.type && i.chart.stacked)
              ) {
                var s = new B(this.ctx);
                a.series = s.setNullSeriesToZeroValues(a.series);
              }
              this.coreUtils.getSeriesTotals(),
                a.axisCharts && this.coreUtils.getStackedSeriesTotals(),
                this.coreUtils.getPercentSeries(),
                a.dataFormatXNumeric ||
                  (a.isXNumeric &&
                    ("numeric" !== i.xaxis.type ||
                      0 !== i.labels.length ||
                      0 !== i.xaxis.categories.length)) ||
                  this.handleExternalLabelsData(t);
            },
          },
          {
            key: "xySettings",
            value: function () {
              var t = null,
                e = this.w;
              if (e.globals.axisCharts) {
                if ("back" === e.config.xaxis.crosshairs.position)
                  new I(this.ctx).drawXCrosshairs();
                if ("back" === e.config.yaxis[0].crosshairs.position)
                  new I(this.ctx).drawYCrosshairs();
                if (
                  ((t = this.coreUtils.getCalculatedRatios()),
                  "datetime" === e.config.xaxis.type &&
                    void 0 === e.config.xaxis.labels.formatter)
                ) {
                  var i,
                    a = new q(this.ctx);
                  isFinite(e.globals.minX) &&
                  isFinite(e.globals.maxX) &&
                  !e.globals.isBarHorizontal
                    ? ((i = a.calculateTimeScaleTicks(
                        e.globals.minX,
                        e.globals.maxX
                      )),
                      a.recalcDimensionsBasedOnFormat(i, !1))
                    : e.globals.isBarHorizontal &&
                      ((i = a.calculateTimeScaleTicks(
                        e.globals.minY,
                        e.globals.maxY
                      )),
                      a.recalcDimensionsBasedOnFormat(i, !0));
                }
              }
              return t;
            },
          },
          {
            key: "drawAxis",
            value: function (t, e) {
              var i,
                a,
                s = this.w.globals,
                n = this.w.config,
                r = new _(this.ctx),
                o = new H(this.ctx);
              s.axisCharts &&
                "radar" !== t &&
                (s.isBarHorizontal
                  ? ((a = o.drawYaxisInversed(0)),
                    (i = r.drawXaxisInversed(0)),
                    s.dom.elGraphical.add(i),
                    s.dom.elGraphical.add(a))
                  : ((i = r.drawXaxis()),
                    s.dom.elGraphical.add(i),
                    n.yaxis.map(function (t, e) {
                      -1 === s.ignoreYAxisIndexes.indexOf(e) &&
                        ((a = o.drawYaxis(e)), s.dom.Paper.add(a));
                    })));
              n.yaxis.map(function (t, e) {
                -1 === s.ignoreYAxisIndexes.indexOf(e) &&
                  o.yAxisTitleRotate(e, t.opposite);
              });
            },
          },
          {
            key: "setupBrushHandler",
            value: function () {
              var t = this,
                e = this.w;
              if (
                e.config.chart.brush.enabled &&
                "function" != typeof e.config.chart.events.selection
              ) {
                var i = e.config.chart.brush.targets || [
                  e.config.chart.brush.target,
                ];
                i.forEach(function (e) {
                  var i = ApexCharts.getChartByID(e);
                  i.w.globals.brushSource = t.ctx;
                  var a = function () {
                    t.ctx._updateOptions(
                      {
                        chart: {
                          selection: {
                            xaxis: {
                              min: i.w.globals.minX,
                              max: i.w.globals.maxX,
                            },
                          },
                        },
                      },
                      !1,
                      !1
                    );
                  };
                  "function" != typeof i.w.config.chart.events.zoomed &&
                    (i.w.config.chart.events.zoomed = function () {
                      a();
                    }),
                    "function" != typeof i.w.config.chart.events.scrolled &&
                      (i.w.config.chart.events.scrolled = function () {
                        a();
                      });
                }),
                  (e.config.chart.events.selection = function (t, a) {
                    i.forEach(function (t) {
                      var i = ApexCharts.getChartByID(t),
                        s = u.clone(e.config.yaxis);
                      e.config.chart.brush.autoScaleYaxis &&
                        (s = new j(i).autoScaleY(i, s, a));
                      i._updateOptions(
                        {
                          xaxis: { min: a.xaxis.min, max: a.xaxis.max },
                          yaxis: s,
                        },
                        !1,
                        !1,
                        !1,
                        !1
                      );
                    });
                  });
              }
            },
          },
        ]),
        t
      );
    })();
  var $ = setTimeout;
  function J() {}
  function Q(t) {
    if (!(this instanceof Q))
      throw new TypeError("Promises must be constructed via new");
    if ("function" != typeof t) throw new TypeError("not a function");
    (this._state = 0),
      (this._handled = !1),
      (this._value = void 0),
      (this._deferreds = []),
      st(t, this);
  }
  function K(t, e) {
    for (; 3 === t._state; ) t = t._value;
    0 !== t._state
      ? ((t._handled = !0),
        Q._immediateFn(function () {
          var i = 1 === t._state ? e.onFulfilled : e.onRejected;
          if (null !== i) {
            var a;
            try {
              a = i(t._value);
            } catch (t) {
              return void et(e.promise, t);
            }
            tt(e.promise, a);
          } else (1 === t._state ? tt : et)(e.promise, t._value);
        }))
      : t._deferreds.push(e);
  }
  function tt(t, e) {
    try {
      if (e === t)
        throw new TypeError("A promise cannot be resolved with itself.");
      if (e && ("object" == typeof e || "function" == typeof e)) {
        var i = e.then;
        if (e instanceof Q) return (t._state = 3), (t._value = e), void it(t);
        if ("function" == typeof i)
          return void st(
            ((a = i),
            (s = e),
            function () {
              a.apply(s, arguments);
            }),
            t
          );
      }
      (t._state = 1), (t._value = e), it(t);
    } catch (e) {
      et(t, e);
    }
    var a, s;
  }
  function et(t, e) {
    (t._state = 2), (t._value = e), it(t);
  }
  function it(t) {
    2 === t._state &&
      0 === t._deferreds.length &&
      Q._immediateFn(function () {
        t._handled || Q._unhandledRejectionFn(t._value);
      });
    for (var e = 0, i = t._deferreds.length; e < i; e++) K(t, t._deferreds[e]);
    t._deferreds = null;
  }
  function at(t, e, i) {
    (this.onFulfilled = "function" == typeof t ? t : null),
      (this.onRejected = "function" == typeof e ? e : null),
      (this.promise = i);
  }
  function st(t, e) {
    var i = !1;
    try {
      t(
        function (t) {
          i || ((i = !0), tt(e, t));
        },
        function (t) {
          i || ((i = !0), et(e, t));
        }
      );
    } catch (t) {
      if (i) return;
      (i = !0), et(e, t);
    }
  }
  (Q.prototype.catch = function (t) {
    return this.then(null, t);
  }),
    (Q.prototype.then = function (t, e) {
      var i = new this.constructor(J);
      return K(this, new at(t, e, i)), i;
    }),
    (Q.prototype.finally = function (t) {
      var e = this.constructor;
      return this.then(
        function (i) {
          return e.resolve(t()).then(function () {
            return i;
          });
        },
        function (i) {
          return e.resolve(t()).then(function () {
            return e.reject(i);
          });
        }
      );
    }),
    (Q.all = function (t) {
      return new Q(function (e, i) {
        if (!t || void 0 === t.length)
          throw new TypeError("Promise.all accepts an array");
        var a = Array.prototype.slice.call(t);
        if (0 === a.length) return e([]);
        var s = a.length;
        function n(t, r) {
          try {
            if (r && ("object" == typeof r || "function" == typeof r)) {
              var o = r.then;
              if ("function" == typeof o)
                return void o.call(
                  r,
                  function (e) {
                    n(t, e);
                  },
                  i
                );
            }
            (a[t] = r), 0 == --s && e(a);
          } catch (t) {
            i(t);
          }
        }
        for (var r = 0; r < a.length; r++) n(r, a[r]);
      });
    }),
    (Q.resolve = function (t) {
      return t && "object" == typeof t && t.constructor === Q
        ? t
        : new Q(function (e) {
            e(t);
          });
    }),
    (Q.reject = function (t) {
      return new Q(function (e, i) {
        i(t);
      });
    }),
    (Q.race = function (t) {
      return new Q(function (e, i) {
        for (var a = 0, s = t.length; a < s; a++) t[a].then(e, i);
      });
    }),
    (Q._immediateFn =
      ("function" == typeof setImmediate &&
        function (t) {
          setImmediate(t);
        }) ||
      function (t) {
        $(t, 0);
      }),
    (Q._unhandledRejectionFn = function (t) {
      "undefined" != typeof console &&
        console &&
        console.warn("Possible Unhandled Promise Rejection:", t);
    });
  var nt,
    rt,
    ot = (function () {
      function t(i) {
        e(this, t), (this.ctx = i), (this.w = i.w);
      }
      return (
        a(t, [
          {
            key: "getSvgString",
            value: function () {
              return this.w.globals.dom.Paper.svg();
            },
          },
          {
            key: "cleanup",
            value: function () {
              var t = this.w,
                e = t.globals.dom.baseEl.querySelector(
                  ".apexcharts-xcrosshairs"
                ),
                i = t.globals.dom.baseEl.querySelector(
                  ".apexcharts-ycrosshairs"
                );
              e && e.setAttribute("x", -500),
                i && (i.setAttribute("y1", -100), i.setAttribute("y2", -100));
            },
          },
          {
            key: "svgUrl",
            value: function () {
              this.cleanup();
              var t = this.getSvgString(),
                e = new Blob([t], { type: "image/svg+xml;charset=utf-8" });
              return URL.createObjectURL(e);
            },
          },
          {
            key: "dataURI",
            value: function () {
              var t = this;
              return new Q(function (e) {
                var i = t.w;
                t.cleanup();
                var a = document.createElement("canvas");
                (a.width = i.globals.svgWidth),
                  (a.height = parseInt(i.globals.dom.elWrap.style.height));
                var s =
                    "transparent" === i.config.chart.background
                      ? "#fff"
                      : i.config.chart.background,
                  n = a.getContext("2d");
                (n.fillStyle = s), n.fillRect(0, 0, a.width, a.height);
                var r = window.URL || window.webkitURL || window,
                  o = new Image();
                o.crossOrigin = "anonymous";
                var l = t.getSvgString(),
                  h = "data:image/svg+xml," + encodeURIComponent(l);
                (o.onload = function () {
                  n.drawImage(o, 0, 0), r.revokeObjectURL(h);
                  var t = a.toDataURL("image/png");
                  e(t);
                }),
                  (o.src = h);
              });
            },
          },
          {
            key: "exportToSVG",
            value: function () {
              this.triggerDownload(this.svgUrl(), ".svg");
            },
          },
          {
            key: "exportToPng",
            value: function () {
              var t = this;
              this.dataURI().then(function (e) {
                t.triggerDownload(e, ".png");
              });
            },
          },
          {
            key: "triggerDownload",
            value: function (t, e) {
              var i = document.createElement("a");
              (i.href = t),
                (i.download = this.w.globals.chartID + e),
                document.body.appendChild(i),
                i.click(),
                document.body.removeChild(i);
            },
          },
        ]),
        t
      );
    })(),
    lt = (function () {
      function t(i) {
        e(this, t), (this.ctx = i), (this.w = i.w);
        var a = this.w;
        (this.anim = new f(this.ctx)),
          (this.xaxisLabels = a.globals.labels.slice()),
          (this.animX =
            a.config.grid.xaxis.lines.animate &&
            a.config.chart.animations.enabled),
          (this.animY =
            a.config.grid.yaxis.lines.animate &&
            a.config.chart.animations.enabled),
          a.globals.timelineLabels.length > 0 &&
            (this.xaxisLabels = a.globals.timelineLabels.slice());
      }
      return (
        a(t, [
          {
            key: "drawGridArea",
            value: function () {
              var t =
                  arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : null,
                e = this.w,
                i = new p(this.ctx);
              null === t && (t = i.group({ class: "apexcharts-grid" }));
              var a = i.drawLine(
                  e.globals.padHorizontal,
                  1,
                  e.globals.padHorizontal,
                  e.globals.gridHeight,
                  "transparent"
                ),
                s = i.drawLine(
                  e.globals.padHorizontal,
                  e.globals.gridHeight,
                  e.globals.gridWidth,
                  e.globals.gridHeight,
                  "transparent"
                );
              return t.add(s), t.add(a), t;
            },
          },
          {
            key: "drawGrid",
            value: function () {
              var t = this.w,
                e = new _(this.ctx),
                i = new H(this.ctx),
                a = this.w.globals,
                s = null;
              if (a.axisCharts) {
                if (t.config.grid.show)
                  (s = this.renderGrid()),
                    a.dom.elGraphical.add(s.el),
                    this.drawGridArea(s.el);
                else {
                  var n = this.drawGridArea();
                  a.dom.elGraphical.add(n);
                }
                null !== s && e.xAxisLabelCorrections(s.xAxisTickWidth),
                  i.setYAxisTextAlignments();
              }
            },
          },
          {
            key: "createGridMask",
            value: function () {
              var t = this.w,
                e = t.globals,
                i = new p(this.ctx),
                a = Array.isArray(t.config.stroke.width)
                  ? 0
                  : t.config.stroke.width;
              if (Array.isArray(t.config.stroke.width)) {
                var s = 0;
                t.config.stroke.width.forEach(function (t) {
                  s = Math.max(s, t);
                }),
                  (a = s);
              }
              (e.dom.elGridRectMask = document.createElementNS(
                e.SVGNS,
                "clipPath"
              )),
                e.dom.elGridRectMask.setAttribute(
                  "id",
                  "gridRectMask".concat(e.cuid)
                ),
                (e.dom.elGridRectMarkerMask = document.createElementNS(
                  e.SVGNS,
                  "clipPath"
                )),
                e.dom.elGridRectMarkerMask.setAttribute(
                  "id",
                  "gridRectMarkerMask".concat(e.cuid)
                ),
                (e.dom.elGridRect = i.drawRect(
                  -a / 2,
                  -a / 2,
                  e.gridWidth + a,
                  e.gridHeight + a,
                  0,
                  "#fff"
                )),
                new w(this).getLargestMarkerSize();
              var n = t.globals.markers.largestSize + 1;
              (e.dom.elGridRectMarker = i.drawRect(
                -n,
                -n,
                e.gridWidth + 2 * n,
                e.gridHeight + 2 * n,
                0,
                "#fff"
              )),
                e.dom.elGridRectMask.appendChild(e.dom.elGridRect.node),
                e.dom.elGridRectMarkerMask.appendChild(
                  e.dom.elGridRectMarker.node
                );
              var r = e.dom.baseEl.querySelector("defs");
              r.appendChild(e.dom.elGridRectMask),
                r.appendChild(e.dom.elGridRectMarkerMask);
            },
          },
          {
            key: "renderGrid",
            value: function () {
              var t = this.w,
                e = new p(this.ctx),
                i = t.config.grid.strokeDashArray,
                a = e.group({ class: "apexcharts-grid" }),
                s = e.group({ class: "apexcharts-gridlines-horizontal" }),
                n = e.group({ class: "apexcharts-gridlines-vertical" });
              a.add(s), a.add(n);
              for (
                var r, o = 8, l = 0;
                l < t.globals.series.length &&
                (void 0 !== t.globals.yAxisScale[l] &&
                  (o = t.globals.yAxisScale[l].result.length - 1),
                !(o > 2));
                l++
              );
              if (t.globals.isBarHorizontal) {
                if (
                  ((r = o),
                  t.config.grid.xaxis.lines.show ||
                    t.config.xaxis.axisTicks.show)
                )
                  for (
                    var h,
                      c = t.globals.padHorizontal,
                      d = t.globals.gridHeight,
                      u = 0;
                    u < r + 1 &&
                    ((h = c = c + t.globals.gridWidth / r + 0.3), u !== r - 1);
                    u++
                  ) {
                    if (t.config.grid.xaxis.lines.show) {
                      var g = e.drawLine(
                        c,
                        0,
                        h,
                        d,
                        t.config.grid.borderColor,
                        i
                      );
                      g.node.classList.add("apexcharts-gridline"),
                        n.add(g),
                        this.animX &&
                          this.animateLine(
                            g,
                            { x1: 0, x2: 0 },
                            { x1: c, x2: h }
                          );
                    }
                    new _(this.ctx).drawXaxisTicks(c, a);
                  }
                if (t.config.grid.yaxis.lines.show)
                  for (
                    var f = 0, x = 0, b = t.globals.gridWidth, m = 0;
                    m < t.globals.dataPoints + 1;
                    m++
                  ) {
                    var v = e.drawLine(
                      0,
                      f,
                      b,
                      x,
                      t.config.grid.borderColor,
                      i
                    );
                    s.add(v),
                      v.node.classList.add("apexcharts-gridline"),
                      this.animY &&
                        this.animateLine(
                          v,
                          { y1: f + 20, y2: x + 20 },
                          { y1: f, y2: x }
                        ),
                      (x = f += t.globals.gridHeight / t.globals.dataPoints);
                  }
              } else {
                if (
                  ((r = this.xaxisLabels.length),
                  t.config.grid.xaxis.lines.show ||
                    t.config.xaxis.axisTicks.show)
                ) {
                  var y,
                    w = t.globals.padHorizontal,
                    k = t.globals.gridHeight;
                  if (t.globals.timelineLabels.length > 0)
                    for (var A = 0; A < r; A++) {
                      if (
                        ((w = this.xaxisLabels[A].position),
                        (y = this.xaxisLabels[A].position),
                        t.config.grid.xaxis.lines.show &&
                          w > 0 &&
                          w < t.globals.gridWidth)
                      ) {
                        var S = e.drawLine(
                          w,
                          0,
                          y,
                          k,
                          t.config.grid.borderColor,
                          i
                        );
                        S.node.classList.add("apexcharts-gridline"),
                          n.add(S),
                          this.animX &&
                            this.animateLine(
                              S,
                              { x1: 0, x2: 0 },
                              { x1: w, x2: y }
                            );
                      }
                      var C = new _(this.ctx);
                      (A === r - 1 && t.globals.skipLastTimelinelabel) ||
                        C.drawXaxisTicks(w, a);
                    }
                  else
                    for (var L = r, P = 0; P < L; P++) {
                      var z = L;
                      if (
                        (t.globals.isXNumeric && (z -= 1),
                        (y = w += t.globals.gridWidth / z),
                        P === z - 1)
                      )
                        break;
                      if (t.config.grid.xaxis.lines.show) {
                        var E = e.drawLine(
                          w,
                          0,
                          y,
                          k,
                          t.config.grid.borderColor,
                          i
                        );
                        E.node.classList.add("apexcharts-gridline"),
                          n.add(E),
                          this.animX &&
                            this.animateLine(
                              E,
                              { x1: 0, x2: 0 },
                              { x1: w, x2: y }
                            );
                      }
                      new _(this.ctx).drawXaxisTicks(w, a);
                    }
                }
                if (t.config.grid.yaxis.lines.show)
                  for (
                    var M = 0, T = 0, I = t.globals.gridWidth, X = 0;
                    X < o + 1;
                    X++
                  ) {
                    var Y = e.drawLine(
                      0,
                      M,
                      I,
                      T,
                      t.config.grid.borderColor,
                      i
                    );
                    s.add(Y),
                      Y.node.classList.add("apexcharts-gridline"),
                      this.animY &&
                        this.animateLine(
                          Y,
                          { y1: M + 20, y2: T + 20 },
                          { y1: M, y2: T }
                        ),
                      (T = M += t.globals.gridHeight / o);
                  }
              }
              return (
                this.drawGridBands(a, r, o),
                { el: a, xAxisTickWidth: t.globals.gridWidth / r }
              );
            },
          },
          {
            key: "drawGridBands",
            value: function (t, e, i) {
              var a = this.w,
                s = new p(this.ctx);
              if (
                void 0 !== a.config.grid.row.colors &&
                a.config.grid.row.colors.length > 0
              )
                for (
                  var n = 0,
                    r = a.globals.gridHeight / i,
                    o = a.globals.gridWidth,
                    l = 0,
                    h = 0;
                  l < i;
                  l++, h++
                ) {
                  h >= a.config.grid.row.colors.length && (h = 0);
                  var c = a.config.grid.row.colors[h],
                    d = s.drawRect(0, n, o, r, 0, c, a.config.grid.row.opacity);
                  t.add(d),
                    d.node.classList.add("apexcharts-gridRow"),
                    (n += a.globals.gridHeight / i);
                }
              if (
                void 0 !== a.config.grid.column.colors &&
                a.config.grid.column.colors.length > 0
              )
                for (
                  var u = a.globals.padHorizontal,
                    g = a.globals.padHorizontal + a.globals.gridWidth / e,
                    f = a.globals.gridHeight,
                    x = 0,
                    b = 0;
                  x < e;
                  x++, b++
                ) {
                  b >= a.config.grid.column.colors.length && (b = 0);
                  var m = a.config.grid.column.colors[b],
                    v = s.drawRect(
                      u,
                      0,
                      g,
                      f,
                      0,
                      m,
                      a.config.grid.column.opacity
                    );
                  v.node.classList.add("apexcharts-gridColumn"),
                    t.add(v),
                    (u += a.globals.gridWidth / e);
                }
            },
          },
          {
            key: "animateLine",
            value: function (t, e, i) {
              var a = this.w,
                s = a.config.chart.animations;
              if (s && !a.globals.resized && !a.globals.dataChanged) {
                var n = s.speed;
                this.anim.animateLine(t, e, i, n);
              }
            },
          },
        ]),
        t
      );
    })(),
    ht = (function () {
      function t(i) {
        e(this, t), (this.ctx = i), (this.w = i.w);
      }
      return (
        a(t, [
          {
            key: "checkResponsiveConfig",
            value: function (t) {
              var e = this,
                i = this.w,
                a = i.config;
              if (0 !== a.responsive.length) {
                var s = a.responsive.slice();
                s.sort(function (t, e) {
                  return t.breakpoint > e.breakpoint
                    ? 1
                    : e.breakpoint > t.breakpoint
                    ? -1
                    : 0;
                }).reverse();
                var n = new k({}),
                  r = function () {
                    var t =
                        arguments.length > 0 && void 0 !== arguments[0]
                          ? arguments[0]
                          : {},
                      a = s[0].breakpoint,
                      r =
                        window.innerWidth > 0
                          ? window.innerWidth
                          : screen.width;
                    if (r > a) {
                      var o = w.extendArrayProps(n, i.globals.initialConfig);
                      (t = u.extend(o, t)),
                        (t = u.extend(i.config, t)),
                        e.overrideResponsiveOptions(t);
                    } else
                      for (var l = 0; l < s.length; l++)
                        r < s[l].breakpoint &&
                          ((t = w.extendArrayProps(n, s[l].options)),
                          (t = u.extend(i.config, t)),
                          e.overrideResponsiveOptions(t));
                  };
                if (t) {
                  var o = w.extendArrayProps(n, t);
                  (o = u.extend(i.config, o)), r((o = u.extend(o, t)));
                } else r({});
              }
            },
          },
          {
            key: "overrideResponsiveOptions",
            value: function (t) {
              var e = new k(t).init();
              this.w.config = e;
            },
          },
        ]),
        t
      );
    })(),
    ct = (function () {
      function t(i) {
        e(this, t), (this.ctx = i), (this.w = i.w), (this.colors = []);
      }
      return (
        a(t, [
          {
            key: "init",
            value: function () {
              this.setDefaultColors();
            },
          },
          {
            key: "setDefaultColors",
            value: function () {
              var t = this.w,
                e = new u();
              if (
                (t.globals.dom.elWrap.classList.add(t.config.theme.mode),
                void 0 === t.config.colors
                  ? (t.globals.colors = this.predefined())
                  : ((t.globals.colors = t.config.colors),
                    t.globals.axisCharts &&
                      "bar" !== t.config.chart.type &&
                      Array.isArray(t.config.colors) &&
                      t.config.colors.length > 0 &&
                      t.config.colors.length === t.config.series.length &&
                      (t.globals.colors = t.config.colors.map(function (e, i) {
                        return "function" == typeof e
                          ? e({
                              value: t.globals.axisCharts
                                ? t.globals.series[i][0]
                                  ? t.globals.series[i][0]
                                  : 0
                                : t.globals.series[i],
                              seriesIndex: i,
                              w: t,
                            })
                          : e;
                      }))),
                t.config.theme.monochrome.enabled)
              ) {
                var i = [],
                  a = t.globals.series.length;
                t.config.plotOptions.bar.distributed &&
                  "bar" === t.config.chart.type &&
                  (a = t.globals.series[0].length * t.globals.series.length);
                for (
                  var s = t.config.theme.monochrome.color,
                    n = 1 / (a / t.config.theme.monochrome.shadeIntensity),
                    r = t.config.theme.monochrome.shadeTo,
                    o = 0,
                    l = 0;
                  l < a;
                  l++
                ) {
                  var h = void 0;
                  "dark" === r
                    ? ((h = e.shadeColor(-1 * o, s)), (o += n))
                    : ((h = e.shadeColor(o, s)), (o += n)),
                    i.push(h);
                }
                t.globals.colors = i.slice();
              }
              var c = t.globals.colors.slice();
              this.pushExtraColors(t.globals.colors),
                void 0 === t.config.stroke.colors
                  ? (t.globals.stroke.colors = c)
                  : (t.globals.stroke.colors = t.config.stroke.colors),
                this.pushExtraColors(t.globals.stroke.colors),
                void 0 === t.config.fill.colors
                  ? (t.globals.fill.colors = c)
                  : (t.globals.fill.colors = t.config.fill.colors),
                this.pushExtraColors(t.globals.fill.colors),
                void 0 === t.config.dataLabels.style.colors
                  ? (t.globals.dataLabels.style.colors = c)
                  : (t.globals.dataLabels.style.colors =
                      t.config.dataLabels.style.colors),
                this.pushExtraColors(t.globals.dataLabels.style.colors, 50),
                void 0 === t.config.plotOptions.radar.polygons.fill.colors
                  ? (t.globals.radarPolygons.fill.colors = [
                      "dark" === t.config.theme.mode ? "#202D48" : "#fff",
                    ])
                  : (t.globals.radarPolygons.fill.colors =
                      t.config.plotOptions.radar.polygons.fill.colors),
                this.pushExtraColors(t.globals.radarPolygons.fill.colors, 20),
                void 0 === t.config.markers.colors
                  ? (t.globals.markers.colors = c)
                  : (t.globals.markers.colors = t.config.markers.colors),
                this.pushExtraColors(t.globals.markers.colors);
            },
          },
          {
            key: "pushExtraColors",
            value: function (t, e) {
              var i =
                  arguments.length > 2 && void 0 !== arguments[2]
                    ? arguments[2]
                    : null,
                a = this.w,
                s = e || a.globals.series.length;
              if (
                (null === i &&
                  (i =
                    ("bar" === a.config.chart.type &&
                      a.config.plotOptions.bar.distributed) ||
                    ("heatmap" === a.config.chart.type &&
                      a.config.plotOptions.heatmap.colorScale.inverse)),
                i && (s = a.globals.series[0].length * a.globals.series.length),
                t.length < s)
              )
                for (var n = s - t.length, r = 0; r < n; r++) t.push(t[r]);
            },
          },
          {
            key: "updateThemeOptions",
            value: function (t) {
              (t.chart = t.chart || {}), (t.tooltip = t.tooltip || {});
              var e = t.theme.mode || "light",
                i = t.theme.palette
                  ? t.theme.palette
                  : "dark" === e
                  ? "palette4"
                  : "palette1",
                a = t.chart.foreColor
                  ? t.chart.foreColor
                  : "dark" === e
                  ? "#f6f7f8"
                  : "#373d3f";
              return (
                (t.tooltip.theme = e),
                (t.chart.foreColor = a),
                (t.theme.palette = i),
                t
              );
            },
          },
          {
            key: "predefined",
            value: function () {
              switch (this.w.config.theme.palette) {
                case "palette1":
                  this.colors = [
                    "#008FFB",
                    "#00E396",
                    "#FEB019",
                    "#FF4560",
                    "#775DD0",
                  ];
                  break;
                case "palette2":
                  this.colors = [
                    "#3f51b5",
                    "#03a9f4",
                    "#4caf50",
                    "#f9ce1d",
                    "#FF9800",
                  ];
                  break;
                case "palette3":
                  this.colors = [
                    "#33b2df",
                    "#546E7A",
                    "#d4526e",
                    "#13d8aa",
                    "#A5978B",
                  ];
                  break;
                case "palette4":
                  this.colors = [
                    "#4ecdc4",
                    "#c7f464",
                    "#81D4FA",
                    "#fd6a6a",
                    "#546E7A",
                  ];
                  break;
                case "palette5":
                  this.colors = [
                    "#2b908f",
                    "#f9a3a4",
                    "#90ee7e",
                    "#fa4443",
                    "#69d2e7",
                  ];
                  break;
                case "palette6":
                  this.colors = [
                    "#449DD1",
                    "#F86624",
                    "#EA3546",
                    "#662E9B",
                    "#C5D86D",
                  ];
                  break;
                case "palette7":
                  this.colors = [
                    "#D7263D",
                    "#1B998B",
                    "#2E294E",
                    "#F46036",
                    "#E2C044",
                  ];
                  break;
                case "palette8":
                  this.colors = [
                    "#662E9B",
                    "#F86624",
                    "#F9C80E",
                    "#EA3546",
                    "#43BCCD",
                  ];
                  break;
                case "palette9":
                  this.colors = [
                    "#5C4742",
                    "#A5978B",
                    "#8D5B4C",
                    "#5A2A27",
                    "#C4BBAF",
                  ];
                  break;
                case "palette10":
                  this.colors = [
                    "#A300D6",
                    "#7D02EB",
                    "#5653FE",
                    "#2983FF",
                    "#00B1F2",
                  ];
                  break;
                default:
                  this.colors = [
                    "#008FFB",
                    "#00E396",
                    "#FEB019",
                    "#FF4560",
                    "#775DD0",
                  ];
              }
              return this.colors;
            },
          },
        ]),
        t
      );
    })(),
    dt = (function () {
      function t(i) {
        e(this, t), (this.w = i.w), (this.ttCtx = i), (this.ctx = i.ctx);
      }
      return (
        a(t, [
          {
            key: "getNearestValues",
            value: function (t) {
              var e = t.hoverArea,
                i = t.elGrid,
                a = t.clientX,
                s = t.clientY,
                n = t.hasBars,
                r = this.w,
                o = r.globals.gridWidth,
                l = o / (r.globals.dataPoints - 1),
                h = i.getBoundingClientRect();
              ((n && r.globals.comboCharts) || n) &&
                (l = o / r.globals.dataPoints);
              var c = a - h.left,
                d = s - h.top;
              c < 0 ||
              d < 0 ||
              c > r.globals.gridWidth ||
              d > r.globals.gridHeight
                ? (e.classList.remove("hovering-zoom"),
                  e.classList.remove("hovering-pan"))
                : r.globals.zoomEnabled
                ? (e.classList.remove("hovering-pan"),
                  e.classList.add("hovering-zoom"))
                : r.globals.panEnabled &&
                  (e.classList.remove("hovering-zoom"),
                  e.classList.add("hovering-pan"));
              var u = Math.round(c / l);
              n && ((u = Math.ceil(c / l)), (u -= 1));
              for (
                var g, f = null, p = null, x = [], b = 0;
                b < r.globals.seriesXvalues.length;
                b++
              )
                x.push(
                  [r.globals.seriesXvalues[b][0] - 1e-6].concat(
                    r.globals.seriesXvalues[b]
                  )
                );
              return (
                (x = x.map(function (t) {
                  return t.filter(function (t) {
                    return t;
                  });
                })),
                (g = r.globals.seriesYvalues.map(function (t) {
                  return t.filter(function (t) {
                    return t;
                  });
                })),
                r.globals.isXNumeric &&
                  ((f = (p = this.closestInMultiArray(c, d, x, g)).index),
                  (u = p.j),
                  null !== f &&
                    ((x = r.globals.seriesXvalues[f]),
                    (u = (p = this.closestInArray(c, x)).index))),
                (r.globals.capturedSeriesIndex = null === f ? -1 : f),
                (r.globals.capturedDataPointIndex = null === u ? -1 : u),
                (!u || u < 1) && (u = 0),
                { capturedSeries: f, j: u, hoverX: c, hoverY: d }
              );
            },
          },
          {
            key: "closestInMultiArray",
            value: function (t, e, i, a) {
              var s = this.w,
                n = 0,
                r = null,
                o = -1;
              s.globals.series.length > 1
                ? (n = this.getFirstActiveXArray(i))
                : (r = 0);
              var l = a[n][0],
                h = i[n][0],
                c = Math.abs(t - h),
                d = Math.abs(e - l),
                u = d + c;
              return (
                a.map(function (s, n) {
                  s.map(function (s, l) {
                    var h = Math.abs(e - a[n][l]),
                      g = Math.abs(t - i[n][l]),
                      f = g + h;
                    f < u && ((u = f), (c = g), (d = h), (r = n), (o = l));
                  });
                }),
                { index: r, j: o }
              );
            },
          },
          {
            key: "getFirstActiveXArray",
            value: function (t) {
              for (
                var e = 0,
                  i = new w(this.ctx),
                  a = t.map(function (t, e) {
                    return t.length > 0 ? e : -1;
                  }),
                  s = 0;
                s < a.length;
                s++
              ) {
                var n = i.getSeriesTotalByIndex(s);
                if (-1 !== a[s] && 0 !== n && !i.seriesHaveSameValues(s)) {
                  e = a[s];
                  break;
                }
              }
              return e;
            },
          },
          {
            key: "closestInArray",
            value: function (t, e) {
              for (
                var i = e[0], a = null, s = Math.abs(t - i), n = 0;
                n < e.length;
                n++
              ) {
                var r = Math.abs(t - e[n]);
                r < s && ((s = r), (a = n));
              }
              return { index: a };
            },
          },
          {
            key: "isXoverlap",
            value: function (t) {
              var e = [],
                i = this.w.globals.seriesX.filter(function (t) {
                  return void 0 !== t[0];
                });
              if (i.length > 0)
                for (var a = 0; a < i.length - 1; a++)
                  void 0 !== i[a][t] &&
                    void 0 !== i[a + 1][t] &&
                    i[a][t] !== i[a + 1][t] &&
                    e.push("unEqual");
              return 0 === e.length;
            },
          },
          {
            key: "isInitialSeriesSameLen",
            value: function () {
              for (
                var t = !0, e = this.w.globals.initialSeries, i = 0;
                i < e.length - 1;
                i++
              )
                if (e[i].data.length !== e[i + 1].data.length) {
                  t = !1;
                  break;
                }
              return t;
            },
          },
          {
            key: "getBarsHeight",
            value: function (t) {
              return d(t).reduce(function (t, e) {
                return t + e.getBBox().height;
              }, 0);
            },
          },
          {
            key: "toggleAllTooltipSeriesGroups",
            value: function (t) {
              var e = this.w,
                i = this.ttCtx;
              0 === i.allTooltipSeriesGroups.length &&
                (i.allTooltipSeriesGroups =
                  e.globals.dom.baseEl.querySelectorAll(
                    ".apexcharts-tooltip-series-group"
                  ));
              for (var a = i.allTooltipSeriesGroups, s = 0; s < a.length; s++)
                "enable" === t
                  ? (a[s].classList.add("active"),
                    (a[s].style.display = e.config.tooltip.items.display))
                  : (a[s].classList.remove("active"),
                    (a[s].style.display = "none"));
            },
          },
        ]),
        t
      );
    })(),
    ut = (function () {
      function t(i) {
        e(this, t),
          (this.w = i.w),
          (this.ctx = i.ctx),
          (this.ttCtx = i),
          (this.tooltipUtil = new dt(i));
      }
      return (
        a(t, [
          {
            key: "drawSeriesTexts",
            value: function (t) {
              var e = t.shared,
                i = void 0 === e || e,
                a = t.ttItems,
                s = t.i,
                n = void 0 === s ? 0 : s,
                r = t.j,
                o = void 0 === r ? null : r,
                l = this.w;
              void 0 !== l.config.tooltip.custom
                ? Array.isArray(l.config.tooltip.custom)
                  ? this.handleCustomTooltip({ i: n, j: o, isArray: !0 })
                  : this.handleCustomTooltip({ i: n, j: o, isArray: !1 })
                : this.toggleActiveInactiveSeries(i);
              var h = this.getValuesToPrint({ i: n, j: o });
              this.printLabels({
                i: n,
                j: o,
                values: h,
                ttItems: a,
                shared: i,
              });
              var c = this.ttCtx.getElTooltip();
              (this.ttCtx.tooltipRect.ttWidth =
                c.getBoundingClientRect().width),
                (this.ttCtx.tooltipRect.ttHeight =
                  c.getBoundingClientRect().height);
            },
          },
          {
            key: "printLabels",
            value: function (t) {
              var e,
                i = t.i,
                a = t.j,
                s = t.values,
                n = t.ttItems,
                r = t.shared,
                o = this.w,
                l = s.xVal,
                h = s.zVal,
                c = s.xAxisTTVal,
                d = "",
                u = o.globals.colors[i];
              null !== a &&
                o.config.plotOptions.bar.distributed &&
                (u = o.globals.colors[a]);
              for (
                var g = 0, f = o.globals.series.length - 1;
                g < o.globals.series.length;
                g++, f--
              ) {
                var p = this.getFormatters(i);
                if (
                  ((d = this.getSeriesName({
                    fn: p.yLbTitleFormatter,
                    index: i,
                    seriesIndex: i,
                    j: a,
                  })),
                  r)
                ) {
                  var x = o.config.tooltip.inverseOrder ? f : g;
                  (p = this.getFormatters(x)),
                    (d = this.getSeriesName({
                      fn: p.yLbTitleFormatter,
                      index: x,
                      seriesIndex: i,
                      j: a,
                    })),
                    (u = o.globals.colors[x]),
                    (e = p.yLbFormatter(o.globals.series[x][a], {
                      series: o.globals.series,
                      seriesIndex: x,
                      dataPointIndex: a,
                      w: o,
                    })),
                    ((this.ttCtx.hasBars() &&
                      o.config.chart.stacked &&
                      0 === o.globals.series[x][a]) ||
                      void 0 === o.globals.series[x][a]) &&
                      (e = void 0);
                } else
                  e = p.yLbFormatter(o.globals.series[i][a], {
                    series: o.globals.series,
                    seriesIndex: i,
                    dataPointIndex: a,
                    w: o,
                  });
                null === a && (e = p.yLbFormatter(o.globals.series[i], o)),
                  this.DOMHandling({
                    i: i,
                    t: g,
                    ttItems: n,
                    values: { val: e, xVal: l, xAxisTTVal: c, zVal: h },
                    seriesName: d,
                    shared: r,
                    pColor: u,
                  });
              }
            },
          },
          {
            key: "getFormatters",
            value: function (t) {
              var e,
                i = this.w,
                a = i.globals.yLabelFormatters[t];
              return (
                void 0 !== i.globals.ttVal
                  ? Array.isArray(i.globals.ttVal)
                    ? ((a = i.globals.ttVal[t] && i.globals.ttVal[t].formatter),
                      (e =
                        i.globals.ttVal[t] &&
                        i.globals.ttVal[t].title &&
                        i.globals.ttVal[t].title.formatter))
                    : ((a = i.globals.ttVal.formatter),
                      "function" == typeof i.globals.ttVal.title.formatter &&
                        (e = i.globals.ttVal.title.formatter))
                  : (e = i.config.tooltip.y.title.formatter),
                "function" != typeof a &&
                  (a = i.globals.yLabelFormatters[0]
                    ? i.globals.yLabelFormatters[0]
                    : function (t) {
                        return t;
                      }),
                "function" != typeof e &&
                  (e = function (t) {
                    return t;
                  }),
                { yLbFormatter: a, yLbTitleFormatter: e }
              );
            },
          },
          {
            key: "getSeriesName",
            value: function (t) {
              var e = t.fn,
                i = t.index,
                a = t.seriesIndex,
                s = t.j,
                n = this.w;
              return e(String(n.globals.seriesNames[i]), {
                series: n.globals.series,
                seriesIndex: a,
                dataPointIndex: s,
                w: n,
              });
            },
          },
          {
            key: "DOMHandling",
            value: function (t) {
              var e = t.i,
                i = t.t,
                a = t.ttItems,
                s = t.values,
                n = t.seriesName,
                r = t.shared,
                o = t.pColor,
                l = this.w,
                h = this.ttCtx,
                c = s.val,
                d = s.xVal,
                u = s.xAxisTTVal,
                g = s.zVal,
                f = null;
              (f = a[i].children),
                l.config.tooltip.fillSeriesColor &&
                  ((a[i].style.backgroundColor = o),
                  (f[0].style.display = "none")),
                h.showTooltipTitle &&
                  (null === h.tooltipTitle &&
                    (h.tooltipTitle = l.globals.dom.baseEl.querySelector(
                      ".apexcharts-tooltip-title"
                    )),
                  (h.tooltipTitle.innerHTML = d)),
                h.blxaxisTooltip &&
                  (h.xaxisTooltipText.innerHTML = "" !== u ? u : d);
              var p = a[i].querySelector(".apexcharts-tooltip-text-label");
              p && (p.innerHTML = n ? n + ": " : "");
              var x = a[i].querySelector(".apexcharts-tooltip-text-value");
              (x && (x.innerHTML = c),
              f[0] &&
                f[0].classList.contains("apexcharts-tooltip-marker") &&
                (l.config.tooltip.marker.fillColors &&
                  Array.isArray(l.config.tooltip.marker.fillColors) &&
                  (o = l.config.tooltip.marker.fillColors[e]),
                (f[0].style.backgroundColor = o)),
              l.config.tooltip.marker.show || (f[0].style.display = "none"),
              null !== g) &&
                ((a[i].querySelector(
                  ".apexcharts-tooltip-text-z-label"
                ).innerHTML = l.config.tooltip.z.title),
                (a[i].querySelector(
                  ".apexcharts-tooltip-text-z-value"
                ).innerHTML = void 0 !== g ? g : ""));
              r &&
                f[0] &&
                (null == c || l.globals.collapsedSeriesIndices.indexOf(i) > -1
                  ? (f[0].parentNode.style.display = "none")
                  : (f[0].parentNode.style.display =
                      l.config.tooltip.items.display));
            },
          },
          {
            key: "toggleActiveInactiveSeries",
            value: function (t) {
              var e = this.w;
              if (t) this.tooltipUtil.toggleAllTooltipSeriesGroups("enable");
              else {
                this.tooltipUtil.toggleAllTooltipSeriesGroups("disable");
                var i = e.globals.dom.baseEl.querySelector(
                  ".apexcharts-tooltip-series-group"
                );
                i &&
                  (i.classList.add("active"),
                  (i.style.display = e.config.tooltip.items.display));
              }
            },
          },
          {
            key: "getValuesToPrint",
            value: function (t) {
              var e = t.i,
                i = t.j,
                a = this.w,
                s = this.ctx.series.filteredSeriesX(),
                n = "",
                r = null,
                o = null,
                l = {
                  series: a.globals.series,
                  seriesIndex: e,
                  dataPointIndex: i,
                  w: a,
                },
                h = a.globals.ttZFormatter;
              null === i
                ? (o = a.globals.series[e])
                : a.globals.isXNumeric
                ? ((n = s[e][i]),
                  0 === s[e].length &&
                    (n = s[this.tooltipUtil.getFirstActiveXArray(s)][i]))
                : (n =
                    void 0 !== a.globals.labels[i] ? a.globals.labels[i] : "");
              var c = n;
              a.globals.isXNumeric && "datetime" === a.config.xaxis.type
                ? (n = new O(this.ctx).xLabelFormat(
                    a.globals.ttKeyFormatter,
                    c,
                    c
                  ))
                : a.globals.isBarHorizontal ||
                  (n = a.globals.xLabelFormatter(c, l));
              return (
                void 0 !== a.config.tooltip.x.formatter &&
                  (n = a.globals.ttKeyFormatter(c, l)),
                a.globals.seriesZ.length > 0 &&
                  a.globals.seriesZ[0].length > 0 &&
                  (r = h(a.globals.seriesZ[e][i], a)),
                {
                  val: o,
                  xVal: n,
                  xAxisTTVal:
                    "function" == typeof a.config.xaxis.tooltip.formatter
                      ? a.globals.xaxisTooltipFormatter(c, l)
                      : n,
                  zVal: r,
                }
              );
            },
          },
          {
            key: "handleCustomTooltip",
            value: function (t) {
              var e = t.i,
                i = t.j,
                a = t.isArray,
                s = this.w,
                n = this.ttCtx.getElTooltip(),
                r = s.config.tooltip.custom;
              a && r[e] && (r = s.config.tooltip.custom[e]),
                (n.innerHTML = r({
                  ctx: this.ctx,
                  series: s.globals.series,
                  seriesIndex: e,
                  dataPointIndex: i,
                  w: s,
                }));
            },
          },
        ]),
        t
      );
    })(),
    gt = (function () {
      function t(i) {
        e(this, t), (this.ttCtx = i), (this.ctx = i.ctx), (this.w = i.w);
      }
      return (
        a(t, [
          {
            key: "moveXCrosshairs",
            value: function (t) {
              var e =
                  arguments.length > 1 && void 0 !== arguments[1]
                    ? arguments[1]
                    : null,
                i = this.ttCtx,
                a = this.w,
                s = i.getElXCrosshairs(),
                n = t - i.xcrosshairsWidth / 2,
                r = a.globals.labels.slice().length;
              if (
                (null !== e && (n = (a.globals.gridWidth / r) * e),
                "tickWidth" === a.config.xaxis.crosshairs.width ||
                "barWidth" === a.config.xaxis.crosshairs.width
                  ? n + i.xcrosshairsWidth > a.globals.gridWidth &&
                    (n = a.globals.gridWidth - i.xcrosshairsWidth)
                  : null !== e && (n += a.globals.gridWidth / r / 2),
                n < 0 && (n = 0),
                n > a.globals.gridWidth && (n = a.globals.gridWidth),
                null !== s &&
                  (s.setAttribute("x", n),
                  s.setAttribute("x1", n),
                  s.setAttribute("x2", n),
                  s.setAttribute("y2", a.globals.gridHeight),
                  s.classList.add("active")),
                i.blxaxisTooltip)
              ) {
                var o = n;
                ("tickWidth" !== a.config.xaxis.crosshairs.width &&
                  "barWidth" !== a.config.xaxis.crosshairs.width) ||
                  (o = n + i.xcrosshairsWidth / 2),
                  this.moveXAxisTooltip(o);
              }
            },
          },
          {
            key: "moveYCrosshairs",
            value: function (t) {
              var e = this.ttCtx;
              null !== e.ycrosshairs &&
                (p.setAttrs(e.ycrosshairs, { y1: t, y2: t }),
                p.setAttrs(e.ycrosshairsHidden, { y1: t, y2: t }));
            },
          },
          {
            key: "moveXAxisTooltip",
            value: function (t) {
              var e = this.w,
                i = this.ttCtx;
              if (null !== i.xaxisTooltip) {
                i.xaxisTooltip.classList.add("active");
                var a =
                  i.xaxisOffY +
                  e.config.xaxis.tooltip.offsetY +
                  e.globals.translateY +
                  1 +
                  e.config.xaxis.offsetY;
                if (
                  ((t -= i.xaxisTooltip.getBoundingClientRect().width / 2),
                  !isNaN(t))
                ) {
                  t += e.globals.translateX;
                  var s;
                  (s = new p(this.ctx).getTextRects(
                    i.xaxisTooltipText.innerHTML
                  )),
                    (i.xaxisTooltipText.style.minWidth = s.width + "px"),
                    (i.xaxisTooltip.style.left = t + "px"),
                    (i.xaxisTooltip.style.top = a + "px");
                }
              }
            },
          },
          {
            key: "moveYAxisTooltip",
            value: function (t) {
              var e = this.w,
                i = this.ttCtx;
              null === i.yaxisTTEls &&
                (i.yaxisTTEls = e.globals.dom.baseEl.querySelectorAll(
                  ".apexcharts-yaxistooltip"
                ));
              var a = parseInt(i.ycrosshairsHidden.getAttribute("y1")),
                s = e.globals.translateY + a,
                n = i.yaxisTTEls[t].getBoundingClientRect().height,
                r = e.globals.translateYAxisX[t] - 2;
              e.config.yaxis[t].opposite && (r -= 26),
                (s -= n / 2),
                -1 === e.globals.ignoreYAxisIndexes.indexOf(t)
                  ? (i.yaxisTTEls[t].classList.add("active"),
                    (i.yaxisTTEls[t].style.top = s + "px"),
                    (i.yaxisTTEls[t].style.left =
                      r + e.config.yaxis[t].tooltip.offsetX + "px"))
                  : i.yaxisTTEls[t].classList.remove("active");
            },
          },
          {
            key: "moveTooltip",
            value: function (t, e) {
              var i =
                  arguments.length > 2 && void 0 !== arguments[2]
                    ? arguments[2]
                    : null,
                a = this.w,
                s = this.ttCtx,
                n = s.getElTooltip(),
                r = s.tooltipRect,
                o = null !== i ? parseFloat(i) : 1,
                l = parseFloat(t) + o + 5,
                h = parseFloat(e) + o / 2;
              if (
                (l > a.globals.gridWidth / 2 && (l = l - r.ttWidth - o - 15),
                l > a.globals.gridWidth - r.ttWidth - 10 &&
                  (l = a.globals.gridWidth - r.ttWidth),
                l < -20 && (l = -20),
                a.config.tooltip.followCursor)
              ) {
                var c = s.getElGrid().getBoundingClientRect();
                h = s.e.clientY + a.globals.translateY - c.top - r.ttHeight / 2;
              }
              var d = this.positionChecks(r, l, h);
              (l = d.x),
                (h = d.y),
                isNaN(l) ||
                  ((l += a.globals.translateX),
                  (n.style.left = l + "px"),
                  (n.style.top = h + "px"));
            },
          },
          {
            key: "positionChecks",
            value: function (t, e, i) {
              var a = this.w;
              return (
                t.ttHeight + i > a.globals.gridHeight &&
                  (i =
                    a.globals.gridHeight - t.ttHeight + a.globals.translateY),
                i < 0 && (i = 0),
                { x: e, y: i }
              );
            },
          },
          {
            key: "moveMarkers",
            value: function (t, e) {
              var i = this.w,
                a = this.ttCtx;
              if (i.globals.markers.size[t] > 0)
                for (
                  var s = i.globals.dom.baseEl.querySelectorAll(
                      " .apexcharts-series[data\\:realIndex='".concat(
                        t,
                        "'] .apexcharts-marker"
                      )
                    ),
                    n = 0;
                  n < s.length;
                  n++
                )
                  parseInt(s[n].getAttribute("rel")) === e &&
                    (a.marker.resetPointsSize(),
                    a.marker.enlargeCurrentPoint(e, s[n]));
              else
                a.marker.resetPointsSize(), this.moveDynamicPointOnHover(e, t);
            },
          },
          {
            key: "moveDynamicPointOnHover",
            value: function (t, e) {
              var i,
                a,
                s = this.w,
                n = this.ttCtx,
                r = s.globals.pointsArray,
                o = s.config.markers.hover.size;
              if (
                (void 0 === o &&
                  (o =
                    s.globals.markers.size[e] +
                    s.config.markers.hover.sizeOffset),
                !s.config.series[e].type ||
                  ("column" !== s.config.series[e].type &&
                    "candlestick" !== s.config.series[e].type))
              ) {
                (i = r[e][t][0]), (a = r[e][t][1] ? r[e][t][1] : 0);
                var l = s.globals.dom.baseEl.querySelector(
                  ".apexcharts-series[data\\:realIndex='".concat(
                    e,
                    "'] .apexcharts-series-markers circle"
                  )
                );
                l &&
                  (l.setAttribute("r", o),
                  l.setAttribute("cx", i),
                  l.setAttribute("cy", a)),
                  this.moveXCrosshairs(i),
                  n.fixedTooltip || this.moveTooltip(i, a, o);
              }
            },
          },
          {
            key: "moveDynamicPointsOnHover",
            value: function (t) {
              var e,
                i = this.ttCtx,
                a = i.w,
                s = 0,
                n = 0,
                r = a.globals.pointsArray;
              e = new B(this.ctx).getActiveSeriesIndex();
              var o = a.config.markers.hover.size;
              void 0 === o &&
                (o =
                  a.globals.markers.size[e] +
                  a.config.markers.hover.sizeOffset),
                r[e] && ((s = r[e][t][0]), (n = r[e][t][1]));
              var l = null,
                h = i.getAllMarkers();
              if (
                null !==
                (l =
                  null !== h
                    ? h
                    : a.globals.dom.baseEl.querySelectorAll(
                        ".apexcharts-series-markers circle"
                      ))
              )
                for (var c = 0; c < l.length; c++) {
                  var d = r[c];
                  if (d && d.length) {
                    var u = r[c][t][1];
                    l[c].setAttribute("cx", s);
                    var g = parseInt(
                      l[c].parentNode.parentNode.parentNode.getAttribute(
                        "data:realIndex"
                      )
                    );
                    null !== u
                      ? (l[g] && l[g].setAttribute("r", o),
                        l[g] && l[g].setAttribute("cy", u))
                      : l[g] && l[g].setAttribute("r", 0);
                  }
                }
              if ((this.moveXCrosshairs(s), !i.fixedTooltip)) {
                var f = n || a.globals.gridHeight;
                this.moveTooltip(s, f, o);
              }
            },
          },
          {
            key: "moveStickyTooltipOverBars",
            value: function (t) {
              var e,
                i = this.w,
                a = this.ttCtx,
                s = i.globals.columnSeries
                  ? i.globals.columnSeries.length
                  : i.globals.series.length,
                n =
                  s >= 2 && s % 2 == 0
                    ? Math.floor(s / 2)
                    : Math.floor(s / 2) + 1,
                r = i.globals.dom.baseEl.querySelector(
                  ".apexcharts-bar-series .apexcharts-series[rel='"
                    .concat(n, "'] path[j='")
                    .concat(
                      t,
                      "'], .apexcharts-candlestick-series .apexcharts-series[rel='"
                    )
                    .concat(n, "'] path[j='")
                    .concat(
                      t,
                      "'], .apexcharts-rangebar-series .apexcharts-series[rel='"
                    )
                    .concat(n, "'] path[j='")
                    .concat(t, "']")
                ),
                o = r ? parseFloat(r.getAttribute("cx")) : 0,
                l = r ? parseFloat(r.getAttribute("barWidth")) : 0;
              i.globals.isXNumeric
                ? (o -= s % 2 != 0 ? l / 2 : 0)
                : ((o =
                    a.xAxisTicksPositions[t - 1] +
                    a.dataPointsDividedWidth / 2),
                  isNaN(o) &&
                    (o =
                      a.xAxisTicksPositions[t] - a.dataPointsDividedWidth / 2));
              var h = a.getElGrid().getBoundingClientRect();
              if (
                ((e = a.e.clientY - h.top - a.tooltipRect.ttHeight / 2),
                this.moveXCrosshairs(o),
                !a.fixedTooltip)
              ) {
                var c = e || i.globals.gridHeight;
                this.moveTooltip(o, c);
              }
            },
          },
        ]),
        t
      );
    })(),
    ft = (function () {
      function t(i) {
        e(this, t),
          (this.w = i.w),
          (this.ttCtx = i),
          (this.ctx = i.ctx),
          (this.tooltipPosition = new gt(i));
      }
      return (
        a(t, [
          {
            key: "drawDynamicPoints",
            value: function () {
              for (
                var t = this.w,
                  e = new p(this.ctx),
                  i = new L(this.ctx),
                  a =
                    t.globals.dom.baseEl.querySelectorAll(".apexcharts-series"),
                  s = 0;
                s < a.length;
                s++
              ) {
                var n = parseInt(a[s].getAttribute("data:realIndex")),
                  r = t.globals.dom.baseEl.querySelector(
                    ".apexcharts-series[data\\:realIndex='".concat(
                      n,
                      "'] .apexcharts-series-markers-wrap"
                    )
                  );
                if (null !== r) {
                  var o = void 0,
                    l = "apexcharts-marker w".concat(
                      (Math.random() + 1).toString(36).substring(4)
                    );
                  ("line" !== t.config.chart.type &&
                    "area" !== t.config.chart.type) ||
                    t.globals.comboCharts ||
                    t.config.tooltip.intersect ||
                    (l += " no-pointer-events");
                  var h = i.getMarkerConfig(l, n);
                  (o = e.drawMarker(0, 0, h)).node.setAttribute(
                    "default-marker-size",
                    0
                  );
                  var c = document.createElementNS(t.globals.SVGNS, "g");
                  c.classList.add("apexcharts-series-markers"),
                    c.appendChild(o.node),
                    r.appendChild(c);
                }
              }
            },
          },
          {
            key: "enlargeCurrentPoint",
            value: function (t, e) {
              var i =
                  arguments.length > 2 && void 0 !== arguments[2]
                    ? arguments[2]
                    : null,
                a =
                  arguments.length > 3 && void 0 !== arguments[3]
                    ? arguments[3]
                    : null,
                s = this.w;
              "bubble" !== s.config.chart.type && this.newPointSize(t, e);
              var n = e.getAttribute("cx"),
                r = e.getAttribute("cy");
              if (
                (null !== i && null !== a && ((n = i), (r = a)),
                this.tooltipPosition.moveXCrosshairs(n),
                !this.fixedTooltip)
              ) {
                if ("radar" === s.config.chart.type) {
                  var o = this.ttCtx.getElGrid().getBoundingClientRect();
                  n = this.ttCtx.e.clientX - o.left;
                }
                this.tooltipPosition.moveTooltip(
                  n,
                  r,
                  s.config.markers.hover.size
                );
              }
            },
          },
          {
            key: "enlargePoints",
            value: function (t) {
              for (
                var e = this.w,
                  i = this.ttCtx,
                  a = t,
                  s = e.globals.dom.baseEl.querySelectorAll(
                    ".apexcharts-series:not(.apexcharts-series-collapsed) .apexcharts-marker"
                  ),
                  n = e.config.markers.hover.size,
                  r = 0;
                r < s.length;
                r++
              ) {
                var o = s[r].getAttribute("rel"),
                  l = s[r].getAttribute("index");
                if (
                  (void 0 === n &&
                    (n =
                      e.globals.markers.size[l] +
                      e.config.markers.hover.sizeOffset),
                  a === parseInt(o))
                ) {
                  this.newPointSize(a, s[r]);
                  var h = s[r].getAttribute("cx"),
                    c = s[r].getAttribute("cy");
                  this.tooltipPosition.moveXCrosshairs(h),
                    i.fixedTooltip || this.tooltipPosition.moveTooltip(h, c, n);
                } else this.oldPointSize(s[r]);
              }
            },
          },
          {
            key: "newPointSize",
            value: function (t, e) {
              var i = this.w,
                a = i.config.markers.hover.size,
                s = null;
              s = 0 === t ? e.parentNode.firstChild : e.parentNode.lastChild;
              var n = parseInt(s.getAttribute("index"));
              void 0 === a &&
                (a =
                  i.globals.markers.size[n] +
                  i.config.markers.hover.sizeOffset),
                s.setAttribute("r", a);
            },
          },
          {
            key: "oldPointSize",
            value: function (t) {
              var e = parseFloat(t.getAttribute("default-marker-size"));
              t.setAttribute("r", e);
            },
          },
          {
            key: "resetPointsSize",
            value: function () {
              for (
                var t = this.w.globals.dom.baseEl.querySelectorAll(
                    ".apexcharts-series:not(.apexcharts-series-collapsed) .apexcharts-marker"
                  ),
                  e = 0;
                e < t.length;
                e++
              ) {
                var i = parseFloat(t[e].getAttribute("default-marker-size"));
                u.isNumber(i)
                  ? t[e].setAttribute("r", i)
                  : t[e].setAttribute("r", 0);
              }
            },
          },
        ]),
        t
      );
    })(),
    pt = (function () {
      function t(i) {
        e(this, t), (this.w = i.w), (this.ttCtx = i);
      }
      return (
        a(t, [
          {
            key: "getAttr",
            value: function (t, e) {
              return parseFloat(t.target.getAttribute(e));
            },
          },
          {
            key: "handleHeatTooltip",
            value: function (t) {
              var e = t.e,
                i = t.opt,
                a = t.x,
                s = t.y,
                n = this.ttCtx,
                r = this.w;
              if (e.target.classList.contains("apexcharts-heatmap-rect")) {
                var o = this.getAttr(e, "i"),
                  l = this.getAttr(e, "j"),
                  h = this.getAttr(e, "cx"),
                  c = this.getAttr(e, "cy"),
                  d = this.getAttr(e, "width"),
                  u = this.getAttr(e, "height");
                if (
                  (n.tooltipLabels.drawSeriesTexts({
                    ttItems: i.ttItems,
                    i: o,
                    j: l,
                    shared: !1,
                  }),
                  (r.globals.capturedSeriesIndex = o),
                  (r.globals.capturedDataPointIndex = l),
                  (a = h + n.tooltipRect.ttWidth / 2 + d),
                  (s = c + n.tooltipRect.ttHeight / 2 - u / 2),
                  n.tooltipPosition.moveXCrosshairs(h + d / 2),
                  a > r.globals.gridWidth / 2 &&
                    (a = h - n.tooltipRect.ttWidth / 2 + d),
                  n.w.config.tooltip.followCursor)
                ) {
                  var g = n.getElGrid().getBoundingClientRect();
                  s = n.e.clientY - g.top + r.globals.translateY / 2 - 10;
                }
              }
              return { x: a, y: s };
            },
          },
          {
            key: "handleMarkerTooltip",
            value: function (t) {
              var e,
                i,
                a = t.e,
                s = t.opt,
                n = t.x,
                r = t.y,
                o = this.w,
                l = this.ttCtx;
              if (a.target.classList.contains("apexcharts-marker")) {
                var h = parseInt(s.paths.getAttribute("cx")),
                  c = parseInt(s.paths.getAttribute("cy")),
                  d = parseFloat(s.paths.getAttribute("val"));
                if (
                  ((i = parseInt(s.paths.getAttribute("rel"))),
                  (e =
                    parseInt(
                      s.paths.parentNode.parentNode.parentNode.getAttribute(
                        "rel"
                      )
                    ) - 1),
                  l.intersect)
                ) {
                  var g = u.findAncestor(s.paths, "apexcharts-series");
                  g && (e = parseInt(g.getAttribute("data:realIndex")));
                }
                if (
                  (l.tooltipLabels.drawSeriesTexts({
                    ttItems: s.ttItems,
                    i: e,
                    j: i,
                    shared: !l.showOnIntersect && o.config.tooltip.shared,
                  }),
                  "mouseup" === a.type && l.markerClick(a, e, i),
                  (o.globals.capturedSeriesIndex = e),
                  (o.globals.capturedDataPointIndex = i),
                  (n = h),
                  (r = c + o.globals.translateY - 1.4 * l.tooltipRect.ttHeight),
                  l.w.config.tooltip.followCursor)
                ) {
                  var f = l.getElGrid().getBoundingClientRect();
                  r = l.e.clientY + o.globals.translateY - f.top;
                }
                d < 0 && (r = c),
                  l.marker.enlargeCurrentPoint(i, s.paths, n, r);
              }
              return { x: n, y: r };
            },
          },
          {
            key: "handleBarTooltip",
            value: function (t) {
              var e,
                i,
                a = t.e,
                s = t.opt,
                n = this.w,
                r = this.ttCtx,
                o = r.getElTooltip(),
                l = 0,
                h = 0,
                c = 0,
                d = this.getBarTooltipXY({ e: a, opt: s });
              e = d.i;
              var u = d.barHeight,
                g = d.j;
              if (
                ((n.globals.capturedSeriesIndex = e),
                (n.globals.capturedDataPointIndex = g),
                (n.globals.isBarHorizontal && r.hasBars()) ||
                !n.config.tooltip.shared
                  ? ((h = d.x),
                    (c = d.y),
                    (i = Array.isArray(n.config.stroke.width)
                      ? n.config.stroke.width[e]
                      : n.config.stroke.width),
                    (l = h))
                  : n.globals.comboCharts ||
                    n.config.tooltip.shared ||
                    (l /= 2),
                isNaN(c) && (c = n.globals.svgHeight - r.tooltipRect.ttHeight),
                h + r.tooltipRect.ttWidth > n.globals.gridWidth
                  ? (h -= r.tooltipRect.ttWidth)
                  : h < 0 && (h += r.tooltipRect.ttWidth),
                r.w.config.tooltip.followCursor)
              ) {
                var f = r.getElGrid().getBoundingClientRect();
                c = r.e.clientY - f.top;
              }
              if (
                (null === r.tooltip &&
                  (r.tooltip = n.globals.dom.baseEl.querySelector(
                    ".apexcharts-tooltip"
                  )),
                n.config.tooltip.shared ||
                  (n.globals.comboChartsHasBars
                    ? r.tooltipPosition.moveXCrosshairs(l + i / 2)
                    : r.tooltipPosition.moveXCrosshairs(l)),
                !r.fixedTooltip &&
                  (!n.config.tooltip.shared ||
                    (n.globals.isBarHorizontal && r.hasBars())))
              ) {
                x && (h = n.globals.gridWidth - h),
                  (o.style.left = h + n.globals.translateX + "px");
                var p = parseInt(
                    s.paths.parentNode.getAttribute("data:realIndex")
                  ),
                  x = n.globals.isMultipleYAxis
                    ? n.config.yaxis[p] && n.config.yaxis[p].reversed
                    : n.config.yaxis[0].reversed;
                !x ||
                  (n.globals.isBarHorizontal && r.hasBars()) ||
                  (c = c + u - 2 * (n.globals.series[e][g] < 0 ? u : 0)),
                  r.tooltipRect.ttHeight + c > n.globals.gridHeight
                    ? ((c =
                        n.globals.gridHeight -
                        r.tooltipRect.ttHeight +
                        n.globals.translateY),
                      (o.style.top = c + "px"))
                    : (o.style.top =
                        c +
                        n.globals.translateY -
                        r.tooltipRect.ttHeight / 2 +
                        "px");
              }
            },
          },
          {
            key: "getBarTooltipXY",
            value: function (t) {
              var e = t.e,
                i = t.opt,
                a = this.w,
                s = null,
                n = this.ttCtx,
                r = 0,
                o = 0,
                l = 0,
                h = 0,
                c = 0,
                d = e.target.classList;
              if (
                d.contains("apexcharts-bar-area") ||
                d.contains("apexcharts-candlestick-area") ||
                d.contains("apexcharts-rangebar-area")
              ) {
                var u = e.target,
                  g = u.getBoundingClientRect(),
                  f = i.elGrid.getBoundingClientRect(),
                  p = g.height;
                c = g.height;
                var x = g.width,
                  b = parseInt(u.getAttribute("cx")),
                  m = parseInt(u.getAttribute("cy"));
                h = parseFloat(u.getAttribute("barWidth"));
                var v =
                  "touchmove" === e.type ? e.touches[0].clientX : e.clientX;
                (s = parseInt(u.getAttribute("j"))),
                  (r = parseInt(u.parentNode.getAttribute("rel")) - 1),
                  a.globals.comboCharts &&
                    (r = parseInt(u.parentNode.getAttribute("data:realIndex"))),
                  n.tooltipLabels.drawSeriesTexts({
                    ttItems: i.ttItems,
                    i: r,
                    j: s,
                    shared: !n.showOnIntersect && a.config.tooltip.shared,
                  }),
                  a.config.tooltip.followCursor
                    ? a.globals.isBarHorizontal
                      ? ((o = v - f.left + 15),
                        (l =
                          m -
                          n.dataPointsDividedHeight +
                          p / 2 -
                          n.tooltipRect.ttHeight / 2))
                      : ((o = a.globals.isXNumeric
                          ? b - x / 2
                          : b - n.dataPointsDividedWidth + x / 2),
                        (l =
                          e.clientY - f.top - n.tooltipRect.ttHeight / 2 - 15))
                    : a.globals.isBarHorizontal
                    ? ((o = b) < n.xyRatios.baseLineInvertedY &&
                        (o = b - n.tooltipRect.ttWidth),
                      (l =
                        m -
                        n.dataPointsDividedHeight +
                        p / 2 -
                        n.tooltipRect.ttHeight / 2))
                    : ((o = a.globals.isXNumeric
                        ? b - x / 2
                        : b - n.dataPointsDividedWidth + x / 2),
                      (l = m));
              }
              return { x: o, y: l, barHeight: c, barWidth: h, i: r, j: s };
            },
          },
        ]),
        t
      );
    })(),
    xt = (function () {
      function t(i) {
        e(this, t), (this.w = i.w), (this.ttCtx = i);
      }
      return (
        a(t, [
          {
            key: "drawXaxisTooltip",
            value: function () {
              var t = this.w,
                e = this.ttCtx,
                i = "bottom" === t.config.xaxis.position;
              e.xaxisOffY = i ? t.globals.gridHeight + 1 : 1;
              var a = i
                  ? "apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom"
                  : "apexcharts-xaxistooltip apexcharts-xaxistooltip-top",
                s = t.globals.dom.elWrap;
              e.blxaxisTooltip &&
                null ===
                  t.globals.dom.baseEl.querySelector(
                    ".apexcharts-xaxistooltip"
                  ) &&
                ((e.xaxisTooltip = document.createElement("div")),
                e.xaxisTooltip.setAttribute(
                  "class",
                  a + " " + t.config.tooltip.theme
                ),
                s.appendChild(e.xaxisTooltip),
                (e.xaxisTooltipText = document.createElement("div")),
                e.xaxisTooltipText.classList.add(
                  "apexcharts-xaxistooltip-text"
                ),
                (e.xaxisTooltipText.style.fontFamily =
                  t.config.xaxis.tooltip.style.fontFamily ||
                  t.config.chart.fontFamily),
                (e.xaxisTooltipText.style.fontSize =
                  t.config.xaxis.tooltip.style.fontSize),
                e.xaxisTooltip.appendChild(e.xaxisTooltipText));
            },
          },
          {
            key: "drawYaxisTooltip",
            value: function () {
              for (
                var t = this.w,
                  e = this.ttCtx,
                  i = function (i) {
                    var a =
                      t.config.yaxis[i].opposite ||
                      t.config.yaxis[i].crosshairs.opposite;
                    e.yaxisOffX = a ? t.globals.gridWidth + 1 : 1;
                    var s =
                      "apexcharts-yaxistooltip apexcharts-yaxistooltip-".concat(
                        i,
                        a
                          ? " apexcharts-yaxistooltip-right"
                          : " apexcharts-yaxistooltip-left"
                      );
                    t.globals.yAxisSameScaleIndices.map(function (e, a) {
                      e.map(function (e, a) {
                        a === i &&
                          (s += t.config.yaxis[a].show
                            ? " "
                            : " apexcharts-yaxistooltip-hidden");
                      });
                    });
                    var n = t.globals.dom.elWrap;
                    e.blyaxisTooltip &&
                      null ===
                        t.globals.dom.baseEl.querySelector(
                          ".apexcharts-yaxistooltip apexcharts-yaxistooltip-".concat(
                            i
                          )
                        ) &&
                      ((e.yaxisTooltip = document.createElement("div")),
                      e.yaxisTooltip.setAttribute(
                        "class",
                        s + " " + t.config.tooltip.theme
                      ),
                      n.appendChild(e.yaxisTooltip),
                      0 === i && (e.yaxisTooltipText = []),
                      e.yaxisTooltipText.push(document.createElement("div")),
                      e.yaxisTooltipText[i].classList.add(
                        "apexcharts-yaxistooltip-text"
                      ),
                      e.yaxisTooltip.appendChild(e.yaxisTooltipText[i]));
                  },
                  a = 0;
                a < t.config.yaxis.length;
                a++
              )
                i(a);
            },
          },
          {
            key: "setXCrosshairWidth",
            value: function () {
              var t = this.w,
                e = this.ttCtx,
                i = e.getElXCrosshairs();
              if (
                ((e.xcrosshairsWidth = parseInt(
                  t.config.xaxis.crosshairs.width
                )),
                t.globals.comboCharts)
              ) {
                var a = t.globals.dom.baseEl.querySelector(
                  ".apexcharts-bar-area"
                );
                if (
                  null !== a &&
                  "barWidth" === t.config.xaxis.crosshairs.width
                ) {
                  var s = parseFloat(a.getAttribute("barWidth"));
                  e.xcrosshairsWidth = s;
                } else if ("tickWidth" === t.config.xaxis.crosshairs.width) {
                  var n = t.globals.labels.length;
                  e.xcrosshairsWidth = t.globals.gridWidth / n;
                }
              } else if ("tickWidth" === t.config.xaxis.crosshairs.width) {
                var r = t.globals.labels.length;
                e.xcrosshairsWidth = t.globals.gridWidth / r;
              } else if ("barWidth" === t.config.xaxis.crosshairs.width) {
                var o = t.globals.dom.baseEl.querySelector(
                  ".apexcharts-bar-area"
                );
                if (null !== o) {
                  var l = parseFloat(o.getAttribute("barWidth"));
                  e.xcrosshairsWidth = l;
                } else e.xcrosshairsWidth = 1;
              }
              t.globals.isBarHorizontal && (e.xcrosshairsWidth = 0),
                null !== i &&
                  e.xcrosshairsWidth > 0 &&
                  i.setAttribute("width", e.xcrosshairsWidth);
            },
          },
          {
            key: "handleYCrosshair",
            value: function () {
              var t = this.w,
                e = this.ttCtx;
              (e.ycrosshairs = t.globals.dom.baseEl.querySelector(
                ".apexcharts-ycrosshairs"
              )),
                (e.ycrosshairsHidden = t.globals.dom.baseEl.querySelector(
                  ".apexcharts-ycrosshairs-hidden"
                ));
            },
          },
          {
            key: "drawYaxisTooltipText",
            value: function (t, e, i) {
              var a = this.ttCtx,
                s = this.w,
                n = s.globals.yLabelFormatters[t];
              if (a.blyaxisTooltip) {
                var r = a.getElGrid().getBoundingClientRect(),
                  o = (e - r.top) * i.yRatio[t],
                  l = s.globals.maxYArr[t] - s.globals.minYArr[t],
                  h = s.globals.minYArr[t] + (l - o);
                a.tooltipPosition.moveYCrosshairs(e - r.top),
                  (a.yaxisTooltipText[t].innerHTML = n(h)),
                  a.tooltipPosition.moveYAxisTooltip(t);
              }
            },
          },
        ]),
        t
      );
    })(),
    bt = (function () {
      function t(i) {
        e(this, t), (this.ctx = i), (this.w = i.w);
        var a = this.w;
        (this.tConfig = a.config.tooltip),
          (this.tooltipUtil = new dt(this)),
          (this.tooltipLabels = new ut(this)),
          (this.tooltipPosition = new gt(this)),
          (this.marker = new ft(this)),
          (this.intersect = new pt(this)),
          (this.axesTooltip = new xt(this)),
          (this.showOnIntersect = this.tConfig.intersect),
          (this.showTooltipTitle = this.tConfig.x.show),
          (this.fixedTooltip = this.tConfig.fixed.enabled),
          (this.xaxisTooltip = null),
          (this.yaxisTTEls = null),
          (this.isBarShared =
            !a.globals.isBarHorizontal && this.tConfig.shared);
      }
      return (
        a(t, [
          {
            key: "getElTooltip",
            value: function (t) {
              return (
                t || (t = this),
                t.w.globals.dom.baseEl.querySelector(".apexcharts-tooltip")
              );
            },
          },
          {
            key: "getElXCrosshairs",
            value: function () {
              return this.w.globals.dom.baseEl.querySelector(
                ".apexcharts-xcrosshairs"
              );
            },
          },
          {
            key: "getElGrid",
            value: function () {
              return this.w.globals.dom.baseEl.querySelector(
                ".apexcharts-grid"
              );
            },
          },
          {
            key: "drawTooltip",
            value: function (t) {
              var e = this.w;
              (this.xyRatios = t),
                (this.blxaxisTooltip =
                  e.config.xaxis.tooltip.enabled && e.globals.axisCharts),
                (this.blyaxisTooltip =
                  e.config.yaxis[0].tooltip.enabled && e.globals.axisCharts),
                (this.allTooltipSeriesGroups = []),
                e.globals.axisCharts || (this.showTooltipTitle = !1);
              var i = document.createElement("div");
              if (
                (i.classList.add("apexcharts-tooltip"),
                i.classList.add(this.tConfig.theme),
                e.globals.dom.elWrap.appendChild(i),
                e.globals.axisCharts)
              ) {
                this.axesTooltip.drawXaxisTooltip(),
                  this.axesTooltip.drawYaxisTooltip(),
                  this.axesTooltip.setXCrosshairWidth(),
                  this.axesTooltip.handleYCrosshair();
                var a = new _(this.ctx);
                this.xAxisTicksPositions = a.getXAxisTicksPositions();
              }
              if (
                (((e.globals.comboCharts && !this.tConfig.shared) ||
                  (this.tConfig.intersect && !this.tConfig.shared) ||
                  (("bar" === e.config.chart.type ||
                    "rangeBar" === e.config.chart.type) &&
                    !this.tConfig.shared)) &&
                  (this.showOnIntersect = !0),
                (0 !== e.config.markers.size &&
                  0 !== e.globals.markers.largestSize) ||
                  this.marker.drawDynamicPoints(this),
                e.globals.collapsedSeries.length !== e.globals.series.length)
              ) {
                (this.dataPointsDividedHeight =
                  e.globals.gridHeight / e.globals.dataPoints),
                  (this.dataPointsDividedWidth =
                    e.globals.gridWidth / e.globals.dataPoints),
                  this.showTooltipTitle &&
                    ((this.tooltipTitle = document.createElement("div")),
                    this.tooltipTitle.classList.add("apexcharts-tooltip-title"),
                    (this.tooltipTitle.style.fontFamily =
                      this.tConfig.style.fontFamily ||
                      e.config.chart.fontFamily),
                    (this.tooltipTitle.style.fontSize =
                      this.tConfig.style.fontSize),
                    i.appendChild(this.tooltipTitle));
                var s = e.globals.series.length;
                (e.globals.xyCharts || e.globals.comboCharts) &&
                  this.tConfig.shared &&
                  (s = this.showOnIntersect ? 1 : e.globals.series.length),
                  (this.legendLabels = e.globals.dom.baseEl.querySelectorAll(
                    ".apexcharts-legend-text"
                  )),
                  (this.ttItems = this.createTTElements(s)),
                  this.addSVGEvents();
              }
            },
          },
          {
            key: "createTTElements",
            value: function (t) {
              for (
                var e = this.w, i = [], a = this.getElTooltip(), s = 0;
                s < t;
                s++
              ) {
                var n = document.createElement("div");
                n.classList.add("apexcharts-tooltip-series-group"),
                  this.tConfig.shared &&
                    this.tConfig.enabledOnSeries &&
                    Array.isArray(this.tConfig.enabledOnSeries) &&
                    this.tConfig.enabledOnSeries.indexOf(s) < 0 &&
                    n.classList.add("apexcharts-tooltip-series-group-hidden");
                var r = document.createElement("span");
                r.classList.add("apexcharts-tooltip-marker"),
                  (r.style.backgroundColor = e.globals.colors[s]),
                  n.appendChild(r);
                var o = document.createElement("div");
                o.classList.add("apexcharts-tooltip-text"),
                  (o.style.fontFamily =
                    this.tConfig.style.fontFamily || e.config.chart.fontFamily),
                  (o.style.fontSize = this.tConfig.style.fontSize);
                var l = document.createElement("div");
                l.classList.add("apexcharts-tooltip-y-group");
                var h = document.createElement("span");
                h.classList.add("apexcharts-tooltip-text-label"),
                  l.appendChild(h);
                var c = document.createElement("span");
                c.classList.add("apexcharts-tooltip-text-value"),
                  l.appendChild(c);
                var d = document.createElement("div");
                d.classList.add("apexcharts-tooltip-z-group");
                var u = document.createElement("span");
                u.classList.add("apexcharts-tooltip-text-z-label"),
                  d.appendChild(u);
                var g = document.createElement("span");
                g.classList.add("apexcharts-tooltip-text-z-value"),
                  d.appendChild(g),
                  o.appendChild(l),
                  o.appendChild(d),
                  n.appendChild(o),
                  a.appendChild(n),
                  i.push(n);
              }
              return i;
            },
          },
          {
            key: "addSVGEvents",
            value: function () {
              var t = this.w,
                e = t.config.chart.type,
                i = this.getElTooltip(),
                a = !("bar" !== e && "candlestick" !== e && "rangeBar" !== e),
                s = t.globals.dom.Paper.node,
                n = this.getElGrid();
              n && (this.seriesBound = n.getBoundingClientRect());
              var r,
                o = [],
                l = [],
                h = {
                  hoverArea: s,
                  elGrid: n,
                  tooltipEl: i,
                  tooltipY: o,
                  tooltipX: l,
                  ttItems: this.ttItems,
                };
              if (
                t.globals.axisCharts &&
                ("area" === e ||
                "line" === e ||
                "scatter" === e ||
                "bubble" === e
                  ? (r = t.globals.dom.baseEl.querySelectorAll(
                      ".apexcharts-series[data\\:longestSeries='true'] .apexcharts-marker"
                    ))
                  : a
                  ? (r = t.globals.dom.baseEl.querySelectorAll(
                      ".apexcharts-series .apexcharts-bar-area, .apexcharts-series .apexcharts-candlestick-area, .apexcharts-series .apexcharts-rangebar-area"
                    ))
                  : "heatmap" === e
                  ? (r = t.globals.dom.baseEl.querySelectorAll(
                      ".apexcharts-series .apexcharts-heatmap"
                    ))
                  : "radar" === e &&
                    (r = t.globals.dom.baseEl.querySelectorAll(
                      ".apexcharts-series .apexcharts-marker"
                    )),
                r && r.length)
              )
                for (var c = 0; c < r.length; c++)
                  o.push(r[c].getAttribute("cy")),
                    l.push(r[c].getAttribute("cx"));
              if (
                (t.globals.xyCharts && !this.showOnIntersect) ||
                (t.globals.comboCharts && !this.showOnIntersect) ||
                (a && this.hasBars() && this.tConfig.shared)
              )
                this.addPathsEventListeners([s], h);
              else if (a && !t.globals.comboCharts)
                this.addBarsEventListeners(h);
              else if (
                "bubble" === e ||
                "scatter" === e ||
                "radar" === e ||
                (this.showOnIntersect && ("area" === e || "line" === e))
              )
                this.addPointsEventsListeners(h);
              else if (!t.globals.axisCharts || "heatmap" === e) {
                var d =
                  t.globals.dom.baseEl.querySelectorAll(".apexcharts-series");
                this.addPathsEventListeners(d, h);
              }
              if (this.showOnIntersect) {
                var u = t.globals.dom.baseEl.querySelectorAll(
                  ".apexcharts-line-series .apexcharts-marker"
                );
                u.length > 0 && this.addPathsEventListeners(u, h);
                var g = t.globals.dom.baseEl.querySelectorAll(
                  ".apexcharts-area-series .apexcharts-marker"
                );
                g.length > 0 && this.addPathsEventListeners(g, h),
                  this.hasBars() &&
                    !this.tConfig.shared &&
                    this.addBarsEventListeners(h);
              }
            },
          },
          {
            key: "drawFixedTooltipRect",
            value: function () {
              var t = this.w,
                e = this.getElTooltip(),
                i = e.getBoundingClientRect(),
                a = i.width + 10,
                s = i.height + 10,
                n = this.tConfig.fixed.offsetX,
                r = this.tConfig.fixed.offsetY;
              return (
                this.tConfig.fixed.position.toLowerCase().indexOf("right") >
                  -1 && (n = n + t.globals.svgWidth - a + 10),
                this.tConfig.fixed.position.toLowerCase().indexOf("bottom") >
                  -1 && (r = r + t.globals.svgHeight - s - 10),
                (e.style.left = n + "px"),
                (e.style.top = r + "px"),
                { x: n, y: r, ttWidth: a, ttHeight: s }
              );
            },
          },
          {
            key: "addPointsEventsListeners",
            value: function (t) {
              var e = this.w.globals.dom.baseEl.querySelectorAll(
                ".apexcharts-series-markers .apexcharts-marker"
              );
              this.addPathsEventListeners(e, t);
            },
          },
          {
            key: "addBarsEventListeners",
            value: function (t) {
              var e = this.w.globals.dom.baseEl.querySelectorAll(
                ".apexcharts-bar-area, .apexcharts-candlestick-area, .apexcharts-rangebar-area"
              );
              this.addPathsEventListeners(e, t);
            },
          },
          {
            key: "addPathsEventListeners",
            value: function (t, e) {
              for (
                var i = this,
                  a = this,
                  s = function (s) {
                    var n = {
                      paths: t[s],
                      tooltipEl: e.tooltipEl,
                      tooltipY: e.tooltipY,
                      tooltipX: e.tooltipX,
                      elGrid: e.elGrid,
                      hoverArea: e.hoverArea,
                      ttItems: e.ttItems,
                    };
                    i.w.globals.tooltipOpts = n;
                    [
                      "mousemove",
                      "mouseup",
                      "touchmove",
                      "mouseout",
                      "touchend",
                    ].map(function (e) {
                      return t[s].addEventListener(
                        e,
                        a.seriesHover.bind(a, n),
                        { capture: !1, passive: !0 }
                      );
                    });
                  },
                  n = 0;
                n < t.length;
                n++
              )
                s(n);
            },
          },
          {
            key: "seriesHover",
            value: function (t, e) {
              var i = this,
                a = [],
                s = this.w;
              s.config.chart.group && (a = this.ctx.getGroupedCharts()),
                (s.globals.axisCharts &&
                  ((s.globals.minX === -1 / 0 && s.globals.maxX === 1 / 0) ||
                    0 === s.globals.dataPoints)) ||
                  (a.length
                    ? a.forEach(function (a) {
                        var s = i.getElTooltip(a),
                          n = {
                            paths: t.paths,
                            tooltipEl: s,
                            tooltipY: t.tooltipY,
                            tooltipX: t.tooltipX,
                            elGrid: t.elGrid,
                            hoverArea: t.hoverArea,
                            ttItems: a.w.globals.tooltip.ttItems,
                          };
                        a.w.globals.minX === i.w.globals.minX &&
                          a.w.globals.maxX === i.w.globals.maxX &&
                          a.w.globals.tooltip.seriesHoverByContext({
                            chartCtx: a,
                            ttCtx: a.w.globals.tooltip,
                            opt: n,
                            e: e,
                          });
                      })
                    : this.seriesHoverByContext({
                        chartCtx: this.ctx,
                        ttCtx: this.w.globals.tooltip,
                        opt: t,
                        e: e,
                      }));
            },
          },
          {
            key: "seriesHoverByContext",
            value: function (t) {
              var e = t.chartCtx,
                i = t.ttCtx,
                a = t.opt,
                s = t.e,
                n = e.w,
                r = this.getElTooltip();
              ((i.tooltipRect = {
                x: 0,
                y: 0,
                ttWidth: r.getBoundingClientRect().width,
                ttHeight: r.getBoundingClientRect().height,
              }),
              (i.e = s),
              !i.hasBars() || n.globals.comboCharts || i.isBarShared) ||
                (this.tConfig.onDatasetHover.highlightDataSeries &&
                  new B(e).toggleSeriesOnHover(s, s.target.parentNode));
              i.fixedTooltip && i.drawFixedTooltipRect(),
                n.globals.axisCharts
                  ? i.axisChartsTooltips({
                      e: s,
                      opt: a,
                      tooltipRect: i.tooltipRect,
                    })
                  : i.nonAxisChartsTooltips({
                      e: s,
                      opt: a,
                      tooltipRect: i.tooltipRect,
                    });
            },
          },
          {
            key: "axisChartsTooltips",
            value: function (t) {
              var e,
                i,
                a,
                s = t.e,
                n = t.opt,
                r = this.w,
                o = null,
                l = n.elGrid.getBoundingClientRect(),
                h = "touchmove" === s.type ? s.touches[0].clientX : s.clientX,
                c = "touchmove" === s.type ? s.touches[0].clientY : s.clientY;
              if (
                ((this.clientY = c),
                (this.clientX = h),
                (r.globals.capturedSeriesIndex = -1),
                (r.globals.capturedDataPointIndex = -1),
                c < l.top || c > l.top + l.height)
              )
                this.handleMouseOut(n);
              else {
                if (
                  Array.isArray(this.tConfig.enabledOnSeries) &&
                  !r.config.tooltip.shared
                ) {
                  var d = parseInt(n.paths.getAttribute("index"));
                  if (this.tConfig.enabledOnSeries.indexOf(d) < 0)
                    return void this.handleMouseOut(n);
                }
                var u = this.getElTooltip(),
                  g = this.getElXCrosshairs(),
                  f =
                    r.globals.xyCharts ||
                    ("bar" === r.config.chart.type &&
                      !r.globals.isBarHorizontal &&
                      this.hasBars() &&
                      this.tConfig.shared) ||
                    (r.globals.comboCharts && this.hasBars);
                if (
                  (r.globals.isBarHorizontal && this.hasBars() && (f = !1),
                  "mousemove" === s.type ||
                    "touchmove" === s.type ||
                    "mouseup" === s.type)
                ) {
                  if (
                    (null !== g && g.classList.add("active"),
                    null !== this.ycrosshairs &&
                      this.blyaxisTooltip &&
                      this.ycrosshairs.classList.add("active"),
                    f && !this.showOnIntersect)
                  ) {
                    e = (o = this.tooltipUtil.getNearestValues({
                      context: this,
                      hoverArea: n.hoverArea,
                      elGrid: n.elGrid,
                      clientX: h,
                      clientY: c,
                      hasBars: this.hasBars,
                    })).j;
                    var p = o.capturedSeries;
                    if (o.hoverX < 0 || o.hoverX > r.globals.gridWidth)
                      return void this.handleMouseOut(n);
                    if (null !== p) {
                      if (null === r.globals.series[p][e])
                        return void this.handleMouseOut(n);
                      void 0 !== r.globals.series[p][e]
                        ? this.tConfig.shared &&
                          this.tooltipUtil.isXoverlap(e) &&
                          this.tooltipUtil.isInitialSeriesSameLen()
                          ? this.create(s, this, p, e, n.ttItems)
                          : this.create(s, this, p, e, n.ttItems, !1)
                        : this.tooltipUtil.isXoverlap(e) &&
                          this.create(s, this, 0, e, n.ttItems);
                    } else
                      this.tooltipUtil.isXoverlap(e) &&
                        this.create(s, this, 0, e, n.ttItems);
                  } else if ("heatmap" === r.config.chart.type) {
                    var x = this.intersect.handleHeatTooltip({
                      e: s,
                      opt: n,
                      x: i,
                      y: a,
                    });
                    (i = x.x),
                      (a = x.y),
                      (u.style.left = i + "px"),
                      (u.style.top = a + "px");
                  } else
                    this.hasBars &&
                      this.intersect.handleBarTooltip({ e: s, opt: n }),
                      this.hasMarkers &&
                        this.intersect.handleMarkerTooltip({
                          e: s,
                          opt: n,
                          x: i,
                          y: a,
                        });
                  if (this.blyaxisTooltip)
                    for (var b = 0; b < r.config.yaxis.length; b++)
                      this.axesTooltip.drawYaxisTooltipText(
                        b,
                        c,
                        this.xyRatios
                      );
                  n.tooltipEl.classList.add("active");
                } else
                  ("mouseout" !== s.type && "touchend" !== s.type) ||
                    this.handleMouseOut(n);
              }
            },
          },
          {
            key: "nonAxisChartsTooltips",
            value: function (t) {
              var e = t.e,
                i = t.opt,
                a = t.tooltipRect,
                s = this.w,
                n = i.paths.getAttribute("rel"),
                r = this.getElTooltip(),
                o = s.globals.dom.elWrap.getBoundingClientRect();
              if ("mousemove" === e.type || "touchmove" === e.type) {
                r.classList.add("active"),
                  this.tooltipLabels.drawSeriesTexts({
                    ttItems: i.ttItems,
                    i: parseInt(n) - 1,
                    shared: !1,
                  });
                var l = s.globals.clientX - o.left - a.ttWidth / 2,
                  h = s.globals.clientY - o.top - a.ttHeight - 10;
                (r.style.left = l + "px"), (r.style.top = h + "px");
              } else
                ("mouseout" !== e.type && "touchend" !== e.type) ||
                  r.classList.remove("active");
            },
          },
          {
            key: "deactivateHoverFilter",
            value: function () {
              for (
                var t = this.w,
                  e = new p(this.ctx),
                  i = t.globals.dom.Paper.select(".apexcharts-bar-area"),
                  a = 0;
                a < i.length;
                a++
              )
                e.pathMouseLeave(i[a]);
            },
          },
          {
            key: "handleMouseOut",
            value: function (t) {
              var e = this.w,
                i = this.getElXCrosshairs();
              if (
                (t.tooltipEl.classList.remove("active"),
                this.deactivateHoverFilter(),
                "bubble" !== e.config.chart.type &&
                  this.marker.resetPointsSize(),
                null !== i && i.classList.remove("active"),
                null !== this.ycrosshairs &&
                  this.ycrosshairs.classList.remove("active"),
                this.blxaxisTooltip &&
                  this.xaxisTooltip.classList.remove("active"),
                this.blyaxisTooltip)
              ) {
                null === this.yaxisTTEls &&
                  (this.yaxisTTEls = e.globals.dom.baseEl.querySelectorAll(
                    ".apexcharts-yaxistooltip"
                  ));
                for (var a = 0; a < this.yaxisTTEls.length; a++)
                  this.yaxisTTEls[a].classList.remove("active");
              }
              e.config.legend.tooltipHoverFormatter &&
                this.legendLabels.forEach(function (t) {
                  var e = t.getAttribute("data:default-text");
                  t.innerHTML = decodeURIComponent(e);
                });
            },
          },
          {
            key: "getElMarkers",
            value: function () {
              return this.w.globals.dom.baseEl.querySelectorAll(
                " .apexcharts-series-markers"
              );
            },
          },
          {
            key: "getAllMarkers",
            value: function () {
              return this.w.globals.dom.baseEl.querySelectorAll(
                ".apexcharts-series-markers .apexcharts-marker"
              );
            },
          },
          {
            key: "hasMarkers",
            value: function () {
              return this.getElMarkers().length > 0;
            },
          },
          {
            key: "getElBars",
            value: function () {
              return this.w.globals.dom.baseEl.querySelectorAll(
                ".apexcharts-bar-series,  .apexcharts-candlestick-series, .apexcharts-rangebar-series"
              );
            },
          },
          {
            key: "hasBars",
            value: function () {
              return this.getElBars().length > 0;
            },
          },
          {
            key: "markerClick",
            value: function (t, e, i) {
              var a = this.w;
              "function" == typeof a.config.chart.events.markerClick &&
                a.config.chart.events.markerClick(t, this.ctx, {
                  seriesIndex: e,
                  dataPointIndex: i,
                  w: a,
                }),
                this.ctx.fireEvent("markerClick", [
                  t,
                  this.ctx,
                  { seriesIndex: e, dataPointIndex: i, w: a },
                ]);
            },
          },
          {
            key: "create",
            value: function (t, e, i, a, s) {
              var n =
                  arguments.length > 5 && void 0 !== arguments[5]
                    ? arguments[5]
                    : null,
                r = this.w,
                o = e;
              "mouseup" === t.type && this.markerClick(t, i, a),
                null === n && (n = this.tConfig.shared);
              var l = this.hasMarkers(),
                h = this.getElBars();
              if (r.config.legend.tooltipHoverFormatter) {
                var c = r.config.legend.tooltipHoverFormatter,
                  d = Array.from(this.legendLabels);
                d.forEach(function (t) {
                  var e = t.getAttribute("data:default-text");
                  t.innerHTML = decodeURIComponent(e);
                });
                for (var u = 0; u < d.length; u++) {
                  var g = d[u],
                    f = parseInt(g.getAttribute("i")),
                    x = decodeURIComponent(g.getAttribute("data:default-text")),
                    b = c(x, {
                      seriesIndex: n ? f : i,
                      dataPointIndex: a,
                      w: r,
                    });
                  if (n)
                    g.innerHTML =
                      r.globals.collapsedSeriesIndices.indexOf(f) < 0 ? b : x;
                  else if (((g.innerHTML = f === i ? b : x), i === f)) break;
                }
              }
              if (n) {
                if (
                  (o.tooltipLabels.drawSeriesTexts({
                    ttItems: s,
                    i: i,
                    j: a,
                    shared: !this.showOnIntersect && this.tConfig.shared,
                  }),
                  l &&
                    (r.globals.markers.largestSize > 0
                      ? o.marker.enlargePoints(a)
                      : o.tooltipPosition.moveDynamicPointsOnHover(a)),
                  this.hasBars() &&
                    ((this.barSeriesHeight = this.tooltipUtil.getBarsHeight(h)),
                    this.barSeriesHeight > 0))
                ) {
                  var m = new p(this.ctx),
                    v = r.globals.dom.Paper.select(
                      ".apexcharts-bar-area[j='".concat(a, "']")
                    );
                  this.deactivateHoverFilter(),
                    this.tooltipPosition.moveStickyTooltipOverBars(a);
                  for (var y = 0; y < v.length; y++) m.pathMouseEnter(v[y]);
                }
              } else
                o.tooltipLabels.drawSeriesTexts({
                  shared: !1,
                  ttItems: s,
                  i: i,
                  j: a,
                }),
                  this.hasBars() &&
                    o.tooltipPosition.moveStickyTooltipOverBars(a),
                  l && o.tooltipPosition.moveMarkers(i, a);
            },
          },
        ]),
        t
      );
    })(),
    mt = (function () {
      function t(i) {
        e(this, t),
          (this.ctx = i),
          (this.w = i.w),
          (this.ev = this.w.config.chart.events),
          (this.localeValues = this.w.globals.locale.toolbar);
      }
      return (
        a(t, [
          {
            key: "createToolbar",
            value: function () {
              var t = this.w,
                e = document.createElement("div");
              if (
                (e.setAttribute("class", "apexcharts-toolbar"),
                t.globals.dom.elWrap.appendChild(e),
                (this.elZoom = document.createElement("div")),
                (this.elZoomIn = document.createElement("div")),
                (this.elZoomOut = document.createElement("div")),
                (this.elPan = document.createElement("div")),
                (this.elSelection = document.createElement("div")),
                (this.elZoomReset = document.createElement("div")),
                (this.elMenuIcon = document.createElement("div")),
                (this.elMenu = document.createElement("div")),
                (this.elCustomIcons = []),
                (this.t = t.config.chart.toolbar.tools),
                Array.isArray(this.t.customIcons))
              )
                for (var i = 0; i < this.t.customIcons.length; i++)
                  this.elCustomIcons.push(document.createElement("div"));
              this.elMenuItems = [];
              var a = [];
              this.t.zoomin &&
                t.config.chart.zoom.enabled &&
                a.push({
                  el: this.elZoomIn,
                  icon:
                    "string" == typeof this.t.zoomin
                      ? this.t.zoomin
                      : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">\n    <path d="M0 0h24v24H0z" fill="none"/>\n    <path d="M13 7h-2v4H7v2h4v4h2v-4h4v-2h-4V7zm-1-5C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>\n</svg>\n',
                  title: this.localeValues.zoomIn,
                  class: "apexcharts-zoom-in-icon",
                }),
                this.t.zoomout &&
                  t.config.chart.zoom.enabled &&
                  a.push({
                    el: this.elZoomOut,
                    icon:
                      "string" == typeof this.t.zoomout
                        ? this.t.zoomout
                        : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">\n    <path d="M0 0h24v24H0z" fill="none"/>\n    <path d="M7 11v2h10v-2H7zm5-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>\n</svg>\n',
                    title: this.localeValues.zoomOut,
                    class: "apexcharts-zoom-out-icon",
                  }),
                this.t.zoom &&
                  t.config.chart.zoom.enabled &&
                  a.push({
                    el: this.elZoom,
                    icon:
                      "string" == typeof this.t.zoom
                        ? this.t.zoom
                        : '<svg xmlns="http://www.w3.org/2000/svg" fill="#000000" height="24" viewBox="0 0 24 24" width="24">\n    <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>\n    <path d="M0 0h24v24H0V0z" fill="none"/>\n    <path d="M12 10h-2v2H9v-2H7V9h2V7h1v2h2v1z"/>\n</svg>',
                    title: this.localeValues.selectionZoom,
                    class: t.globals.isTouchDevice
                      ? "hidden"
                      : "apexcharts-zoom-icon",
                  }),
                this.t.selection &&
                  t.config.chart.selection.enabled &&
                  a.push({
                    el: this.elSelection,
                    icon:
                      "string" == typeof this.t.selection
                        ? this.t.selection
                        : '<svg fill="#6E8192" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">\n    <path d="M0 0h24v24H0z" fill="none"/>\n    <path d="M3 5h2V3c-1.1 0-2 .9-2 2zm0 8h2v-2H3v2zm4 8h2v-2H7v2zM3 9h2V7H3v2zm10-6h-2v2h2V3zm6 0v2h2c0-1.1-.9-2-2-2zM5 21v-2H3c0 1.1.9 2 2 2zm-2-4h2v-2H3v2zM9 3H7v2h2V3zm2 18h2v-2h-2v2zm8-8h2v-2h-2v2zm0 8c1.1 0 2-.9 2-2h-2v2zm0-12h2V7h-2v2zm0 8h2v-2h-2v2zm-4 4h2v-2h-2v2zm0-16h2V3h-2v2z"/>\n</svg>',
                    title: this.localeValues.selection,
                    class: t.globals.isTouchDevice
                      ? "hidden"
                      : "apexcharts-selection-icon",
                  }),
                this.t.pan &&
                  t.config.chart.zoom.enabled &&
                  a.push({
                    el: this.elPan,
                    icon:
                      "string" == typeof this.t.pan
                        ? this.t.pan
                        : '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" height="24" viewBox="0 0 24 24" width="24">\n    <defs>\n        <path d="M0 0h24v24H0z" id="a"/>\n    </defs>\n    <clipPath id="b">\n        <use overflow="visible" xlink:href="#a"/>\n    </clipPath>\n    <path clip-path="url(#b)" d="M23 5.5V20c0 2.2-1.8 4-4 4h-7.3c-1.08 0-2.1-.43-2.85-1.19L1 14.83s1.26-1.23 1.3-1.25c.22-.19.49-.29.79-.29.22 0 .42.06.6.16.04.01 4.31 2.46 4.31 2.46V4c0-.83.67-1.5 1.5-1.5S11 3.17 11 4v7h1V1.5c0-.83.67-1.5 1.5-1.5S15 .67 15 1.5V11h1V2.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5V11h1V5.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5z"/>\n</svg>',
                    title: this.localeValues.pan,
                    class: t.globals.isTouchDevice
                      ? "hidden"
                      : "apexcharts-pan-icon",
                  }),
                this.t.reset &&
                  t.config.chart.zoom.enabled &&
                  a.push({
                    el: this.elZoomReset,
                    icon:
                      "string" == typeof this.t.reset
                        ? this.t.reset
                        : '<svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">\n    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>\n    <path d="M0 0h24v24H0z" fill="none"/>\n</svg>',
                    title: this.localeValues.reset,
                    class: "apexcharts-reset-zoom-icon",
                  }),
                this.t.download &&
                  a.push({
                    el: this.elMenuIcon,
                    icon:
                      "string" == typeof this.t.download
                        ? this.t.download
                        : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>',
                    title: this.localeValues.menu,
                    class: "apexcharts-menu-icon",
                  });
              for (var s = 0; s < this.elCustomIcons.length; s++)
                a.push({
                  el: this.elCustomIcons[s],
                  icon: this.t.customIcons[s].icon,
                  title: this.t.customIcons[s].title,
                  index: this.t.customIcons[s].index,
                  class:
                    "apexcharts-toolbar-custom-icon " +
                    this.t.customIcons[s].class,
                });
              a.forEach(function (t, e) {
                t.index && u.moveIndexInArray(a, e, t.index);
              });
              for (var n = 0; n < a.length; n++)
                p.setAttrs(a[n].el, { class: a[n].class, title: a[n].title }),
                  (a[n].el.innerHTML = a[n].icon),
                  e.appendChild(a[n].el);
              e.appendChild(this.elMenu),
                p.setAttrs(this.elMenu, { class: "apexcharts-menu" });
              for (
                var r = [
                    { name: "exportSVG", title: this.localeValues.exportToSVG },
                    { name: "exportPNG", title: this.localeValues.exportToPNG },
                  ],
                  o = 0;
                o < r.length;
                o++
              )
                this.elMenuItems.push(document.createElement("div")),
                  (this.elMenuItems[o].innerHTML = r[o].title),
                  p.setAttrs(this.elMenuItems[o], {
                    class: "apexcharts-menu-item ".concat(r[o].name),
                    title: r[o].title,
                  }),
                  this.elMenu.appendChild(this.elMenuItems[o]);
              t.globals.zoomEnabled
                ? this.elZoom.classList.add("selected")
                : t.globals.panEnabled
                ? this.elPan.classList.add("selected")
                : t.globals.selectionEnabled &&
                  this.elSelection.classList.add("selected"),
                this.addToolbarEventListeners();
            },
          },
          {
            key: "addToolbarEventListeners",
            value: function () {
              var t = this;
              this.elZoomReset.addEventListener(
                "click",
                this.handleZoomReset.bind(this)
              ),
                this.elSelection.addEventListener(
                  "click",
                  this.toggleSelection.bind(this)
                ),
                this.elZoom.addEventListener(
                  "click",
                  this.toggleZooming.bind(this)
                ),
                this.elZoomIn.addEventListener(
                  "click",
                  this.handleZoomIn.bind(this)
                ),
                this.elZoomOut.addEventListener(
                  "click",
                  this.handleZoomOut.bind(this)
                ),
                this.elPan.addEventListener(
                  "click",
                  this.togglePanning.bind(this)
                ),
                this.elMenuIcon.addEventListener(
                  "click",
                  this.toggleMenu.bind(this)
                ),
                this.elMenuItems.forEach(function (e) {
                  e.classList.contains("exportSVG")
                    ? e.addEventListener("click", t.downloadSVG.bind(t))
                    : e.classList.contains("exportPNG") &&
                      e.addEventListener("click", t.downloadPNG.bind(t));
                });
              for (var e = 0; e < this.t.customIcons.length; e++)
                this.elCustomIcons[e].addEventListener(
                  "click",
                  this.t.customIcons[e].click.bind(this, this.ctx, this.ctx.w)
                );
            },
          },
          {
            key: "toggleSelection",
            value: function () {
              this.toggleOtherControls(),
                (this.w.globals.selectionEnabled =
                  !this.w.globals.selectionEnabled),
                this.elSelection.classList.contains("selected")
                  ? this.elSelection.classList.remove("selected")
                  : this.elSelection.classList.add("selected");
            },
          },
          {
            key: "toggleZooming",
            value: function () {
              this.toggleOtherControls(),
                (this.w.globals.zoomEnabled = !this.w.globals.zoomEnabled),
                this.elZoom.classList.contains("selected")
                  ? this.elZoom.classList.remove("selected")
                  : this.elZoom.classList.add("selected");
            },
          },
          {
            key: "getToolbarIconsReference",
            value: function () {
              var t = this.w;
              this.elZoom ||
                (this.elZoom = t.globals.dom.baseEl.querySelector(
                  ".apexcharts-zoom-icon"
                )),
                this.elPan ||
                  (this.elPan = t.globals.dom.baseEl.querySelector(
                    ".apexcharts-pan-icon"
                  )),
                this.elSelection ||
                  (this.elSelection = t.globals.dom.baseEl.querySelector(
                    ".apexcharts-selection-icon"
                  ));
            },
          },
          {
            key: "enableZooming",
            value: function () {
              this.toggleOtherControls(),
                (this.w.globals.zoomEnabled = !0),
                this.elZoom && this.elZoom.classList.add("selected"),
                this.elPan && this.elPan.classList.remove("selected");
            },
          },
          {
            key: "enablePanning",
            value: function () {
              this.toggleOtherControls(),
                (this.w.globals.panEnabled = !0),
                this.elPan && this.elPan.classList.add("selected"),
                this.elZoom && this.elZoom.classList.remove("selected");
            },
          },
          {
            key: "togglePanning",
            value: function () {
              this.toggleOtherControls(),
                (this.w.globals.panEnabled = !this.w.globals.panEnabled),
                this.elPan.classList.contains("selected")
                  ? this.elPan.classList.remove("selected")
                  : this.elPan.classList.add("selected");
            },
          },
          {
            key: "toggleOtherControls",
            value: function () {
              var t = this.w;
              (t.globals.panEnabled = !1),
                (t.globals.zoomEnabled = !1),
                (t.globals.selectionEnabled = !1),
                this.getToolbarIconsReference(),
                this.elPan && this.elPan.classList.remove("selected"),
                this.elSelection &&
                  this.elSelection.classList.remove("selected"),
                this.elZoom && this.elZoom.classList.remove("selected");
            },
          },
          {
            key: "handleZoomIn",
            value: function () {
              var t = this.w,
                e = (t.globals.minX + t.globals.maxX) / 2,
                i = (t.globals.minX + e) / 2,
                a = (t.globals.maxX + e) / 2;
              t.globals.disableZoomIn || this.zoomUpdateOptions(i, a);
            },
          },
          {
            key: "handleZoomOut",
            value: function () {
              var t = this.w;
              if (
                !(
                  "datetime" === t.config.xaxis.type &&
                  new Date(t.globals.minX).getUTCFullYear() < 1e3
                )
              ) {
                var e = (t.globals.minX + t.globals.maxX) / 2,
                  i = t.globals.minX - (e - t.globals.minX),
                  a = t.globals.maxX - (e - t.globals.maxX);
                t.globals.disableZoomOut || this.zoomUpdateOptions(i, a);
              }
            },
          },
          {
            key: "zoomUpdateOptions",
            value: function (t, e) {
              var i = this.w,
                a = { min: t, max: e },
                s = this.getBeforeZoomRange(a);
              s && (a = s.xaxis);
              var n = { xaxis: a },
                r = u.clone(i.globals.initialConfig.yaxis);
              i.config.chart.zoom.autoScaleYaxis &&
                (r = new j(this.ctx).autoScaleY(this.ctx, r, { xaxis: a }));
              i.config.chart.group || (n.yaxis = r),
                (this.w.globals.zoomed = !0),
                this.ctx._updateOptions(
                  n,
                  !1,
                  this.w.config.chart.animations.dynamicAnimation.enabled
                ),
                this.zoomCallback(a, r);
            },
          },
          {
            key: "zoomCallback",
            value: function (t, e) {
              "function" == typeof this.ev.zoomed &&
                this.ev.zoomed(this.ctx, { xaxis: t, yaxis: e });
            },
          },
          {
            key: "getBeforeZoomRange",
            value: function (t, e) {
              var i = null;
              return (
                "function" == typeof this.ev.beforeZoom &&
                  (i = this.ev.beforeZoom(this, { xaxis: t, yaxis: e })),
                i
              );
            },
          },
          {
            key: "toggleMenu",
            value: function () {
              this.elMenu.classList.contains("open")
                ? this.elMenu.classList.remove("open")
                : this.elMenu.classList.add("open");
            },
          },
          {
            key: "downloadPNG",
            value: function () {
              var t = new ot(this.ctx);
              t.exportToPng(this.ctx), this.toggleMenu();
            },
          },
          {
            key: "downloadSVG",
            value: function () {
              var t = new ot(this.ctx);
              t.exportToSVG(), this.toggleMenu();
            },
          },
          {
            key: "handleZoomReset",
            value: function (t) {
              var e = this;
              this.ctx.getSyncedCharts().forEach(function (t) {
                var i = t.w;
                i.globals.minX !== i.globals.initialminX &&
                  i.globals.maxX !== i.globals.initialmaxX &&
                  (t.revertDefaultAxisMinMax(),
                  "function" == typeof i.config.chart.events.zoomed &&
                    e.zoomCallback({
                      min: i.config.xaxis.min,
                      max: i.config.xaxis.max,
                    }),
                  (i.globals.zoomed = !1),
                  t._updateSeries(
                    i.globals.initialSeries,
                    i.config.chart.animations.dynamicAnimation.enabled
                  ));
              });
            },
          },
          {
            key: "destroy",
            value: function () {
              (this.elZoom = null),
                (this.elZoomIn = null),
                (this.elZoomOut = null),
                (this.elPan = null),
                (this.elSelection = null),
                (this.elZoomReset = null),
                (this.elMenuIcon = null);
            },
          },
        ]),
        t
      );
    })(),
    vt = (function (t) {
      function i(t) {
        var a;
        return (
          e(this, i),
          ((a = c(this, l(i).call(this, t))).ctx = t),
          (a.w = t.w),
          (a.dragged = !1),
          (a.graphics = new p(a.ctx)),
          (a.eventList = [
            "mousedown",
            "mouseleave",
            "mousemove",
            "touchstart",
            "touchmove",
            "mouseup",
            "touchend",
          ]),
          (a.clientX = 0),
          (a.clientY = 0),
          (a.startX = 0),
          (a.endX = 0),
          (a.dragX = 0),
          (a.startY = 0),
          (a.endY = 0),
          (a.dragY = 0),
          a
        );
      }
      return (
        o(i, mt),
        a(i, [
          {
            key: "init",
            value: function (t) {
              var e = this,
                i = t.xyRatios,
                a = this.w,
                s = this;
              (this.xyRatios = i),
                (this.zoomRect = this.graphics.drawRect(0, 0, 0, 0)),
                (this.selectionRect = this.graphics.drawRect(0, 0, 0, 0)),
                (this.gridRect =
                  a.globals.dom.baseEl.querySelector(".apexcharts-grid")),
                this.zoomRect.node.classList.add("apexcharts-zoom-rect"),
                this.selectionRect.node.classList.add(
                  "apexcharts-selection-rect"
                ),
                a.globals.dom.elGraphical.add(this.zoomRect),
                a.globals.dom.elGraphical.add(this.selectionRect),
                "x" === a.config.chart.selection.type
                  ? (this.slDraggableRect = this.selectionRect
                      .draggable({
                        minX: 0,
                        minY: 0,
                        maxX: a.globals.gridWidth,
                        maxY: a.globals.gridHeight,
                      })
                      .on(
                        "dragmove",
                        this.selectionDragging.bind(this, "dragging")
                      ))
                  : "y" === a.config.chart.selection.type
                  ? (this.slDraggableRect = this.selectionRect
                      .draggable({ minX: 0, maxX: a.globals.gridWidth })
                      .on(
                        "dragmove",
                        this.selectionDragging.bind(this, "dragging")
                      ))
                  : (this.slDraggableRect = this.selectionRect
                      .draggable()
                      .on(
                        "dragmove",
                        this.selectionDragging.bind(this, "dragging")
                      )),
                this.preselectedSelection(),
                (this.hoverArea = a.globals.dom.baseEl.querySelector(
                  a.globals.chartClass
                )),
                this.hoverArea.classList.add("zoomable"),
                this.eventList.forEach(function (t) {
                  e.hoverArea.addEventListener(t, s.svgMouseEvents.bind(s, i), {
                    capture: !1,
                    passive: !0,
                  });
                });
            },
          },
          {
            key: "destroy",
            value: function () {
              this.slDraggableRect &&
                (this.slDraggableRect.draggable(!1),
                this.slDraggableRect.off(),
                this.selectionRect.off()),
                (this.selectionRect = null),
                (this.zoomRect = null),
                (this.gridRect = null);
            },
          },
          {
            key: "svgMouseEvents",
            value: function (t, e) {
              var i = this.w,
                a = this,
                s = this.ctx.toolbar,
                n = i.globals.zoomEnabled
                  ? i.config.chart.zoom.type
                  : i.config.chart.selection.type;
              if (
                (e.shiftKey
                  ? ((this.shiftWasPressed = !0), s.enablePanning())
                  : this.shiftWasPressed &&
                    (s.enableZooming(), (this.shiftWasPressed = !1)),
                !(
                  e.target.classList.contains("apexcharts-selection-rect") ||
                  e.target.parentNode.classList.contains("apexcharts-toolbar")
                ))
              ) {
                if (
                  ((a.clientX =
                    "touchmove" === e.type || "touchstart" === e.type
                      ? e.touches[0].clientX
                      : "touchend" === e.type
                      ? e.changedTouches[0].clientX
                      : e.clientX),
                  (a.clientY =
                    "touchmove" === e.type || "touchstart" === e.type
                      ? e.touches[0].clientY
                      : "touchend" === e.type
                      ? e.changedTouches[0].clientY
                      : e.clientY),
                  "mousedown" === e.type && 1 === e.which)
                ) {
                  var r = a.gridRect.getBoundingClientRect();
                  (a.startX = a.clientX - r.left),
                    (a.startY = a.clientY - r.top),
                    (a.dragged = !1),
                    (a.w.globals.mousedown = !0);
                }
                if (
                  ((("mousemove" === e.type && 1 === e.which) ||
                    "touchmove" === e.type) &&
                    ((a.dragged = !0),
                    i.globals.panEnabled
                      ? ((i.globals.selection = null),
                        a.w.globals.mousedown &&
                          a.panDragging({
                            context: a,
                            zoomtype: n,
                            xyRatios: t,
                          }))
                      : ((a.w.globals.mousedown && i.globals.zoomEnabled) ||
                          (a.w.globals.mousedown &&
                            i.globals.selectionEnabled)) &&
                        (a.selection = a.selectionDrawing({
                          context: a,
                          zoomtype: n,
                        }))),
                  "mouseup" === e.type ||
                    "touchend" === e.type ||
                    "mouseleave" === e.type)
                ) {
                  var o = a.gridRect.getBoundingClientRect();
                  a.w.globals.mousedown &&
                    ((a.endX = a.clientX - o.left),
                    (a.endY = a.clientY - o.top),
                    (a.dragX = Math.abs(a.endX - a.startX)),
                    (a.dragY = Math.abs(a.endY - a.startY)),
                    (i.globals.zoomEnabled || i.globals.selectionEnabled) &&
                      a.selectionDrawn({ context: a, zoomtype: n })),
                    i.globals.zoomEnabled &&
                      a.hideSelectionRect(this.selectionRect),
                    (a.dragged = !1),
                    (a.w.globals.mousedown = !1);
                }
                this.makeSelectionRectDraggable();
              }
            },
          },
          {
            key: "makeSelectionRectDraggable",
            value: function () {
              var t = this.w;
              if (this.selectionRect) {
                var e = this.selectionRect.node.getBoundingClientRect();
                e.width > 0 &&
                  e.height > 0 &&
                  this.slDraggableRect
                    .selectize()
                    .resize({
                      constraint: {
                        minX: 0,
                        minY: 0,
                        maxX: t.globals.gridWidth,
                        maxY: t.globals.gridHeight,
                      },
                    })
                    .on(
                      "resizing",
                      this.selectionDragging.bind(this, "resizing")
                    );
              }
            },
          },
          {
            key: "preselectedSelection",
            value: function () {
              var t = this.w,
                e = this.xyRatios;
              if (!t.globals.zoomEnabled)
                if (
                  void 0 !== t.globals.selection &&
                  null !== t.globals.selection
                )
                  this.drawSelectionRect(t.globals.selection);
                else if (
                  void 0 !== t.config.chart.selection.xaxis.min &&
                  void 0 !== t.config.chart.selection.xaxis.max
                ) {
                  var i =
                      (t.config.chart.selection.xaxis.min - t.globals.minX) /
                      e.xRatio,
                    a = {
                      x: i,
                      y: 0,
                      width:
                        t.globals.gridWidth -
                        (t.globals.maxX - t.config.chart.selection.xaxis.max) /
                          e.xRatio -
                        i,
                      height: t.globals.gridHeight,
                      translateX: 0,
                      translateY: 0,
                      selectionEnabled: !0,
                    };
                  this.drawSelectionRect(a),
                    this.makeSelectionRectDraggable(),
                    "function" == typeof t.config.chart.events.selection &&
                      t.config.chart.events.selection(this.ctx, {
                        xaxis: {
                          min: t.config.chart.selection.xaxis.min,
                          max: t.config.chart.selection.xaxis.max,
                        },
                        yaxis: {},
                      });
                }
            },
          },
          {
            key: "drawSelectionRect",
            value: function (t) {
              var e = t.x,
                i = t.y,
                a = t.width,
                s = t.height,
                n = t.translateX,
                r = t.translateY,
                o = this.w,
                l = this.zoomRect,
                h = this.selectionRect;
              if (this.dragged || null !== o.globals.selection) {
                var c = { transform: "translate(" + n + ", " + r + ")" };
                o.globals.zoomEnabled &&
                  this.dragged &&
                  (l.attr({
                    x: e,
                    y: i,
                    width: a,
                    height: s,
                    fill: o.config.chart.zoom.zoomedArea.fill.color,
                    "fill-opacity": o.config.chart.zoom.zoomedArea.fill.opacity,
                    stroke: o.config.chart.zoom.zoomedArea.stroke.color,
                    "stroke-width": o.config.chart.zoom.zoomedArea.stroke.width,
                    "stroke-opacity":
                      o.config.chart.zoom.zoomedArea.stroke.opacity,
                  }),
                  p.setAttrs(l.node, c)),
                  o.globals.selectionEnabled &&
                    (h.attr({
                      x: e,
                      y: i,
                      width: a > 0 ? a : 0,
                      height: s > 0 ? s : 0,
                      fill: o.config.chart.selection.fill.color,
                      "fill-opacity": o.config.chart.selection.fill.opacity,
                      stroke: o.config.chart.selection.stroke.color,
                      "stroke-width": o.config.chart.selection.stroke.width,
                      "stroke-dasharray":
                        o.config.chart.selection.stroke.dashArray,
                      "stroke-opacity": o.config.chart.selection.stroke.opacity,
                    }),
                    p.setAttrs(h.node, c));
              }
            },
          },
          {
            key: "hideSelectionRect",
            value: function (t) {
              t && t.attr({ x: 0, y: 0, width: 0, height: 0 });
            },
          },
          {
            key: "selectionDrawing",
            value: function (t) {
              var e = t.context,
                i = t.zoomtype,
                a = this.w,
                s = e,
                n = this.gridRect.getBoundingClientRect(),
                r = s.startX - 1,
                o = s.startY,
                l = s.clientX - n.left - r,
                h = s.clientY - n.top - o,
                c = 0,
                d = 0,
                u = {};
              return (
                Math.abs(l + r) > a.globals.gridWidth
                  ? (l = a.globals.gridWidth - r)
                  : s.clientX - n.left < 0 && (l = r),
                r > s.clientX - n.left && (c = -(l = Math.abs(l))),
                o > s.clientY - n.top && (d = -(h = Math.abs(h))),
                (u =
                  "x" === i
                    ? {
                        x: r,
                        y: 0,
                        width: l,
                        height: a.globals.gridHeight,
                        translateX: c,
                        translateY: 0,
                      }
                    : "y" === i
                    ? {
                        x: 0,
                        y: o,
                        width: a.globals.gridWidth,
                        height: h,
                        translateX: 0,
                        translateY: d,
                      }
                    : {
                        x: r,
                        y: o,
                        width: l,
                        height: h,
                        translateX: c,
                        translateY: d,
                      }),
                s.drawSelectionRect(u),
                s.selectionDragging("resizing"),
                u
              );
            },
          },
          {
            key: "selectionDragging",
            value: function (t, e) {
              var i = this,
                a = this.w,
                s = this.xyRatios,
                n = this.selectionRect,
                r = 0;
              "resizing" === t && (r = 30),
                "function" == typeof a.config.chart.events.selection &&
                  a.globals.selectionEnabled &&
                  (clearTimeout(this.w.globals.selectionResizeTimer),
                  (this.w.globals.selectionResizeTimer = window.setTimeout(
                    function () {
                      var t = i.gridRect.getBoundingClientRect(),
                        e = n.node.getBoundingClientRect(),
                        r =
                          a.globals.xAxisScale.niceMin +
                          (e.left - t.left) * s.xRatio,
                        o =
                          a.globals.xAxisScale.niceMin +
                          (e.right - t.left) * s.xRatio,
                        l =
                          a.globals.yAxisScale[0].niceMin +
                          (t.bottom - e.bottom) * s.yRatio[0],
                        h =
                          a.globals.yAxisScale[0].niceMax -
                          (e.top - t.top) * s.yRatio[0];
                      a.config.chart.events.selection(i.ctx, {
                        xaxis: { min: r, max: o },
                        yaxis: { min: l, max: h },
                      });
                    },
                    r
                  )));
            },
          },
          {
            key: "selectionDrawn",
            value: function (t) {
              var e = t.context,
                i = t.zoomtype,
                a = this.w,
                s = e,
                n = this.xyRatios,
                r = this.ctx.toolbar;
              if (s.startX > s.endX) {
                var o = s.startX;
                (s.startX = s.endX), (s.endX = o);
              }
              if (s.startY > s.endY) {
                var l = s.startY;
                (s.startY = s.endY), (s.endY = l);
              }
              var h = a.globals.xAxisScale.niceMin + s.startX * n.xRatio,
                c = a.globals.xAxisScale.niceMin + s.endX * n.xRatio,
                d = [],
                g = [];
              if (
                (a.config.yaxis.forEach(function (t, e) {
                  d.push(
                    Math.floor(
                      a.globals.yAxisScale[e].niceMax - n.yRatio[e] * s.startY
                    )
                  ),
                    g.push(
                      Math.floor(
                        a.globals.yAxisScale[e].niceMax - n.yRatio[e] * s.endY
                      )
                    );
                }),
                s.dragged && (s.dragX > 10 || s.dragY > 10) && h !== c)
              )
                if (a.globals.zoomEnabled) {
                  var f = u.clone(a.globals.initialConfig.yaxis),
                    p = { min: h, max: c };
                  if (
                    (("xy" !== i && "y" !== i) ||
                      f.forEach(function (t, e) {
                        (f[e].min = g[e]), (f[e].max = d[e]);
                      }),
                    a.config.chart.zoom.autoScaleYaxis)
                  ) {
                    var x = new j(s.ctx);
                    f = x.autoScaleY(s.ctx, f, { xaxis: p });
                  }
                  if (r) {
                    var b = r.getBeforeZoomRange(p, f);
                    b &&
                      ((p = b.xaxis ? b.xaxis : p), (f = b.yaxis ? b.yaxe : f));
                  }
                  var m = { xaxis: p };
                  a.config.chart.group || (m.yaxis = f),
                    s.ctx._updateOptions(
                      m,
                      !1,
                      s.w.config.chart.animations.dynamicAnimation.enabled
                    ),
                    "function" == typeof a.config.chart.events.zoomed &&
                      r.zoomCallback(p, f),
                    (a.globals.zoomed = !0);
                } else if (a.globals.selectionEnabled) {
                  var v,
                    y = null;
                  (v = { min: h, max: c }),
                    ("xy" !== i && "y" !== i) ||
                      (y = u.clone(a.config.yaxis)).forEach(function (t, e) {
                        (y[e].min = g[e]), (y[e].max = d[e]);
                      }),
                    (a.globals.selection = s.selection),
                    "function" == typeof a.config.chart.events.selection &&
                      a.config.chart.events.selection(s.ctx, {
                        xaxis: v,
                        yaxis: y,
                      });
                }
            },
          },
          {
            key: "panDragging",
            value: function (t) {
              var e,
                i = t.context,
                a = this.w,
                s = i;
              if (void 0 !== a.globals.lastClientPosition.x) {
                var n = a.globals.lastClientPosition.x - s.clientX,
                  r = a.globals.lastClientPosition.y - s.clientY;
                Math.abs(n) > Math.abs(r) && n > 0
                  ? (e = "left")
                  : Math.abs(n) > Math.abs(r) && n < 0
                  ? (e = "right")
                  : Math.abs(r) > Math.abs(n) && r > 0
                  ? (e = "up")
                  : Math.abs(r) > Math.abs(n) && r < 0 && (e = "down");
              }
              a.globals.lastClientPosition = { x: s.clientX, y: s.clientY };
              var o = a.globals.minX,
                l = a.globals.maxX;
              s.panScrolled(e, o, l);
            },
          },
          {
            key: "panScrolled",
            value: function (t, e, i) {
              var a = this.w,
                s = this.xyRatios,
                n = u.clone(a.globals.initialConfig.yaxis);
              "left" === t
                ? ((e = a.globals.minX + (a.globals.gridWidth / 15) * s.xRatio),
                  (i = a.globals.maxX + (a.globals.gridWidth / 15) * s.xRatio))
                : "right" === t &&
                  ((e = a.globals.minX - (a.globals.gridWidth / 15) * s.xRatio),
                  (i = a.globals.maxX - (a.globals.gridWidth / 15) * s.xRatio)),
                (e < a.globals.initialminX || i > a.globals.initialmaxX) &&
                  ((e = a.globals.minX), (i = a.globals.maxX));
              var r = { min: e, max: i };
              a.config.chart.zoom.autoScaleYaxis &&
                (n = new j(this.ctx).autoScaleY(this.ctx, n, { xaxis: r }));
              var o = { xaxis: { min: e, max: i } };
              a.config.chart.group || (o.yaxis = n),
                this.ctx._updateOptions(o, !1, !1),
                "function" == typeof a.config.chart.events.scrolled &&
                  a.config.chart.events.scrolled(this.ctx, {
                    xaxis: { min: e, max: i },
                  });
            },
          },
        ]),
        i
      );
    })(),
    yt = (function () {
      function t(i) {
        e(this, t), (this.ctx = i), (this.w = i.w);
      }
      return (
        a(t, [
          {
            key: "draw",
            value: function () {
              this.drawTitleSubtitle("title"),
                this.drawTitleSubtitle("subtitle");
            },
          },
          {
            key: "drawTitleSubtitle",
            value: function (t) {
              var e = this.w,
                i = "title" === t ? e.config.title : e.config.subtitle,
                a = e.globals.svgWidth / 2,
                s = i.offsetY,
                n = "middle";
              if (
                ("left" === i.align
                  ? ((a = 10), (n = "start"))
                  : "right" === i.align &&
                    ((a = e.globals.svgWidth - 10), (n = "end")),
                (a += i.offsetX),
                (s = s + parseInt(i.style.fontSize) + 2),
                void 0 !== i.text)
              ) {
                var r = new p(this.ctx).drawText({
                  x: a,
                  y: s,
                  text: i.text,
                  textAnchor: n,
                  fontSize: i.style.fontSize,
                  fontFamily: i.style.fontFamily,
                  foreColor: i.style.color,
                  opacity: 1,
                });
                r.node.setAttribute("class", "apexcharts-".concat(t, "-text")),
                  e.globals.dom.Paper.add(r);
              }
            },
          },
        ]),
        t
      );
    })();
  (nt = "undefined" != typeof window ? window : void 0),
    (rt = function (e, i) {
      var a = ((void 0 !== this ? this : e).SVG = function (t) {
        if (a.supported)
          return (t = new a.Doc(t)), a.parser.draw || a.prepare(), t;
      });
      if (
        ((a.ns = "http://www.w3.org/2000/svg"),
        (a.xmlns = "http://www.w3.org/2000/xmlns/"),
        (a.xlink = "http://www.w3.org/1999/xlink"),
        (a.svgjs = "http://svgjs.com/svgjs"),
        (a.supported = !0),
        !a.supported)
      )
        return !1;
      (a.did = 1e3),
        (a.eid = function (t) {
          return "Svgjs" + d(t) + a.did++;
        }),
        (a.create = function (t) {
          var e = i.createElementNS(this.ns, t);
          return e.setAttribute("id", this.eid(t)), e;
        }),
        (a.extend = function () {
          var t, e, i, s;
          for (
            e = (t = [].slice.call(arguments)).pop(), s = t.length - 1;
            s >= 0;
            s--
          )
            if (t[s]) for (i in e) t[s].prototype[i] = e[i];
          a.Set && a.Set.inherit && a.Set.inherit();
        }),
        (a.invent = function (t) {
          var e =
            "function" == typeof t.create
              ? t.create
              : function () {
                  this.constructor.call(this, a.create(t.create));
                };
          return (
            t.inherit && (e.prototype = new t.inherit()),
            t.extend && a.extend(e, t.extend),
            t.construct && a.extend(t.parent || a.Container, t.construct),
            e
          );
        }),
        (a.adopt = function (t) {
          return t
            ? t.instance
              ? t.instance
              : (((i =
                  "svg" == t.nodeName
                    ? t.parentNode instanceof e.SVGElement
                      ? new a.Nested()
                      : new a.Doc()
                    : "linearGradient" == t.nodeName
                    ? new a.Gradient("linear")
                    : "radialGradient" == t.nodeName
                    ? new a.Gradient("radial")
                    : a[d(t.nodeName)]
                    ? new a[d(t.nodeName)]()
                    : new a.Element(t)).type = t.nodeName),
                (i.node = t),
                (t.instance = i),
                i instanceof a.Doc && i.namespace().defs(),
                i.setData(JSON.parse(t.getAttribute("svgjs:data")) || {}),
                i)
            : null;
          var i;
        }),
        (a.prepare = function () {
          var t = i.getElementsByTagName("body")[0],
            e = (t ? new a.Doc(t) : a.adopt(i.documentElement).nested()).size(
              2,
              0
            );
          a.parser = {
            body: t || i.documentElement,
            draw: e.style(
              "opacity:0;position:absolute;left:-100%;top:-100%;overflow:hidden"
            ).node,
            poly: e.polyline().node,
            path: e.path().node,
            native: a.create("svg"),
          };
        }),
        (a.parser = { native: a.create("svg") }),
        i.addEventListener(
          "DOMContentLoaded",
          function () {
            a.parser.draw || a.prepare();
          },
          !1
        ),
        (a.regex = {
          numberAndUnit: /^([+-]?(\d+(\.\d*)?|\.\d+)(e[+-]?\d+)?)([a-z%]*)$/i,
          hex: /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i,
          rgb: /rgb\((\d+),(\d+),(\d+)\)/,
          reference: /#([a-z0-9\-_]+)/i,
          transforms: /\)\s*,?\s*/,
          whitespace: /\s/g,
          isHex: /^#[a-f0-9]{3,6}$/i,
          isRgb: /^rgb\(/,
          isCss: /[^:]+:[^;]+;?/,
          isBlank: /^(\s+)?$/,
          isNumber: /^[+-]?(\d+(\.\d*)?|\.\d+)(e[+-]?\d+)?$/i,
          isPercent: /^-?[\d\.]+%$/,
          isImage: /\.(jpg|jpeg|png|gif|svg)(\?[^=]+.*)?/i,
          delimiter: /[\s,]+/,
          hyphen: /([^e])\-/gi,
          pathLetters: /[MLHVCSQTAZ]/gi,
          isPathLetter: /[MLHVCSQTAZ]/i,
          numbersWithDots:
            /((\d?\.\d+(?:e[+-]?\d+)?)((?:\.\d+(?:e[+-]?\d+)?)+))+/gi,
          dots: /\./g,
        }),
        (a.utils = {
          map: function (t, e) {
            var i,
              a = t.length,
              s = [];
            for (i = 0; i < a; i++) s.push(e(t[i]));
            return s;
          },
          filter: function (t, e) {
            var i,
              a = t.length,
              s = [];
            for (i = 0; i < a; i++) e(t[i]) && s.push(t[i]);
            return s;
          },
          radians: function (t) {
            return ((t % 360) * Math.PI) / 180;
          },
          degrees: function (t) {
            return ((180 * t) / Math.PI) % 360;
          },
          filterSVGElements: function (t) {
            return this.filter(t, function (t) {
              return t instanceof e.SVGElement;
            });
          },
        }),
        (a.defaults = {
          attrs: {
            "fill-opacity": 1,
            "stroke-opacity": 1,
            "stroke-width": 0,
            "stroke-linejoin": "miter",
            "stroke-linecap": "butt",
            fill: "#000000",
            stroke: "#000000",
            opacity: 1,
            x: 0,
            y: 0,
            cx: 0,
            cy: 0,
            width: 0,
            height: 0,
            r: 0,
            rx: 0,
            ry: 0,
            offset: 0,
            "stop-opacity": 1,
            "stop-color": "#000000",
            "font-size": 16,
            "font-family": "Helvetica, Arial, sans-serif",
            "text-anchor": "start",
          },
        }),
        (a.Color = function (e) {
          var i, s;
          ((this.r = 0), (this.g = 0), (this.b = 0), e) &&
            ("string" == typeof e
              ? a.regex.isRgb.test(e)
                ? ((i = a.regex.rgb.exec(e.replace(a.regex.whitespace, ""))),
                  (this.r = parseInt(i[1])),
                  (this.g = parseInt(i[2])),
                  (this.b = parseInt(i[3])))
                : a.regex.isHex.test(e) &&
                  ((i = a.regex.hex.exec(
                    4 == (s = e).length
                      ? [
                          "#",
                          s.substring(1, 2),
                          s.substring(1, 2),
                          s.substring(2, 3),
                          s.substring(2, 3),
                          s.substring(3, 4),
                          s.substring(3, 4),
                        ].join("")
                      : s
                  )),
                  (this.r = parseInt(i[1], 16)),
                  (this.g = parseInt(i[2], 16)),
                  (this.b = parseInt(i[3], 16)))
              : "object" === t(e) &&
                ((this.r = e.r), (this.g = e.g), (this.b = e.b)));
        }),
        a.extend(a.Color, {
          toString: function () {
            return this.toHex();
          },
          toHex: function () {
            return "#" + u(this.r) + u(this.g) + u(this.b);
          },
          toRgb: function () {
            return "rgb(" + [this.r, this.g, this.b].join() + ")";
          },
          brightness: function () {
            return (
              (this.r / 255) * 0.3 +
              (this.g / 255) * 0.59 +
              (this.b / 255) * 0.11
            );
          },
          morph: function (t) {
            return (this.destination = new a.Color(t)), this;
          },
          at: function (t) {
            return this.destination
              ? ((t = t < 0 ? 0 : t > 1 ? 1 : t),
                new a.Color({
                  r: ~~(this.r + (this.destination.r - this.r) * t),
                  g: ~~(this.g + (this.destination.g - this.g) * t),
                  b: ~~(this.b + (this.destination.b - this.b) * t),
                }))
              : this;
          },
        }),
        (a.Color.test = function (t) {
          return (t += ""), a.regex.isHex.test(t) || a.regex.isRgb.test(t);
        }),
        (a.Color.isRgb = function (t) {
          return (
            t &&
            "number" == typeof t.r &&
            "number" == typeof t.g &&
            "number" == typeof t.b
          );
        }),
        (a.Color.isColor = function (t) {
          return a.Color.isRgb(t) || a.Color.test(t);
        }),
        (a.Array = function (t, e) {
          0 == (t = (t || []).valueOf()).length && e && (t = e.valueOf()),
            (this.value = this.parse(t));
        }),
        a.extend(a.Array, {
          morph: function (t) {
            if (
              ((this.destination = this.parse(t)),
              this.value.length != this.destination.length)
            ) {
              for (
                var e = this.value[this.value.length - 1],
                  i = this.destination[this.destination.length - 1];
                this.value.length > this.destination.length;

              )
                this.destination.push(i);
              for (; this.value.length < this.destination.length; )
                this.value.push(e);
            }
            return this;
          },
          settle: function () {
            for (var t = 0, e = this.value.length, i = []; t < e; t++)
              -1 == i.indexOf(this.value[t]) && i.push(this.value[t]);
            return (this.value = i);
          },
          at: function (t) {
            if (!this.destination) return this;
            for (var e = 0, i = this.value.length, s = []; e < i; e++)
              s.push(this.value[e] + (this.destination[e] - this.value[e]) * t);
            return new a.Array(s);
          },
          toString: function () {
            return this.value.join(" ");
          },
          valueOf: function () {
            return this.value;
          },
          parse: function (t) {
            return (t = t.valueOf()), Array.isArray(t) ? t : this.split(t);
          },
          split: function (t) {
            return t.trim().split(a.regex.delimiter).map(parseFloat);
          },
          reverse: function () {
            return this.value.reverse(), this;
          },
          clone: function () {
            var t = new this.constructor();
            return (
              (t.value = (function t(e) {
                var i = e.slice(0);
                for (var a = i.length; a--; )
                  Array.isArray(i[a]) && (i[a] = t(i[a]));
                return i;
              })(this.value)),
              t
            );
          },
        }),
        (a.PointArray = function (t, e) {
          a.Array.call(this, t, e || [[0, 0]]);
        }),
        (a.PointArray.prototype = new a.Array()),
        (a.PointArray.prototype.constructor = a.PointArray),
        a.extend(a.PointArray, {
          toString: function () {
            for (var t = 0, e = this.value.length, i = []; t < e; t++)
              i.push(this.value[t].join(","));
            return i.join(" ");
          },
          toLine: function () {
            return {
              x1: this.value[0][0],
              y1: this.value[0][1],
              x2: this.value[1][0],
              y2: this.value[1][1],
            };
          },
          at: function (t) {
            if (!this.destination) return this;
            for (var e = 0, i = this.value.length, s = []; e < i; e++)
              s.push([
                this.value[e][0] +
                  (this.destination[e][0] - this.value[e][0]) * t,
                this.value[e][1] +
                  (this.destination[e][1] - this.value[e][1]) * t,
              ]);
            return new a.PointArray(s);
          },
          parse: function (t) {
            var e = [];
            if (((t = t.valueOf()), Array.isArray(t))) {
              if (Array.isArray(t[0]))
                return t.map(function (t) {
                  return t.slice();
                });
              if (null != t[0].x)
                return t.map(function (t) {
                  return [t.x, t.y];
                });
            } else t = t.trim().split(a.regex.delimiter).map(parseFloat);
            t.length % 2 != 0 && t.pop();
            for (var i = 0, s = t.length; i < s; i += 2)
              e.push([t[i], t[i + 1]]);
            return e;
          },
          move: function (t, e) {
            var i = this.bbox();
            if (((t -= i.x), (e -= i.y), !isNaN(t) && !isNaN(e)))
              for (var a = this.value.length - 1; a >= 0; a--)
                this.value[a] = [this.value[a][0] + t, this.value[a][1] + e];
            return this;
          },
          size: function (t, e) {
            var i,
              a = this.bbox();
            for (i = this.value.length - 1; i >= 0; i--)
              a.width &&
                (this.value[i][0] =
                  ((this.value[i][0] - a.x) * t) / a.width + a.x),
                a.height &&
                  (this.value[i][1] =
                    ((this.value[i][1] - a.y) * e) / a.height + a.y);
            return this;
          },
          bbox: function () {
            return (
              a.parser.draw || a.prepare(),
              a.parser.poly.setAttribute("points", this.toString()),
              a.parser.poly.getBBox()
            );
          },
        });
      for (
        var s = {
            M: function (t, e, i) {
              return (e.x = i.x = t[0]), (e.y = i.y = t[1]), ["M", e.x, e.y];
            },
            L: function (t, e) {
              return (e.x = t[0]), (e.y = t[1]), ["L", t[0], t[1]];
            },
            H: function (t, e) {
              return (e.x = t[0]), ["H", t[0]];
            },
            V: function (t, e) {
              return (e.y = t[0]), ["V", t[0]];
            },
            C: function (t, e) {
              return (
                (e.x = t[4]),
                (e.y = t[5]),
                ["C", t[0], t[1], t[2], t[3], t[4], t[5]]
              );
            },
            S: function (t, e) {
              return (e.x = t[2]), (e.y = t[3]), ["S", t[0], t[1], t[2], t[3]];
            },
            Q: function (t, e) {
              return (e.x = t[2]), (e.y = t[3]), ["Q", t[0], t[1], t[2], t[3]];
            },
            T: function (t, e) {
              return (e.x = t[0]), (e.y = t[1]), ["T", t[0], t[1]];
            },
            Z: function (t, e, i) {
              return (e.x = i.x), (e.y = i.y), ["Z"];
            },
            A: function (t, e) {
              return (
                (e.x = t[5]),
                (e.y = t[6]),
                ["A", t[0], t[1], t[2], t[3], t[4], t[5], t[6]]
              );
            },
          },
          n = "mlhvqtcsaz".split(""),
          r = 0,
          o = n.length;
        r < o;
        ++r
      )
        s[n[r]] = (function (t) {
          return function (e, i, a) {
            if ("H" == t) e[0] = e[0] + i.x;
            else if ("V" == t) e[0] = e[0] + i.y;
            else if ("A" == t) (e[5] = e[5] + i.x), (e[6] = e[6] + i.y);
            else
              for (var n = 0, r = e.length; n < r; ++n)
                e[n] = e[n] + (n % 2 ? i.y : i.x);
            return s[t](e, i, a);
          };
        })(n[r].toUpperCase());
      (a.PathArray = function (t, e) {
        a.Array.call(this, t, e || [["M", 0, 0]]);
      }),
        (a.PathArray.prototype = new a.Array()),
        (a.PathArray.prototype.constructor = a.PathArray),
        a.extend(a.PathArray, {
          toString: function () {
            return (function (t) {
              for (var e = 0, i = t.length, a = ""; e < i; e++)
                (a += t[e][0]),
                  null != t[e][1] &&
                    ((a += t[e][1]),
                    null != t[e][2] &&
                      ((a += " "),
                      (a += t[e][2]),
                      null != t[e][3] &&
                        ((a += " "),
                        (a += t[e][3]),
                        (a += " "),
                        (a += t[e][4]),
                        null != t[e][5] &&
                          ((a += " "),
                          (a += t[e][5]),
                          (a += " "),
                          (a += t[e][6]),
                          null != t[e][7] && ((a += " "), (a += t[e][7]))))));
              return a + " ";
            })(this.value);
          },
          move: function (t, e) {
            var i = this.bbox();
            if (((t -= i.x), (e -= i.y), !isNaN(t) && !isNaN(e)))
              for (var a, s = this.value.length - 1; s >= 0; s--)
                "M" == (a = this.value[s][0]) || "L" == a || "T" == a
                  ? ((this.value[s][1] += t), (this.value[s][2] += e))
                  : "H" == a
                  ? (this.value[s][1] += t)
                  : "V" == a
                  ? (this.value[s][1] += e)
                  : "C" == a || "S" == a || "Q" == a
                  ? ((this.value[s][1] += t),
                    (this.value[s][2] += e),
                    (this.value[s][3] += t),
                    (this.value[s][4] += e),
                    "C" == a &&
                      ((this.value[s][5] += t), (this.value[s][6] += e)))
                  : "A" == a &&
                    ((this.value[s][6] += t), (this.value[s][7] += e));
            return this;
          },
          size: function (t, e) {
            var i,
              a,
              s = this.bbox();
            for (i = this.value.length - 1; i >= 0; i--)
              "M" == (a = this.value[i][0]) || "L" == a || "T" == a
                ? ((this.value[i][1] =
                    ((this.value[i][1] - s.x) * t) / s.width + s.x),
                  (this.value[i][2] =
                    ((this.value[i][2] - s.y) * e) / s.height + s.y))
                : "H" == a
                ? (this.value[i][1] =
                    ((this.value[i][1] - s.x) * t) / s.width + s.x)
                : "V" == a
                ? (this.value[i][1] =
                    ((this.value[i][1] - s.y) * e) / s.height + s.y)
                : "C" == a || "S" == a || "Q" == a
                ? ((this.value[i][1] =
                    ((this.value[i][1] - s.x) * t) / s.width + s.x),
                  (this.value[i][2] =
                    ((this.value[i][2] - s.y) * e) / s.height + s.y),
                  (this.value[i][3] =
                    ((this.value[i][3] - s.x) * t) / s.width + s.x),
                  (this.value[i][4] =
                    ((this.value[i][4] - s.y) * e) / s.height + s.y),
                  "C" == a &&
                    ((this.value[i][5] =
                      ((this.value[i][5] - s.x) * t) / s.width + s.x),
                    (this.value[i][6] =
                      ((this.value[i][6] - s.y) * e) / s.height + s.y)))
                : "A" == a &&
                  ((this.value[i][1] = (this.value[i][1] * t) / s.width),
                  (this.value[i][2] = (this.value[i][2] * e) / s.height),
                  (this.value[i][6] =
                    ((this.value[i][6] - s.x) * t) / s.width + s.x),
                  (this.value[i][7] =
                    ((this.value[i][7] - s.y) * e) / s.height + s.y));
            return this;
          },
          equalCommands: function (t) {
            var e, i, s;
            for (
              t = new a.PathArray(t),
                s = this.value.length === t.value.length,
                e = 0,
                i = this.value.length;
              s && e < i;
              e++
            )
              s = this.value[e][0] === t.value[e][0];
            return s;
          },
          morph: function (t) {
            return (
              (t = new a.PathArray(t)),
              this.equalCommands(t)
                ? (this.destination = t)
                : (this.destination = null),
              this
            );
          },
          at: function (t) {
            if (!this.destination) return this;
            var e,
              i,
              s,
              n,
              r = this.value,
              o = this.destination.value,
              l = [],
              h = new a.PathArray();
            for (e = 0, i = r.length; e < i; e++) {
              for (l[e] = [r[e][0]], s = 1, n = r[e].length; s < n; s++)
                l[e][s] = r[e][s] + (o[e][s] - r[e][s]) * t;
              "A" === l[e][0] &&
                ((l[e][4] = +(0 != l[e][4])), (l[e][5] = +(0 != l[e][5])));
            }
            return (h.value = l), h;
          },
          parse: function (t) {
            if (t instanceof a.PathArray) return t.valueOf();
            var e,
              i = {
                M: 2,
                L: 2,
                H: 1,
                V: 1,
                C: 6,
                S: 4,
                Q: 4,
                T: 2,
                A: 7,
                Z: 0,
              };
            t =
              "string" == typeof t
                ? t
                    .replace(a.regex.numbersWithDots, h)
                    .replace(a.regex.pathLetters, " $& ")
                    .replace(a.regex.hyphen, "$1 -")
                    .trim()
                    .split(a.regex.delimiter)
                : t.reduce(function (t, e) {
                    return [].concat.call(t, e);
                  }, []);
            var n = [],
              r = new a.Point(),
              o = new a.Point(),
              l = 0,
              c = t.length;
            do {
              a.regex.isPathLetter.test(t[l])
                ? ((e = t[l]), ++l)
                : "M" == e
                ? (e = "L")
                : "m" == e && (e = "l"),
                n.push(
                  s[e].call(
                    null,
                    t.slice(l, (l += i[e.toUpperCase()])).map(parseFloat),
                    r,
                    o
                  )
                );
            } while (c > l);
            return n;
          },
          bbox: function () {
            return (
              a.parser.draw || a.prepare(),
              a.parser.path.setAttribute("d", this.toString()),
              a.parser.path.getBBox()
            );
          },
        }),
        (a.Number = a.invent({
          create: function (t, e) {
            (this.value = 0),
              (this.unit = e || ""),
              "number" == typeof t
                ? (this.value = isNaN(t)
                    ? 0
                    : isFinite(t)
                    ? t
                    : t < 0
                    ? -3.4e38
                    : 3.4e38)
                : "string" == typeof t
                ? (e = t.match(a.regex.numberAndUnit)) &&
                  ((this.value = parseFloat(e[1])),
                  "%" == e[5]
                    ? (this.value /= 100)
                    : "s" == e[5] && (this.value *= 1e3),
                  (this.unit = e[5]))
                : t instanceof a.Number &&
                  ((this.value = t.valueOf()), (this.unit = t.unit));
          },
          extend: {
            toString: function () {
              return (
                ("%" == this.unit
                  ? ~~(1e8 * this.value) / 1e6
                  : "s" == this.unit
                  ? this.value / 1e3
                  : this.value) + this.unit
              );
            },
            toJSON: function () {
              return this.toString();
            },
            valueOf: function () {
              return this.value;
            },
            plus: function (t) {
              return (
                (t = new a.Number(t)),
                new a.Number(this + t, this.unit || t.unit)
              );
            },
            minus: function (t) {
              return (
                (t = new a.Number(t)),
                new a.Number(this - t, this.unit || t.unit)
              );
            },
            times: function (t) {
              return (
                (t = new a.Number(t)),
                new a.Number(this * t, this.unit || t.unit)
              );
            },
            divide: function (t) {
              return (
                (t = new a.Number(t)),
                new a.Number(this / t, this.unit || t.unit)
              );
            },
            to: function (t) {
              var e = new a.Number(this);
              return "string" == typeof t && (e.unit = t), e;
            },
            morph: function (t) {
              return (
                (this.destination = new a.Number(t)),
                t.relative && (this.destination.value += this.value),
                this
              );
            },
            at: function (t) {
              return this.destination
                ? new a.Number(this.destination).minus(this).times(t).plus(this)
                : this;
            },
          },
        })),
        (a.Element = a.invent({
          create: function (t) {
            (this._stroke = a.defaults.attrs.stroke),
              (this._event = null),
              (this.dom = {}),
              (this.node = t) &&
                ((this.type = t.nodeName),
                (this.node.instance = this),
                (this._stroke = t.getAttribute("stroke") || this._stroke));
          },
          extend: {
            x: function (t) {
              return this.attr("x", t);
            },
            y: function (t) {
              return this.attr("y", t);
            },
            cx: function (t) {
              return null == t
                ? this.x() + this.width() / 2
                : this.x(t - this.width() / 2);
            },
            cy: function (t) {
              return null == t
                ? this.y() + this.height() / 2
                : this.y(t - this.height() / 2);
            },
            move: function (t, e) {
              return this.x(t).y(e);
            },
            center: function (t, e) {
              return this.cx(t).cy(e);
            },
            width: function (t) {
              return this.attr("width", t);
            },
            height: function (t) {
              return this.attr("height", t);
            },
            size: function (t, e) {
              var i = g(this, t, e);
              return this.width(new a.Number(i.width)).height(
                new a.Number(i.height)
              );
            },
            clone: function (t) {
              this.writeDataToDom();
              var e = b(this.node.cloneNode(!0));
              return t ? t.add(e) : this.after(e), e;
            },
            remove: function () {
              return this.parent() && this.parent().removeElement(this), this;
            },
            replace: function (t) {
              return this.after(t).remove(), t;
            },
            addTo: function (t) {
              return t.put(this);
            },
            putIn: function (t) {
              return t.add(this);
            },
            id: function (t) {
              return this.attr("id", t);
            },
            inside: function (t, e) {
              var i = this.bbox();
              return (
                t > i.x && e > i.y && t < i.x + i.width && e < i.y + i.height
              );
            },
            show: function () {
              return this.style("display", "");
            },
            hide: function () {
              return this.style("display", "none");
            },
            visible: function () {
              return "none" != this.style("display");
            },
            toString: function () {
              return this.attr("id");
            },
            classes: function () {
              var t = this.attr("class");
              return null == t ? [] : t.trim().split(a.regex.delimiter);
            },
            hasClass: function (t) {
              return -1 != this.classes().indexOf(t);
            },
            addClass: function (t) {
              if (!this.hasClass(t)) {
                var e = this.classes();
                e.push(t), this.attr("class", e.join(" "));
              }
              return this;
            },
            removeClass: function (t) {
              return (
                this.hasClass(t) &&
                  this.attr(
                    "class",
                    this.classes()
                      .filter(function (e) {
                        return e != t;
                      })
                      .join(" ")
                  ),
                this
              );
            },
            toggleClass: function (t) {
              return this.hasClass(t) ? this.removeClass(t) : this.addClass(t);
            },
            reference: function (t) {
              return a.get(this.attr(t));
            },
            parent: function (t) {
              var i = this;
              if (!i.node.parentNode) return null;
              if (((i = a.adopt(i.node.parentNode)), !t)) return i;
              for (; i && i.node instanceof e.SVGElement; ) {
                if ("string" == typeof t ? i.matches(t) : i instanceof t)
                  return i;
                if (
                  !i.node.parentNode ||
                  "#document" == i.node.parentNode.nodeName
                )
                  return null;
                i = a.adopt(i.node.parentNode);
              }
            },
            doc: function () {
              return this instanceof a.Doc ? this : this.parent(a.Doc);
            },
            parents: function (t) {
              var e = [],
                i = this;
              do {
                if (!(i = i.parent(t)) || !i.node) break;
                e.push(i);
              } while (i.parent);
              return e;
            },
            matches: function (t) {
              return (function (t, e) {
                return (
                  t.matches ||
                  t.matchesSelector ||
                  t.msMatchesSelector ||
                  t.mozMatchesSelector ||
                  t.webkitMatchesSelector ||
                  t.oMatchesSelector
                ).call(t, e);
              })(this.node, t);
            },
            native: function () {
              return this.node;
            },
            svg: function (t) {
              var e = i.createElement("svg");
              if (!(t && this instanceof a.Parent))
                return (
                  e.appendChild((t = i.createElement("svg"))),
                  this.writeDataToDom(),
                  t.appendChild(this.node.cloneNode(!0)),
                  e.innerHTML.replace(/^<svg>/, "").replace(/<\/svg>$/, "")
                );
              e.innerHTML =
                "<svg>" +
                t
                  .replace(/\n/, "")
                  .replace(/<([\w:-]+)([^<]+?)\/>/g, "<$1$2></$1>") +
                "</svg>";
              for (var s = 0, n = e.firstChild.childNodes.length; s < n; s++)
                this.node.appendChild(e.firstChild.firstChild);
              return this;
            },
            writeDataToDom: function () {
              (this.each || this.lines) &&
                (this.each ? this : this.lines()).each(function () {
                  this.writeDataToDom();
                });
              return (
                this.node.removeAttribute("svgjs:data"),
                Object.keys(this.dom).length &&
                  this.node.setAttribute(
                    "svgjs:data",
                    JSON.stringify(this.dom)
                  ),
                this
              );
            },
            setData: function (t) {
              return (this.dom = t), this;
            },
            is: function (t) {
              return (function (t, e) {
                return t instanceof e;
              })(this, t);
            },
          },
        })),
        (a.easing = {
          "-": function (t) {
            return t;
          },
          "<>": function (t) {
            return -Math.cos(t * Math.PI) / 2 + 0.5;
          },
          ">": function (t) {
            return Math.sin((t * Math.PI) / 2);
          },
          "<": function (t) {
            return 1 - Math.cos((t * Math.PI) / 2);
          },
        }),
        (a.morph = function (t) {
          return function (e, i) {
            return new a.MorphObj(e, i).at(t);
          };
        }),
        (a.Situation = a.invent({
          create: function (t) {
            (this.init = !1),
              (this.reversed = !1),
              (this.reversing = !1),
              (this.duration = new a.Number(t.duration).valueOf()),
              (this.delay = new a.Number(t.delay).valueOf()),
              (this.start = +new Date() + this.delay),
              (this.finish = this.start + this.duration),
              (this.ease = t.ease),
              (this.loop = 0),
              (this.loops = !1),
              (this.animations = {}),
              (this.attrs = {}),
              (this.styles = {}),
              (this.transforms = []),
              (this.once = {});
          },
        })),
        (a.FX = a.invent({
          create: function (t) {
            (this._target = t),
              (this.situations = []),
              (this.active = !1),
              (this.situation = null),
              (this.paused = !1),
              (this.lastPos = 0),
              (this.pos = 0),
              (this.absPos = 0),
              (this._speed = 1);
          },
          extend: {
            animate: function (e, i, s) {
              "object" === t(e) &&
                ((i = e.ease), (s = e.delay), (e = e.duration));
              var n = new a.Situation({
                duration: e || 1e3,
                delay: s || 0,
                ease: a.easing[i || "-"] || i,
              });
              return this.queue(n), this;
            },
            delay: function (t) {
              var e = new a.Situation({
                duration: t,
                delay: 0,
                ease: a.easing["-"],
              });
              return this.queue(e);
            },
            target: function (t) {
              return t && t instanceof a.Element
                ? ((this._target = t), this)
                : this._target;
            },
            timeToAbsPos: function (t) {
              return (
                (t - this.situation.start) /
                (this.situation.duration / this._speed)
              );
            },
            absPosToTime: function (t) {
              return (
                (this.situation.duration / this._speed) * t +
                this.situation.start
              );
            },
            startAnimFrame: function () {
              this.stopAnimFrame(),
                (this.animationFrame = e.requestAnimationFrame(
                  function () {
                    this.step();
                  }.bind(this)
                ));
            },
            stopAnimFrame: function () {
              e.cancelAnimationFrame(this.animationFrame);
            },
            start: function () {
              return (
                !this.active &&
                  this.situation &&
                  ((this.active = !0), this.startCurrent()),
                this
              );
            },
            startCurrent: function () {
              return (
                (this.situation.start =
                  +new Date() + this.situation.delay / this._speed),
                (this.situation.finish =
                  this.situation.start + this.situation.duration / this._speed),
                this.initAnimations().step()
              );
            },
            queue: function (t) {
              return (
                ("function" == typeof t || t instanceof a.Situation) &&
                  this.situations.push(t),
                this.situation || (this.situation = this.situations.shift()),
                this
              );
            },
            dequeue: function () {
              return (
                this.stop(),
                (this.situation = this.situations.shift()),
                this.situation &&
                  (this.situation instanceof a.Situation
                    ? this.start()
                    : this.situation.call(this)),
                this
              );
            },
            initAnimations: function () {
              var t,
                e,
                i,
                s = this.situation;
              if (s.init) return this;
              for (t in s.animations)
                for (
                  i = this.target()[t](),
                    Array.isArray(i) || (i = [i]),
                    Array.isArray(s.animations[t]) ||
                      (s.animations[t] = [s.animations[t]]),
                    e = i.length;
                  e--;

                )
                  s.animations[t][e] instanceof a.Number &&
                    (i[e] = new a.Number(i[e])),
                    (s.animations[t][e] = i[e].morph(s.animations[t][e]));
              for (t in s.attrs)
                s.attrs[t] = new a.MorphObj(this.target().attr(t), s.attrs[t]);
              for (t in s.styles)
                s.styles[t] = new a.MorphObj(
                  this.target().style(t),
                  s.styles[t]
                );
              return (
                (s.initialTransformation = this.target().matrixify()),
                (s.init = !0),
                this
              );
            },
            clearQueue: function () {
              return (this.situations = []), this;
            },
            clearCurrent: function () {
              return (this.situation = null), this;
            },
            stop: function (t, e) {
              var i = this.active;
              return (
                (this.active = !1),
                e && this.clearQueue(),
                t &&
                  this.situation &&
                  (!i && this.startCurrent(), this.atEnd()),
                this.stopAnimFrame(),
                this.clearCurrent()
              );
            },
            reset: function () {
              if (this.situation) {
                var t = this.situation;
                this.stop(), (this.situation = t), this.atStart();
              }
              return this;
            },
            finish: function () {
              for (
                this.stop(!0, !1);
                this.dequeue().situation && this.stop(!0, !1);

              );
              return this.clearQueue().clearCurrent(), this;
            },
            atStart: function () {
              return this.at(0, !0);
            },
            atEnd: function () {
              return (
                !0 === this.situation.loops &&
                  (this.situation.loops = this.situation.loop + 1),
                "number" == typeof this.situation.loops
                  ? this.at(this.situation.loops, !0)
                  : this.at(1, !0)
              );
            },
            at: function (t, e) {
              var i = this.situation.duration / this._speed;
              return (
                (this.absPos = t),
                e ||
                  (this.situation.reversed && (this.absPos = 1 - this.absPos),
                  (this.absPos += this.situation.loop)),
                (this.situation.start = +new Date() - this.absPos * i),
                (this.situation.finish = this.situation.start + i),
                this.step(!0)
              );
            },
            speed: function (t) {
              return 0 === t
                ? this.pause()
                : t
                ? ((this._speed = t), this.at(this.absPos, !0))
                : this._speed;
            },
            loop: function (t, e) {
              var i = this.last();
              return (
                (i.loops = null == t || t),
                (i.loop = 0),
                e && (i.reversing = !0),
                this
              );
            },
            pause: function () {
              return (this.paused = !0), this.stopAnimFrame(), this;
            },
            play: function () {
              return this.paused
                ? ((this.paused = !1), this.at(this.absPos, !0))
                : this;
            },
            reverse: function (t) {
              var e = this.last();
              return (e.reversed = void 0 === t ? !e.reversed : t), this;
            },
            progress: function (t) {
              return t ? this.situation.ease(this.pos) : this.pos;
            },
            after: function (t) {
              var e = this.last();
              return (
                this.target().on("finished.fx", function i(a) {
                  a.detail.situation == e &&
                    (t.call(this, e), this.off("finished.fx", i));
                }),
                this._callStart()
              );
            },
            during: function (t) {
              var e = this.last(),
                i = function (i) {
                  i.detail.situation == e &&
                    t.call(
                      this,
                      i.detail.pos,
                      a.morph(i.detail.pos),
                      i.detail.eased,
                      e
                    );
                };
              return (
                this.target().off("during.fx", i).on("during.fx", i),
                this.after(function () {
                  this.off("during.fx", i);
                }),
                this._callStart()
              );
            },
            afterAll: function (t) {
              var e = function e(i) {
                t.call(this), this.off("allfinished.fx", e);
              };
              return (
                this.target().off("allfinished.fx", e).on("allfinished.fx", e),
                this._callStart()
              );
            },
            duringAll: function (t) {
              var e = function (e) {
                t.call(
                  this,
                  e.detail.pos,
                  a.morph(e.detail.pos),
                  e.detail.eased,
                  e.detail.situation
                );
              };
              return (
                this.target().off("during.fx", e).on("during.fx", e),
                this.afterAll(function () {
                  this.off("during.fx", e);
                }),
                this._callStart()
              );
            },
            last: function () {
              return this.situations.length
                ? this.situations[this.situations.length - 1]
                : this.situation;
            },
            add: function (t, e, i) {
              return (this.last()[i || "animations"][t] = e), this._callStart();
            },
            step: function (t) {
              var e, i, a;
              (t || (this.absPos = this.timeToAbsPos(+new Date())),
              !1 !== this.situation.loops)
                ? ((e = Math.max(this.absPos, 0)),
                  (i = Math.floor(e)),
                  !0 === this.situation.loops || i < this.situation.loops
                    ? ((this.pos = e - i),
                      (a = this.situation.loop),
                      (this.situation.loop = i))
                    : ((this.absPos = this.situation.loops),
                      (this.pos = 1),
                      (a = this.situation.loop - 1),
                      (this.situation.loop = this.situation.loops)),
                  this.situation.reversing &&
                    (this.situation.reversed =
                      this.situation.reversed !=
                      Boolean((this.situation.loop - a) % 2)))
                : ((this.absPos = Math.min(this.absPos, 1)),
                  (this.pos = this.absPos));
              this.pos < 0 && (this.pos = 0),
                this.situation.reversed && (this.pos = 1 - this.pos);
              var s = this.situation.ease(this.pos);
              for (var n in this.situation.once)
                n > this.lastPos &&
                  n <= s &&
                  (this.situation.once[n].call(this.target(), this.pos, s),
                  delete this.situation.once[n]);
              return (
                this.active &&
                  this.target().fire("during", {
                    pos: this.pos,
                    eased: s,
                    fx: this,
                    situation: this.situation,
                  }),
                this.situation
                  ? (this.eachAt(),
                    (1 == this.pos && !this.situation.reversed) ||
                    (this.situation.reversed && 0 == this.pos)
                      ? (this.stopAnimFrame(),
                        this.target().fire("finished", {
                          fx: this,
                          situation: this.situation,
                        }),
                        this.situations.length ||
                          (this.target().fire("allfinished"),
                          this.situations.length ||
                            (this.target().off(".fx"), (this.active = !1))),
                        this.active ? this.dequeue() : this.clearCurrent())
                      : !this.paused && this.active && this.startAnimFrame(),
                    (this.lastPos = s),
                    this)
                  : this
              );
            },
            eachAt: function () {
              var t,
                e,
                i,
                s = this,
                n = this.target(),
                r = this.situation;
              for (t in r.animations)
                (i = [].concat(r.animations[t]).map(function (t) {
                  return "string" != typeof t && t.at
                    ? t.at(r.ease(s.pos), s.pos)
                    : t;
                })),
                  n[t].apply(n, i);
              for (t in r.attrs)
                (i = [t].concat(r.attrs[t]).map(function (t) {
                  return "string" != typeof t && t.at
                    ? t.at(r.ease(s.pos), s.pos)
                    : t;
                })),
                  n.attr.apply(n, i);
              for (t in r.styles)
                (i = [t].concat(r.styles[t]).map(function (t) {
                  return "string" != typeof t && t.at
                    ? t.at(r.ease(s.pos), s.pos)
                    : t;
                })),
                  n.style.apply(n, i);
              if (r.transforms.length) {
                for (
                  i = r.initialTransformation, t = 0, e = r.transforms.length;
                  t < e;
                  t++
                ) {
                  var o = r.transforms[t];
                  o instanceof a.Matrix
                    ? (i = o.relative
                        ? i.multiply(
                            new a.Matrix().morph(o).at(r.ease(this.pos))
                          )
                        : i.morph(o).at(r.ease(this.pos)))
                    : (o.relative || o.undo(i.extract()),
                      (i = i.multiply(o.at(r.ease(this.pos)))));
                }
                n.matrix(i);
              }
              return this;
            },
            once: function (t, e, i) {
              var a = this.last();
              return i || (t = a.ease(t)), (a.once[t] = e), this;
            },
            _callStart: function () {
              return (
                setTimeout(
                  function () {
                    this.start();
                  }.bind(this),
                  0
                ),
                this
              );
            },
          },
          parent: a.Element,
          construct: {
            animate: function (t, e, i) {
              return (this.fx || (this.fx = new a.FX(this))).animate(t, e, i);
            },
            delay: function (t) {
              return (this.fx || (this.fx = new a.FX(this))).delay(t);
            },
            stop: function (t, e) {
              return this.fx && this.fx.stop(t, e), this;
            },
            finish: function () {
              return this.fx && this.fx.finish(), this;
            },
            pause: function () {
              return this.fx && this.fx.pause(), this;
            },
            play: function () {
              return this.fx && this.fx.play(), this;
            },
            speed: function (t) {
              if (this.fx) {
                if (null == t) return this.fx.speed();
                this.fx.speed(t);
              }
              return this;
            },
          },
        })),
        (a.MorphObj = a.invent({
          create: function (t, e) {
            return a.Color.isColor(e)
              ? new a.Color(t).morph(e)
              : a.regex.delimiter.test(t)
              ? a.regex.pathLetters.test(t)
                ? new a.PathArray(t).morph(e)
                : new a.Array(t).morph(e)
              : a.regex.numberAndUnit.test(e)
              ? new a.Number(t).morph(e)
              : ((this.value = t), void (this.destination = e));
          },
          extend: {
            at: function (t, e) {
              return e < 1 ? this.value : this.destination;
            },
            valueOf: function () {
              return this.value;
            },
          },
        })),
        a.extend(a.FX, {
          attr: function (e, i, a) {
            if ("object" === t(e)) for (var s in e) this.attr(s, e[s]);
            else this.add(e, i, "attrs");
            return this;
          },
          style: function (e, i) {
            if ("object" === t(e)) for (var a in e) this.style(a, e[a]);
            else this.add(e, i, "styles");
            return this;
          },
          x: function (t, e) {
            if (this.target() instanceof a.G)
              return this.transform({ x: t }, e), this;
            var i = new a.Number(t);
            return (i.relative = e), this.add("x", i);
          },
          y: function (t, e) {
            if (this.target() instanceof a.G)
              return this.transform({ y: t }, e), this;
            var i = new a.Number(t);
            return (i.relative = e), this.add("y", i);
          },
          cx: function (t) {
            return this.add("cx", new a.Number(t));
          },
          cy: function (t) {
            return this.add("cy", new a.Number(t));
          },
          move: function (t, e) {
            return this.x(t).y(e);
          },
          center: function (t, e) {
            return this.cx(t).cy(e);
          },
          size: function (t, e) {
            var i;
            this.target() instanceof a.Text
              ? this.attr("font-size", t)
              : ((t && e) || (i = this.target().bbox()),
                t || (t = (i.width / i.height) * e),
                e || (e = (i.height / i.width) * t),
                this.add("width", new a.Number(t)).add(
                  "height",
                  new a.Number(e)
                ));
            return this;
          },
          width: function (t) {
            return this.add("width", new a.Number(t));
          },
          height: function (t) {
            return this.add("height", new a.Number(t));
          },
          plot: function (t, e, i, a) {
            return 4 == arguments.length
              ? this.plot([t, e, i, a])
              : this.add("plot", new (this.target().morphArray)(t));
          },
          leading: function (t) {
            return this.target().leading
              ? this.add("leading", new a.Number(t))
              : this;
          },
          viewbox: function (t, e, i, s) {
            return (
              this.target() instanceof a.Container &&
                this.add("viewbox", new a.ViewBox(t, e, i, s)),
              this
            );
          },
          update: function (t) {
            if (this.target() instanceof a.Stop) {
              if ("number" == typeof t || t instanceof a.Number)
                return this.update({
                  offset: arguments[0],
                  color: arguments[1],
                  opacity: arguments[2],
                });
              null != t.opacity && this.attr("stop-opacity", t.opacity),
                null != t.color && this.attr("stop-color", t.color),
                null != t.offset && this.attr("offset", t.offset);
            }
            return this;
          },
        }),
        (a.Box = a.invent({
          create: function (e, i, s, n) {
            if (!("object" !== t(e) || e instanceof a.Element))
              return a.Box.call(
                this,
                null != e.left ? e.left : e.x,
                null != e.top ? e.top : e.y,
                e.width,
                e.height
              );
            4 == arguments.length &&
              ((this.x = e), (this.y = i), (this.width = s), (this.height = n)),
              m(this);
          },
          extend: {
            merge: function (t) {
              var e = new this.constructor();
              return (
                (e.x = Math.min(this.x, t.x)),
                (e.y = Math.min(this.y, t.y)),
                (e.width = Math.max(this.x + this.width, t.x + t.width) - e.x),
                (e.height =
                  Math.max(this.y + this.height, t.y + t.height) - e.y),
                m(e)
              );
            },
            transform: function (t) {
              var e,
                i = 1 / 0,
                s = -1 / 0,
                n = 1 / 0,
                r = -1 / 0;
              return (
                [
                  new a.Point(this.x, this.y),
                  new a.Point(this.x2, this.y),
                  new a.Point(this.x, this.y2),
                  new a.Point(this.x2, this.y2),
                ].forEach(function (e) {
                  (e = e.transform(t)),
                    (i = Math.min(i, e.x)),
                    (s = Math.max(s, e.x)),
                    (n = Math.min(n, e.y)),
                    (r = Math.max(r, e.y));
                }),
                ((e = new this.constructor()).x = i),
                (e.width = s - i),
                (e.y = n),
                (e.height = r - n),
                m(e),
                e
              );
            },
          },
        })),
        (a.BBox = a.invent({
          create: function (t) {
            if (
              (a.Box.apply(this, [].slice.call(arguments)),
              t instanceof a.Element)
            ) {
              var e;
              try {
                if (!i.documentElement.contains) {
                  for (var s = t.node; s.parentNode; ) s = s.parentNode;
                  if (s != i) throw new Error("Element not in the dom");
                }
                e = t.node.getBBox();
              } catch (i) {
                if (t instanceof a.Shape) {
                  a.parser.draw || a.prepare();
                  var n = t.clone(a.parser.draw.instance).show();
                  (e = n.node.getBBox()), n.remove();
                } else
                  e = {
                    x: t.node.clientLeft,
                    y: t.node.clientTop,
                    width: t.node.clientWidth,
                    height: t.node.clientHeight,
                  };
              }
              a.Box.call(this, e);
            }
          },
          inherit: a.Box,
          parent: a.Element,
          construct: {
            bbox: function () {
              return new a.BBox(this);
            },
          },
        })),
        (a.BBox.prototype.constructor = a.BBox),
        a.extend(a.Element, {
          tbox: function () {
            return (
              console.warn(
                "Use of TBox is deprecated and mapped to RBox. Use .rbox() instead."
              ),
              this.rbox(this.doc())
            );
          },
        }),
        (a.RBox = a.invent({
          create: function (t) {
            a.Box.apply(this, [].slice.call(arguments)),
              t instanceof a.Element &&
                a.Box.call(this, t.node.getBoundingClientRect());
          },
          inherit: a.Box,
          parent: a.Element,
          extend: {
            addOffset: function () {
              return (this.x += e.pageXOffset), (this.y += e.pageYOffset), this;
            },
          },
          construct: {
            rbox: function (t) {
              return t
                ? new a.RBox(this).transform(t.screenCTM().inverse())
                : new a.RBox(this).addOffset();
            },
          },
        })),
        (a.RBox.prototype.constructor = a.RBox),
        (a.Matrix = a.invent({
          create: function (e) {
            var i,
              s = p([1, 0, 0, 1, 0, 0]);
            for (
              e =
                e instanceof a.Element
                  ? e.matrixify()
                  : "string" == typeof e
                  ? p(e.split(a.regex.delimiter).map(parseFloat))
                  : 6 == arguments.length
                  ? p([].slice.call(arguments))
                  : Array.isArray(e)
                  ? p(e)
                  : "object" === t(e)
                  ? e
                  : s,
                i = y.length - 1;
              i >= 0;
              --i
            )
              this[y[i]] = null != e[y[i]] ? e[y[i]] : s[y[i]];
          },
          extend: {
            extract: function () {
              var t = f(this, 0, 1),
                e = f(this, 1, 0),
                i = (180 / Math.PI) * Math.atan2(t.y, t.x) - 90;
              return {
                x: this.e,
                y: this.f,
                transformedX:
                  (this.e * Math.cos((i * Math.PI) / 180) +
                    this.f * Math.sin((i * Math.PI) / 180)) /
                  Math.sqrt(this.a * this.a + this.b * this.b),
                transformedY:
                  (this.f * Math.cos((i * Math.PI) / 180) +
                    this.e * Math.sin((-i * Math.PI) / 180)) /
                  Math.sqrt(this.c * this.c + this.d * this.d),
                skewX: -i,
                skewY: (180 / Math.PI) * Math.atan2(e.y, e.x),
                scaleX: Math.sqrt(this.a * this.a + this.b * this.b),
                scaleY: Math.sqrt(this.c * this.c + this.d * this.d),
                rotation: i,
                a: this.a,
                b: this.b,
                c: this.c,
                d: this.d,
                e: this.e,
                f: this.f,
                matrix: new a.Matrix(this),
              };
            },
            clone: function () {
              return new a.Matrix(this);
            },
            morph: function (t) {
              return (this.destination = new a.Matrix(t)), this;
            },
            at: function (t) {
              return this.destination
                ? new a.Matrix({
                    a: this.a + (this.destination.a - this.a) * t,
                    b: this.b + (this.destination.b - this.b) * t,
                    c: this.c + (this.destination.c - this.c) * t,
                    d: this.d + (this.destination.d - this.d) * t,
                    e: this.e + (this.destination.e - this.e) * t,
                    f: this.f + (this.destination.f - this.f) * t,
                  })
                : this;
            },
            multiply: function (t) {
              return new a.Matrix(
                this.native().multiply(
                  (function (t) {
                    t instanceof a.Matrix || (t = new a.Matrix(t));
                    return t;
                  })(t).native()
                )
              );
            },
            inverse: function () {
              return new a.Matrix(this.native().inverse());
            },
            translate: function (t, e) {
              return new a.Matrix(this.native().translate(t || 0, e || 0));
            },
            scale: function (t, e, i, s) {
              return (
                1 == arguments.length
                  ? (e = t)
                  : 3 == arguments.length && ((s = i), (i = e), (e = t)),
                this.around(i, s, new a.Matrix(t, 0, 0, e, 0, 0))
              );
            },
            rotate: function (t, e, i) {
              return (
                (t = a.utils.radians(t)),
                this.around(
                  e,
                  i,
                  new a.Matrix(
                    Math.cos(t),
                    Math.sin(t),
                    -Math.sin(t),
                    Math.cos(t),
                    0,
                    0
                  )
                )
              );
            },
            flip: function (t, e) {
              return "x" == t
                ? this.scale(-1, 1, e, 0)
                : "y" == t
                ? this.scale(1, -1, 0, e)
                : this.scale(-1, -1, t, null != e ? e : t);
            },
            skew: function (t, e, i, s) {
              return (
                1 == arguments.length
                  ? (e = t)
                  : 3 == arguments.length && ((s = i), (i = e), (e = t)),
                (t = a.utils.radians(t)),
                (e = a.utils.radians(e)),
                this.around(
                  i,
                  s,
                  new a.Matrix(1, Math.tan(e), Math.tan(t), 1, 0, 0)
                )
              );
            },
            skewX: function (t, e, i) {
              return this.skew(t, 0, e, i);
            },
            skewY: function (t, e, i) {
              return this.skew(0, t, e, i);
            },
            around: function (t, e, i) {
              return this.multiply(new a.Matrix(1, 0, 0, 1, t || 0, e || 0))
                .multiply(i)
                .multiply(new a.Matrix(1, 0, 0, 1, -t || 0, -e || 0));
            },
            native: function () {
              for (
                var t = a.parser.native.createSVGMatrix(), e = y.length - 1;
                e >= 0;
                e--
              )
                t[y[e]] = this[y[e]];
              return t;
            },
            toString: function () {
              return (
                "matrix(" +
                v(this.a) +
                "," +
                v(this.b) +
                "," +
                v(this.c) +
                "," +
                v(this.d) +
                "," +
                v(this.e) +
                "," +
                v(this.f) +
                ")"
              );
            },
          },
          parent: a.Element,
          construct: {
            ctm: function () {
              return new a.Matrix(this.node.getCTM());
            },
            screenCTM: function () {
              if (this instanceof a.Nested) {
                var t = this.rect(1, 1),
                  e = t.node.getScreenCTM();
                return t.remove(), new a.Matrix(e);
              }
              return new a.Matrix(this.node.getScreenCTM());
            },
          },
        })),
        (a.Point = a.invent({
          create: function (e, i) {
            var a;
            (a = Array.isArray(e)
              ? { x: e[0], y: e[1] }
              : "object" === t(e)
              ? { x: e.x, y: e.y }
              : null != e
              ? { x: e, y: null != i ? i : e }
              : { x: 0, y: 0 }),
              (this.x = a.x),
              (this.y = a.y);
          },
          extend: {
            clone: function () {
              return new a.Point(this);
            },
            morph: function (t, e) {
              return (this.destination = new a.Point(t, e)), this;
            },
            at: function (t) {
              return this.destination
                ? new a.Point({
                    x: this.x + (this.destination.x - this.x) * t,
                    y: this.y + (this.destination.y - this.y) * t,
                  })
                : this;
            },
            native: function () {
              var t = a.parser.native.createSVGPoint();
              return (t.x = this.x), (t.y = this.y), t;
            },
            transform: function (t) {
              return new a.Point(this.native().matrixTransform(t.native()));
            },
          },
        })),
        a.extend(a.Element, {
          point: function (t, e) {
            return new a.Point(t, e).transform(this.screenCTM().inverse());
          },
        }),
        a.extend(a.Element, {
          attr: function (e, i, s) {
            if (null == e) {
              for (
                e = {}, s = (i = this.node.attributes).length - 1;
                s >= 0;
                s--
              )
                e[i[s].nodeName] = a.regex.isNumber.test(i[s].nodeValue)
                  ? parseFloat(i[s].nodeValue)
                  : i[s].nodeValue;
              return e;
            }
            if ("object" === t(e)) for (i in e) this.attr(i, e[i]);
            else if (null === i) this.node.removeAttribute(e);
            else {
              if (null == i)
                return null == (i = this.node.getAttribute(e))
                  ? a.defaults.attrs[e]
                  : a.regex.isNumber.test(i)
                  ? parseFloat(i)
                  : i;
              "stroke-width" == e
                ? this.attr("stroke", parseFloat(i) > 0 ? this._stroke : null)
                : "stroke" == e && (this._stroke = i),
                ("fill" != e && "stroke" != e) ||
                  (a.regex.isImage.test(i) &&
                    (i = this.doc().defs().image(i, 0, 0)),
                  i instanceof a.Image &&
                    (i = this.doc()
                      .defs()
                      .pattern(0, 0, function () {
                        this.add(i);
                      }))),
                "number" == typeof i
                  ? (i = new a.Number(i))
                  : a.Color.isColor(i)
                  ? (i = new a.Color(i))
                  : Array.isArray(i) && (i = new a.Array(i)),
                "leading" == e
                  ? this.leading && this.leading(i)
                  : "string" == typeof s
                  ? this.node.setAttributeNS(s, e, i.toString())
                  : this.node.setAttribute(e, i.toString()),
                !this.rebuild ||
                  ("font-size" != e && "x" != e) ||
                  this.rebuild(e, i);
            }
            return this;
          },
        }),
        a.extend(a.Element, {
          transform: function (e, i) {
            var s, n;
            if ("object" !== t(e))
              return (
                (s = new a.Matrix(this).extract()),
                "string" == typeof e ? s[e] : s
              );
            if (
              ((s = new a.Matrix(this)), (i = !!i || !!e.relative), null != e.a)
            )
              s = i ? s.multiply(new a.Matrix(e)) : new a.Matrix(e);
            else if (null != e.rotation)
              x(e, this),
                (s = i
                  ? s.rotate(e.rotation, e.cx, e.cy)
                  : s.rotate(e.rotation - s.extract().rotation, e.cx, e.cy));
            else if (null != e.scale || null != e.scaleX || null != e.scaleY) {
              if (
                (x(e, this),
                (e.scaleX =
                  null != e.scale ? e.scale : null != e.scaleX ? e.scaleX : 1),
                (e.scaleY =
                  null != e.scale ? e.scale : null != e.scaleY ? e.scaleY : 1),
                !i)
              ) {
                var r = s.extract();
                (e.scaleX = (1 * e.scaleX) / r.scaleX),
                  (e.scaleY = (1 * e.scaleY) / r.scaleY);
              }
              s = s.scale(e.scaleX, e.scaleY, e.cx, e.cy);
            } else if (null != e.skew || null != e.skewX || null != e.skewY) {
              if (
                (x(e, this),
                (e.skewX =
                  null != e.skew ? e.skew : null != e.skewX ? e.skewX : 0),
                (e.skewY =
                  null != e.skew ? e.skew : null != e.skewY ? e.skewY : 0),
                !i)
              ) {
                r = s.extract();
                s = s.multiply(
                  new a.Matrix().skew(r.skewX, r.skewY, e.cx, e.cy).inverse()
                );
              }
              s = s.skew(e.skewX, e.skewY, e.cx, e.cy);
            } else
              e.flip
                ? ("x" == e.flip || "y" == e.flip
                    ? (e.offset =
                        null == e.offset ? this.bbox()["c" + e.flip] : e.offset)
                    : null == e.offset
                    ? ((n = this.bbox()), (e.flip = n.cx), (e.offset = n.cy))
                    : (e.flip = e.offset),
                  (s = new a.Matrix().flip(e.flip, e.offset)))
                : (null == e.x && null == e.y) ||
                  (i
                    ? (s = s.translate(e.x, e.y))
                    : (null != e.x && (s.e = e.x), null != e.y && (s.f = e.y)));
            return this.attr("transform", s);
          },
        }),
        a.extend(a.FX, {
          transform: function (e, i) {
            var s,
              n,
              r = this.target();
            return "object" !== t(e)
              ? ((s = new a.Matrix(r).extract()),
                "string" == typeof e ? s[e] : s)
              : ((i = !!i || !!e.relative),
                null != e.a
                  ? (s = new a.Matrix(e))
                  : null != e.rotation
                  ? (x(e, r), (s = new a.Rotate(e.rotation, e.cx, e.cy)))
                  : null != e.scale || null != e.scaleX || null != e.scaleY
                  ? (x(e, r),
                    (e.scaleX =
                      null != e.scale
                        ? e.scale
                        : null != e.scaleX
                        ? e.scaleX
                        : 1),
                    (e.scaleY =
                      null != e.scale
                        ? e.scale
                        : null != e.scaleY
                        ? e.scaleY
                        : 1),
                    (s = new a.Scale(e.scaleX, e.scaleY, e.cx, e.cy)))
                  : null != e.skewX || null != e.skewY
                  ? (x(e, r),
                    (e.skewX = null != e.skewX ? e.skewX : 0),
                    (e.skewY = null != e.skewY ? e.skewY : 0),
                    (s = new a.Skew(e.skewX, e.skewY, e.cx, e.cy)))
                  : e.flip
                  ? ("x" == e.flip || "y" == e.flip
                      ? (e.offset =
                          null == e.offset ? r.bbox()["c" + e.flip] : e.offset)
                      : null == e.offset
                      ? ((n = r.bbox()), (e.flip = n.cx), (e.offset = n.cy))
                      : (e.flip = e.offset),
                    (s = new a.Matrix().flip(e.flip, e.offset)))
                  : (null == e.x && null == e.y) ||
                    (s = new a.Translate(e.x, e.y)),
                s
                  ? ((s.relative = i),
                    this.last().transforms.push(s),
                    this._callStart())
                  : this);
          },
        }),
        a.extend(a.Element, {
          untransform: function () {
            return this.attr("transform", null);
          },
          matrixify: function () {
            return (this.attr("transform") || "")
              .split(a.regex.transforms)
              .slice(0, -1)
              .map(function (t) {
                var e = t.trim().split("(");
                return [
                  e[0],
                  e[1].split(a.regex.delimiter).map(function (t) {
                    return parseFloat(t);
                  }),
                ];
              })
              .reduce(function (t, e) {
                return "matrix" == e[0]
                  ? t.multiply(p(e[1]))
                  : t[e[0]].apply(t, e[1]);
              }, new a.Matrix());
          },
          toParent: function (t) {
            if (this == t) return this;
            var e = this.screenCTM(),
              i = t.screenCTM().inverse();
            return this.addTo(t).untransform().transform(i.multiply(e)), this;
          },
          toDoc: function () {
            return this.toParent(this.doc());
          },
        }),
        (a.Transformation = a.invent({
          create: function (e, i) {
            if (arguments.length > 1 && "boolean" != typeof i)
              return this.constructor.call(this, [].slice.call(arguments));
            if (Array.isArray(e))
              for (var a = 0, s = this.arguments.length; a < s; ++a)
                this[this.arguments[a]] = e[a];
            else if ("object" === t(e))
              for (a = 0, s = this.arguments.length; a < s; ++a)
                this[this.arguments[a]] = e[this.arguments[a]];
            (this.inversed = !1), !0 === i && (this.inversed = !0);
          },
          extend: {
            arguments: [],
            method: "",
            at: function (t) {
              for (var e = [], i = 0, s = this.arguments.length; i < s; ++i)
                e.push(this[this.arguments[i]]);
              var n = this._undo || new a.Matrix();
              return (
                (n = new a.Matrix()
                  .morph(a.Matrix.prototype[this.method].apply(n, e))
                  .at(t)),
                this.inversed ? n.inverse() : n
              );
            },
            undo: function (t) {
              for (var e = 0, i = this.arguments.length; e < i; ++e)
                t[this.arguments[e]] =
                  void 0 === this[this.arguments[e]] ? 0 : t[this.arguments[e]];
              return (
                (t.cx = this.cx),
                (t.cy = this.cy),
                (this._undo = new a[d(this.method)](t, !0).at(1)),
                this
              );
            },
          },
        })),
        (a.Translate = a.invent({
          parent: a.Matrix,
          inherit: a.Transformation,
          create: function (t, e) {
            this.constructor.apply(this, [].slice.call(arguments));
          },
          extend: {
            arguments: ["transformedX", "transformedY"],
            method: "translate",
          },
        })),
        (a.Rotate = a.invent({
          parent: a.Matrix,
          inherit: a.Transformation,
          create: function (t, e) {
            this.constructor.apply(this, [].slice.call(arguments));
          },
          extend: {
            arguments: ["rotation", "cx", "cy"],
            method: "rotate",
            at: function (t) {
              var e = new a.Matrix().rotate(
                new a.Number()
                  .morph(this.rotation - (this._undo ? this._undo.rotation : 0))
                  .at(t),
                this.cx,
                this.cy
              );
              return this.inversed ? e.inverse() : e;
            },
            undo: function (t) {
              return (this._undo = t), this;
            },
          },
        })),
        (a.Scale = a.invent({
          parent: a.Matrix,
          inherit: a.Transformation,
          create: function (t, e) {
            this.constructor.apply(this, [].slice.call(arguments));
          },
          extend: {
            arguments: ["scaleX", "scaleY", "cx", "cy"],
            method: "scale",
          },
        })),
        (a.Skew = a.invent({
          parent: a.Matrix,
          inherit: a.Transformation,
          create: function (t, e) {
            this.constructor.apply(this, [].slice.call(arguments));
          },
          extend: { arguments: ["skewX", "skewY", "cx", "cy"], method: "skew" },
        })),
        a.extend(a.Element, {
          style: function (e, i) {
            if (0 == arguments.length) return this.node.style.cssText || "";
            if (arguments.length < 2)
              if ("object" === t(e)) for (i in e) this.style(i, e[i]);
              else {
                if (!a.regex.isCss.test(e)) return this.node.style[c(e)];
                for (
                  e = e
                    .split(/\s*;\s*/)
                    .filter(function (t) {
                      return !!t;
                    })
                    .map(function (t) {
                      return t.split(/\s*:\s*/);
                    });
                  (i = e.pop());

                )
                  this.style(i[0], i[1]);
              }
            else
              this.node.style[c(e)] =
                null === i || a.regex.isBlank.test(i) ? "" : i;
            return this;
          },
        }),
        (a.Parent = a.invent({
          create: function (t) {
            this.constructor.call(this, t);
          },
          inherit: a.Element,
          extend: {
            children: function () {
              return a.utils.map(
                a.utils.filterSVGElements(this.node.childNodes),
                function (t) {
                  return a.adopt(t);
                }
              );
            },
            add: function (t, e) {
              return (
                null == e
                  ? this.node.appendChild(t.node)
                  : t.node != this.node.childNodes[e] &&
                    this.node.insertBefore(t.node, this.node.childNodes[e]),
                this
              );
            },
            put: function (t, e) {
              return this.add(t, e), t;
            },
            has: function (t) {
              return this.index(t) >= 0;
            },
            index: function (t) {
              return [].slice.call(this.node.childNodes).indexOf(t.node);
            },
            get: function (t) {
              return a.adopt(this.node.childNodes[t]);
            },
            first: function () {
              return this.get(0);
            },
            last: function () {
              return this.get(this.node.childNodes.length - 1);
            },
            each: function (t, e) {
              var i,
                s,
                n = this.children();
              for (i = 0, s = n.length; i < s; i++)
                n[i] instanceof a.Element && t.apply(n[i], [i, n]),
                  e && n[i] instanceof a.Container && n[i].each(t, e);
              return this;
            },
            removeElement: function (t) {
              return this.node.removeChild(t.node), this;
            },
            clear: function () {
              for (; this.node.hasChildNodes(); )
                this.node.removeChild(this.node.lastChild);
              return delete this._defs, this;
            },
            defs: function () {
              return this.doc().defs();
            },
          },
        })),
        a.extend(a.Parent, {
          ungroup: function (t, e) {
            return 0 === e ||
              this instanceof a.Defs ||
              this.node == a.parser.draw
              ? this
              : ((t =
                  t || (this instanceof a.Doc ? this : this.parent(a.Parent))),
                (e = e || 1 / 0),
                this.each(function () {
                  return this instanceof a.Defs
                    ? this
                    : this instanceof a.Parent
                    ? this.ungroup(t, e - 1)
                    : this.toParent(t);
                }),
                this.node.firstChild || this.remove(),
                this);
          },
          flatten: function (t, e) {
            return this.ungroup(t, e);
          },
        }),
        (a.Container = a.invent({
          create: function (t) {
            this.constructor.call(this, t);
          },
          inherit: a.Parent,
        })),
        (a.ViewBox = a.invent({
          create: function (e) {
            var i,
              s,
              n,
              r,
              o,
              l,
              h,
              c = 1,
              d = 1,
              u = /[+-]?(?:\d+(?:\.\d*)?|\.\d+)(?:e[+-]?\d+)?/gi;
            if (e instanceof a.Element) {
              for (
                l = e,
                  h = e,
                  o = (e.attr("viewBox") || "").match(u),
                  e.bbox,
                  n = new a.Number(e.width()),
                  r = new a.Number(e.height());
                "%" == n.unit;

              )
                (c *= n.value),
                  (n = new a.Number(
                    l instanceof a.Doc
                      ? l.parent().offsetWidth
                      : l.parent().width()
                  )),
                  (l = l.parent());
              for (; "%" == r.unit; )
                (d *= r.value),
                  (r = new a.Number(
                    h instanceof a.Doc
                      ? h.parent().offsetHeight
                      : h.parent().height()
                  )),
                  (h = h.parent());
              (this.x = 0),
                (this.y = 0),
                (this.width = n * c),
                (this.height = r * d),
                (this.zoom = 1),
                o &&
                  ((i = parseFloat(o[0])),
                  (s = parseFloat(o[1])),
                  (n = parseFloat(o[2])),
                  (r = parseFloat(o[3])),
                  (this.zoom =
                    this.width / this.height > n / r
                      ? this.height / r
                      : this.width / n),
                  (this.x = i),
                  (this.y = s),
                  (this.width = n),
                  (this.height = r));
            } else
              (e =
                "string" == typeof e
                  ? e.match(u).map(function (t) {
                      return parseFloat(t);
                    })
                  : Array.isArray(e)
                  ? e
                  : "object" === t(e)
                  ? [e.x, e.y, e.width, e.height]
                  : 4 == arguments.length
                  ? [].slice.call(arguments)
                  : [0, 0, 0, 0]),
                (this.x = e[0]),
                (this.y = e[1]),
                (this.width = e[2]),
                (this.height = e[3]);
          },
          extend: {
            toString: function () {
              return (
                this.x + " " + this.y + " " + this.width + " " + this.height
              );
            },
            morph: function (t, e, i, s) {
              return (this.destination = new a.ViewBox(t, e, i, s)), this;
            },
            at: function (t) {
              return this.destination
                ? new a.ViewBox([
                    this.x + (this.destination.x - this.x) * t,
                    this.y + (this.destination.y - this.y) * t,
                    this.width + (this.destination.width - this.width) * t,
                    this.height + (this.destination.height - this.height) * t,
                  ])
                : this;
            },
          },
          parent: a.Container,
          construct: {
            viewbox: function (t, e, i, s) {
              return 0 == arguments.length
                ? new a.ViewBox(this)
                : this.attr("viewBox", new a.ViewBox(t, e, i, s));
            },
          },
        })),
        [
          "click",
          "dblclick",
          "mousedown",
          "mouseup",
          "mouseover",
          "mouseout",
          "mousemove",
          "touchstart",
          "touchmove",
          "touchleave",
          "touchend",
          "touchcancel",
        ].forEach(function (t) {
          a.Element.prototype[t] = function (e) {
            return a.on(this.node, t, e), this;
          };
        }),
        (a.listeners = []),
        (a.handlerMap = []),
        (a.listenerId = 0),
        (a.on = function (t, e, i, s, n) {
          var r = i.bind(s || t.instance || t),
            o = (a.handlerMap.indexOf(t) + 1 || a.handlerMap.push(t)) - 1,
            l = e.split(".")[0],
            h = e.split(".")[1] || "*";
          (a.listeners[o] = a.listeners[o] || {}),
            (a.listeners[o][l] = a.listeners[o][l] || {}),
            (a.listeners[o][l][h] = a.listeners[o][l][h] || {}),
            i._svgjsListenerId || (i._svgjsListenerId = ++a.listenerId),
            (a.listeners[o][l][h][i._svgjsListenerId] = r),
            t.addEventListener(l, r, n || !1);
        }),
        (a.off = function (t, e, i) {
          var s = a.handlerMap.indexOf(t),
            n = e && e.split(".")[0],
            r = e && e.split(".")[1],
            o = "";
          if (-1 != s)
            if (i) {
              if (("function" == typeof i && (i = i._svgjsListenerId), !i))
                return;
              a.listeners[s][n] &&
                a.listeners[s][n][r || "*"] &&
                (t.removeEventListener(n, a.listeners[s][n][r || "*"][i], !1),
                delete a.listeners[s][n][r || "*"][i]);
            } else if (r && n) {
              if (a.listeners[s][n] && a.listeners[s][n][r]) {
                for (i in a.listeners[s][n][r]) a.off(t, [n, r].join("."), i);
                delete a.listeners[s][n][r];
              }
            } else if (r)
              for (e in a.listeners[s])
                for (o in a.listeners[s][e])
                  r === o && a.off(t, [e, r].join("."));
            else if (n) {
              if (a.listeners[s][n]) {
                for (o in a.listeners[s][n]) a.off(t, [n, o].join("."));
                delete a.listeners[s][n];
              }
            } else {
              for (e in a.listeners[s]) a.off(t, e);
              delete a.listeners[s], delete a.handlerMap[s];
            }
        }),
        a.extend(a.Element, {
          on: function (t, e, i, s) {
            return a.on(this.node, t, e, i, s), this;
          },
          off: function (t, e) {
            return a.off(this.node, t, e), this;
          },
          fire: function (t, i) {
            return (
              t instanceof e.Event
                ? this.node.dispatchEvent(t)
                : this.node.dispatchEvent(
                    (t = new a.CustomEvent(t, { detail: i, cancelable: !0 }))
                  ),
              (this._event = t),
              this
            );
          },
          event: function () {
            return this._event;
          },
        }),
        (a.Defs = a.invent({ create: "defs", inherit: a.Container })),
        (a.G = a.invent({
          create: "g",
          inherit: a.Container,
          extend: {
            x: function (t) {
              return null == t
                ? this.transform("x")
                : this.transform({ x: t - this.x() }, !0);
            },
            y: function (t) {
              return null == t
                ? this.transform("y")
                : this.transform({ y: t - this.y() }, !0);
            },
            cx: function (t) {
              return null == t
                ? this.gbox().cx
                : this.x(t - this.gbox().width / 2);
            },
            cy: function (t) {
              return null == t
                ? this.gbox().cy
                : this.y(t - this.gbox().height / 2);
            },
            gbox: function () {
              var t = this.bbox(),
                e = this.transform();
              return (
                (t.x += e.x),
                (t.x2 += e.x),
                (t.cx += e.x),
                (t.y += e.y),
                (t.y2 += e.y),
                (t.cy += e.y),
                t
              );
            },
          },
          construct: {
            group: function () {
              return this.put(new a.G());
            },
          },
        })),
        (a.Doc = a.invent({
          create: function (t) {
            t &&
              ("svg" ==
              (t = "string" == typeof t ? i.getElementById(t) : t).nodeName
                ? this.constructor.call(this, t)
                : (this.constructor.call(this, a.create("svg")),
                  t.appendChild(this.node),
                  this.size("100%", "100%")),
              this.namespace().defs());
          },
          inherit: a.Container,
          extend: {
            namespace: function () {
              return this.attr({ xmlns: a.ns, version: "1.1" })
                .attr("xmlns:xlink", a.xlink, a.xmlns)
                .attr("xmlns:svgjs", a.svgjs, a.xmlns);
            },
            defs: function () {
              var t;
              this._defs ||
                ((t = this.node.getElementsByTagName("defs")[0])
                  ? (this._defs = a.adopt(t))
                  : (this._defs = new a.Defs()),
                this.node.appendChild(this._defs.node));
              return this._defs;
            },
            parent: function () {
              return this.node.parentNode &&
                "#document" != this.node.parentNode.nodeName
                ? this.node.parentNode
                : null;
            },
            spof: function () {
              var t = this.node.getScreenCTM();
              return (
                t &&
                  this.style("left", (-t.e % 1) + "px").style(
                    "top",
                    (-t.f % 1) + "px"
                  ),
                this
              );
            },
            remove: function () {
              return (
                this.parent() && this.parent().removeChild(this.node), this
              );
            },
            clear: function () {
              for (; this.node.hasChildNodes(); )
                this.node.removeChild(this.node.lastChild);
              return (
                delete this._defs,
                a.parser.draw &&
                  !a.parser.draw.parentNode &&
                  this.node.appendChild(a.parser.draw),
                this
              );
            },
            clone: function (t) {
              this.writeDataToDom();
              var e = this.node,
                i = b(e.cloneNode(!0));
              return (
                t
                  ? (t.node || t).appendChild(i.node)
                  : e.parentNode.insertBefore(i.node, e.nextSibling),
                i
              );
            },
          },
        })),
        a.extend(a.Element, {
          siblings: function () {
            return this.parent().children();
          },
          position: function () {
            return this.parent().index(this);
          },
          next: function () {
            return this.siblings()[this.position() + 1];
          },
          previous: function () {
            return this.siblings()[this.position() - 1];
          },
          forward: function () {
            var t = this.position() + 1,
              e = this.parent();
            return (
              e.removeElement(this).add(this, t),
              e instanceof a.Doc && e.node.appendChild(e.defs().node),
              this
            );
          },
          backward: function () {
            var t = this.position();
            return (
              t > 0 &&
                this.parent()
                  .removeElement(this)
                  .add(this, t - 1),
              this
            );
          },
          front: function () {
            var t = this.parent();
            return (
              t.node.appendChild(this.node),
              t instanceof a.Doc && t.node.appendChild(t.defs().node),
              this
            );
          },
          back: function () {
            return (
              this.position() > 0 &&
                this.parent().removeElement(this).add(this, 0),
              this
            );
          },
          before: function (t) {
            t.remove();
            var e = this.position();
            return this.parent().add(t, e), this;
          },
          after: function (t) {
            t.remove();
            var e = this.position();
            return this.parent().add(t, e + 1), this;
          },
        }),
        (a.Mask = a.invent({
          create: function () {
            this.constructor.call(this, a.create("mask")), (this.targets = []);
          },
          inherit: a.Container,
          extend: {
            remove: function () {
              for (var t = this.targets.length - 1; t >= 0; t--)
                this.targets[t] && this.targets[t].unmask();
              return (
                (this.targets = []), a.Element.prototype.remove.call(this), this
              );
            },
          },
          construct: {
            mask: function () {
              return this.defs().put(new a.Mask());
            },
          },
        })),
        a.extend(a.Element, {
          maskWith: function (t) {
            return (
              (this.masker =
                t instanceof a.Mask ? t : this.parent().mask().add(t)),
              this.masker.targets.push(this),
              this.attr("mask", 'url("#' + this.masker.attr("id") + '")')
            );
          },
          unmask: function () {
            return delete this.masker, this.attr("mask", null);
          },
        }),
        (a.ClipPath = a.invent({
          create: function () {
            this.constructor.call(this, a.create("clipPath")),
              (this.targets = []);
          },
          inherit: a.Container,
          extend: {
            remove: function () {
              for (var t = this.targets.length - 1; t >= 0; t--)
                this.targets[t] && this.targets[t].unclip();
              return (
                (this.targets = []), this.parent().removeElement(this), this
              );
            },
          },
          construct: {
            clip: function () {
              return this.defs().put(new a.ClipPath());
            },
          },
        })),
        a.extend(a.Element, {
          clipWith: function (t) {
            return (
              (this.clipper =
                t instanceof a.ClipPath ? t : this.parent().clip().add(t)),
              this.clipper.targets.push(this),
              this.attr("clip-path", 'url("#' + this.clipper.attr("id") + '")')
            );
          },
          unclip: function () {
            return delete this.clipper, this.attr("clip-path", null);
          },
        }),
        (a.Gradient = a.invent({
          create: function (t) {
            this.constructor.call(this, a.create(t + "Gradient")),
              (this.type = t);
          },
          inherit: a.Container,
          extend: {
            at: function (t, e, i) {
              return this.put(new a.Stop()).update(t, e, i);
            },
            update: function (t) {
              return (
                this.clear(), "function" == typeof t && t.call(this, this), this
              );
            },
            fill: function () {
              return "url(#" + this.id() + ")";
            },
            toString: function () {
              return this.fill();
            },
            attr: function (t, e, i) {
              return (
                "transform" == t && (t = "gradientTransform"),
                a.Container.prototype.attr.call(this, t, e, i)
              );
            },
          },
          construct: {
            gradient: function (t, e) {
              return this.defs().gradient(t, e);
            },
          },
        })),
        a.extend(a.Gradient, a.FX, {
          from: function (t, e) {
            return "radial" == (this._target || this).type
              ? this.attr({ fx: new a.Number(t), fy: new a.Number(e) })
              : this.attr({ x1: new a.Number(t), y1: new a.Number(e) });
          },
          to: function (t, e) {
            return "radial" == (this._target || this).type
              ? this.attr({ cx: new a.Number(t), cy: new a.Number(e) })
              : this.attr({ x2: new a.Number(t), y2: new a.Number(e) });
          },
        }),
        a.extend(a.Defs, {
          gradient: function (t, e) {
            return this.put(new a.Gradient(t)).update(e);
          },
        }),
        (a.Stop = a.invent({
          create: "stop",
          inherit: a.Element,
          extend: {
            update: function (t) {
              return (
                ("number" == typeof t || t instanceof a.Number) &&
                  (t = {
                    offset: arguments[0],
                    color: arguments[1],
                    opacity: arguments[2],
                  }),
                null != t.opacity && this.attr("stop-opacity", t.opacity),
                null != t.color && this.attr("stop-color", t.color),
                null != t.offset && this.attr("offset", new a.Number(t.offset)),
                this
              );
            },
          },
        })),
        (a.Pattern = a.invent({
          create: "pattern",
          inherit: a.Container,
          extend: {
            fill: function () {
              return "url(#" + this.id() + ")";
            },
            update: function (t) {
              return (
                this.clear(), "function" == typeof t && t.call(this, this), this
              );
            },
            toString: function () {
              return this.fill();
            },
            attr: function (t, e, i) {
              return (
                "transform" == t && (t = "patternTransform"),
                a.Container.prototype.attr.call(this, t, e, i)
              );
            },
          },
          construct: {
            pattern: function (t, e, i) {
              return this.defs().pattern(t, e, i);
            },
          },
        })),
        a.extend(a.Defs, {
          pattern: function (t, e, i) {
            return this.put(new a.Pattern()).update(i).attr({
              x: 0,
              y: 0,
              width: t,
              height: e,
              patternUnits: "userSpaceOnUse",
            });
          },
        }),
        (a.Shape = a.invent({
          create: function (t) {
            this.constructor.call(this, t);
          },
          inherit: a.Element,
        })),
        (a.Bare = a.invent({
          create: function (t, e) {
            if ((this.constructor.call(this, a.create(t)), e))
              for (var i in e.prototype)
                "function" == typeof e.prototype[i] &&
                  (this[i] = e.prototype[i]);
          },
          inherit: a.Element,
          extend: {
            words: function (t) {
              for (; this.node.hasChildNodes(); )
                this.node.removeChild(this.node.lastChild);
              return this.node.appendChild(i.createTextNode(t)), this;
            },
          },
        })),
        a.extend(a.Parent, {
          element: function (t, e) {
            return this.put(new a.Bare(t, e));
          },
        }),
        (a.Symbol = a.invent({
          create: "symbol",
          inherit: a.Container,
          construct: {
            symbol: function () {
              return this.put(new a.Symbol());
            },
          },
        })),
        (a.Use = a.invent({
          create: "use",
          inherit: a.Shape,
          extend: {
            element: function (t, e) {
              return this.attr("href", (e || "") + "#" + t, a.xlink);
            },
          },
          construct: {
            use: function (t, e) {
              return this.put(new a.Use()).element(t, e);
            },
          },
        })),
        (a.Rect = a.invent({
          create: "rect",
          inherit: a.Shape,
          construct: {
            rect: function (t, e) {
              return this.put(new a.Rect()).size(t, e);
            },
          },
        })),
        (a.Circle = a.invent({
          create: "circle",
          inherit: a.Shape,
          construct: {
            circle: function (t) {
              return this.put(new a.Circle())
                .rx(new a.Number(t).divide(2))
                .move(0, 0);
            },
          },
        })),
        a.extend(a.Circle, a.FX, {
          rx: function (t) {
            return this.attr("r", t);
          },
          ry: function (t) {
            return this.rx(t);
          },
        }),
        (a.Ellipse = a.invent({
          create: "ellipse",
          inherit: a.Shape,
          construct: {
            ellipse: function (t, e) {
              return this.put(new a.Ellipse()).size(t, e).move(0, 0);
            },
          },
        })),
        a.extend(a.Ellipse, a.Rect, a.FX, {
          rx: function (t) {
            return this.attr("rx", t);
          },
          ry: function (t) {
            return this.attr("ry", t);
          },
        }),
        a.extend(a.Circle, a.Ellipse, {
          x: function (t) {
            return null == t ? this.cx() - this.rx() : this.cx(t + this.rx());
          },
          y: function (t) {
            return null == t ? this.cy() - this.ry() : this.cy(t + this.ry());
          },
          cx: function (t) {
            return null == t ? this.attr("cx") : this.attr("cx", t);
          },
          cy: function (t) {
            return null == t ? this.attr("cy") : this.attr("cy", t);
          },
          width: function (t) {
            return null == t
              ? 2 * this.rx()
              : this.rx(new a.Number(t).divide(2));
          },
          height: function (t) {
            return null == t
              ? 2 * this.ry()
              : this.ry(new a.Number(t).divide(2));
          },
          size: function (t, e) {
            var i = g(this, t, e);
            return this.rx(new a.Number(i.width).divide(2)).ry(
              new a.Number(i.height).divide(2)
            );
          },
        }),
        (a.Line = a.invent({
          create: "line",
          inherit: a.Shape,
          extend: {
            array: function () {
              return new a.PointArray([
                [this.attr("x1"), this.attr("y1")],
                [this.attr("x2"), this.attr("y2")],
              ]);
            },
            plot: function (t, e, i, s) {
              return null == t
                ? this.array()
                : ((t =
                    void 0 !== e
                      ? { x1: t, y1: e, x2: i, y2: s }
                      : new a.PointArray(t).toLine()),
                  this.attr(t));
            },
            move: function (t, e) {
              return this.attr(this.array().move(t, e).toLine());
            },
            size: function (t, e) {
              var i = g(this, t, e);
              return this.attr(this.array().size(i.width, i.height).toLine());
            },
          },
          construct: {
            line: function (t, e, i, s) {
              return a.Line.prototype.plot.apply(
                this.put(new a.Line()),
                null != t ? [t, e, i, s] : [0, 0, 0, 0]
              );
            },
          },
        })),
        (a.Polyline = a.invent({
          create: "polyline",
          inherit: a.Shape,
          construct: {
            polyline: function (t) {
              return this.put(new a.Polyline()).plot(t || new a.PointArray());
            },
          },
        })),
        (a.Polygon = a.invent({
          create: "polygon",
          inherit: a.Shape,
          construct: {
            polygon: function (t) {
              return this.put(new a.Polygon()).plot(t || new a.PointArray());
            },
          },
        })),
        a.extend(a.Polyline, a.Polygon, {
          array: function () {
            return (
              this._array ||
              (this._array = new a.PointArray(this.attr("points")))
            );
          },
          plot: function (t) {
            return null == t
              ? this.array()
              : this.clear().attr(
                  "points",
                  "string" == typeof t ? t : (this._array = new a.PointArray(t))
                );
          },
          clear: function () {
            return delete this._array, this;
          },
          move: function (t, e) {
            return this.attr("points", this.array().move(t, e));
          },
          size: function (t, e) {
            var i = g(this, t, e);
            return this.attr("points", this.array().size(i.width, i.height));
          },
        }),
        a.extend(a.Line, a.Polyline, a.Polygon, {
          morphArray: a.PointArray,
          x: function (t) {
            return null == t ? this.bbox().x : this.move(t, this.bbox().y);
          },
          y: function (t) {
            return null == t ? this.bbox().y : this.move(this.bbox().x, t);
          },
          width: function (t) {
            var e = this.bbox();
            return null == t ? e.width : this.size(t, e.height);
          },
          height: function (t) {
            var e = this.bbox();
            return null == t ? e.height : this.size(e.width, t);
          },
        }),
        (a.Path = a.invent({
          create: "path",
          inherit: a.Shape,
          extend: {
            morphArray: a.PathArray,
            array: function () {
              return (
                this._array || (this._array = new a.PathArray(this.attr("d")))
              );
            },
            plot: function (t) {
              return null == t
                ? this.array()
                : this.clear().attr(
                    "d",
                    "string" == typeof t
                      ? t
                      : (this._array = new a.PathArray(t))
                  );
            },
            clear: function () {
              return delete this._array, this;
            },
            move: function (t, e) {
              return this.attr("d", this.array().move(t, e));
            },
            x: function (t) {
              return null == t ? this.bbox().x : this.move(t, this.bbox().y);
            },
            y: function (t) {
              return null == t ? this.bbox().y : this.move(this.bbox().x, t);
            },
            size: function (t, e) {
              var i = g(this, t, e);
              return this.attr("d", this.array().size(i.width, i.height));
            },
            width: function (t) {
              return null == t
                ? this.bbox().width
                : this.size(t, this.bbox().height);
            },
            height: function (t) {
              return null == t
                ? this.bbox().height
                : this.size(this.bbox().width, t);
            },
          },
          construct: {
            path: function (t) {
              return this.put(new a.Path()).plot(t || new a.PathArray());
            },
          },
        })),
        (a.Image = a.invent({
          create: "image",
          inherit: a.Shape,
          extend: {
            load: function (t) {
              if (!t) return this;
              var i = this,
                s = new e.Image();
              return (
                a.on(s, "load", function () {
                  a.off(s);
                  var e = i.parent(a.Pattern);
                  null !== e &&
                    (0 == i.width() &&
                      0 == i.height() &&
                      i.size(s.width, s.height),
                    e &&
                      0 == e.width() &&
                      0 == e.height() &&
                      e.size(i.width(), i.height()),
                    "function" == typeof i._loaded &&
                      i._loaded.call(i, {
                        width: s.width,
                        height: s.height,
                        ratio: s.width / s.height,
                        url: t,
                      }));
                }),
                a.on(s, "error", function (t) {
                  a.off(s),
                    "function" == typeof i._error && i._error.call(i, t);
                }),
                this.attr("href", (s.src = this.src = t), a.xlink)
              );
            },
            loaded: function (t) {
              return (this._loaded = t), this;
            },
            error: function (t) {
              return (this._error = t), this;
            },
          },
          construct: {
            image: function (t, e, i) {
              return this.put(new a.Image())
                .load(t)
                .size(e || 0, i || e || 0);
            },
          },
        })),
        (a.Text = a.invent({
          create: function () {
            this.constructor.call(this, a.create("text")),
              (this.dom.leading = new a.Number(1.3)),
              (this._rebuild = !0),
              (this._build = !1),
              this.attr("font-family", a.defaults.attrs["font-family"]);
          },
          inherit: a.Shape,
          extend: {
            x: function (t) {
              return null == t ? this.attr("x") : this.attr("x", t);
            },
            y: function (t) {
              var e = this.attr("y"),
                i = "number" == typeof e ? e - this.bbox().y : 0;
              return null == t
                ? "number" == typeof e
                  ? e - i
                  : e
                : this.attr("y", "number" == typeof t.valueOf() ? t + i : t);
            },
            cx: function (t) {
              return null == t
                ? this.bbox().cx
                : this.x(t - this.bbox().width / 2);
            },
            cy: function (t) {
              return null == t
                ? this.bbox().cy
                : this.y(t - this.bbox().height / 2);
            },
            text: function (t) {
              if (void 0 === t) {
                t = "";
                for (
                  var e = this.node.childNodes, i = 0, s = e.length;
                  i < s;
                  ++i
                )
                  0 != i &&
                    3 != e[i].nodeType &&
                    1 == a.adopt(e[i]).dom.newLined &&
                    (t += "\n"),
                    (t += e[i].textContent);
                return t;
              }
              if ((this.clear().build(!0), "function" == typeof t))
                t.call(this, this);
              else {
                i = 0;
                for (var n = (t = t.split("\n")).length; i < n; i++)
                  this.tspan(t[i]).newLine();
              }
              return this.build(!1).rebuild();
            },
            size: function (t) {
              return this.attr("font-size", t).rebuild();
            },
            leading: function (t) {
              return null == t
                ? this.dom.leading
                : ((this.dom.leading = new a.Number(t)), this.rebuild());
            },
            lines: function () {
              var t = ((this.textPath && this.textPath()) || this).node,
                e = a.utils.map(
                  a.utils.filterSVGElements(t.childNodes),
                  function (t) {
                    return a.adopt(t);
                  }
                );
              return new a.Set(e);
            },
            rebuild: function (t) {
              if (
                ("boolean" == typeof t && (this._rebuild = t), this._rebuild)
              ) {
                var e = this,
                  i = 0,
                  s = this.dom.leading * new a.Number(this.attr("font-size"));
                this.lines().each(function () {
                  this.dom.newLined &&
                    (e.textPath() || this.attr("x", e.attr("x")),
                    "\n" == this.text()
                      ? (i += s)
                      : (this.attr("dy", s + i), (i = 0)));
                }),
                  this.fire("rebuild");
              }
              return this;
            },
            build: function (t) {
              return (this._build = !!t), this;
            },
            setData: function (t) {
              return (
                (this.dom = t),
                (this.dom.leading = new a.Number(t.leading || 1.3)),
                this
              );
            },
          },
          construct: {
            text: function (t) {
              return this.put(new a.Text()).text(t);
            },
            plain: function (t) {
              return this.put(new a.Text()).plain(t);
            },
          },
        })),
        (a.Tspan = a.invent({
          create: "tspan",
          inherit: a.Shape,
          extend: {
            text: function (t) {
              return null == t
                ? this.node.textContent + (this.dom.newLined ? "\n" : "")
                : ("function" == typeof t ? t.call(this, this) : this.plain(t),
                  this);
            },
            dx: function (t) {
              return this.attr("dx", t);
            },
            dy: function (t) {
              return this.attr("dy", t);
            },
            newLine: function () {
              var t = this.parent(a.Text);
              return (
                (this.dom.newLined = !0),
                this.dy(t.dom.leading * t.attr("font-size")).attr("x", t.x())
              );
            },
          },
        })),
        a.extend(a.Text, a.Tspan, {
          plain: function (t) {
            return (
              !1 === this._build && this.clear(),
              this.node.appendChild(i.createTextNode(t)),
              this
            );
          },
          tspan: function (t) {
            var e = ((this.textPath && this.textPath()) || this).node,
              i = new a.Tspan();
            return (
              !1 === this._build && this.clear(),
              e.appendChild(i.node),
              i.text(t)
            );
          },
          clear: function () {
            for (
              var t = ((this.textPath && this.textPath()) || this).node;
              t.hasChildNodes();

            )
              t.removeChild(t.lastChild);
            return this;
          },
          length: function () {
            return this.node.getComputedTextLength();
          },
        }),
        (a.TextPath = a.invent({
          create: "textPath",
          inherit: a.Parent,
          parent: a.Text,
          construct: {
            morphArray: a.PathArray,
            path: function (t) {
              for (
                var e = new a.TextPath(), i = this.doc().defs().path(t);
                this.node.hasChildNodes();

              )
                e.node.appendChild(this.node.firstChild);
              return (
                this.node.appendChild(e.node),
                e.attr("href", "#" + i, a.xlink),
                this
              );
            },
            array: function () {
              var t = this.track();
              return t ? t.array() : null;
            },
            plot: function (t) {
              var e = this.track(),
                i = null;
              return e && (i = e.plot(t)), null == t ? i : this;
            },
            track: function () {
              var t = this.textPath();
              if (t) return t.reference("href");
            },
            textPath: function () {
              if (
                this.node.firstChild &&
                "textPath" == this.node.firstChild.nodeName
              )
                return a.adopt(this.node.firstChild);
            },
          },
        })),
        (a.Nested = a.invent({
          create: function () {
            this.constructor.call(this, a.create("svg")),
              this.style("overflow", "visible");
          },
          inherit: a.Container,
          construct: {
            nested: function () {
              return this.put(new a.Nested());
            },
          },
        })),
        (a.A = a.invent({
          create: "a",
          inherit: a.Container,
          extend: {
            to: function (t) {
              return this.attr("href", t, a.xlink);
            },
            show: function (t) {
              return this.attr("show", t, a.xlink);
            },
            target: function (t) {
              return this.attr("target", t);
            },
          },
          construct: {
            link: function (t) {
              return this.put(new a.A()).to(t);
            },
          },
        })),
        a.extend(a.Element, {
          linkTo: function (t) {
            var e = new a.A();
            return (
              "function" == typeof t ? t.call(e, e) : e.to(t),
              this.parent().put(e).put(this)
            );
          },
        }),
        (a.Marker = a.invent({
          create: "marker",
          inherit: a.Container,
          extend: {
            width: function (t) {
              return this.attr("markerWidth", t);
            },
            height: function (t) {
              return this.attr("markerHeight", t);
            },
            ref: function (t, e) {
              return this.attr("refX", t).attr("refY", e);
            },
            update: function (t) {
              return (
                this.clear(), "function" == typeof t && t.call(this, this), this
              );
            },
            toString: function () {
              return "url(#" + this.id() + ")";
            },
          },
          construct: {
            marker: function (t, e, i) {
              return this.defs().marker(t, e, i);
            },
          },
        })),
        a.extend(a.Defs, {
          marker: function (t, e, i) {
            return this.put(new a.Marker())
              .size(t, e)
              .ref(t / 2, e / 2)
              .viewbox(0, 0, t, e)
              .attr("orient", "auto")
              .update(i);
          },
        }),
        a.extend(a.Line, a.Polyline, a.Polygon, a.Path, {
          marker: function (t, e, i, s) {
            var n = ["marker"];
            return (
              "all" != t && n.push(t),
              (n = n.join("-")),
              (t =
                arguments[1] instanceof a.Marker
                  ? arguments[1]
                  : this.doc().marker(e, i, s)),
              this.attr(n, t)
            );
          },
        });
      var l = {
        stroke: [
          "color",
          "width",
          "opacity",
          "linecap",
          "linejoin",
          "miterlimit",
          "dasharray",
          "dashoffset",
        ],
        fill: ["color", "opacity", "rule"],
        prefix: function (t, e) {
          return "color" == e ? t : t + "-" + e;
        },
      };
      function h(t, e, i, s) {
        return i + s.replace(a.regex.dots, " .");
      }
      function c(t) {
        return t.toLowerCase().replace(/-(.)/g, function (t, e) {
          return e.toUpperCase();
        });
      }
      function d(t) {
        return t.charAt(0).toUpperCase() + t.slice(1);
      }
      function u(t) {
        var e = t.toString(16);
        return 1 == e.length ? "0" + e : e;
      }
      function g(t, e, i) {
        if (null == e || null == i) {
          var a = t.bbox();
          null == e
            ? (e = (a.width / a.height) * i)
            : null == i && (i = (a.height / a.width) * e);
        }
        return { width: e, height: i };
      }
      function f(t, e, i) {
        return { x: e * t.a + i * t.c + 0, y: e * t.b + i * t.d + 0 };
      }
      function p(t) {
        return { a: t[0], b: t[1], c: t[2], d: t[3], e: t[4], f: t[5] };
      }
      function x(t, e) {
        (t.cx = null == t.cx ? e.bbox().cx : t.cx),
          (t.cy = null == t.cy ? e.bbox().cy : t.cy);
      }
      function b(t) {
        for (var i = t.childNodes.length - 1; i >= 0; i--)
          t.childNodes[i] instanceof e.SVGElement && b(t.childNodes[i]);
        return a.adopt(t).id(a.eid(t.nodeName));
      }
      function m(t) {
        return (
          null == t.x && ((t.x = 0), (t.y = 0), (t.width = 0), (t.height = 0)),
          (t.w = t.width),
          (t.h = t.height),
          (t.x2 = t.x + t.width),
          (t.y2 = t.y + t.height),
          (t.cx = t.x + t.width / 2),
          (t.cy = t.y + t.height / 2),
          t
        );
      }
      function v(t) {
        return Math.abs(t) > 1e-37 ? t : 0;
      }
      ["fill", "stroke"].forEach(function (t) {
        var e,
          i = {};
        (i[t] = function (i) {
          if (void 0 === i) return this;
          if (
            "string" == typeof i ||
            a.Color.isRgb(i) ||
            (i && "function" == typeof i.fill)
          )
            this.attr(t, i);
          else
            for (e = l[t].length - 1; e >= 0; e--)
              null != i[l[t][e]] && this.attr(l.prefix(t, l[t][e]), i[l[t][e]]);
          return this;
        }),
          a.extend(a.Element, a.FX, i);
      }),
        a.extend(a.Element, a.FX, {
          rotate: function (t, e, i) {
            return this.transform({ rotation: t, cx: e, cy: i });
          },
          skew: function (t, e, i, a) {
            return 1 == arguments.length || 3 == arguments.length
              ? this.transform({ skew: t, cx: e, cy: i })
              : this.transform({ skewX: t, skewY: e, cx: i, cy: a });
          },
          scale: function (t, e, i, a) {
            return 1 == arguments.length || 3 == arguments.length
              ? this.transform({ scale: t, cx: e, cy: i })
              : this.transform({ scaleX: t, scaleY: e, cx: i, cy: a });
          },
          translate: function (t, e) {
            return this.transform({ x: t, y: e });
          },
          flip: function (t, e) {
            return (
              (e = "number" == typeof t ? t : e),
              this.transform({ flip: t || "both", offset: e })
            );
          },
          matrix: function (t) {
            return this.attr(
              "transform",
              new a.Matrix(6 == arguments.length ? [].slice.call(arguments) : t)
            );
          },
          opacity: function (t) {
            return this.attr("opacity", t);
          },
          dx: function (t) {
            return this.x(
              new a.Number(t).plus(this instanceof a.FX ? 0 : this.x()),
              !0
            );
          },
          dy: function (t) {
            return this.y(
              new a.Number(t).plus(this instanceof a.FX ? 0 : this.y()),
              !0
            );
          },
          dmove: function (t, e) {
            return this.dx(t).dy(e);
          },
        }),
        a.extend(a.Rect, a.Ellipse, a.Circle, a.Gradient, a.FX, {
          radius: function (t, e) {
            var i = (this._target || this).type;
            return "radial" == i || "circle" == i
              ? this.attr("r", new a.Number(t))
              : this.rx(t).ry(null == e ? t : e);
          },
        }),
        a.extend(a.Path, {
          length: function () {
            return this.node.getTotalLength();
          },
          pointAt: function (t) {
            return this.node.getPointAtLength(t);
          },
        }),
        a.extend(a.Parent, a.Text, a.Tspan, a.FX, {
          font: function (e, i) {
            if ("object" === t(e)) for (i in e) this.font(i, e[i]);
            return "leading" == e
              ? this.leading(i)
              : "anchor" == e
              ? this.attr("text-anchor", i)
              : "size" == e ||
                "family" == e ||
                "weight" == e ||
                "stretch" == e ||
                "variant" == e ||
                "style" == e
              ? this.attr("font-" + e, i)
              : this.attr(e, i);
          },
        }),
        (a.Set = a.invent({
          create: function (t) {
            Array.isArray(t) ? (this.members = t) : this.clear();
          },
          extend: {
            add: function () {
              var t,
                e,
                i = [].slice.call(arguments);
              for (t = 0, e = i.length; t < e; t++) this.members.push(i[t]);
              return this;
            },
            remove: function (t) {
              var e = this.index(t);
              return e > -1 && this.members.splice(e, 1), this;
            },
            each: function (t) {
              for (var e = 0, i = this.members.length; e < i; e++)
                t.apply(this.members[e], [e, this.members]);
              return this;
            },
            clear: function () {
              return (this.members = []), this;
            },
            length: function () {
              return this.members.length;
            },
            has: function (t) {
              return this.index(t) >= 0;
            },
            index: function (t) {
              return this.members.indexOf(t);
            },
            get: function (t) {
              return this.members[t];
            },
            first: function () {
              return this.get(0);
            },
            last: function () {
              return this.get(this.members.length - 1);
            },
            valueOf: function () {
              return this.members;
            },
            bbox: function () {
              if (0 == this.members.length) return new a.RBox();
              var t = this.members[0].rbox(this.members[0].doc());
              return (
                this.each(function () {
                  t = t.merge(this.rbox(this.doc()));
                }),
                t
              );
            },
          },
          construct: {
            set: function (t) {
              return new a.Set(t);
            },
          },
        })),
        (a.FX.Set = a.invent({
          create: function (t) {
            this.set = t;
          },
        })),
        (a.Set.inherit = function () {
          var t = [];
          for (var e in a.Shape.prototype)
            "function" == typeof a.Shape.prototype[e] &&
              "function" != typeof a.Set.prototype[e] &&
              t.push(e);
          for (var e in (t.forEach(function (t) {
            a.Set.prototype[t] = function () {
              for (var e = 0, i = this.members.length; e < i; e++)
                this.members[e] &&
                  "function" == typeof this.members[e][t] &&
                  this.members[e][t].apply(this.members[e], arguments);
              return "animate" == t
                ? this.fx || (this.fx = new a.FX.Set(this))
                : this;
            };
          }),
          (t = []),
          a.FX.prototype))
            "function" == typeof a.FX.prototype[e] &&
              "function" != typeof a.FX.Set.prototype[e] &&
              t.push(e);
          t.forEach(function (t) {
            a.FX.Set.prototype[t] = function () {
              for (var e = 0, i = this.set.members.length; e < i; e++)
                this.set.members[e].fx[t].apply(
                  this.set.members[e].fx,
                  arguments
                );
              return this;
            };
          });
        }),
        a.extend(a.Element, {
          data: function (e, i, a) {
            if ("object" === t(e)) for (i in e) this.data(i, e[i]);
            else if (arguments.length < 2)
              try {
                return JSON.parse(this.attr("data-" + e));
              } catch (t) {
                return this.attr("data-" + e);
              }
            else
              this.attr(
                "data-" + e,
                null === i
                  ? null
                  : !0 === a || "string" == typeof i || "number" == typeof i
                  ? i
                  : JSON.stringify(i)
              );
            return this;
          },
        }),
        a.extend(a.Element, {
          remember: function (e, i) {
            if ("object" === t(arguments[0]))
              for (var i in e) this.remember(i, e[i]);
            else {
              if (1 == arguments.length) return this.memory()[e];
              this.memory()[e] = i;
            }
            return this;
          },
          forget: function () {
            if (0 == arguments.length) this._memory = {};
            else
              for (var t = arguments.length - 1; t >= 0; t--)
                delete this.memory()[arguments[t]];
            return this;
          },
          memory: function () {
            return this._memory || (this._memory = {});
          },
        }),
        (a.get = function (t) {
          var e = i.getElementById(
            (function (t) {
              var e = (t || "").toString().match(a.regex.reference);
              if (e) return e[1];
            })(t) || t
          );
          return a.adopt(e);
        }),
        (a.select = function (t, e) {
          return new a.Set(
            a.utils.map((e || i).querySelectorAll(t), function (t) {
              return a.adopt(t);
            })
          );
        }),
        a.extend(a.Parent, {
          select: function (t) {
            return a.select(t, this.node);
          },
        });
      var y = "abcdef".split("");
      if ("function" != typeof e.CustomEvent) {
        var w = function (t, e) {
          e = e || { bubbles: !1, cancelable: !1, detail: void 0 };
          var a = i.createEvent("CustomEvent");
          return a.initCustomEvent(t, e.bubbles, e.cancelable, e.detail), a;
        };
        (w.prototype = e.Event.prototype), (a.CustomEvent = w);
      } else a.CustomEvent = e.CustomEvent;
      return (
        (function (t) {
          for (
            var i = 0, a = ["moz", "webkit"], s = 0;
            s < a.length && !e.requestAnimationFrame;
            ++s
          )
            (t.requestAnimationFrame = t[a[s] + "RequestAnimationFrame"]),
              (t.cancelAnimationFrame =
                t[a[s] + "CancelAnimationFrame"] ||
                t[a[s] + "CancelRequestAnimationFrame"]);
          (t.requestAnimationFrame =
            t.requestAnimationFrame ||
            function (e) {
              var a = new Date().getTime(),
                s = Math.max(0, 16 - (a - i)),
                n = t.setTimeout(function () {
                  e(a + s);
                }, s);
              return (i = a + s), n;
            }),
            (t.cancelAnimationFrame = t.cancelAnimationFrame || t.clearTimeout);
        })(e),
        a
      );
    }),
    "function" == typeof define && define.amd
      ? define(function () {
          return rt(nt, nt.document);
        })
      : "object" ===
          ("undefined" == typeof exports ? "undefined" : t(exports)) &&
        "undefined" != typeof module
      ? (module.exports = nt.document
          ? rt(nt, nt.document)
          : function (t) {
              return rt(t, t.document);
            })
      : (nt.SVG = rt(nt, nt.document)),
    function () {
      (SVG.Filter = SVG.invent({
        create: "filter",
        inherit: SVG.Parent,
        extend: {
          source: "SourceGraphic",
          sourceAlpha: "SourceAlpha",
          background: "BackgroundImage",
          backgroundAlpha: "BackgroundAlpha",
          fill: "FillPaint",
          stroke: "StrokePaint",
          autoSetIn: !0,
          put: function (t, e) {
            return (
              this.add(t, e),
              !t.attr("in") && this.autoSetIn && t.attr("in", this.source),
              t.attr("result") || t.attr("result", t),
              t
            );
          },
          blend: function (t, e, i) {
            return this.put(new SVG.BlendEffect(t, e, i));
          },
          colorMatrix: function (t, e) {
            return this.put(new SVG.ColorMatrixEffect(t, e));
          },
          convolveMatrix: function (t) {
            return this.put(new SVG.ConvolveMatrixEffect(t));
          },
          componentTransfer: function (t) {
            return this.put(new SVG.ComponentTransferEffect(t));
          },
          composite: function (t, e, i) {
            return this.put(new SVG.CompositeEffect(t, e, i));
          },
          flood: function (t, e) {
            return this.put(new SVG.FloodEffect(t, e));
          },
          offset: function (t, e) {
            return this.put(new SVG.OffsetEffect(t, e));
          },
          image: function (t) {
            return this.put(new SVG.ImageEffect(t));
          },
          merge: function () {
            var t = [void 0];
            for (var e in arguments) t.push(arguments[e]);
            return this.put(
              new (SVG.MergeEffect.bind.apply(SVG.MergeEffect, t))()
            );
          },
          gaussianBlur: function (t, e) {
            return this.put(new SVG.GaussianBlurEffect(t, e));
          },
          morphology: function (t, e) {
            return this.put(new SVG.MorphologyEffect(t, e));
          },
          diffuseLighting: function (t, e, i) {
            return this.put(new SVG.DiffuseLightingEffect(t, e, i));
          },
          displacementMap: function (t, e, i, a, s) {
            return this.put(new SVG.DisplacementMapEffect(t, e, i, a, s));
          },
          specularLighting: function (t, e, i, a) {
            return this.put(new SVG.SpecularLightingEffect(t, e, i, a));
          },
          tile: function () {
            return this.put(new SVG.TileEffect());
          },
          turbulence: function (t, e, i, a, s) {
            return this.put(new SVG.TurbulenceEffect(t, e, i, a, s));
          },
          toString: function () {
            return "url(#" + this.attr("id") + ")";
          },
        },
      })),
        SVG.extend(SVG.Defs, {
          filter: function (t) {
            var e = this.put(new SVG.Filter());
            return "function" == typeof t && t.call(e, e), e;
          },
        }),
        SVG.extend(SVG.Container, {
          filter: function (t) {
            return this.defs().filter(t);
          },
        }),
        SVG.extend(SVG.Element, SVG.G, SVG.Nested, {
          filter: function (t) {
            return (
              (this.filterer =
                t instanceof SVG.Element ? t : this.doc().filter(t)),
              this.doc() &&
                this.filterer.doc() !== this.doc() &&
                this.doc().defs().add(this.filterer),
              this.attr("filter", this.filterer),
              this.filterer
            );
          },
          unfilter: function (t) {
            return (
              this.filterer && !0 === t && this.filterer.remove(),
              delete this.filterer,
              this.attr("filter", null)
            );
          },
        }),
        (SVG.Effect = SVG.invent({
          create: function () {
            this.constructor.call(this);
          },
          inherit: SVG.Element,
          extend: {
            in: function (t) {
              return null == t
                ? (this.parent() &&
                    this.parent()
                      .select('[result="' + this.attr("in") + '"]')
                      .get(0)) ||
                    this.attr("in")
                : this.attr("in", t);
            },
            result: function (t) {
              return null == t ? this.attr("result") : this.attr("result", t);
            },
            toString: function () {
              return this.result();
            },
          },
        })),
        (SVG.ParentEffect = SVG.invent({
          create: function () {
            this.constructor.call(this);
          },
          inherit: SVG.Parent,
          extend: {
            in: function (t) {
              return null == t
                ? (this.parent() &&
                    this.parent()
                      .select('[result="' + this.attr("in") + '"]')
                      .get(0)) ||
                    this.attr("in")
                : this.attr("in", t);
            },
            result: function (t) {
              return null == t ? this.attr("result") : this.attr("result", t);
            },
            toString: function () {
              return this.result();
            },
          },
        }));
      var t = {
        blend: function (t, e) {
          return this.parent() && this.parent().blend(this, t, e);
        },
        colorMatrix: function (t, e) {
          return this.parent() && this.parent().colorMatrix(t, e).in(this);
        },
        convolveMatrix: function (t) {
          return this.parent() && this.parent().convolveMatrix(t).in(this);
        },
        componentTransfer: function (t) {
          return this.parent() && this.parent().componentTransfer(t).in(this);
        },
        composite: function (t, e) {
          return this.parent() && this.parent().composite(this, t, e);
        },
        flood: function (t, e) {
          return this.parent() && this.parent().flood(t, e);
        },
        offset: function (t, e) {
          return this.parent() && this.parent().offset(t, e).in(this);
        },
        image: function (t) {
          return this.parent() && this.parent().image(t);
        },
        merge: function () {
          return (
            this.parent() &&
            this.parent().merge.apply(this.parent(), [this].concat(arguments))
          );
        },
        gaussianBlur: function (t, e) {
          return this.parent() && this.parent().gaussianBlur(t, e).in(this);
        },
        morphology: function (t, e) {
          return this.parent() && this.parent().morphology(t, e).in(this);
        },
        diffuseLighting: function (t, e, i) {
          return (
            this.parent() && this.parent().diffuseLighting(t, e, i).in(this)
          );
        },
        displacementMap: function (t, e, i, a) {
          return (
            this.parent() && this.parent().displacementMap(this, t, e, i, a)
          );
        },
        specularLighting: function (t, e, i, a) {
          return (
            this.parent() && this.parent().specularLighting(t, e, i, a).in(this)
          );
        },
        tile: function () {
          return this.parent() && this.parent().tile().in(this);
        },
        turbulence: function (t, e, i, a, s) {
          return (
            this.parent() && this.parent().turbulence(t, e, i, a, s).in(this)
          );
        },
      };
      SVG.extend(SVG.Effect, t),
        SVG.extend(SVG.ParentEffect, t),
        (SVG.ChildEffect = SVG.invent({
          create: function () {
            this.constructor.call(this);
          },
          inherit: SVG.Element,
          extend: {
            in: function (t) {
              this.attr("in", t);
            },
          },
        }));
      var e = {
          blend: function (t, e, i) {
            this.attr({ in: t, in2: e, mode: i || "normal" });
          },
          colorMatrix: function (t, e) {
            "matrix" == t && (e = s(e)),
              this.attr({ type: t, values: void 0 === e ? null : e });
          },
          convolveMatrix: function (t) {
            (t = s(t)),
              this.attr({
                order: Math.sqrt(t.split(" ").length),
                kernelMatrix: t,
              });
          },
          composite: function (t, e, i) {
            this.attr({ in: t, in2: e, operator: i });
          },
          flood: function (t, e) {
            this.attr("flood-color", t),
              null != e && this.attr("flood-opacity", e);
          },
          offset: function (t, e) {
            this.attr({ dx: t, dy: e });
          },
          image: function (t) {
            this.attr("href", t, SVG.xlink);
          },
          displacementMap: function (t, e, i, a, s) {
            this.attr({
              in: t,
              in2: e,
              scale: i,
              xChannelSelector: a,
              yChannelSelector: s,
            });
          },
          gaussianBlur: function (t, e) {
            null != t || null != e
              ? this.attr(
                  "stdDeviation",
                  (function (t) {
                    if (!Array.isArray(t)) return t;
                    for (var e = 0, i = t.length, a = []; e < i; e++)
                      a.push(t[e]);
                    return a.join(" ");
                  })(Array.prototype.slice.call(arguments))
                )
              : this.attr("stdDeviation", "0 0");
          },
          morphology: function (t, e) {
            this.attr({ operator: t, radius: e });
          },
          tile: function () {},
          turbulence: function (t, e, i, a, s) {
            this.attr({
              numOctaves: e,
              seed: i,
              stitchTiles: a,
              baseFrequency: t,
              type: s,
            });
          },
        },
        i = {
          merge: function () {
            var t;
            if (arguments[0] instanceof SVG.Set) {
              var e = this;
              arguments[0].each(function (t) {
                this instanceof SVG.MergeNode
                  ? e.put(this)
                  : (this instanceof SVG.Effect ||
                      this instanceof SVG.ParentEffect) &&
                    e.put(new SVG.MergeNode(this));
              });
            } else {
              t = Array.isArray(arguments[0]) ? arguments[0] : arguments;
              for (var i = 0; i < t.length; i++)
                t[i] instanceof SVG.MergeNode
                  ? this.put(t[i])
                  : this.put(new SVG.MergeNode(t[i]));
            }
          },
          componentTransfer: function (t) {
            if (
              ((this.rgb = new SVG.Set()),
              ["r", "g", "b", "a"].forEach(
                function (t) {
                  (this[t] = new SVG["Func" + t.toUpperCase()]("identity")),
                    this.rgb.add(this[t]),
                    this.node.appendChild(this[t].node);
                }.bind(this)
              ),
              t)
            )
              for (var e in (t.rgb &&
                (["r", "g", "b"].forEach(
                  function (e) {
                    this[e].attr(t.rgb);
                  }.bind(this)
                ),
                delete t.rgb),
              t))
                this[e].attr(t[e]);
          },
          diffuseLighting: function (t, e, i) {
            this.attr({
              surfaceScale: t,
              diffuseConstant: e,
              kernelUnitLength: i,
            });
          },
          specularLighting: function (t, e, i, a) {
            this.attr({
              surfaceScale: t,
              diffuseConstant: e,
              specularExponent: i,
              kernelUnitLength: a,
            });
          },
        },
        a = {
          distantLight: function (t, e) {
            this.attr({ azimuth: t, elevation: e });
          },
          pointLight: function (t, e, i) {
            this.attr({ x: t, y: e, z: i });
          },
          spotLight: function (t, e, i, a, s, n) {
            this.attr({
              x: t,
              y: e,
              z: i,
              pointsAtX: a,
              pointsAtY: s,
              pointsAtZ: n,
            });
          },
          mergeNode: function (t) {
            this.attr("in", t);
          },
        };
      function s(t) {
        return (
          Array.isArray(t) && (t = new SVG.Array(t)),
          t
            .toString()
            .replace(/^\s+/, "")
            .replace(/\s+$/, "")
            .replace(/\s+/g, " ")
        );
      }
      function n() {
        var t = function () {};
        for (var e in ("function" == typeof arguments[arguments.length - 1] &&
          ((t = arguments[arguments.length - 1]),
          Array.prototype.splice.call(arguments, arguments.length - 1, 1)),
        arguments))
          for (var i in arguments[e]) t(arguments[e][i], i, arguments[e]);
      }
      ["r", "g", "b", "a"].forEach(function (t) {
        a["Func" + t.toUpperCase()] = function (t) {
          switch ((this.attr("type", t), t)) {
            case "table":
              this.attr("tableValues", arguments[1]);
              break;
            case "linear":
              this.attr("slope", arguments[1]),
                this.attr("intercept", arguments[2]);
              break;
            case "gamma":
              this.attr("amplitude", arguments[1]),
                this.attr("exponent", arguments[2]),
                this.attr("offset", arguments[2]);
          }
        };
      }),
        n(e, function (t, e) {
          var i = e.charAt(0).toUpperCase() + e.slice(1);
          SVG[i + "Effect"] = SVG.invent({
            create: function () {
              this.constructor.call(this, SVG.create("fe" + i)),
                t.apply(this, arguments),
                this.result(this.attr("id") + "Out");
            },
            inherit: SVG.Effect,
            extend: {},
          });
        }),
        n(i, function (t, e) {
          var i = e.charAt(0).toUpperCase() + e.slice(1);
          SVG[i + "Effect"] = SVG.invent({
            create: function () {
              this.constructor.call(this, SVG.create("fe" + i)),
                t.apply(this, arguments),
                this.result(this.attr("id") + "Out");
            },
            inherit: SVG.ParentEffect,
            extend: {},
          });
        }),
        n(a, function (t, e) {
          var i = e.charAt(0).toUpperCase() + e.slice(1);
          SVG[i] = SVG.invent({
            create: function () {
              this.constructor.call(this, SVG.create("fe" + i)),
                t.apply(this, arguments);
            },
            inherit: SVG.ChildEffect,
            extend: {},
          });
        }),
        SVG.extend(SVG.MergeEffect, {
          in: function (t) {
            return (
              t instanceof SVG.MergeNode
                ? this.add(t, 0)
                : this.add(new SVG.MergeNode(t), 0),
              this
            );
          },
        }),
        SVG.extend(
          SVG.CompositeEffect,
          SVG.BlendEffect,
          SVG.DisplacementMapEffect,
          {
            in2: function (t) {
              return null == t
                ? (this.parent() &&
                    this.parent()
                      .select('[result="' + this.attr("in2") + '"]')
                      .get(0)) ||
                    this.attr("in2")
                : this.attr("in2", t);
            },
          }
        ),
        (SVG.filter = {
          sepiatone: [
            0.343, 0.669, 0.119, 0, 0, 0.249, 0.626, 0.13, 0, 0, 0.172, 0.334,
            0.111, 0, 0, 0, 0, 0, 1, 0,
          ],
        });
    }.call(void 0),
    (function () {
      function t(t, s, n, r, o, l, h) {
        for (
          var c = t.slice(s, n || h),
            d = r.slice(o, l || h),
            u = 0,
            g = { pos: [0, 0], start: [0, 0] },
            f = { pos: [0, 0], start: [0, 0] };
          ;

        ) {
          if (
            ((c[u] = e.call(g, c[u])),
            (d[u] = e.call(f, d[u])),
            c[u][0] != d[u][0] ||
            "M" == c[u][0] ||
            ("A" == c[u][0] && (c[u][4] != d[u][4] || c[u][5] != d[u][5]))
              ? (Array.prototype.splice.apply(
                  c,
                  [u, 1].concat(a.call(g, c[u]))
                ),
                Array.prototype.splice.apply(d, [u, 1].concat(a.call(f, d[u]))))
              : ((c[u] = i.call(g, c[u])), (d[u] = i.call(f, d[u]))),
            ++u == c.length && u == d.length)
          )
            break;
          u == c.length &&
            c.push([
              "C",
              g.pos[0],
              g.pos[1],
              g.pos[0],
              g.pos[1],
              g.pos[0],
              g.pos[1],
            ]),
            u == d.length &&
              d.push([
                "C",
                f.pos[0],
                f.pos[1],
                f.pos[0],
                f.pos[1],
                f.pos[0],
                f.pos[1],
              ]);
        }
        return { start: c, dest: d };
      }
      function e(t) {
        switch (t[0]) {
          case "z":
          case "Z":
            (t[0] = "L"), (t[1] = this.start[0]), (t[2] = this.start[1]);
            break;
          case "H":
            (t[0] = "L"), (t[2] = this.pos[1]);
            break;
          case "V":
            (t[0] = "L"), (t[2] = t[1]), (t[1] = this.pos[0]);
            break;
          case "T":
            (t[0] = "Q"),
              (t[3] = t[1]),
              (t[4] = t[2]),
              (t[1] = this.reflection[1]),
              (t[2] = this.reflection[0]);
            break;
          case "S":
            (t[0] = "C"),
              (t[6] = t[4]),
              (t[5] = t[3]),
              (t[4] = t[2]),
              (t[3] = t[1]),
              (t[2] = this.reflection[1]),
              (t[1] = this.reflection[0]);
        }
        return t;
      }
      function i(t) {
        var e = t.length;
        return (
          (this.pos = [t[e - 2], t[e - 1]]),
          -1 != "SCQT".indexOf(t[0]) &&
            (this.reflection = [
              2 * this.pos[0] - t[e - 4],
              2 * this.pos[1] - t[e - 3],
            ]),
          t
        );
      }
      function a(t) {
        var e = [t];
        switch (t[0]) {
          case "M":
            return (this.pos = this.start = [t[1], t[2]]), e;
          case "L":
            (t[5] = t[3] = t[1]),
              (t[6] = t[4] = t[2]),
              (t[1] = this.pos[0]),
              (t[2] = this.pos[1]);
            break;
          case "Q":
            (t[6] = t[4]),
              (t[5] = t[3]),
              (t[4] = (1 * t[4]) / 3 + (2 * t[2]) / 3),
              (t[3] = (1 * t[3]) / 3 + (2 * t[1]) / 3),
              (t[2] = (1 * this.pos[1]) / 3 + (2 * t[2]) / 3),
              (t[1] = (1 * this.pos[0]) / 3 + (2 * t[1]) / 3);
            break;
          case "A":
            t = (e = (function (t, e) {
              var i,
                a,
                s,
                n,
                r,
                o,
                l,
                h,
                c,
                d,
                u,
                g,
                f,
                p,
                x,
                b,
                m,
                v,
                y,
                w,
                k,
                A,
                S,
                C,
                L,
                P,
                z = Math.abs(e[1]),
                E = Math.abs(e[2]),
                M = e[3] % 360,
                T = e[4],
                I = e[5],
                X = e[6],
                Y = e[7],
                F = new SVG.Point(t),
                R = new SVG.Point(X, Y),
                D = [];
              if (0 === z || 0 === E || (F.x === R.x && F.y === R.y))
                return [["C", F.x, F.y, R.x, R.y, R.x, R.y]];
              (i = new SVG.Point((F.x - R.x) / 2, (F.y - R.y) / 2).transform(
                new SVG.Matrix().rotate(M)
              )),
                (a = (i.x * i.x) / (z * z) + (i.y * i.y) / (E * E)) > 1 &&
                  ((a = Math.sqrt(a)), (z *= a), (E *= a));
              (s = new SVG.Matrix()
                .rotate(M)
                .scale(1 / z, 1 / E)
                .rotate(-M)),
                (F = F.transform(s)),
                (R = R.transform(s)),
                (n = [R.x - F.x, R.y - F.y]),
                (o = n[0] * n[0] + n[1] * n[1]),
                (r = Math.sqrt(o)),
                (n[0] /= r),
                (n[1] /= r),
                (l = o < 4 ? Math.sqrt(1 - o / 4) : 0),
                T === I && (l *= -1);
              (h = new SVG.Point(
                (R.x + F.x) / 2 + l * -n[1],
                (R.y + F.y) / 2 + l * n[0]
              )),
                (c = new SVG.Point(F.x - h.x, F.y - h.y)),
                (d = new SVG.Point(R.x - h.x, R.y - h.y)),
                (u = Math.acos(c.x / Math.sqrt(c.x * c.x + c.y * c.y))),
                c.y < 0 && (u *= -1);
              (g = Math.acos(d.x / Math.sqrt(d.x * d.x + d.y * d.y))),
                d.y < 0 && (g *= -1);
              I && u > g && (g += 2 * Math.PI);
              !I && u < g && (g -= 2 * Math.PI);
              for (
                p = Math.ceil((2 * Math.abs(u - g)) / Math.PI),
                  b = [],
                  m = u,
                  f = (g - u) / p,
                  x = (4 * Math.tan(f / 4)) / 3,
                  k = 0;
                k <= p;
                k++
              )
                (y = Math.cos(m)),
                  (v = Math.sin(m)),
                  (w = new SVG.Point(h.x + y, h.y + v)),
                  (b[k] = [
                    new SVG.Point(w.x + x * v, w.y - x * y),
                    w,
                    new SVG.Point(w.x - x * v, w.y + x * y),
                  ]),
                  (m += f);
              for (
                b[0][0] = b[0][1].clone(),
                  b[b.length - 1][2] = b[b.length - 1][1].clone(),
                  s = new SVG.Matrix().rotate(M).scale(z, E).rotate(-M),
                  k = 0,
                  A = b.length;
                k < A;
                k++
              )
                (b[k][0] = b[k][0].transform(s)),
                  (b[k][1] = b[k][1].transform(s)),
                  (b[k][2] = b[k][2].transform(s));
              for (k = 1, A = b.length; k < A; k++)
                (w = b[k - 1][2]),
                  (S = w.x),
                  (C = w.y),
                  (w = b[k][0]),
                  (L = w.x),
                  (P = w.y),
                  (w = b[k][1]),
                  (X = w.x),
                  (Y = w.y),
                  D.push(["C", S, C, L, P, X, Y]);
              return D;
            })(this.pos, t))[0];
        }
        return (
          (t[0] = "C"),
          (this.pos = [t[5], t[6]]),
          (this.reflection = [2 * t[5] - t[3], 2 * t[6] - t[4]]),
          e
        );
      }
      function s(t, e) {
        if (!1 === e) return !1;
        for (var i = e, a = t.length; i < a; ++i) if ("M" == t[i][0]) return i;
        return !1;
      }
      SVG.extend(SVG.PathArray, {
        morph: function (e) {
          for (
            var i = this.value, a = this.parse(e), n = 0, r = 0, o = !1, l = !1;
            !1 !== n || !1 !== r;

          ) {
            var h;
            (o = s(i, !1 !== n && n + 1)),
              (l = s(a, !1 !== r && r + 1)),
              !1 === n &&
                (n =
                  0 == (h = new SVG.PathArray(c.start).bbox()).height ||
                  0 == h.width
                    ? i.push(i[0]) - 1
                    : i.push(["M", h.x + h.width / 2, h.y + h.height / 2]) - 1),
              !1 === r &&
                (r =
                  0 == (h = new SVG.PathArray(c.dest).bbox()).height ||
                  0 == h.width
                    ? a.push(a[0]) - 1
                    : a.push(["M", h.x + h.width / 2, h.y + h.height / 2]) - 1);
            var c = t(i, n, o, a, r, l);
            (i = i.slice(0, n).concat(c.start, !1 === o ? [] : i.slice(o))),
              (a = a.slice(0, r).concat(c.dest, !1 === l ? [] : a.slice(l))),
              (n = !1 !== o && n + c.start.length),
              (r = !1 !== l && r + c.dest.length);
          }
          return (
            (this.value = i),
            (this.destination = new SVG.PathArray()),
            (this.destination.value = a),
            this
          );
        },
      });
    })(),
    function () {
      function t(t) {
        t.remember("_draggable", this), (this.el = t);
      }
      (t.prototype.init = function (t, e) {
        var i = this;
        (this.constraint = t),
          (this.value = e),
          this.el.on("mousedown.drag", function (t) {
            i.start(t);
          }),
          this.el.on("touchstart.drag", function (t) {
            i.start(t);
          });
      }),
        (t.prototype.transformPoint = function (t, e) {
          var i =
            ((t = t || window.event).changedTouches && t.changedTouches[0]) ||
            t;
          return (
            (this.p.x = i.clientX - (e || 0)),
            (this.p.y = i.clientY),
            this.p.matrixTransform(this.m)
          );
        }),
        (t.prototype.getBBox = function () {
          var t = this.el.bbox();
          return (
            this.el instanceof SVG.Nested && (t = this.el.rbox()),
            (this.el instanceof SVG.G ||
              this.el instanceof SVG.Use ||
              this.el instanceof SVG.Nested) &&
              ((t.x = this.el.x()), (t.y = this.el.y())),
            t
          );
        }),
        (t.prototype.start = function (t) {
          if (
            ("click" != t.type &&
              "mousedown" != t.type &&
              "mousemove" != t.type) ||
            1 == (t.which || t.buttons)
          ) {
            var e = this;
            if (
              (this.el.fire("beforedrag", { event: t, handler: this }),
              !this.el.event().defaultPrevented)
            ) {
              t.preventDefault(),
                t.stopPropagation(),
                (this.parent =
                  this.parent ||
                  this.el.parent(SVG.Nested) ||
                  this.el.parent(SVG.Doc)),
                (this.p = this.parent.node.createSVGPoint()),
                (this.m = this.el.node.getScreenCTM().inverse());
              var i,
                a = this.getBBox();
              if (this.el instanceof SVG.Text)
                switch (
                  ((i = this.el.node.getComputedTextLength()),
                  this.el.attr("text-anchor"))
                ) {
                  case "middle":
                    i /= 2;
                    break;
                  case "start":
                    i = 0;
                }
              (this.startPoints = {
                point: this.transformPoint(t, i),
                box: a,
                transform: this.el.transform(),
              }),
                SVG.on(window, "mousemove.drag", function (t) {
                  e.drag(t);
                }),
                SVG.on(window, "touchmove.drag", function (t) {
                  e.drag(t);
                }),
                SVG.on(window, "mouseup.drag", function (t) {
                  e.end(t);
                }),
                SVG.on(window, "touchend.drag", function (t) {
                  e.end(t);
                }),
                this.el.fire("dragstart", {
                  event: t,
                  p: this.startPoints.point,
                  m: this.m,
                  handler: this,
                });
            }
          }
        }),
        (t.prototype.drag = function (t) {
          var e = this.getBBox(),
            i = this.transformPoint(t),
            a = this.startPoints.box.x + i.x - this.startPoints.point.x,
            s = this.startPoints.box.y + i.y - this.startPoints.point.y,
            n = this.constraint,
            r = i.x - this.startPoints.point.x,
            o = i.y - this.startPoints.point.y;
          if (
            (this.el.fire("dragmove", {
              event: t,
              p: i,
              m: this.m,
              handler: this,
            }),
            this.el.event().defaultPrevented)
          )
            return i;
          if ("function" == typeof n) {
            var l = n.call(this.el, a, s, this.m);
            "boolean" == typeof l && (l = { x: l, y: l }),
              !0 === l.x ? this.el.x(a) : !1 !== l.x && this.el.x(l.x),
              !0 === l.y ? this.el.y(s) : !1 !== l.y && this.el.y(l.y);
          } else
            "object" == typeof n &&
              (null != n.minX && a < n.minX
                ? (r = (a = n.minX) - this.startPoints.box.x)
                : null != n.maxX &&
                  a > n.maxX - e.width &&
                  (r = (a = n.maxX - e.width) - this.startPoints.box.x),
              null != n.minY && s < n.minY
                ? (o = (s = n.minY) - this.startPoints.box.y)
                : null != n.maxY &&
                  s > n.maxY - e.height &&
                  (o = (s = n.maxY - e.height) - this.startPoints.box.y),
              null != n.snapToGrid &&
                ((a -= a % n.snapToGrid),
                (s -= s % n.snapToGrid),
                (r -= r % n.snapToGrid),
                (o -= o % n.snapToGrid)),
              this.el instanceof SVG.G
                ? this.el
                    .matrix(this.startPoints.transform)
                    .transform({ x: r, y: o }, !0)
                : this.el.move(a, s));
          return i;
        }),
        (t.prototype.end = function (t) {
          var e = this.drag(t);
          this.el.fire("dragend", { event: t, p: e, m: this.m, handler: this }),
            SVG.off(window, "mousemove.drag"),
            SVG.off(window, "touchmove.drag"),
            SVG.off(window, "mouseup.drag"),
            SVG.off(window, "touchend.drag");
        }),
        SVG.extend(SVG.Element, {
          draggable: function (e, i) {
            ("function" != typeof e && "object" != typeof e) ||
              ((i = e), (e = !0));
            var a = this.remember("_draggable") || new t(this);
            return (
              (e = void 0 === e || e)
                ? a.init(i || {}, e)
                : (this.off("mousedown.drag"), this.off("touchstart.drag")),
              this
            );
          },
        });
    }.call(void 0),
    (function () {
      function t(t) {
        (this.el = t),
          t.remember("_selectHandler", this),
          (this.pointSelection = { isSelected: !1 }),
          (this.rectSelection = { isSelected: !1 });
      }
      (t.prototype.init = function (t, e) {
        var i = this.el.bbox();
        for (var a in ((this.options = {}), this.el.selectize.defaults))
          (this.options[a] = this.el.selectize.defaults[a]),
            void 0 !== e[a] && (this.options[a] = e[a]);
        (this.parent = this.el.parent()),
          (this.nested = this.nested || this.parent.group()),
          this.nested.matrix(new SVG.Matrix(this.el).translate(i.x, i.y)),
          this.options.deepSelect &&
          -1 !== ["line", "polyline", "polygon"].indexOf(this.el.type)
            ? this.selectPoints(t)
            : this.selectRect(t),
          this.observe(),
          this.cleanup();
      }),
        (t.prototype.selectPoints = function (t) {
          return (
            (this.pointSelection.isSelected = t),
            this.pointSelection.set
              ? this
              : ((this.pointSelection.set = this.parent.set()),
                this.drawCircles(),
                this)
          );
        }),
        (t.prototype.getPointArray = function () {
          var t = this.el.bbox();
          return this.el
            .array()
            .valueOf()
            .map(function (e) {
              return [e[0] - t.x, e[1] - t.y];
            });
        }),
        (t.prototype.drawCircles = function () {
          for (
            var t = this, e = this.getPointArray(), i = 0, a = e.length;
            i < a;
            ++i
          ) {
            var s = (function (e) {
              return function (i) {
                (i = i || window.event).preventDefault
                  ? i.preventDefault()
                  : (i.returnValue = !1),
                  i.stopPropagation();
                var a = i.pageX || i.touches[0].pageX,
                  s = i.pageY || i.touches[0].pageY;
                t.el.fire("point", { x: a, y: s, i: e, event: i });
              };
            })(i);
            this.pointSelection.set.add(
              this.nested
                .circle(this.options.radius)
                .center(e[i][0], e[i][1])
                .addClass(this.options.classPoints)
                .addClass(this.options.classPoints + "_point")
                .on("touchstart", s)
                .on("mousedown", s)
            );
          }
        }),
        (t.prototype.updatePointSelection = function () {
          var t = this.getPointArray();
          this.pointSelection.set.each(function (e) {
            (this.cx() === t[e][0] && this.cy() === t[e][1]) ||
              this.center(t[e][0], t[e][1]);
          });
        }),
        (t.prototype.updateRectSelection = function () {
          var t = this.el.bbox();
          this.rectSelection.set
            .get(0)
            .attr({ width: t.width, height: t.height }),
            this.options.points &&
              (this.rectSelection.set.get(2).center(t.width, 0),
              this.rectSelection.set.get(3).center(t.width, t.height),
              this.rectSelection.set.get(4).center(0, t.height),
              this.rectSelection.set.get(5).center(t.width / 2, 0),
              this.rectSelection.set.get(6).center(t.width, t.height / 2),
              this.rectSelection.set.get(7).center(t.width / 2, t.height),
              this.rectSelection.set.get(8).center(0, t.height / 2)),
            this.options.rotationPoint &&
              (this.options.points
                ? this.rectSelection.set.get(9).center(t.width / 2, 20)
                : this.rectSelection.set.get(1).center(t.width / 2, 20));
        }),
        (t.prototype.selectRect = function (t) {
          var e = this,
            i = this.el.bbox();
          function a(t) {
            return function (i) {
              (i = i || window.event).preventDefault
                ? i.preventDefault()
                : (i.returnValue = !1),
                i.stopPropagation();
              var a = i.pageX || i.touches[0].pageX,
                s = i.pageY || i.touches[0].pageY;
              e.el.fire(t, { x: a, y: s, event: i });
            };
          }
          if (
            ((this.rectSelection.isSelected = t),
            (this.rectSelection.set =
              this.rectSelection.set || this.parent.set()),
            this.rectSelection.set.get(0) ||
              this.rectSelection.set.add(
                this.nested
                  .rect(i.width, i.height)
                  .addClass(this.options.classRect)
              ),
            this.options.points && !this.rectSelection.set.get(1))
          ) {
            var s = "touchstart",
              n = "mousedown";
            this.rectSelection.set.add(
              this.nested
                .circle(this.options.radius)
                .center(0, 0)
                .attr("class", this.options.classPoints + "_lt")
                .on(n, a("lt"))
                .on(s, a("lt"))
            ),
              this.rectSelection.set.add(
                this.nested
                  .circle(this.options.radius)
                  .center(i.width, 0)
                  .attr("class", this.options.classPoints + "_rt")
                  .on(n, a("rt"))
                  .on(s, a("rt"))
              ),
              this.rectSelection.set.add(
                this.nested
                  .circle(this.options.radius)
                  .center(i.width, i.height)
                  .attr("class", this.options.classPoints + "_rb")
                  .on(n, a("rb"))
                  .on(s, a("rb"))
              ),
              this.rectSelection.set.add(
                this.nested
                  .circle(this.options.radius)
                  .center(0, i.height)
                  .attr("class", this.options.classPoints + "_lb")
                  .on(n, a("lb"))
                  .on(s, a("lb"))
              ),
              this.rectSelection.set.add(
                this.nested
                  .circle(this.options.radius)
                  .center(i.width / 2, 0)
                  .attr("class", this.options.classPoints + "_t")
                  .on(n, a("t"))
                  .on(s, a("t"))
              ),
              this.rectSelection.set.add(
                this.nested
                  .circle(this.options.radius)
                  .center(i.width, i.height / 2)
                  .attr("class", this.options.classPoints + "_r")
                  .on(n, a("r"))
                  .on(s, a("r"))
              ),
              this.rectSelection.set.add(
                this.nested
                  .circle(this.options.radius)
                  .center(i.width / 2, i.height)
                  .attr("class", this.options.classPoints + "_b")
                  .on(n, a("b"))
                  .on(s, a("b"))
              ),
              this.rectSelection.set.add(
                this.nested
                  .circle(this.options.radius)
                  .center(0, i.height / 2)
                  .attr("class", this.options.classPoints + "_l")
                  .on(n, a("l"))
                  .on(s, a("l"))
              ),
              this.rectSelection.set.each(function () {
                this.addClass(e.options.classPoints);
              });
          }
          if (
            this.options.rotationPoint &&
            ((this.options.points && !this.rectSelection.set.get(9)) ||
              (!this.options.points && !this.rectSelection.set.get(1)))
          ) {
            var r = function (t) {
              (t = t || window.event).preventDefault
                ? t.preventDefault()
                : (t.returnValue = !1),
                t.stopPropagation();
              var i = t.pageX || t.touches[0].pageX,
                a = t.pageY || t.touches[0].pageY;
              e.el.fire("rot", { x: i, y: a, event: t });
            };
            this.rectSelection.set.add(
              this.nested
                .circle(this.options.radius)
                .center(i.width / 2, 20)
                .attr("class", this.options.classPoints + "_rot")
                .on("touchstart", r)
                .on("mousedown", r)
            );
          }
        }),
        (t.prototype.handler = function () {
          var t = this.el.bbox();
          this.nested.matrix(new SVG.Matrix(this.el).translate(t.x, t.y)),
            this.rectSelection.isSelected && this.updateRectSelection(),
            this.pointSelection.isSelected && this.updatePointSelection();
        }),
        (t.prototype.observe = function () {
          var t = this;
          if (MutationObserver)
            if (this.rectSelection.isSelected || this.pointSelection.isSelected)
              (this.observerInst =
                this.observerInst ||
                new MutationObserver(function () {
                  t.handler();
                })),
                this.observerInst.observe(this.el.node, { attributes: !0 });
            else
              try {
                this.observerInst.disconnect(), delete this.observerInst;
              } catch (t) {}
          else
            this.el.off("DOMAttrModified.select"),
              (this.rectSelection.isSelected ||
                this.pointSelection.isSelected) &&
                this.el.on("DOMAttrModified.select", function () {
                  t.handler();
                });
        }),
        (t.prototype.cleanup = function () {
          !this.rectSelection.isSelected &&
            this.rectSelection.set &&
            (this.rectSelection.set.each(function () {
              this.remove();
            }),
            this.rectSelection.set.clear(),
            delete this.rectSelection.set),
            !this.pointSelection.isSelected &&
              this.pointSelection.set &&
              (this.pointSelection.set.each(function () {
                this.remove();
              }),
              this.pointSelection.set.clear(),
              delete this.pointSelection.set),
            this.pointSelection.isSelected ||
              this.rectSelection.isSelected ||
              (this.nested.remove(), delete this.nested);
        }),
        SVG.extend(SVG.Element, {
          selectize: function (e, i) {
            return (
              "object" == typeof e && ((i = e), (e = !0)),
              (this.remember("_selectHandler") || new t(this)).init(
                void 0 === e || e,
                i || {}
              ),
              this
            );
          },
        }),
        (SVG.Element.prototype.selectize.defaults = {
          points: !0,
          classRect: "svg_select_boundingRect",
          classPoints: "svg_select_points",
          radius: 7,
          rotationPoint: !0,
          deepSelect: !1,
        });
    })(),
    (function () {
      (function () {
        function t(t) {
          t.remember("_resizeHandler", this),
            (this.el = t),
            (this.parameters = {}),
            (this.lastUpdateCall = null),
            (this.p = t.doc().node.createSVGPoint());
        }
        (t.prototype.transformPoint = function (t, e, i) {
          return (
            (this.p.x = t - (this.offset.x - window.pageXOffset)),
            (this.p.y = e - (this.offset.y - window.pageYOffset)),
            this.p.matrixTransform(i || this.m)
          );
        }),
          (t.prototype._extractPosition = function (t) {
            return {
              x: null != t.clientX ? t.clientX : t.touches[0].clientX,
              y: null != t.clientY ? t.clientY : t.touches[0].clientY,
            };
          }),
          (t.prototype.init = function (t) {
            var e = this;
            if ((this.stop(), "stop" !== t)) {
              for (var i in ((this.options = {}), this.el.resize.defaults))
                (this.options[i] = this.el.resize.defaults[i]),
                  void 0 !== t[i] && (this.options[i] = t[i]);
              this.el.on("lt.resize", function (t) {
                e.resize(t || window.event);
              }),
                this.el.on("rt.resize", function (t) {
                  e.resize(t || window.event);
                }),
                this.el.on("rb.resize", function (t) {
                  e.resize(t || window.event);
                }),
                this.el.on("lb.resize", function (t) {
                  e.resize(t || window.event);
                }),
                this.el.on("t.resize", function (t) {
                  e.resize(t || window.event);
                }),
                this.el.on("r.resize", function (t) {
                  e.resize(t || window.event);
                }),
                this.el.on("b.resize", function (t) {
                  e.resize(t || window.event);
                }),
                this.el.on("l.resize", function (t) {
                  e.resize(t || window.event);
                }),
                this.el.on("rot.resize", function (t) {
                  e.resize(t || window.event);
                }),
                this.el.on("point.resize", function (t) {
                  e.resize(t || window.event);
                }),
                this.update();
            }
          }),
          (t.prototype.stop = function () {
            return (
              this.el.off("lt.resize"),
              this.el.off("rt.resize"),
              this.el.off("rb.resize"),
              this.el.off("lb.resize"),
              this.el.off("t.resize"),
              this.el.off("r.resize"),
              this.el.off("b.resize"),
              this.el.off("l.resize"),
              this.el.off("rot.resize"),
              this.el.off("point.resize"),
              this
            );
          }),
          (t.prototype.resize = function (t) {
            var e = this;
            (this.m = this.el.node.getScreenCTM().inverse()),
              (this.offset = { x: window.pageXOffset, y: window.pageYOffset });
            var i = this._extractPosition(t.detail.event);
            if (
              ((this.parameters = {
                type: this.el.type,
                p: this.transformPoint(i.x, i.y),
                x: t.detail.x,
                y: t.detail.y,
                box: this.el.bbox(),
                rotation: this.el.transform().rotation,
              }),
              "text" === this.el.type &&
                (this.parameters.fontSize = this.el.attr()["font-size"]),
              void 0 !== t.detail.i)
            ) {
              var a = this.el.array().valueOf();
              (this.parameters.i = t.detail.i),
                (this.parameters.pointCoords = [
                  a[t.detail.i][0],
                  a[t.detail.i][1],
                ]);
            }
            switch (t.type) {
              case "lt":
                this.calc = function (t, e) {
                  var i = this.snapToGrid(t, e);
                  if (
                    this.parameters.box.width - i[0] > 0 &&
                    this.parameters.box.height - i[1] > 0
                  ) {
                    if ("text" === this.parameters.type)
                      return (
                        this.el.move(
                          this.parameters.box.x + i[0],
                          this.parameters.box.y
                        ),
                        void this.el.attr(
                          "font-size",
                          this.parameters.fontSize - i[0]
                        )
                      );
                    (i = this.checkAspectRatio(i)),
                      this.el
                        .move(
                          this.parameters.box.x + i[0],
                          this.parameters.box.y + i[1]
                        )
                        .size(
                          this.parameters.box.width - i[0],
                          this.parameters.box.height - i[1]
                        );
                  }
                };
                break;
              case "rt":
                this.calc = function (t, e) {
                  var i = this.snapToGrid(t, e, 2);
                  if (
                    this.parameters.box.width + i[0] > 0 &&
                    this.parameters.box.height - i[1] > 0
                  ) {
                    if ("text" === this.parameters.type)
                      return (
                        this.el.move(
                          this.parameters.box.x - i[0],
                          this.parameters.box.y
                        ),
                        void this.el.attr(
                          "font-size",
                          this.parameters.fontSize + i[0]
                        )
                      );
                    (i = this.checkAspectRatio(i, !0)),
                      this.el
                        .move(
                          this.parameters.box.x,
                          this.parameters.box.y + i[1]
                        )
                        .size(
                          this.parameters.box.width + i[0],
                          this.parameters.box.height - i[1]
                        );
                  }
                };
                break;
              case "rb":
                this.calc = function (t, e) {
                  var i = this.snapToGrid(t, e, 0);
                  if (
                    this.parameters.box.width + i[0] > 0 &&
                    this.parameters.box.height + i[1] > 0
                  ) {
                    if ("text" === this.parameters.type)
                      return (
                        this.el.move(
                          this.parameters.box.x - i[0],
                          this.parameters.box.y
                        ),
                        void this.el.attr(
                          "font-size",
                          this.parameters.fontSize + i[0]
                        )
                      );
                    (i = this.checkAspectRatio(i)),
                      this.el
                        .move(this.parameters.box.x, this.parameters.box.y)
                        .size(
                          this.parameters.box.width + i[0],
                          this.parameters.box.height + i[1]
                        );
                  }
                };
                break;
              case "lb":
                this.calc = function (t, e) {
                  var i = this.snapToGrid(t, e, 1);
                  if (
                    this.parameters.box.width - i[0] > 0 &&
                    this.parameters.box.height + i[1] > 0
                  ) {
                    if ("text" === this.parameters.type)
                      return (
                        this.el.move(
                          this.parameters.box.x + i[0],
                          this.parameters.box.y
                        ),
                        void this.el.attr(
                          "font-size",
                          this.parameters.fontSize - i[0]
                        )
                      );
                    (i = this.checkAspectRatio(i, !0)),
                      this.el
                        .move(
                          this.parameters.box.x + i[0],
                          this.parameters.box.y
                        )
                        .size(
                          this.parameters.box.width - i[0],
                          this.parameters.box.height + i[1]
                        );
                  }
                };
                break;
              case "t":
                this.calc = function (t, e) {
                  var i = this.snapToGrid(t, e, 2);
                  if (this.parameters.box.height - i[1] > 0) {
                    if ("text" === this.parameters.type) return;
                    this.el
                      .move(this.parameters.box.x, this.parameters.box.y + i[1])
                      .height(this.parameters.box.height - i[1]);
                  }
                };
                break;
              case "r":
                this.calc = function (t, e) {
                  var i = this.snapToGrid(t, e, 0);
                  if (this.parameters.box.width + i[0] > 0) {
                    if ("text" === this.parameters.type) return;
                    this.el
                      .move(this.parameters.box.x, this.parameters.box.y)
                      .width(this.parameters.box.width + i[0]);
                  }
                };
                break;
              case "b":
                this.calc = function (t, e) {
                  var i = this.snapToGrid(t, e, 0);
                  if (this.parameters.box.height + i[1] > 0) {
                    if ("text" === this.parameters.type) return;
                    this.el
                      .move(this.parameters.box.x, this.parameters.box.y)
                      .height(this.parameters.box.height + i[1]);
                  }
                };
                break;
              case "l":
                this.calc = function (t, e) {
                  var i = this.snapToGrid(t, e, 1);
                  if (this.parameters.box.width - i[0] > 0) {
                    if ("text" === this.parameters.type) return;
                    this.el
                      .move(this.parameters.box.x + i[0], this.parameters.box.y)
                      .width(this.parameters.box.width - i[0]);
                  }
                };
                break;
              case "rot":
                this.calc = function (t, e) {
                  var i = t + this.parameters.p.x,
                    a = e + this.parameters.p.y,
                    s = Math.atan2(
                      this.parameters.p.y -
                        this.parameters.box.y -
                        this.parameters.box.height / 2,
                      this.parameters.p.x -
                        this.parameters.box.x -
                        this.parameters.box.width / 2
                    ),
                    n = Math.atan2(
                      a -
                        this.parameters.box.y -
                        this.parameters.box.height / 2,
                      i - this.parameters.box.x - this.parameters.box.width / 2
                    ),
                    r =
                      this.parameters.rotation +
                      (180 * (n - s)) / Math.PI +
                      this.options.snapToAngle / 2;
                  this.el
                    .center(this.parameters.box.cx, this.parameters.box.cy)
                    .rotate(
                      r - (r % this.options.snapToAngle),
                      this.parameters.box.cx,
                      this.parameters.box.cy
                    );
                };
                break;
              case "point":
                this.calc = function (t, e) {
                  var i = this.snapToGrid(
                      t,
                      e,
                      this.parameters.pointCoords[0],
                      this.parameters.pointCoords[1]
                    ),
                    a = this.el.array().valueOf();
                  (a[this.parameters.i][0] =
                    this.parameters.pointCoords[0] + i[0]),
                    (a[this.parameters.i][1] =
                      this.parameters.pointCoords[1] + i[1]),
                    this.el.plot(a);
                };
            }
            this.el.fire("resizestart", {
              dx: this.parameters.x,
              dy: this.parameters.y,
              event: t,
            }),
              SVG.on(window, "touchmove.resize", function (t) {
                e.update(t || window.event);
              }),
              SVG.on(window, "touchend.resize", function () {
                e.done();
              }),
              SVG.on(window, "mousemove.resize", function (t) {
                e.update(t || window.event);
              }),
              SVG.on(window, "mouseup.resize", function () {
                e.done();
              });
          }),
          (t.prototype.update = function (t) {
            if (t) {
              var e = this._extractPosition(t),
                i = this.transformPoint(e.x, e.y),
                a = i.x - this.parameters.p.x,
                s = i.y - this.parameters.p.y;
              (this.lastUpdateCall = [a, s]),
                this.calc(a, s),
                this.el.fire("resizing", { dx: a, dy: s, event: t });
            } else
              this.lastUpdateCall &&
                this.calc(this.lastUpdateCall[0], this.lastUpdateCall[1]);
          }),
          (t.prototype.done = function () {
            (this.lastUpdateCall = null),
              SVG.off(window, "mousemove.resize"),
              SVG.off(window, "mouseup.resize"),
              SVG.off(window, "touchmove.resize"),
              SVG.off(window, "touchend.resize"),
              this.el.fire("resizedone");
          }),
          (t.prototype.snapToGrid = function (t, e, i, a) {
            var s;
            return (
              void 0 !== a
                ? (s = [
                    (i + t) % this.options.snapToGrid,
                    (a + e) % this.options.snapToGrid,
                  ])
                : ((i = null == i ? 3 : i),
                  (s = [
                    (this.parameters.box.x +
                      t +
                      (1 & i ? 0 : this.parameters.box.width)) %
                      this.options.snapToGrid,
                    (this.parameters.box.y +
                      e +
                      (2 & i ? 0 : this.parameters.box.height)) %
                      this.options.snapToGrid,
                  ])),
              t < 0 && (s[0] -= this.options.snapToGrid),
              e < 0 && (s[1] -= this.options.snapToGrid),
              (t -=
                Math.abs(s[0]) < this.options.snapToGrid / 2
                  ? s[0]
                  : s[0] -
                    (t < 0
                      ? -this.options.snapToGrid
                      : this.options.snapToGrid)),
              (e -=
                Math.abs(s[1]) < this.options.snapToGrid / 2
                  ? s[1]
                  : s[1] -
                    (e < 0
                      ? -this.options.snapToGrid
                      : this.options.snapToGrid)),
              this.constraintToBox(t, e, i, a)
            );
          }),
          (t.prototype.constraintToBox = function (t, e, i, a) {
            var s,
              n,
              r = this.options.constraint || {};
            return (
              void 0 !== a
                ? ((s = i), (n = a))
                : ((s =
                    this.parameters.box.x +
                    (1 & i ? 0 : this.parameters.box.width)),
                  (n =
                    this.parameters.box.y +
                    (2 & i ? 0 : this.parameters.box.height))),
              void 0 !== r.minX && s + t < r.minX && (t = r.minX - s),
              void 0 !== r.maxX && s + t > r.maxX && (t = r.maxX - s),
              void 0 !== r.minY && n + e < r.minY && (e = r.minY - n),
              void 0 !== r.maxY && n + e > r.maxY && (e = r.maxY - n),
              [t, e]
            );
          }),
          (t.prototype.checkAspectRatio = function (t, e) {
            if (!this.options.saveAspectRatio) return t;
            var i = t.slice(),
              a = this.parameters.box.width / this.parameters.box.height,
              s = this.parameters.box.width + t[0],
              n = this.parameters.box.height - t[1],
              r = s / n;
            return (
              r < a
                ? ((i[1] = s / a - this.parameters.box.height),
                  e && (i[1] = -i[1]))
                : r > a &&
                  ((i[0] = this.parameters.box.width - n * a),
                  e && (i[0] = -i[0])),
              i
            );
          }),
          SVG.extend(SVG.Element, {
            resize: function (e) {
              return (
                (this.remember("_resizeHandler") || new t(this)).init(e || {}),
                this
              );
            },
          }),
          (SVG.Element.prototype.resize.defaults = {
            snapToAngle: 0.1,
            snapToGrid: 1,
            constraint: {},
            saveAspectRatio: !1,
          });
      }).call(this);
    })();
  return (
    (function (t, e) {
      void 0 === e && (e = {});
      var i = e.insertAt;
      if (t && "undefined" != typeof document) {
        var a = document.head || document.getElementsByTagName("head")[0],
          s = document.createElement("style");
        (s.type = "text/css"),
          "top" === i && a.firstChild
            ? a.insertBefore(s, a.firstChild)
            : a.appendChild(s),
          s.styleSheet
            ? (s.styleSheet.cssText = t)
            : s.appendChild(document.createTextNode(t));
      }
    })(
      '.apexcharts-canvas {\n  position: relative;\n  user-select: none;\n  /* cannot give overflow: hidden as it will crop tooltips which overflow outside chart area */\n}\n\n/* scrollbar is not visible by default for legend, hence forcing the visibility */\n.apexcharts-canvas ::-webkit-scrollbar {\n  -webkit-appearance: none;\n  width: 6px;\n}\n.apexcharts-canvas ::-webkit-scrollbar-thumb {\n  border-radius: 4px;\n  background-color: rgba(0,0,0,.5);\n  box-shadow: 0 0 1px rgba(255,255,255,.5);\n  -webkit-box-shadow: 0 0 1px rgba(255,255,255,.5);\n}\n.apexcharts-canvas.dark {\n  background: #343F57;\n}\n\n.apexcharts-inner {\n  position: relative;\n}\n\n.legend-mouseover-inactive {\n  transition: 0.15s ease all;\n  opacity: 0.20;\n}\n\n.apexcharts-series-collapsed {\n  opacity: 0;\n}\n\n.apexcharts-gridline, .apexcharts-text {\n  pointer-events: none;\n}\n\n.apexcharts-tooltip {\n  border-radius: 5px;\n  box-shadow: 2px 2px 6px -4px #999;\n  cursor: default;\n  font-size: 14px;\n  left: 62px;\n  opacity: 0;\n  pointer-events: none;\n  position: absolute;\n  top: 20px;\n  overflow: hidden;\n  white-space: nowrap;\n  z-index: 12;\n  transition: 0.15s ease all;\n}\n.apexcharts-tooltip.light {\n  border: 1px solid #e3e3e3;\n  background: rgba(255, 255, 255, 0.96);\n}\n.apexcharts-tooltip.dark {\n  color: #fff;\n  background: rgba(30,30,30, 0.8);\n}\n.apexcharts-tooltip * {\n  font-family: inherit;\n}\n\n.apexcharts-tooltip .apexcharts-marker,\n.apexcharts-area-series .apexcharts-area,\n.apexcharts-line {\n  pointer-events: none;\n}\n\n.apexcharts-tooltip.active {\n  opacity: 1;\n  transition: 0.15s ease all;\n}\n\n.apexcharts-tooltip-title {\n  padding: 6px;\n  font-size: 15px;\n  margin-bottom: 4px;\n}\n.apexcharts-tooltip.light .apexcharts-tooltip-title {\n  background: #ECEFF1;\n  border-bottom: 1px solid #ddd;\n}\n.apexcharts-tooltip.dark .apexcharts-tooltip-title {\n  background: rgba(0, 0, 0, 0.7);\n  border-bottom: 1px solid #333;\n}\n\n.apexcharts-tooltip-text-value,\n.apexcharts-tooltip-text-z-value {\n  display: inline-block;\n  font-weight: 600;\n  margin-left: 5px;\n}\n\n.apexcharts-tooltip-text-z-label:empty,\n.apexcharts-tooltip-text-z-value:empty {\n  display: none;\n}\n\n.apexcharts-tooltip-text-value,\n.apexcharts-tooltip-text-z-value {\n  font-weight: 600;\n}\n\n.apexcharts-tooltip-marker {\n  width: 12px;\n  height: 12px;\n  position: relative;\n  top: 0px;\n  margin-right: 10px;\n  border-radius: 50%;\n}\n\n.apexcharts-tooltip-series-group {\n  padding: 0 10px;\n  display: none;\n  text-align: left;\n  justify-content: left;\n  align-items: center;\n}\n\n.apexcharts-tooltip-series-group.active .apexcharts-tooltip-marker {\n  opacity: 1;\n}\n.apexcharts-tooltip-series-group.active, .apexcharts-tooltip-series-group:last-child {\n  padding-bottom: 4px;\n}\n.apexcharts-tooltip-series-group-hidden {\n  opacity: 0;\n  height: 0;\n  line-height: 0;\n  padding: 0 !important;\n}\n.apexcharts-tooltip-y-group {\n  padding: 6px 0 5px;\n}\n.apexcharts-tooltip-candlestick {\n  padding: 4px 8px;\n}\n.apexcharts-tooltip-candlestick > div {\n  margin: 4px 0;\n}\n.apexcharts-tooltip-candlestick span.value {\n  font-weight: bold;\n}\n\n.apexcharts-tooltip-rangebar {\n  padding: 5px 8px;\n}\n\n.apexcharts-tooltip-rangebar .category {\n  font-weight: 600;\n  color: #777;\n}\n\n.apexcharts-tooltip-rangebar .series-name {\n  font-weight: bold;\n  display: block;\n  margin-bottom: 5px;\n}\n\n.apexcharts-xaxistooltip {\n  opacity: 0;\n  padding: 9px 10px;\n  pointer-events: none;\n  color: #373d3f;\n  font-size: 13px;\n  text-align: center;\n  border-radius: 2px;\n  position: absolute;\n  z-index: 10;\n  background: #ECEFF1;\n  border: 1px solid #90A4AE;\n  transition: 0.15s ease all;\n}\n\n.apexcharts-xaxistooltip.dark {\n  background: rgba(0, 0, 0, 0.7);\n  border: 1px solid rgba(0, 0, 0, 0.5);\n  color: #fff;\n}\n\n.apexcharts-xaxistooltip:after, .apexcharts-xaxistooltip:before {\n  left: 50%;\n  border: solid transparent;\n  content: " ";\n  height: 0;\n  width: 0;\n  position: absolute;\n  pointer-events: none;\n}\n\n.apexcharts-xaxistooltip:after {\n  border-color: rgba(236, 239, 241, 0);\n  border-width: 6px;\n  margin-left: -6px;\n}\n.apexcharts-xaxistooltip:before {\n  border-color: rgba(144, 164, 174, 0);\n  border-width: 7px;\n  margin-left: -7px;\n}\n\n.apexcharts-xaxistooltip-bottom:after, .apexcharts-xaxistooltip-bottom:before {\n  bottom: 100%;\n}\n\n.apexcharts-xaxistooltip-top:after, .apexcharts-xaxistooltip-top:before {\n  top: 100%;\n}\n\n.apexcharts-xaxistooltip-bottom:after {\n  border-bottom-color: #ECEFF1;\n}\n.apexcharts-xaxistooltip-bottom:before {\n  border-bottom-color: #90A4AE;\n}\n\n.apexcharts-xaxistooltip-bottom.dark:after {\n  border-bottom-color: rgba(0, 0, 0, 0.5);\n}\n.apexcharts-xaxistooltip-bottom.dark:before {\n  border-bottom-color: rgba(0, 0, 0, 0.5);\n}\n\n.apexcharts-xaxistooltip-top:after {\n  border-top-color:#ECEFF1\n}\n.apexcharts-xaxistooltip-top:before {\n  border-top-color: #90A4AE;\n}\n.apexcharts-xaxistooltip-top.dark:after {\n  border-top-color:rgba(0, 0, 0, 0.5);\n}\n.apexcharts-xaxistooltip-top.dark:before {\n  border-top-color: rgba(0, 0, 0, 0.5);\n}\n\n\n.apexcharts-xaxistooltip.active {\n  opacity: 1;\n  transition: 0.15s ease all;\n}\n\n.apexcharts-yaxistooltip {\n  opacity: 0;\n  padding: 4px 10px;\n  pointer-events: none;\n  color: #373d3f;\n  font-size: 13px;\n  text-align: center;\n  border-radius: 2px;\n  position: absolute;\n  z-index: 10;\n  background: #ECEFF1;\n  border: 1px solid #90A4AE;\n}\n\n.apexcharts-yaxistooltip.dark {\n  background: rgba(0, 0, 0, 0.7);\n  border: 1px solid rgba(0, 0, 0, 0.5);\n  color: #fff;\n}\n\n.apexcharts-yaxistooltip:after, .apexcharts-yaxistooltip:before {\n  top: 50%;\n  border: solid transparent;\n  content: " ";\n  height: 0;\n  width: 0;\n  position: absolute;\n  pointer-events: none;\n}\n.apexcharts-yaxistooltip:after {\n  border-color: rgba(236, 239, 241, 0);\n  border-width: 6px;\n  margin-top: -6px;\n}\n.apexcharts-yaxistooltip:before {\n  border-color: rgba(144, 164, 174, 0);\n  border-width: 7px;\n  margin-top: -7px;\n}\n\n.apexcharts-yaxistooltip-left:after, .apexcharts-yaxistooltip-left:before {\n  left: 100%;\n}\n\n.apexcharts-yaxistooltip-right:after, .apexcharts-yaxistooltip-right:before {\n  right: 100%;\n}\n\n.apexcharts-yaxistooltip-left:after {\n  border-left-color: #ECEFF1;\n}\n.apexcharts-yaxistooltip-left:before {\n  border-left-color: #90A4AE;\n}\n.apexcharts-yaxistooltip-left.dark:after {\n  border-left-color: rgba(0, 0, 0, 0.5);\n}\n.apexcharts-yaxistooltip-left.dark:before {\n  border-left-color: rgba(0, 0, 0, 0.5);\n}\n\n.apexcharts-yaxistooltip-right:after {\n  border-right-color: #ECEFF1;\n}\n.apexcharts-yaxistooltip-right:before {\n  border-right-color: #90A4AE;\n}\n.apexcharts-yaxistooltip-right.dark:after {\n  border-right-color: rgba(0, 0, 0, 0.5);\n}\n.apexcharts-yaxistooltip-right.dark:before {\n  border-right-color: rgba(0, 0, 0, 0.5);\n}\n\n.apexcharts-yaxistooltip.active {\n  opacity: 1;\n}\n.apexcharts-yaxistooltip-hidden {\n  display: none;\n}\n\n.apexcharts-xcrosshairs, .apexcharts-ycrosshairs {\n  pointer-events: none;\n  opacity: 0;\n  transition: 0.15s ease all;\n}\n\n.apexcharts-xcrosshairs.active, .apexcharts-ycrosshairs.active {\n  opacity: 1;\n  transition: 0.15s ease all;\n}\n\n.apexcharts-ycrosshairs-hidden {\n  opacity: 0;\n}\n\n.apexcharts-zoom-rect {\n  pointer-events: none;\n}\n.apexcharts-selection-rect {\n  cursor: move;\n}\n\n.svg_select_points, .svg_select_points_rot {\n  opacity: 0;\n  visibility: hidden;\n}\n.svg_select_points_l, .svg_select_points_r {\n  cursor: ew-resize;\n  opacity: 1;\n  visibility: visible;\n  fill: #888;\n}\n.apexcharts-canvas.zoomable .hovering-zoom {\n  cursor: crosshair\n}\n.apexcharts-canvas.zoomable .hovering-pan {\n  cursor: move\n}\n\n.apexcharts-xaxis,\n.apexcharts-yaxis {\n  pointer-events: none;\n}\n\n.apexcharts-zoom-icon,\n.apexcharts-zoom-in-icon,\n.apexcharts-zoom-out-icon,\n.apexcharts-reset-zoom-icon,\n.apexcharts-pan-icon,\n.apexcharts-selection-icon,\n.apexcharts-menu-icon,\n.apexcharts-toolbar-custom-icon {\n  cursor: pointer;\n  width: 20px;\n  height: 20px;\n  line-height: 24px;\n  color: #6E8192;\n  text-align: center;\n}\n\n\n.apexcharts-zoom-icon svg,\n.apexcharts-zoom-in-icon svg,\n.apexcharts-zoom-out-icon svg,\n.apexcharts-reset-zoom-icon svg,\n.apexcharts-menu-icon svg {\n  fill: #6E8192;\n}\n.apexcharts-selection-icon svg {\n  fill: #444;\n  transform: scale(0.76)\n}\n\n.dark .apexcharts-zoom-icon svg,\n.dark .apexcharts-zoom-in-icon svg,\n.dark .apexcharts-zoom-out-icon svg,\n.dark .apexcharts-reset-zoom-icon svg,\n.dark .apexcharts-pan-icon svg,\n.dark .apexcharts-selection-icon svg,\n.dark .apexcharts-menu-icon svg,\n.dark .apexcharts-toolbar-custom-icon svg{\n  fill: #f3f4f5;\n}\n\n.apexcharts-canvas .apexcharts-zoom-icon.selected svg,\n.apexcharts-canvas .apexcharts-selection-icon.selected svg,\n.apexcharts-canvas .apexcharts-reset-zoom-icon.selected svg {\n  fill: #008FFB;\n}\n.light .apexcharts-selection-icon:not(.selected):hover svg,\n.light .apexcharts-zoom-icon:not(.selected):hover svg,\n.light .apexcharts-zoom-in-icon:hover svg,\n.light .apexcharts-zoom-out-icon:hover svg,\n.light .apexcharts-reset-zoom-icon:hover svg,\n.light .apexcharts-menu-icon:hover svg {\n  fill: #333;\n}\n\n.apexcharts-selection-icon, .apexcharts-menu-icon {\n  position: relative;\n}\n.apexcharts-reset-zoom-icon {\n  margin-left: 5px;\n}\n.apexcharts-zoom-icon, .apexcharts-reset-zoom-icon, .apexcharts-menu-icon {\n  transform: scale(0.85);\n}\n\n.apexcharts-zoom-in-icon, .apexcharts-zoom-out-icon {\n  transform: scale(0.7)\n}\n\n.apexcharts-zoom-out-icon {\n  margin-right: 3px;\n}\n\n.apexcharts-pan-icon {\n  transform: scale(0.62);\n  position: relative;\n  left: 1px;\n  top: 0px;\n}\n.apexcharts-pan-icon svg {\n  fill: #fff;\n  stroke: #6E8192;\n  stroke-width: 2;\n}\n.apexcharts-pan-icon.selected svg {\n  stroke: #008FFB;\n}\n.apexcharts-pan-icon:not(.selected):hover svg {\n  stroke: #333;\n}\n\n.apexcharts-toolbar {\n  position: absolute;\n  z-index: 11;\n  top: 0px;\n  right: 3px;\n  max-width: 176px;\n  text-align: right;\n  border-radius: 3px;\n  padding: 0px 6px 2px 6px;\n  display: flex;\n  justify-content: space-between;\n  align-items: center;\n}\n\n.apexcharts-toolbar svg {\n  pointer-events: none;\n}\n\n.apexcharts-menu {\n  background: #fff;\n  position: absolute;\n  top: 100%;\n  border: 1px solid #ddd;\n  border-radius: 3px;\n  padding: 3px;\n  right: 10px;\n  opacity: 0;\n  min-width: 110px;\n  transition: 0.15s ease all;\n  pointer-events: none;\n}\n\n.apexcharts-menu.open {\n  opacity: 1;\n  pointer-events: all;\n  transition: 0.15s ease all;\n}\n\n.apexcharts-menu-item {\n  padding: 6px 7px;\n  font-size: 12px;\n  cursor: pointer;\n}\n.light .apexcharts-menu-item:hover {\n  background: #eee;\n}\n.dark .apexcharts-menu {\n  background: rgba(0, 0, 0, 0.7);\n  color: #fff;\n}\n\n@media screen and (min-width: 768px) {\n  .apexcharts-toolbar {\n    /*opacity: 0;*/\n  }\n\n  .apexcharts-canvas:hover .apexcharts-toolbar {\n    opacity: 1;\n  }\n}\n\n.apexcharts-datalabel.hidden {\n  opacity: 0;\n}\n\n.apexcharts-pie-label,\n.apexcharts-datalabel, .apexcharts-datalabel-label, .apexcharts-datalabel-value {\n  cursor: default;\n  pointer-events: none;\n}\n\n.apexcharts-pie-label-delay {\n  opacity: 0;\n  animation-name: opaque;\n  animation-duration: 0.3s;\n  animation-fill-mode: forwards;\n  animation-timing-function: ease;\n}\n\n.apexcharts-canvas .hidden {\n  opacity: 0;\n}\n\n.apexcharts-hide .apexcharts-series-points {\n  opacity: 0;\n}\n\n.apexcharts-area-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,\n.apexcharts-line-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events, .apexcharts-radar-series path, .apexcharts-radar-series polygon {\n  pointer-events: none;\n}\n\n/* markers */\n\n.apexcharts-marker {\n  transition: 0.15s ease all;\n}\n\n@keyframes opaque {\n  0% {\n    opacity: 0;\n  }\n  100% {\n    opacity: 1;\n  }\n}\n\n/* Resize generated styles */\n@keyframes resizeanim {\n  from {\n    opacity: 0;\n  }\n  to {\n    opacity: 0;\n  }\n}\n\n.resize-triggers {\n  animation: 1ms resizeanim;\n  visibility: hidden;\n  opacity: 0;\n}\n\n.resize-triggers, .resize-triggers > div, .contract-trigger:before {\n  content: " ";\n  display: block;\n  position: absolute;\n  top: 0;\n  left: 0;\n  height: 100%;\n  width: 100%;\n  overflow: hidden;\n}\n\n.resize-triggers > div {\n  background: #eee;\n  overflow: auto;\n}\n\n.contract-trigger:before {\n  width: 200%;\n  height: 200%;\n}\n'
    ),
    "document" in self &&
      (("classList" in document.createElement("_") &&
        (!document.createElementNS ||
          "classList" in
            document.createElementNS("http://www.w3.org/2000/svg", "g"))) ||
        (function (t) {
          if ("Element" in t) {
            var e = t.Element.prototype,
              i = Object,
              a =
                String.prototype.trim ||
                function () {
                  return this.replace(/^\s+|\s+$/g, "");
                },
              s =
                Array.prototype.indexOf ||
                function (t) {
                  for (var e = 0, i = this.length; e < i; e++)
                    if (e in this && this[e] === t) return e;
                  return -1;
                },
              n = function (t, e) {
                (this.name = t),
                  (this.code = DOMException[t]),
                  (this.message = e);
              },
              r = function (t, e) {
                if ("" === e)
                  throw new n("SYNTAX_ERR", "The token must not be empty.");
                if (/\s/.test(e))
                  throw new n(
                    "INVALID_CHARACTER_ERR",
                    "The token must not contain space characters."
                  );
                return s.call(t, e);
              },
              o = function (t) {
                for (
                  var e = a.call(t.getAttribute("class") || ""),
                    i = e ? e.split(/\s+/) : [],
                    s = 0,
                    n = i.length;
                  s < n;
                  s++
                )
                  this.push(i[s]);
                this._updateClassName = function () {
                  t.setAttribute("class", this.toString());
                };
              },
              l = (o.prototype = []),
              h = function () {
                return new o(this);
              };
            if (
              ((n.prototype = Error.prototype),
              (l.item = function (t) {
                return this[t] || null;
              }),
              (l.contains = function (t) {
                return ~r(this, t + "");
              }),
              (l.add = function () {
                var t,
                  e = arguments,
                  i = 0,
                  a = e.length,
                  s = !1;
                do {
                  (t = e[i] + ""), ~r(this, t) || (this.push(t), (s = !0));
                } while (++i < a);
                s && this._updateClassName();
              }),
              (l.remove = function () {
                var t,
                  e,
                  i = arguments,
                  a = 0,
                  s = i.length,
                  n = !1;
                do {
                  for (t = i[a] + "", e = r(this, t); ~e; )
                    this.splice(e, 1), (n = !0), (e = r(this, t));
                } while (++a < s);
                n && this._updateClassName();
              }),
              (l.toggle = function (t, e) {
                var i = this.contains(t),
                  a = i ? !0 !== e && "remove" : !1 !== e && "add";
                return a && this[a](t), !0 === e || !1 === e ? e : !i;
              }),
              (l.replace = function (t, e) {
                var i = r(t + "");
                ~i && (this.splice(i, 1, e), this._updateClassName());
              }),
              (l.toString = function () {
                return this.join(" ");
              }),
              i.defineProperty)
            ) {
              var c = { get: h, enumerable: !0, configurable: !0 };
              try {
                i.defineProperty(e, "classList", c);
              } catch (t) {
                (void 0 !== t.number && -2146823252 !== t.number) ||
                  ((c.enumerable = !1), i.defineProperty(e, "classList", c));
              }
            } else
              i.prototype.__defineGetter__ &&
                e.__defineGetter__("classList", h);
          }
        })(self),
      (function () {
        var t = document.createElement("_");
        if ((t.classList.add("c1", "c2"), !t.classList.contains("c2"))) {
          var e = function (t) {
            var e = DOMTokenList.prototype[t];
            DOMTokenList.prototype[t] = function (t) {
              var i,
                a = arguments.length;
              for (i = 0; i < a; i++) (t = arguments[i]), e.call(this, t);
            };
          };
          e("add"), e("remove");
        }
        if ((t.classList.toggle("c3", !1), t.classList.contains("c3"))) {
          var i = DOMTokenList.prototype.toggle;
          DOMTokenList.prototype.toggle = function (t, e) {
            return 1 in arguments && !this.contains(t) == !e
              ? e
              : i.call(this, t);
          };
        }
        "replace" in document.createElement("_").classList ||
          (DOMTokenList.prototype.replace = function (t, e) {
            var i = this.toString().split(" "),
              a = i.indexOf(t + "");
            ~a &&
              ((i = i.slice(a)),
              this.remove.apply(this, i),
              this.add(e),
              this.add.apply(this, i.slice(1)));
          }),
          (t = null);
      })()),
    (function () {
      function t(t) {
        var e = t.__resizeTriggers__,
          i = e.firstElementChild,
          a = e.lastElementChild,
          s = i.firstElementChild;
        (a.scrollLeft = a.scrollWidth),
          (a.scrollTop = a.scrollHeight),
          (s.style.width = i.offsetWidth + 1 + "px"),
          (s.style.height = i.offsetHeight + 1 + "px"),
          (i.scrollLeft = i.scrollWidth),
          (i.scrollTop = i.scrollHeight);
      }
      function e(e) {
        var i = this;
        t(this),
          this.__resizeRAF__ && n(this.__resizeRAF__),
          (this.__resizeRAF__ = s(function () {
            (function (t) {
              return (
                t.offsetWidth != t.__resizeLast__.width ||
                t.offsetHeight != t.__resizeLast__.height
              );
            })(i) &&
              ((i.__resizeLast__.width = i.offsetWidth),
              (i.__resizeLast__.height = i.offsetHeight),
              i.__resizeListeners__.forEach(function (t) {
                t.call(e);
              }));
          }));
      }
      var i,
        a,
        s =
          ((i =
            window.requestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            function (t) {
              return window.setTimeout(t, 20);
            }),
          function (t) {
            return i(t);
          }),
        n =
          ((a =
            window.cancelAnimationFrame ||
            window.mozCancelAnimationFrame ||
            window.webkitCancelAnimationFrame ||
            window.clearTimeout),
          function (t) {
            return a(t);
          }),
        r = !1,
        o = "animationstart",
        l = "Webkit Moz O ms".split(" "),
        h =
          "webkitAnimationStart animationstart oAnimationStart MSAnimationStart".split(
            " "
          ),
        c = document.createElement("fakeelement");
      if ((void 0 !== c.style.animationName && (r = !0), !1 === r))
        for (var d = 0; d < l.length; d++)
          if (void 0 !== c.style[l[d] + "AnimationName"]) {
            o = h[d];
            break;
          }
      (window.addResizeListener = function (i, a) {
        i.__resizeTriggers__ ||
          ("static" == getComputedStyle(i).position &&
            (i.style.position = "relative"),
          (i.__resizeLast__ = {}),
          (i.__resizeListeners__ = []),
          ((i.__resizeTriggers__ = document.createElement("div")).className =
            "resize-triggers"),
          (i.__resizeTriggers__.innerHTML =
            '<div class="expand-trigger"><div></div></div><div class="contract-trigger"></div>'),
          i.appendChild(i.__resizeTriggers__),
          t(i),
          i.addEventListener("scroll", e, !0),
          o &&
            i.__resizeTriggers__.addEventListener(o, function (e) {
              "resizeanim" == e.animationName && t(i);
            })),
          i.__resizeListeners__.push(a);
      }),
        (window.removeResizeListener = function (t, i) {
          t &&
            (t.__resizeListeners__.splice(t.__resizeListeners__.indexOf(i), 1),
            t.__resizeListeners__.length ||
              (t.removeEventListener("scroll", e),
              (t.__resizeTriggers__ = !t.removeChild(t.__resizeTriggers__))));
        });
    })(),
    (window.Apex = {}),
    (function () {
      function i(t, a) {
        e(this, i),
          (this.opts = a),
          (this.ctx = this),
          (this.w = new S(a).init()),
          (this.el = t),
          (this.w.globals.cuid = u.randomId()),
          (this.w.globals.chartID = this.w.config.chart.id
            ? this.w.config.chart.id
            : this.w.globals.cuid),
          (this.eventList = [
            "mousedown",
            "mousemove",
            "touchstart",
            "touchmove",
            "mouseup",
            "touchend",
          ]),
          this.initModules(),
          (this.create = u.bind(this.create, this)),
          (this.documentEvent = u.bind(this.documentEvent, this)),
          (this.windowResizeHandler = this.windowResize.bind(this));
      }
      return (
        a(
          i,
          [
            {
              key: "render",
              value: function () {
                var t = this;
                return new Q(function (e, i) {
                  if (null !== t.el) {
                    void 0 === Apex._chartInstances &&
                      (Apex._chartInstances = []),
                      t.w.config.chart.id &&
                        Apex._chartInstances.push({
                          id: t.w.globals.chartID,
                          group: t.w.config.chart.group,
                          chart: t,
                        }),
                      t.setLocale(t.w.config.chart.defaultLocale);
                    var a = t.w.config.chart.events.beforeMount;
                    "function" == typeof a && a(t, t.w),
                      t.fireEvent("beforeMount", [t, t.w]),
                      window.addEventListener("resize", t.windowResizeHandler),
                      window.addResizeListener(
                        t.el.parentNode,
                        t.parentResizeCallback.bind(t)
                      );
                    var s = t.create(t.w.config.series, {});
                    if (!s) return e(t);
                    t.mount(s)
                      .then(function () {
                        e(s),
                          "function" ==
                            typeof t.w.config.chart.events.mounted &&
                            t.w.config.chart.events.mounted(t, t.w),
                          t.fireEvent("mounted", [t, t.w]);
                      })
                      .catch(function (t) {
                        i(t);
                      });
                  } else i(new Error("Element not found"));
                });
              },
            },
            {
              key: "initModules",
              value: function () {
                (this.animations = new f(this)),
                  (this.core = new Z(this.el, this)),
                  (this.grid = new lt(this)),
                  (this.coreUtils = new w(this)),
                  (this.config = new k({})),
                  (this.crosshairs = new I(this)),
                  (this.options = new b()),
                  (this.responsive = new ht(this)),
                  (this.series = new B(this)),
                  (this.theme = new ct(this)),
                  (this.formatters = new O(this)),
                  (this.titleSubtitle = new yt(this)),
                  (this.legend = new V(this)),
                  (this.toolbar = new mt(this)),
                  (this.dimensions = new W(this)),
                  (this.zoomPanSelection = new vt(this)),
                  (this.w.globals.tooltip = new bt(this));
              },
            },
            {
              key: "addEventListener",
              value: function (t, e) {
                var i = this.w;
                i.globals.events.hasOwnProperty(t)
                  ? i.globals.events[t].push(e)
                  : (i.globals.events[t] = [e]);
              },
            },
            {
              key: "removeEventListener",
              value: function (t, e) {
                var i = this.w;
                if (i.globals.events.hasOwnProperty(t)) {
                  var a = i.globals.events[t].indexOf(e);
                  -1 !== a && i.globals.events[t].splice(a, 1);
                }
              },
            },
            {
              key: "fireEvent",
              value: function (t, e) {
                var i = this.w;
                if (i.globals.events.hasOwnProperty(t)) {
                  (e && e.length) || (e = []);
                  for (
                    var a = i.globals.events[t], s = a.length, n = 0;
                    n < s;
                    n++
                  )
                    a[n].apply(null, e);
                }
              },
            },
            {
              key: "create",
              value: function (t, e) {
                var i = this.w;
                this.initModules();
                var a = this.w.globals;
                if (
                  ((a.noData = !1),
                  (a.animationEnded = !1),
                  this.responsive.checkResponsiveConfig(e),
                  null === this.el)
                )
                  return (a.animationEnded = !0), null;
                if ((this.core.setupElements(), 0 === a.svgWidth))
                  return (a.animationEnded = !0), null;
                var s = w.checkComboSeries(t);
                (a.comboCharts = s.comboCharts),
                  (a.comboChartsHasBars = s.comboChartsHasBars),
                  (0 === t.length ||
                    (1 === t.length && t[0].data && 0 === t[0].data.length)) &&
                    this.series.handleNoData(),
                  this.setupEventHandlers(),
                  this.core.parseData(t),
                  this.theme.init(),
                  new L(this).setGlobalMarkerSize(),
                  this.formatters.setLabelFormatters(),
                  this.titleSubtitle.draw(),
                  (a.noData && a.collapsedSeries.length !== a.series.length) ||
                    this.legend.init(),
                  this.series.hasAllSeriesEqualX(),
                  a.axisCharts &&
                    (this.core.coreCalculations(),
                    "category" !== i.config.xaxis.type &&
                      this.formatters.setLabelFormatters()),
                  this.formatters.heatmapLabelFormatters(),
                  this.dimensions.plotCoords();
                var n = this.core.xySettings();
                this.grid.createGridMask();
                var r = this.core.plotChartType(t, n);
                this.core.shiftGraphPosition();
                var o = {
                  plot: {
                    left: i.globals.translateX,
                    top: i.globals.translateY,
                    width: i.globals.gridWidth,
                    height: i.globals.gridHeight,
                  },
                };
                return {
                  elGraph: r,
                  xyRatios: n,
                  elInner: i.globals.dom.elGraphical,
                  dimensions: o,
                };
              },
            },
            {
              key: "mount",
              value: function () {
                var t =
                    arguments.length > 0 && void 0 !== arguments[0]
                      ? arguments[0]
                      : null,
                  e = this,
                  i = e.w;
                return new Q(function (a, s) {
                  if (null === e.el)
                    return s(
                      new Error(
                        "Not enough data to display or target element not found"
                      )
                    );
                  if (
                    ((null === t || i.globals.allSeriesCollapsed) &&
                      e.series.handleNoData(),
                    (e.annotations = new m(e)),
                    e.core.drawAxis(i.config.chart.type, t.xyRatios),
                    (e.grid = new lt(e)),
                    "back" === i.config.grid.position && e.grid.drawGrid(),
                    "back" === i.config.annotations.position &&
                      e.annotations.drawAnnotations(),
                    t.elGraph instanceof Array)
                  )
                    for (var n = 0; n < t.elGraph.length; n++)
                      i.globals.dom.elGraphical.add(t.elGraph[n]);
                  else i.globals.dom.elGraphical.add(t.elGraph);
                  if (
                    ("front" === i.config.grid.position && e.grid.drawGrid(),
                    "front" === i.config.xaxis.crosshairs.position &&
                      e.crosshairs.drawXCrosshairs(),
                    "front" === i.config.yaxis[0].crosshairs.position &&
                      e.crosshairs.drawYCrosshairs(),
                    "front" === i.config.annotations.position &&
                      e.annotations.drawAnnotations(),
                    !i.globals.noData)
                  ) {
                    if (
                      (i.config.tooltip.enabled &&
                        !i.globals.noData &&
                        e.w.globals.tooltip.drawTooltip(t.xyRatios),
                      i.globals.axisCharts && i.globals.isXNumeric)
                    )
                      (i.config.chart.zoom.enabled ||
                        (i.config.chart.selection &&
                          i.config.chart.selection.enabled) ||
                        (i.config.chart.pan && i.config.chart.pan.enabled)) &&
                        e.zoomPanSelection.init({ xyRatios: t.xyRatios });
                    else {
                      var r = i.config.chart.toolbar.tools;
                      (r.zoom = !1),
                        (r.zoomin = !1),
                        (r.zoomout = !1),
                        (r.selection = !1),
                        (r.pan = !1),
                        (r.reset = !1);
                    }
                    i.config.chart.toolbar.show &&
                      !i.globals.allSeriesCollapsed &&
                      e.toolbar.createToolbar();
                  }
                  i.globals.memory.methodsToExec.length > 0 &&
                    i.globals.memory.methodsToExec.forEach(function (t) {
                      t.method(t.params, !1, t.context);
                    }),
                    i.globals.axisCharts ||
                      i.globals.noData ||
                      e.core.resizeNonAxisCharts(),
                    a(e);
                });
              },
            },
            {
              key: "clearPreviousPaths",
              value: function () {
                var t = this.w;
                (t.globals.previousPaths = []),
                  (t.globals.allSeriesCollapsed = !1),
                  (t.globals.collapsedSeries = []),
                  (t.globals.collapsedSeriesIndices = []);
              },
            },
            {
              key: "updateOptions",
              value: function (t) {
                var e =
                    arguments.length > 1 &&
                    void 0 !== arguments[1] &&
                    arguments[1],
                  i =
                    !(arguments.length > 2 && void 0 !== arguments[2]) ||
                    arguments[2],
                  a =
                    !(arguments.length > 3 && void 0 !== arguments[3]) ||
                    arguments[3],
                  s =
                    !(arguments.length > 4 && void 0 !== arguments[4]) ||
                    arguments[4],
                  n = this.w;
                return (
                  t.series &&
                    (this.resetSeries(!1),
                    t.series.length &&
                      t.series[0].data &&
                      (t.series = t.series.map(function (t, e) {
                        return r({}, n.config.series[e], {
                          name: t.name
                            ? t.name
                            : n.config.series[e] && n.config.series[e].name,
                          type: t.type
                            ? t.type
                            : n.config.series[e] && n.config.series[e].type,
                          data: t.data
                            ? t.data
                            : n.config.series[e] && n.config.series[e].data,
                        });
                      })),
                    this.revertDefaultAxisMinMax()),
                  t.xaxis &&
                    ((t.xaxis.min || t.xaxis.max) && this.forceXAxisUpdate(t),
                    t.xaxis.categories &&
                      t.xaxis.categories.length &&
                      n.config.xaxis.convertedCatToNumeric &&
                      (t = y.convertCatToNumeric(t))),
                  n.globals.collapsedSeriesIndices.length > 0 &&
                    this.clearPreviousPaths(),
                  t.theme && (t = this.theme.updateThemeOptions(t)),
                  this._updateOptions(t, e, i, a, s)
                );
              },
            },
            {
              key: "_updateOptions",
              value: function (e) {
                var i =
                    arguments.length > 1 &&
                    void 0 !== arguments[1] &&
                    arguments[1],
                  a =
                    !(arguments.length > 2 && void 0 !== arguments[2]) ||
                    arguments[2],
                  s =
                    !(arguments.length > 3 && void 0 !== arguments[3]) ||
                    arguments[3],
                  n =
                    arguments.length > 4 &&
                    void 0 !== arguments[4] &&
                    arguments[4],
                  r = [this];
                s && (r = this.getSyncedCharts()),
                  this.w.globals.isExecCalled &&
                    ((r = [this]), (this.w.globals.isExecCalled = !1)),
                  r.forEach(function (s) {
                    var r = s.w;
                    return (
                      (r.globals.shouldAnimate = a),
                      i ||
                        ((r.globals.resized = !0),
                        (r.globals.dataChanged = !0),
                        a && s.series.getPreviousPaths()),
                      e &&
                        "object" === t(e) &&
                        ((s.config = new k(e)),
                        (e = w.extendArrayProps(s.config, e)),
                        (r.config = u.extend(r.config, e)),
                        n &&
                          ((r.globals.initialConfig = u.extend({}, r.config)),
                          (r.globals.initialSeries = JSON.parse(
                            JSON.stringify(r.config.series)
                          )))),
                      s.update(e)
                    );
                  });
              },
            },
            {
              key: "updateSeries",
              value: function () {
                var t =
                    arguments.length > 0 && void 0 !== arguments[0]
                      ? arguments[0]
                      : [],
                  e =
                    !(arguments.length > 1 && void 0 !== arguments[1]) ||
                    arguments[1],
                  i =
                    !(arguments.length > 2 && void 0 !== arguments[2]) ||
                    arguments[2];
                return (
                  this.resetSeries(!1),
                  this.revertDefaultAxisMinMax(),
                  this._updateSeries(t, e, i)
                );
              },
            },
            {
              key: "appendSeries",
              value: function (t) {
                var e =
                    !(arguments.length > 1 && void 0 !== arguments[1]) ||
                    arguments[1],
                  i =
                    !(arguments.length > 2 && void 0 !== arguments[2]) ||
                    arguments[2],
                  a = this.w.config.series.slice();
                return (
                  a.push(t),
                  this.resetSeries(!1),
                  this.revertDefaultAxisMinMax(),
                  this._updateSeries(a, e, i)
                );
              },
            },
            {
              key: "_updateSeries",
              value: function (t, e) {
                var i,
                  a =
                    arguments.length > 2 &&
                    void 0 !== arguments[2] &&
                    arguments[2],
                  s = this.w;
                return (
                  (this.w.globals.shouldAnimate = e),
                  (s.globals.dataChanged = !0),
                  s.globals.allSeriesCollapsed &&
                    (s.globals.allSeriesCollapsed = !1),
                  e && this.series.getPreviousPaths(),
                  s.globals.axisCharts
                    ? (0 ===
                        (i = t.map(function (t, e) {
                          return r({}, s.config.series[e], {
                            name: t.name
                              ? t.name
                              : s.config.series[e] && s.config.series[e].name,
                            type: t.type
                              ? t.type
                              : s.config.series[e] && s.config.series[e].type,
                            data: t.data
                              ? t.data
                              : s.config.series[e] && s.config.series[e].data,
                          });
                        })).length && (i = [{ data: [] }]),
                      (s.config.series = i))
                    : (s.config.series = t.slice()),
                  a &&
                    ((s.globals.initialConfig.series = JSON.parse(
                      JSON.stringify(s.config.series)
                    )),
                    (s.globals.initialSeries = JSON.parse(
                      JSON.stringify(s.config.series)
                    ))),
                  this.update()
                );
              },
            },
            {
              key: "getSyncedCharts",
              value: function () {
                var t = this.getGroupedCharts(),
                  e = [this];
                return (
                  t.length &&
                    ((e = []),
                    t.forEach(function (t) {
                      e.push(t);
                    })),
                  e
                );
              },
            },
            {
              key: "getGroupedCharts",
              value: function () {
                var t = this;
                return Apex._chartInstances
                  .filter(function (t) {
                    if (t.group) return !0;
                  })
                  .map(function (e) {
                    return t.w.config.chart.group === e.group ? e.chart : t;
                  });
              },
            },
            {
              key: "appendData",
              value: function (t) {
                var e =
                    !(arguments.length > 1 && void 0 !== arguments[1]) ||
                    arguments[1],
                  i = this;
                (i.w.globals.dataChanged = !0), i.series.getPreviousPaths();
                for (
                  var a = i.w.config.series.slice(), s = 0;
                  s < a.length;
                  s++
                )
                  if (void 0 !== t[s])
                    for (var n = 0; n < t[s].data.length; n++)
                      a[s].data.push(t[s].data[n]);
                return (
                  (i.w.config.series = a),
                  e &&
                    (i.w.globals.initialSeries = JSON.parse(
                      JSON.stringify(i.w.config.series)
                    )),
                  this.update()
                );
              },
            },
            {
              key: "update",
              value: function (t) {
                var e = this;
                return new Q(function (i, a) {
                  e.clear();
                  var s = e.create(e.w.config.series, t);
                  if (!s) return i(e);
                  e.mount(s)
                    .then(function () {
                      "function" == typeof e.w.config.chart.events.updated &&
                        e.w.config.chart.events.updated(e, e.w),
                        e.fireEvent("updated", [e, e.w]),
                        (e.w.globals.isDirty = !0),
                        i(e);
                    })
                    .catch(function (t) {
                      a(t);
                    });
                });
              },
            },
            {
              key: "forceXAxisUpdate",
              value: function (t) {
                var e = this.w;
                void 0 !== t.xaxis.min && (e.config.xaxis.min = t.xaxis.min),
                  void 0 !== t.xaxis.max && (e.config.xaxis.max = t.xaxis.max);
              },
            },
            {
              key: "revertDefaultAxisMinMax",
              value: function () {
                var t = this,
                  e = this.w;
                (e.config.xaxis.min =
                  this.opts.xaxis.min || (Apex.xaxis && Apex.xaxis.min)),
                  (e.config.xaxis.max =
                    this.opts.xaxis.max || (Apex.xaxis && Apex.xaxis.max)),
                  e.config.yaxis.map(function (i, a) {
                    e.globals.zoomed &&
                      void 0 !== t.opts.yaxis[a] &&
                      ((i.min = t.opts.yaxis[a].min),
                      (i.max = t.opts.yaxis[a].max));
                  });
              },
            },
            {
              key: "clear",
              value: function () {
                this.zoomPanSelection && this.zoomPanSelection.destroy(),
                  this.toolbar && this.toolbar.destroy(),
                  (this.animations = null),
                  (this.annotations = null),
                  (this.core = null),
                  (this.grid = null),
                  (this.series = null),
                  (this.responsive = null),
                  (this.theme = null),
                  (this.formatters = null),
                  (this.titleSubtitle = null),
                  (this.legend = null),
                  (this.dimensions = null),
                  (this.options = null),
                  (this.crosshairs = null),
                  (this.zoomPanSelection = null),
                  (this.toolbar = null),
                  (this.w.globals.tooltip = null),
                  this.clearDomElements();
              },
            },
            {
              key: "killSVG",
              value: function (t) {
                return new Q(function (e, i) {
                  t.each(function (t, e) {
                    this.removeClass("*"), this.off(), this.stop();
                  }, !0),
                    t.ungroup(),
                    t.clear(),
                    e("done");
                });
              },
            },
            {
              key: "clearDomElements",
              value: function () {
                var t = this;
                this.eventList.forEach(function (e) {
                  document.removeEventListener(e, t.documentEvent);
                });
                var e = this.w.globals.dom;
                if (null !== this.el)
                  for (; this.el.firstChild; )
                    this.el.removeChild(this.el.firstChild);
                this.killSVG(e.Paper),
                  e.Paper.remove(),
                  (e.elWrap = null),
                  (e.elGraphical = null),
                  (e.elLegendWrap = null),
                  (e.baseEl = null),
                  (e.elGridRect = null),
                  (e.elGridRectMask = null),
                  (e.elGridRectMarkerMask = null),
                  (e.elDefs = null);
              },
            },
            {
              key: "destroy",
              value: function () {
                this.clear();
                var t = this.w.config.chart.id;
                t &&
                  Apex._chartInstances.forEach(function (e, i) {
                    e.id === t && Apex._chartInstances.splice(i, 1);
                  }),
                  window.removeEventListener(
                    "resize",
                    this.windowResizeHandler
                  ),
                  window.removeResizeListener(
                    this.el.parentNode,
                    this.parentResizeCallback.bind(this)
                  );
              },
            },
            {
              key: "toggleSeries",
              value: function (t) {
                var e = this.series.isSeriesHidden(t);
                return (
                  this.legend.toggleDataSeries(e.realIndex, e.isHidden),
                  e.isHidden
                );
              },
            },
            {
              key: "showSeries",
              value: function (t) {
                var e = this.series.isSeriesHidden(t);
                e.isHidden && this.legend.toggleDataSeries(e.realIndex, !0);
              },
            },
            {
              key: "hideSeries",
              value: function (t) {
                var e = this.series.isSeriesHidden(t);
                e.isHidden || this.legend.toggleDataSeries(e.realIndex, !1);
              },
            },
            {
              key: "resetSeries",
              value: function () {
                var t =
                  !(arguments.length > 0 && void 0 !== arguments[0]) ||
                  arguments[0];
                this.series.resetSeries(t);
              },
            },
            {
              key: "setupEventHandlers",
              value: function () {
                var t = this,
                  e = this.w,
                  i = this,
                  a = e.globals.dom.baseEl.querySelector(e.globals.chartClass);
                (this.eventListHandlers = []),
                  this.eventList.forEach(function (t) {
                    a.addEventListener(
                      t,
                      function (t) {
                        var a = Object.assign({}, e, {
                          seriesIndex: e.globals.capturedSeriesIndex,
                          dataPointIndex: e.globals.capturedDataPointIndex,
                        });
                        "mousemove" === t.type || "touchmove" === t.type
                          ? "function" ==
                              typeof e.config.chart.events.mouseMove &&
                            e.config.chart.events.mouseMove(t, i, a)
                          : (("mouseup" === t.type && 1 === t.which) ||
                              "touchend" === t.type) &&
                            ("function" == typeof e.config.chart.events.click &&
                              e.config.chart.events.click(t, i, a),
                            i.fireEvent("click", [t, i, a]));
                      },
                      { capture: !1, passive: !0 }
                    );
                  }),
                  this.eventList.forEach(function (e) {
                    document.addEventListener(e, t.documentEvent);
                  }),
                  this.core.setupBrushHandler();
              },
            },
            {
              key: "documentEvent",
              value: function (t) {
                var e = this.w;
                (e.globals.clientX =
                  "touchmove" === t.type ? t.touches[0].clientX : t.clientX),
                  (e.globals.clientY =
                    "touchmove" === t.type ? t.touches[0].clientY : t.clientY);
              },
            },
            {
              key: "addXaxisAnnotation",
              value: function (t) {
                var e =
                    !(arguments.length > 1 && void 0 !== arguments[1]) ||
                    arguments[1],
                  i =
                    arguments.length > 2 && void 0 !== arguments[2]
                      ? arguments[2]
                      : void 0,
                  a = this;
                i && (a = i), a.annotations.addXaxisAnnotationExternal(t, e, a);
              },
            },
            {
              key: "addYaxisAnnotation",
              value: function (t) {
                var e =
                    !(arguments.length > 1 && void 0 !== arguments[1]) ||
                    arguments[1],
                  i =
                    arguments.length > 2 && void 0 !== arguments[2]
                      ? arguments[2]
                      : void 0,
                  a = this;
                i && (a = i), a.annotations.addYaxisAnnotationExternal(t, e, a);
              },
            },
            {
              key: "addPointAnnotation",
              value: function (t) {
                var e =
                    !(arguments.length > 1 && void 0 !== arguments[1]) ||
                    arguments[1],
                  i =
                    arguments.length > 2 && void 0 !== arguments[2]
                      ? arguments[2]
                      : void 0,
                  a = this;
                i && (a = i), a.annotations.addPointAnnotationExternal(t, e, a);
              },
            },
            {
              key: "clearAnnotations",
              value: function () {
                var t =
                    arguments.length > 0 && void 0 !== arguments[0]
                      ? arguments[0]
                      : void 0,
                  e = this;
                t && (e = t), e.annotations.clearAnnotations(e);
              },
            },
            {
              key: "removeAnnotation",
              value: function (t) {
                var e =
                    arguments.length > 1 && void 0 !== arguments[1]
                      ? arguments[1]
                      : void 0,
                  i = this;
                e && (i = e), i.annotations.removeAnnotation(i, t);
              },
            },
            {
              key: "addText",
              value: function (t) {
                var e =
                    !(arguments.length > 1 && void 0 !== arguments[1]) ||
                    arguments[1],
                  i =
                    arguments.length > 2 && void 0 !== arguments[2]
                      ? arguments[2]
                      : void 0,
                  a = this;
                i && (a = i), a.annotations.addText(t, e, a);
              },
            },
            {
              key: "getChartArea",
              value: function () {
                return this.w.globals.dom.baseEl.querySelector(
                  ".apexcharts-inner"
                );
              },
            },
            {
              key: "getSeriesTotalXRange",
              value: function (t, e) {
                return this.coreUtils.getSeriesTotalsXRange(t, e);
              },
            },
            {
              key: "getHighestValueInSeries",
              value: function () {
                var t =
                  arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : 0;
                return new U(this.ctx).getMinYMaxY(t).highestY;
              },
            },
            {
              key: "getLowestValueInSeries",
              value: function () {
                var t =
                  arguments.length > 0 && void 0 !== arguments[0]
                    ? arguments[0]
                    : 0;
                return new U(this.ctx).getMinYMaxY(t).lowestY;
              },
            },
            {
              key: "getSeriesTotal",
              value: function () {
                return this.w.globals.seriesTotals;
              },
            },
            {
              key: "setLocale",
              value: function (t) {
                this.setCurrentLocaleValues(t);
              },
            },
            {
              key: "toggleDataPointSelection",
              value: function (t, e) {
                var i = this.w,
                  a = null;
                i.globals.axisCharts
                  ? (a = i.globals.dom.Paper.select(
                      ".apexcharts-series[data\\:realIndex='"
                        .concat(t, "'] path[j='")
                        .concat(e, "'], .apexcharts-series[data\\:realIndex='")
                        .concat(t, "'] circle[j='")
                        .concat(e, "'], .apexcharts-series[data\\:realIndex='")
                        .concat(t, "'] rect[j='")
                        .concat(e, "']")
                    ).members[0])
                  : ((a = i.globals.dom.Paper.select(
                      ".apexcharts-series[data\\:realIndex='".concat(t, "']")
                    ).members[0]),
                    ("pie" === i.config.chart.type ||
                      "donut" === i.config.chart.type) &&
                      new Y(this.ctx).pieClicked(t));
                a
                  ? new p(this.ctx).pathMouseDown(a, null)
                  : console.warn("toggleDataPointSelection: Element not found");
                return a.node ? a.node : null;
              },
            },
            {
              key: "setCurrentLocaleValues",
              value: function (t) {
                var e = this.w.config.chart.locales;
                window.Apex.chart &&
                  window.Apex.chart.locales &&
                  window.Apex.chart.locales.length > 0 &&
                  (e = this.w.config.chart.locales.concat(
                    window.Apex.chart.locales
                  ));
                var i = e.filter(function (e) {
                  return e.name === t;
                })[0];
                if (!i)
                  throw new Error(
                    "Wrong locale name provided. Please make sure you set the correct locale name in options"
                  );
                var a = u.extend(x, i);
                this.w.globals.locale = a.options;
              },
            },
            {
              key: "dataURI",
              value: function () {
                return new ot(this.ctx).dataURI();
              },
            },
            {
              key: "paper",
              value: function () {
                return this.w.globals.dom.Paper;
              },
            },
            {
              key: "parentResizeCallback",
              value: function () {
                this.w.globals.animationEnded && this.windowResize();
              },
            },
            {
              key: "windowResize",
              value: function () {
                var t = this;
                clearTimeout(this.w.globals.resizeTimer),
                  (this.w.globals.resizeTimer = window.setTimeout(function () {
                    (t.w.globals.resized = !0),
                      (t.w.globals.dataChanged = !1),
                      t.update();
                  }, 150));
              },
            },
          ],
          [
            {
              key: "initOnLoad",
              value: function () {
                for (
                  var t = document.querySelectorAll("[data-apexcharts]"), e = 0;
                  e < t.length;
                  e++
                ) {
                  new i(
                    t[e],
                    JSON.parse(t[e].getAttribute("data-options"))
                  ).render();
                }
              },
            },
            {
              key: "exec",
              value: function (t, e) {
                var i = this.getChartByID(t);
                if (i) {
                  i.w.globals.isExecCalled = !0;
                  for (
                    var a = arguments.length,
                      s = new Array(a > 2 ? a - 2 : 0),
                      n = 2;
                    n < a;
                    n++
                  )
                    s[n - 2] = arguments[n];
                  switch (e) {
                    case "updateOptions":
                      return i.updateOptions.apply(i, s);
                    case "updateSeries":
                      return i.updateSeries.apply(i, s);
                    case "appendData":
                      return i.appendData.apply(i, s);
                    case "appendSeries":
                      return i.appendSeries.apply(i, s);
                    case "toggleSeries":
                      return i.toggleSeries.apply(i, s);
                    case "resetSeries":
                      return i.resetSeries.apply(i, s);
                    case "toggleDataPointSelection":
                      return i.toggleDataPointSelection.apply(i, s);
                    case "dataURI":
                      return i.dataURI.apply(i, s);
                    case "addXaxisAnnotation":
                      return i.addXaxisAnnotation.apply(i, s);
                    case "addYaxisAnnotation":
                      return i.addYaxisAnnotation.apply(i, s);
                    case "addPointAnnotation":
                      return i.addPointAnnotation.apply(i, s);
                    case "addText":
                      return i.addText.apply(i, s);
                    case "clearAnnotations":
                      return i.clearAnnotations.apply(i, s);
                    case "removeAnnotation":
                      return i.removeAnnotation.apply(i, s);
                    case "paper":
                      return i.paper.apply(i, s);
                    case "destroy":
                      return i.destroy();
                  }
                }
              },
            },
            {
              key: "merge",
              value: function (t, e) {
                return u.extend(t, e);
              },
            },
            {
              key: "getChartByID",
              value: function (t) {
                return Apex._chartInstances.filter(function (e) {
                  return e.id === t;
                })[0].chart;
              },
            },
          ]
        ),
        i
      );
    })()
  );
});
