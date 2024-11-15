/*
 Highstock JS v5.0.14 (2017-07-28)

 (c) 2009-2016 Torstein Honsi

 License: www.highcharts.com/license
*/
(function(J, T) {
    "object" === typeof module && module.exports ? module.exports = J.document ? T(J) : T : J.Highcharts = T(J)
})("undefined" !== typeof window ? window : this, function(J) {
    J = function() {
        var a = window,
            B = a.document,
            A = a.navigator && a.navigator.userAgent || "",
            C = B && B.createElementNS && !!B.createElementNS("http://www.w3.org/2000/svg", "svg").createSVGRect,
            E = /(edge|msie|trident)/i.test(A) && !window.opera,
            v = !C,
            f = /Firefox/.test(A),
            n = f && 4 > parseInt(A.split("Firefox/")[1], 10);
        return a.Highcharts ? a.Highcharts.error(16, !0) : {
            product: "Highstock",
            version: "5.0.14",
            deg2rad: 2 * Math.PI / 360,
            doc: B,
            hasBidiBug: n,
            hasTouch: B && void 0 !== B.documentElement.ontouchstart,
            isMS: E,
            isWebKit: /AppleWebKit/.test(A),
            isFirefox: f,
            isTouchDevice: /(Mobile|Android|Windows Phone)/.test(A),
            SVG_NS: "http://www.w3.org/2000/svg",
            chartCount: 0,
            seriesTypes: {},
            symbolSizes: {},
            svg: C,
            vml: v,
            win: a,
            marginNames: ["plotTop", "marginRight", "marginBottom", "plotLeft"],
            noop: function() {},
            charts: []
        }
    }();
    (function(a) {
        var B = [],
            A = a.charts,
            C = a.doc,
            E = a.win;
        a.error = function(v, f) {
            v = a.isNumber(v) ? "Highcharts error #" +
                v + ": www.highcharts.com/errors/" + v : v;
            if (f) throw Error(v);
            E.console && console.log(v)
        };
        a.Fx = function(a, f, n) {
            this.options = f;
            this.elem = a;
            this.prop = n
        };
        a.Fx.prototype = {
            dSetter: function() {
                var a = this.paths[0],
                    f = this.paths[1],
                    n = [],
                    t = this.now,
                    q = a.length,
                    r;
                if (1 === t) n = this.toD;
                else if (q === f.length && 1 > t)
                    for (; q--;) r = parseFloat(a[q]), n[q] = isNaN(r) ? a[q] : t * parseFloat(f[q] - r) + r;
                else n = f;
                this.elem.attr("d", n, null, !0)
            },
            update: function() {
                var a = this.elem,
                    f = this.prop,
                    n = this.now,
                    t = this.options.step;
                if (this[f + "Setter"]) this[f +
                    "Setter"]();
                else a.attr ? a.element && a.attr(f, n, null, !0) : a.style[f] = n + this.unit;
                t && t.call(a, n, this)
            },
            run: function(a, f, n) {
                var v = this,
                    q = function(a) {
                        return q.stopped ? !1 : v.step(a)
                    },
                    r;
                this.startTime = +new Date;
                this.start = a;
                this.end = f;
                this.unit = n;
                this.now = this.start;
                this.pos = 0;
                q.elem = this.elem;
                q.prop = this.prop;
                q() && 1 === B.push(q) && (q.timerId = setInterval(function() {
                    for (r = 0; r < B.length; r++) B[r]() || B.splice(r--, 1);
                    B.length || clearInterval(q.timerId)
                }, 13))
            },
            step: function(v) {
                var f = +new Date,
                    n, t = this.options,
                    q = this.elem,
                    r = t.complete,
                    h = t.duration,
                    e = t.curAnim;
                q.attr && !q.element ? v = !1 : v || f >= h + this.startTime ? (this.now = this.end, this.pos = 1, this.update(), n = e[this.prop] = !0, a.objectEach(e, function(a) {
                    !0 !== a && (n = !1)
                }), n && r && r.call(q), v = !1) : (this.pos = t.easing((f - this.startTime) / h), this.now = this.start + (this.end - this.start) * this.pos, this.update(), v = !0);
                return v
            },
            initPath: function(v, f, n) {
                function t(a) {
                    var b, k;
                    for (c = a.length; c--;) b = "M" === a[c] || "L" === a[c], k = /[a-zA-Z]/.test(a[c + 3]), b && k && a.splice(c + 1, 0, a[c + 1], a[c + 2], a[c + 1], a[c + 2])
                }

                function q(a, b) {
                    for (; a.length < z;) {
                        a[0] = b[z - a.length];
                        var p = a.slice(0, k);
                        [].splice.apply(a, [0, 0].concat(p));
                        x && (p = a.slice(a.length - k), [].splice.apply(a, [a.length, 0].concat(p)), c--)
                    }
                    a[0] = "M"
                }

                function r(a, c) {
                    for (var p = (z - a.length) / k; 0 < p && p--;) u = a.slice().splice(a.length / I - k, k * I), u[0] = c[z - k - p * k], b && (u[k - 6] = u[k - 2], u[k - 5] = u[k - 1]), [].splice.apply(a, [a.length / I, 0].concat(u)), x && p--
                }
                f = f || "";
                var h, e = v.startX,
                    m = v.endX,
                    b = -1 < f.indexOf("C"),
                    k = b ? 7 : 3,
                    z, u, c;
                f = f.split(" ");
                n = n.slice();
                var x = v.isArea,
                    I = x ? 2 : 1,
                    F;
                b && (t(f),
                    t(n));
                if (e && m) {
                    for (c = 0; c < e.length; c++)
                        if (e[c] === m[0]) {
                            h = c;
                            break
                        } else if (e[0] === m[m.length - e.length + c]) {
                        h = c;
                        F = !0;
                        break
                    }
                    void 0 === h && (f = [])
                }
                f.length && a.isNumber(h) && (z = n.length + h * I * k, F ? (q(f, n), r(n, f)) : (q(n, f), r(f, n)));
                return [f, n]
            }
        };
        a.Fx.prototype.fillSetter = a.Fx.prototype.strokeSetter = function() {
            this.elem.attr(this.prop, a.color(this.start).tweenTo(a.color(this.end), this.pos), null, !0)
        };
        a.extend = function(a, f) {
            var n;
            a || (a = {});
            for (n in f) a[n] = f[n];
            return a
        };
        a.merge = function() {
            var v, f = arguments,
                n, t = {},
                q =
                function(f, h) {
                    "object" !== typeof f && (f = {});
                    a.objectEach(h, function(e, m) {
                        !a.isObject(e, !0) || a.isClass(e) || a.isDOMElement(e) ? f[m] = h[m] : f[m] = q(f[m] || {}, e)
                    });
                    return f
                };
            !0 === f[0] && (t = f[1], f = Array.prototype.slice.call(f, 2));
            n = f.length;
            for (v = 0; v < n; v++) t = q(t, f[v]);
            return t
        };
        a.pInt = function(a, f) {
            return parseInt(a, f || 10)
        };
        a.isString = function(a) {
            return "string" === typeof a
        };
        a.isArray = function(a) {
            a = Object.prototype.toString.call(a);
            return "[object Array]" === a || "[object Array Iterator]" === a
        };
        a.isObject = function(v,
            f) {
            return !!v && "object" === typeof v && (!f || !a.isArray(v))
        };
        a.isDOMElement = function(v) {
            return a.isObject(v) && "number" === typeof v.nodeType
        };
        a.isClass = function(v) {
            var f = v && v.constructor;
            return !(!a.isObject(v, !0) || a.isDOMElement(v) || !f || !f.name || "Object" === f.name)
        };
        a.isNumber = function(a) {
            return "number" === typeof a && !isNaN(a)
        };
        a.erase = function(a, f) {
            for (var n = a.length; n--;)
                if (a[n] === f) {
                    a.splice(n, 1);
                    break
                }
        };
        a.defined = function(a) {
            return void 0 !== a && null !== a
        };
        a.attr = function(v, f, n) {
            var t;
            a.isString(f) ? a.defined(n) ?
                v.setAttribute(f, n) : v && v.getAttribute && (t = v.getAttribute(f)) : a.defined(f) && a.isObject(f) && a.objectEach(f, function(a, f) {
                    v.setAttribute(f, a)
                });
            return t
        };
        a.splat = function(v) {
            return a.isArray(v) ? v : [v]
        };
        a.syncTimeout = function(a, f, n) {
            if (f) return setTimeout(a, f, n);
            a.call(0, n)
        };
        a.pick = function() {
            var a = arguments,
                f, n, t = a.length;
            for (f = 0; f < t; f++)
                if (n = a[f], void 0 !== n && null !== n) return n
        };
        a.css = function(v, f) {
            a.isMS && !a.svg && f && void 0 !== f.opacity && (f.filter = "alpha(opacity\x3d" + 100 * f.opacity + ")");
            a.extend(v.style,
                f)
        };
        a.createElement = function(v, f, n, t, q) {
            v = C.createElement(v);
            var r = a.css;
            f && a.extend(v, f);
            q && r(v, {
                padding: 0,
                border: "none",
                margin: 0
            });
            n && r(v, n);
            t && t.appendChild(v);
            return v
        };
        a.extendClass = function(v, f) {
            var n = function() {};
            n.prototype = new v;
            a.extend(n.prototype, f);
            return n
        };
        a.pad = function(a, f, n) {
            return Array((f || 2) + 1 - String(a).length).join(n || 0) + a
        };
        a.relativeLength = function(a, f, n) {
            return /%$/.test(a) ? f * parseFloat(a) / 100 + (n || 0) : parseFloat(a)
        };
        a.wrap = function(a, f, n) {
            var t = a[f];
            a[f] = function() {
                var a = Array.prototype.slice.call(arguments),
                    f = arguments,
                    h = this;
                h.proceed = function() {
                    t.apply(h, arguments.length ? arguments : f)
                };
                a.unshift(t);
                a = n.apply(this, a);
                h.proceed = null;
                return a
            }
        };
        a.getTZOffset = function(v) {
            var f = a.Date;
            return 6E4 * (f.hcGetTimezoneOffset && f.hcGetTimezoneOffset(v) || f.hcTimezoneOffset || 0)
        };
        a.dateFormat = function(v, f, n) {
            if (!a.defined(f) || isNaN(f)) return a.defaultOptions.lang.invalidDate || "";
            v = a.pick(v, "%Y-%m-%d %H:%M:%S");
            var t = a.Date,
                q = new t(f - a.getTZOffset(f)),
                r = q[t.hcGetHours](),
                h = q[t.hcGetDay](),
                e = q[t.hcGetDate](),
                m = q[t.hcGetMonth](),
                b = q[t.hcGetFullYear](),
                k = a.defaultOptions.lang,
                z = k.weekdays,
                u = k.shortWeekdays,
                c = a.pad,
                t = a.extend({
                    a: u ? u[h] : z[h].substr(0, 3),
                    A: z[h],
                    d: c(e),
                    e: c(e, 2, " "),
                    w: h,
                    b: k.shortMonths[m],
                    B: k.months[m],
                    m: c(m + 1),
                    y: b.toString().substr(2, 2),
                    Y: b,
                    H: c(r),
                    k: r,
                    I: c(r % 12 || 12),
                    l: r % 12 || 12,
                    M: c(q[t.hcGetMinutes]()),
                    p: 12 > r ? "AM" : "PM",
                    P: 12 > r ? "am" : "pm",
                    S: c(q.getSeconds()),
                    L: c(Math.round(f % 1E3), 3)
                }, a.dateFormats);
            a.objectEach(t, function(a, c) {
                for (; - 1 !== v.indexOf("%" + c);) v = v.replace("%" + c, "function" === typeof a ? a(f) : a)
            });
            return n ? v.substr(0,
                1).toUpperCase() + v.substr(1) : v
        };
        a.formatSingle = function(v, f) {
            var n = /\.([0-9])/,
                t = a.defaultOptions.lang;
            /f$/.test(v) ? (n = (n = v.match(n)) ? n[1] : -1, null !== f && (f = a.numberFormat(f, n, t.decimalPoint, -1 < v.indexOf(",") ? t.thousandsSep : ""))) : f = a.dateFormat(v, f);
            return f
        };
        a.format = function(v, f) {
            for (var n = "{", t = !1, q, r, h, e, m = [], b; v;) {
                n = v.indexOf(n);
                if (-1 === n) break;
                q = v.slice(0, n);
                if (t) {
                    q = q.split(":");
                    r = q.shift().split(".");
                    e = r.length;
                    b = f;
                    for (h = 0; h < e; h++) b = b[r[h]];
                    q.length && (b = a.formatSingle(q.join(":"), b));
                    m.push(b)
                } else m.push(q);
                v = v.slice(n + 1);
                n = (t = !t) ? "}" : "{"
            }
            m.push(v);
            return m.join("")
        };
        a.getMagnitude = function(a) {
            return Math.pow(10, Math.floor(Math.log(a) / Math.LN10))
        };
        a.normalizeTickInterval = function(v, f, n, t, q) {
            var r, h = v;
            n = a.pick(n, 1);
            r = v / n;
            f || (f = q ? [1, 1.2, 1.5, 2, 2.5, 3, 4, 5, 6, 8, 10] : [1, 2, 2.5, 5, 10], !1 === t && (1 === n ? f = a.grep(f, function(a) {
                return 0 === a % 1
            }) : .1 >= n && (f = [1 / n])));
            for (t = 0; t < f.length && !(h = f[t], q && h * n >= v || !q && r <= (f[t] + (f[t + 1] || f[t])) / 2); t++);
            return h = a.correctFloat(h * n, -Math.round(Math.log(.001) / Math.LN10))
        };
        a.stableSort =
            function(a, f) {
                var n = a.length,
                    t, q;
                for (q = 0; q < n; q++) a[q].safeI = q;
                a.sort(function(a, h) {
                    t = f(a, h);
                    return 0 === t ? a.safeI - h.safeI : t
                });
                for (q = 0; q < n; q++) delete a[q].safeI
            };
        a.arrayMin = function(a) {
            for (var f = a.length, n = a[0]; f--;) a[f] < n && (n = a[f]);
            return n
        };
        a.arrayMax = function(a) {
            for (var f = a.length, n = a[0]; f--;) a[f] > n && (n = a[f]);
            return n
        };
        a.destroyObjectProperties = function(v, f) {
            a.objectEach(v, function(a, t) {
                a && a !== f && a.destroy && a.destroy();
                delete v[t]
            })
        };
        a.discardElement = function(v) {
            var f = a.garbageBin;
            f || (f = a.createElement("div"));
            v && f.appendChild(v);
            f.innerHTML = ""
        };
        a.correctFloat = function(a, f) {
            return parseFloat(a.toPrecision(f || 14))
        };
        a.setAnimation = function(v, f) {
            f.renderer.globalAnimation = a.pick(v, f.options.chart.animation, !0)
        };
        a.animObject = function(v) {
            return a.isObject(v) ? a.merge(v) : {
                duration: v ? 500 : 0
            }
        };
        a.timeUnits = {
            millisecond: 1,
            second: 1E3,
            minute: 6E4,
            hour: 36E5,
            day: 864E5,
            week: 6048E5,
            month: 24192E5,
            year: 314496E5
        };
        a.numberFormat = function(v, f, n, t) {
            v = +v || 0;
            f = +f;
            var q = a.defaultOptions.lang,
                r = (v.toString().split(".")[1] || "").split("e")[0].length,
                h, e, m = v.toString().split("e"); - 1 === f ? f = Math.min(r, 20) : a.isNumber(f) || (f = 2);
            e = (Math.abs(m[1] ? m[0] : v) + Math.pow(10, -Math.max(f, r) - 1)).toFixed(f);
            r = String(a.pInt(e));
            h = 3 < r.length ? r.length % 3 : 0;
            n = a.pick(n, q.decimalPoint);
            t = a.pick(t, q.thousandsSep);
            v = (0 > v ? "-" : "") + (h ? r.substr(0, h) + t : "");
            v += r.substr(h).replace(/(\d{3})(?=\d)/g, "$1" + t);
            f && (v += n + e.slice(-f));
            m[1] && (v += "e" + m[1]);
            return v
        };
        Math.easeInOutSine = function(a) {
            return -.5 * (Math.cos(Math.PI * a) - 1)
        };
        a.getStyle = function(v, f, n) {
            if ("width" === f) return Math.min(v.offsetWidth,
                v.scrollWidth) - a.getStyle(v, "padding-left") - a.getStyle(v, "padding-right");
            if ("height" === f) return Math.min(v.offsetHeight, v.scrollHeight) - a.getStyle(v, "padding-top") - a.getStyle(v, "padding-bottom");
            if (v = E.getComputedStyle(v, void 0)) v = v.getPropertyValue(f), a.pick(n, !0) && (v = a.pInt(v));
            return v
        };
        a.inArray = function(a, f) {
            return f.indexOf ? f.indexOf(a) : [].indexOf.call(f, a)
        };
        a.grep = function(a, f) {
            return [].filter.call(a, f)
        };
        a.find = function(a, f) {
            return [].find.call(a, f)
        };
        a.map = function(a, f) {
            for (var n = [], t = 0, q =
                    a.length; t < q; t++) n[t] = f.call(a[t], a[t], t, a);
            return n
        };
        a.offset = function(a) {
            var f = C.documentElement;
            a = a.getBoundingClientRect();
            return {
                top: a.top + (E.pageYOffset || f.scrollTop) - (f.clientTop || 0),
                left: a.left + (E.pageXOffset || f.scrollLeft) - (f.clientLeft || 0)
            }
        };
        a.stop = function(a, f) {
            for (var n = B.length; n--;) B[n].elem !== a || f && f !== B[n].prop || (B[n].stopped = !0)
        };
        a.each = function(a, f, n) {
            return Array.prototype.forEach.call(a, f, n)
        };
        a.objectEach = function(a, f, n) {
            for (var t in a) a.hasOwnProperty(t) && f.call(n, a[t], t, a)
        };
        a.addEvent = function(v, f, n) {
            function t(a) {
                a.target = a.srcElement || E;
                n.call(v, a)
            }
            var q = v.hcEvents = v.hcEvents || {};
            v.addEventListener ? v.addEventListener(f, n, !1) : v.attachEvent && (v.hcEventsIE || (v.hcEventsIE = {}), n.hcGetKey || (n.hcGetKey = a.uniqueKey()), v.hcEventsIE[n.hcGetKey] = t, v.attachEvent("on" + f, t));
            q[f] || (q[f] = []);
            q[f].push(n);
            return function() {
                a.removeEvent(v, f, n)
            }
        };
        a.removeEvent = function(v, f, n) {
            function t(a, b) {
                v.removeEventListener ? v.removeEventListener(a, b, !1) : v.attachEvent && (b = v.hcEventsIE[b.hcGetKey],
                    v.detachEvent("on" + a, b))
            }

            function q() {
                var e, b;
                v.nodeName && (f ? (e = {}, e[f] = !0) : e = h, a.objectEach(e, function(a, e) {
                    if (h[e])
                        for (b = h[e].length; b--;) t(e, h[e][b])
                }))
            }
            var r, h = v.hcEvents,
                e;
            h && (f ? (r = h[f] || [], n ? (e = a.inArray(n, r), -1 < e && (r.splice(e, 1), h[f] = r), t(f, n)) : (q(), h[f] = [])) : (q(), v.hcEvents = {}))
        };
        a.fireEvent = function(v, f, n, t) {
            var q;
            q = v.hcEvents;
            var r, h;
            n = n || {};
            if (C.createEvent && (v.dispatchEvent || v.fireEvent)) q = C.createEvent("Events"), q.initEvent(f, !0, !0), a.extend(q, n), v.dispatchEvent ? v.dispatchEvent(q) : v.fireEvent(f,
                q);
            else if (q)
                for (q = q[f] || [], r = q.length, n.target || a.extend(n, {
                        preventDefault: function() {
                            n.defaultPrevented = !0
                        },
                        target: v,
                        type: f
                    }), f = 0; f < r; f++)(h = q[f]) && !1 === h.call(v, n) && n.preventDefault();
            t && !n.defaultPrevented && t(n)
        };
        a.animate = function(v, f, n) {
            var t, q = "",
                r, h, e;
            a.isObject(n) || (e = arguments, n = {
                duration: e[2],
                easing: e[3],
                complete: e[4]
            });
            a.isNumber(n.duration) || (n.duration = 400);
            n.easing = "function" === typeof n.easing ? n.easing : Math[n.easing] || Math.easeInOutSine;
            n.curAnim = a.merge(f);
            a.objectEach(f, function(e,
                b) {
                a.stop(v, b);
                h = new a.Fx(v, n, b);
                r = null;
                "d" === b ? (h.paths = h.initPath(v, v.d, f.d), h.toD = f.d, t = 0, r = 1) : v.attr ? t = v.attr(b) : (t = parseFloat(a.getStyle(v, b)) || 0, "opacity" !== b && (q = "px"));
                r || (r = e);
                r && r.match && r.match("px") && (r = r.replace(/px/g, ""));
                h.run(t, r, q)
            })
        };
        a.seriesType = function(v, f, n, t, q) {
            var r = a.getOptions(),
                h = a.seriesTypes;
            r.plotOptions[v] = a.merge(r.plotOptions[f], n);
            h[v] = a.extendClass(h[f] || function() {}, t);
            h[v].prototype.type = v;
            q && (h[v].prototype.pointClass = a.extendClass(a.Point, q));
            return h[v]
        };
        a.uniqueKey =
            function() {
                var a = Math.random().toString(36).substring(2, 9),
                    f = 0;
                return function() {
                    return "highcharts-" + a + "-" + f++
                }
            }();
        E.jQuery && (E.jQuery.fn.highcharts = function() {
            var v = [].slice.call(arguments);
            if (this[0]) return v[0] ? (new(a[a.isString(v[0]) ? v.shift() : "Chart"])(this[0], v[0], v[1]), this) : A[a.attr(this[0], "data-highcharts-chart")]
        });
        C && !C.defaultView && (a.getStyle = function(v, f) {
            var n = {
                width: "clientWidth",
                height: "clientHeight"
            }[f];
            if (v.style[f]) return a.pInt(v.style[f]);
            "opacity" === f && (f = "filter");
            if (n) return v.style.zoom =
                1, Math.max(v[n] - 2 * a.getStyle(v, "padding"), 0);
            v = v.currentStyle[f.replace(/\-(\w)/g, function(a, f) {
                return f.toUpperCase()
            })];
            "filter" === f && (v = v.replace(/alpha\(opacity=([0-9]+)\)/, function(a, f) {
                return f / 100
            }));
            return "" === v ? 1 : a.pInt(v)
        });
        Array.prototype.forEach || (a.each = function(a, f, n) {
            for (var t = 0, q = a.length; t < q; t++)
                if (!1 === f.call(n, a[t], t, a)) return t
        });
        Array.prototype.indexOf || (a.inArray = function(a, f) {
            var n, t = 0;
            if (f)
                for (n = f.length; t < n; t++)
                    if (f[t] === a) return t;
            return -1
        });
        Array.prototype.filter || (a.grep =
            function(a, f) {
                for (var n = [], t = 0, q = a.length; t < q; t++) f(a[t], t) && n.push(a[t]);
                return n
            });
        Array.prototype.find || (a.find = function(a, f) {
            var n, t = a.length;
            for (n = 0; n < t; n++)
                if (f(a[n], n)) return a[n]
        })
    })(J);
    (function(a) {
        var B = a.each,
            A = a.isNumber,
            C = a.map,
            E = a.merge,
            v = a.pInt;
        a.Color = function(f) {
            if (!(this instanceof a.Color)) return new a.Color(f);
            this.init(f)
        };
        a.Color.prototype = {
            parsers: [{
                regex: /rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]?(?:\.[0-9]+)?)\s*\)/,
                parse: function(a) {
                    return [v(a[1]),
                        v(a[2]), v(a[3]), parseFloat(a[4], 10)
                    ]
                }
            }, {
                regex: /rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/,
                parse: function(a) {
                    return [v(a[1]), v(a[2]), v(a[3]), 1]
                }
            }],
            names: {
                none: "rgba(255,255,255,0)",
                white: "#ffffff",
                black: "#000000"
            },
            init: function(f) {
                var n, t, q, r;
                if ((this.input = f = this.names[f && f.toLowerCase ? f.toLowerCase() : ""] || f) && f.stops) this.stops = C(f.stops, function(h) {
                    return new a.Color(h[1])
                });
                else if (f && "#" === f.charAt() && (n = f.length, f = parseInt(f.substr(1), 16), 7 === n ? t = [(f & 16711680) >> 16, (f & 65280) >>
                        8, f & 255, 1
                    ] : 4 === n && (t = [(f & 3840) >> 4 | (f & 3840) >> 8, (f & 240) >> 4 | f & 240, (f & 15) << 4 | f & 15, 1])), !t)
                    for (q = this.parsers.length; q-- && !t;) r = this.parsers[q], (n = r.regex.exec(f)) && (t = r.parse(n));
                this.rgba = t || []
            },
            get: function(a) {
                var f = this.input,
                    t = this.rgba,
                    q;
                this.stops ? (q = E(f), q.stops = [].concat(q.stops), B(this.stops, function(f, h) {
                    q.stops[h] = [q.stops[h][0], f.get(a)]
                })) : q = t && A(t[0]) ? "rgb" === a || !a && 1 === t[3] ? "rgb(" + t[0] + "," + t[1] + "," + t[2] + ")" : "a" === a ? t[3] : "rgba(" + t.join(",") + ")" : f;
                return q
            },
            brighten: function(a) {
                var f, t = this.rgba;
                if (this.stops) B(this.stops, function(f) {
                    f.brighten(a)
                });
                else if (A(a) && 0 !== a)
                    for (f = 0; 3 > f; f++) t[f] += v(255 * a), 0 > t[f] && (t[f] = 0), 255 < t[f] && (t[f] = 255);
                return this
            },
            setOpacity: function(a) {
                this.rgba[3] = a;
                return this
            },
            tweenTo: function(a, n) {
                var f, q;
                a.rgba.length ? (f = this.rgba, a = a.rgba, q = 1 !== a[3] || 1 !== f[3], a = (q ? "rgba(" : "rgb(") + Math.round(a[0] + (f[0] - a[0]) * (1 - n)) + "," + Math.round(a[1] + (f[1] - a[1]) * (1 - n)) + "," + Math.round(a[2] + (f[2] - a[2]) * (1 - n)) + (q ? "," + (a[3] + (f[3] - a[3]) * (1 - n)) : "") + ")") : a = a.input || "none";
                return a
            }
        };
        a.color =
            function(f) {
                return new a.Color(f)
            }
    })(J);
    (function(a) {
        var B, A, C = a.addEvent,
            E = a.animate,
            v = a.attr,
            f = a.charts,
            n = a.color,
            t = a.css,
            q = a.createElement,
            r = a.defined,
            h = a.deg2rad,
            e = a.destroyObjectProperties,
            m = a.doc,
            b = a.each,
            k = a.extend,
            z = a.erase,
            u = a.grep,
            c = a.hasTouch,
            x = a.inArray,
            I = a.isArray,
            F = a.isFirefox,
            H = a.isMS,
            p = a.isObject,
            y = a.isString,
            l = a.isWebKit,
            D = a.merge,
            d = a.noop,
            G = a.objectEach,
            g = a.pick,
            w = a.pInt,
            P = a.removeEvent,
            K = a.splat,
            M = a.stop,
            N = a.svg,
            R = a.SVG_NS,
            Q = a.symbolSizes,
            O = a.win;
        B = a.SVGElement = function() {
            return this
        };
        k(B.prototype, {
            opacity: 1,
            SVG_NS: R,
            textProps: "direction fontSize fontWeight fontFamily fontStyle color lineHeight width textAlign textDecoration textOverflow textOutline".split(" "),
            init: function(a, g) {
                this.element = "span" === g ? q(g) : m.createElementNS(this.SVG_NS, g);
                this.renderer = a
            },
            animate: function(d, w, c) {
                w = a.animObject(g(w, this.renderer.globalAnimation, !0));
                0 !== w.duration ? (c && (w.complete = c), E(this, d, w)) : (this.attr(d, null, c), w.step && w.step.call(this));
                return this
            },
            colorGradient: function(g, d, w) {
                var L =
                    this.renderer,
                    c, l, p, k, e, u, m, h, K, x, y = [],
                    z;
                g.radialGradient ? l = "radialGradient" : g.linearGradient && (l = "linearGradient");
                l && (p = g[l], e = L.gradients, m = g.stops, x = w.radialReference, I(p) && (g[l] = p = {
                    x1: p[0],
                    y1: p[1],
                    x2: p[2],
                    y2: p[3],
                    gradientUnits: "userSpaceOnUse"
                }), "radialGradient" === l && x && !r(p.gradientUnits) && (k = p, p = D(p, L.getRadialAttr(x, k), {
                    gradientUnits: "userSpaceOnUse"
                })), G(p, function(a, g) {
                    "id" !== g && y.push(g, a)
                }), G(m, function(a) {
                    y.push(a)
                }), y = y.join(","), e[y] ? x = e[y].attr("id") : (p.id = x = a.uniqueKey(), e[y] = u = L.createElement(l).attr(p).add(L.defs),
                    u.radAttr = k, u.stops = [], b(m, function(g) {
                        0 === g[1].indexOf("rgba") ? (c = a.color(g[1]), h = c.get("rgb"), K = c.get("a")) : (h = g[1], K = 1);
                        g = L.createElement("stop").attr({
                            offset: g[0],
                            "stop-color": h,
                            "stop-opacity": K
                        }).add(u);
                        u.stops.push(g)
                    })), z = "url(" + L.url + "#" + x + ")", w.setAttribute(d, z), w.gradient = y, g.toString = function() {
                    return z
                })
            },
            applyTextOutline: function(g) {
                var d = this.element,
                    w, L, c, l, p; - 1 !== g.indexOf("contrast") && (g = g.replace(/contrast/g, this.renderer.getContrast(d.style.fill)));
                g = g.split(" ");
                L = g[g.length - 1];
                if ((c = g[0]) && "none" !== c && a.svg) {
                    this.fakeTS = !0;
                    g = [].slice.call(d.getElementsByTagName("tspan"));
                    this.ySetter = this.xSetter;
                    c = c.replace(/(^[\d\.]+)(.*?)$/g, function(a, g, d) {
                        return 2 * g + d
                    });
                    for (p = g.length; p--;) w = g[p], "highcharts-text-outline" === w.getAttribute("class") && z(g, d.removeChild(w));
                    l = d.firstChild;
                    b(g, function(a, g) {
                        0 === g && (a.setAttribute("x", d.getAttribute("x")), g = d.getAttribute("y"), a.setAttribute("y", g || 0), null === g && d.setAttribute("y", 0));
                        a = a.cloneNode(1);
                        v(a, {
                            "class": "highcharts-text-outline",
                            fill: L,
                            stroke: L,
                            "stroke-width": c,
                            "stroke-linejoin": "round"
                        });
                        d.insertBefore(a, l)
                    })
                }
            },
            attr: function(a, g, d, w) {
                var L, c = this.element,
                    l, b = this,
                    p, k;
                "string" === typeof a && void 0 !== g && (L = a, a = {}, a[L] = g);
                "string" === typeof a ? b = (this[a + "Getter"] || this._defaultGetter).call(this, a, c) : (G(a, function(g, d) {
                    p = !1;
                    w || M(this, d);
                    this.symbolName && /^(x|y|width|height|r|start|end|innerR|anchorX|anchorY)$/.test(d) && (l || (this.symbolAttr(a), l = !0), p = !0);
                    !this.rotation || "x" !== d && "y" !== d || (this.doTransform = !0);
                    p || (k = this[d + "Setter"] ||
                        this._defaultSetter, k.call(this, g, d, c))
                }, this), this.afterSetters());
                d && d();
                return b
            },
            afterSetters: function() {
                this.doTransform && (this.updateTransform(), this.doTransform = !1)
            },
            addClass: function(a, g) {
                var d = this.attr("class") || ""; - 1 === d.indexOf(a) && (g || (a = (d + (d ? " " : "") + a).replace("  ", " ")), this.attr("class", a));
                return this
            },
            hasClass: function(a) {
                return -1 !== x(a, (this.attr("class") || "").split(" "))
            },
            removeClass: function(a) {
                return this.attr("class", (this.attr("class") || "").replace(a, ""))
            },
            symbolAttr: function(a) {
                var d =
                    this;
                b("x y r start end width height innerR anchorX anchorY".split(" "), function(w) {
                    d[w] = g(a[w], d[w])
                });
                d.attr({
                    d: d.renderer.symbols[d.symbolName](d.x, d.y, d.width, d.height, d)
                })
            },
            clip: function(a) {
                return this.attr("clip-path", a ? "url(" + this.renderer.url + "#" + a.id + ")" : "none")
            },
            crisp: function(a, g) {
                var d = this,
                    w = {},
                    c;
                g = g || a.strokeWidth || 0;
                c = Math.round(g) % 2 / 2;
                a.x = Math.floor(a.x || d.x || 0) + c;
                a.y = Math.floor(a.y || d.y || 0) + c;
                a.width = Math.floor((a.width || d.width || 0) - 2 * c);
                a.height = Math.floor((a.height || d.height || 0) -
                    2 * c);
                r(a.strokeWidth) && (a.strokeWidth = g);
                G(a, function(a, g) {
                    d[g] !== a && (d[g] = w[g] = a)
                });
                return w
            },
            css: function(a) {
                var g = this.styles,
                    d = {},
                    c = this.element,
                    l, b = "",
                    p, L = !g,
                    e = ["textOutline", "textOverflow", "width"];
                a && a.color && (a.fill = a.color);
                g && G(a, function(a, w) {
                    a !== g[w] && (d[w] = a, L = !0)
                });
                L && (g && (a = k(g, d)), l = this.textWidth = a && a.width && "auto" !== a.width && "text" === c.nodeName.toLowerCase() && w(a.width), this.styles = a, l && !N && this.renderer.forExport && delete a.width, H && !N ? t(this.element, a) : (p = function(a, g) {
                    return "-" +
                        g.toLowerCase()
                }, G(a, function(a, g) {
                    -1 === x(g, e) && (b += g.replace(/([A-Z])/g, p) + ":" + a + ";")
                }), b && v(c, "style", b)), this.added && ("text" === this.element.nodeName && this.renderer.buildText(this), a && a.textOutline && this.applyTextOutline(a.textOutline)));
                return this
            },
            getStyle: function(a) {
                return O.getComputedStyle(this.element || this, "").getPropertyValue(a)
            },
            strokeWidth: function() {
                var a = this.getStyle("stroke-width"),
                    g;
                a.indexOf("px") === a.length - 2 ? a = w(a) : (g = m.createElementNS(R, "rect"), v(g, {
                        width: a,
                        "stroke-width": 0
                    }),
                    this.element.parentNode.appendChild(g), a = g.getBBox().width, g.parentNode.removeChild(g));
                return a
            },
            on: function(a, g) {
                var d = this,
                    w = d.element;
                c && "click" === a ? (w.ontouchstart = function(a) {
                    d.touchEventFired = Date.now();
                    a.preventDefault();
                    g.call(w, a)
                }, w.onclick = function(a) {
                    (-1 === O.navigator.userAgent.indexOf("Android") || 1100 < Date.now() - (d.touchEventFired || 0)) && g.call(w, a)
                }) : w["on" + a] = g;
                return this
            },
            setRadialReference: function(a) {
                var g = this.renderer.gradients[this.element.gradient];
                this.element.radialReference =
                    a;
                g && g.radAttr && g.animate(this.renderer.getRadialAttr(a, g.radAttr));
                return this
            },
            translate: function(a, g) {
                return this.attr({
                    translateX: a,
                    translateY: g
                })
            },
            invert: function(a) {
                this.inverted = a;
                this.updateTransform();
                return this
            },
            updateTransform: function() {
                var a = this.translateX || 0,
                    d = this.translateY || 0,
                    w = this.scaleX,
                    c = this.scaleY,
                    l = this.inverted,
                    b = this.rotation,
                    p = this.element;
                l && (a += this.width, d += this.height);
                a = ["translate(" + a + "," + d + ")"];
                l ? a.push("rotate(90) scale(-1,1)") : b && a.push("rotate(" + b + " " + (p.getAttribute("x") ||
                    0) + " " + (p.getAttribute("y") || 0) + ")");
                (r(w) || r(c)) && a.push("scale(" + g(w, 1) + " " + g(c, 1) + ")");
                a.length && p.setAttribute("transform", a.join(" "))
            },
            toFront: function() {
                var a = this.element;
                a.parentNode.appendChild(a);
                return this
            },
            align: function(a, d, w) {
                var c, l, b, p, k = {};
                l = this.renderer;
                b = l.alignedObjects;
                var L, e;
                if (a) {
                    if (this.alignOptions = a, this.alignByTranslate = d, !w || y(w)) this.alignTo = c = w || "renderer", z(b, this), b.push(this), w = null
                } else a = this.alignOptions, d = this.alignByTranslate, c = this.alignTo;
                w = g(w, l[c], l);
                c = a.align;
                l = a.verticalAlign;
                b = (w.x || 0) + (a.x || 0);
                p = (w.y || 0) + (a.y || 0);
                "right" === c ? L = 1 : "center" === c && (L = 2);
                L && (b += (w.width - (a.width || 0)) / L);
                k[d ? "translateX" : "x"] = Math.round(b);
                "bottom" === l ? e = 1 : "middle" === l && (e = 2);
                e && (p += (w.height - (a.height || 0)) / e);
                k[d ? "translateY" : "y"] = Math.round(p);
                this[this.placed ? "animate" : "attr"](k);
                this.placed = !0;
                this.alignAttr = k;
                return this
            },
            getBBox: function(a, d) {
                var w, c = this.renderer,
                    l, p = this.element,
                    L = this.styles,
                    e, u = this.textStr,
                    D, m = c.cache,
                    x = c.cacheKeys,
                    K;
                d = g(d, this.rotation);
                l = d * h;
                e = p && B.prototype.getStyle.call(p, "font-size");
                void 0 !== u && (K = u.toString(), -1 === K.indexOf("\x3c") && (K = K.replace(/[0-9]/g, "0")), K += ["", d || 0, e, L && L.width, L && L.textOverflow].join());
                K && !a && (w = m[K]);
                if (!w) {
                    if (p.namespaceURI === this.SVG_NS || c.forExport) {
                        try {
                            (D = this.fakeTS && function(a) {
                                b(p.querySelectorAll(".highcharts-text-outline"), function(g) {
                                    g.style.display = a
                                })
                            }) && D("none"), w = p.getBBox ? k({}, p.getBBox()) : {
                                width: p.offsetWidth,
                                height: p.offsetHeight
                            }, D && D("")
                        } catch (U) {}
                        if (!w || 0 > w.width) w = {
                            width: 0,
                            height: 0
                        }
                    } else w =
                        this.htmlGetBBox();
                    c.isSVG && (a = w.width, c = w.height, L && "11px" === L.fontSize && 17 === Math.round(c) && (w.height = c = 14), d && (w.width = Math.abs(c * Math.sin(l)) + Math.abs(a * Math.cos(l)), w.height = Math.abs(c * Math.cos(l)) + Math.abs(a * Math.sin(l))));
                    if (K && 0 < w.height) {
                        for (; 250 < x.length;) delete m[x.shift()];
                        m[K] || x.push(K);
                        m[K] = w
                    }
                }
                return w
            },
            show: function(a) {
                return this.attr({
                    visibility: a ? "inherit" : "visible"
                })
            },
            hide: function() {
                return this.attr({
                    visibility: "hidden"
                })
            },
            fadeOut: function(a) {
                var g = this;
                g.animate({
                    opacity: 0
                }, {
                    duration: a || 150,
                    complete: function() {
                        g.attr({
                            y: -9999
                        })
                    }
                })
            },
            add: function(a) {
                var g = this.renderer,
                    d = this.element,
                    w;
                a && (this.parentGroup = a);
                this.parentInverted = a && a.inverted;
                void 0 !== this.textStr && g.buildText(this);
                this.added = !0;
                if (!a || a.handleZ || this.zIndex) w = this.zIndexSetter();
                w || (a ? a.element : g.box).appendChild(d);
                if (this.onAdd) this.onAdd();
                return this
            },
            safeRemoveChild: function(a) {
                var g = a.parentNode;
                g && g.removeChild(a)
            },
            destroy: function() {
                var a = this,
                    g = a.element || {},
                    d = a.renderer.isSVG && "SPAN" === g.nodeName &&
                    a.parentGroup,
                    w = g.ownerSVGElement;
                g.onclick = g.onmouseout = g.onmouseover = g.onmousemove = g.point = null;
                M(a);
                a.clipPath && w && (b(w.querySelectorAll("[clip-path]"), function(g) {
                    -1 < g.getAttribute("clip-path").indexOf(a.clipPath.element.id + ")") && g.removeAttribute("clip-path")
                }), a.clipPath = a.clipPath.destroy());
                if (a.stops) {
                    for (w = 0; w < a.stops.length; w++) a.stops[w] = a.stops[w].destroy();
                    a.stops = null
                }
                for (a.safeRemoveChild(g); d && d.div && 0 === d.div.childNodes.length;) g = d.parentGroup, a.safeRemoveChild(d.div), delete d.div,
                    d = g;
                a.alignTo && z(a.renderer.alignedObjects, a);
                G(a, function(g, d) {
                    delete a[d]
                });
                return null
            },
            xGetter: function(a) {
                "circle" === this.element.nodeName && ("x" === a ? a = "cx" : "y" === a && (a = "cy"));
                return this._defaultGetter(a)
            },
            _defaultGetter: function(a) {
                a = g(this[a], this.element ? this.element.getAttribute(a) : null, 0);
                /^[\-0-9\.]+$/.test(a) && (a = parseFloat(a));
                return a
            },
            dSetter: function(a, g, d) {
                a && a.join && (a = a.join(" "));
                /(NaN| {2}|^$)/.test(a) && (a = "M 0 0");
                this[g] !== a && (d.setAttribute(g, a), this[g] = a)
            },
            alignSetter: function(a) {
                this.element.setAttribute("text-anchor", {
                    left: "start",
                    center: "middle",
                    right: "end"
                }[a])
            },
            opacitySetter: function(a, g, d) {
                this[g] = a;
                d.setAttribute(g, a)
            },
            titleSetter: function(a) {
                var d = this.element.getElementsByTagName("title")[0];
                d || (d = m.createElementNS(this.SVG_NS, "title"), this.element.appendChild(d));
                d.firstChild && d.removeChild(d.firstChild);
                d.appendChild(m.createTextNode(String(g(a), "").replace(/<[^>]*>/g, "")))
            },
            textSetter: function(a) {
                a !== this.textStr && (delete this.bBox, this.textStr = a, this.added && this.renderer.buildText(this))
            },
            fillSetter: function(a,
                g, d) {
                "string" === typeof a ? d.setAttribute(g, a) : a && this.colorGradient(a, g, d)
            },
            visibilitySetter: function(a, g, d) {
                "inherit" === a ? d.removeAttribute(g) : this[g] !== a && d.setAttribute(g, a);
                this[g] = a
            },
            zIndexSetter: function(a, g) {
                var d = this.renderer,
                    c = this.parentGroup,
                    l = (c || d).element || d.box,
                    p, b = this.element,
                    k;
                p = this.added;
                var e;
                r(a) && (b.zIndex = a, a = +a, this[g] === a && (p = !1), this[g] = a);
                if (p) {
                    (a = this.zIndex) && c && (c.handleZ = !0);
                    g = l.childNodes;
                    for (e = 0; e < g.length && !k; e++) c = g[e], p = c.zIndex, c !== b && (w(p) > a || !r(a) && r(p) || 0 >
                        a && !r(p) && l !== d.box) && (l.insertBefore(b, c), k = !0);
                    k || l.appendChild(b)
                }
                return k
            },
            _defaultSetter: function(a, g, d) {
                d.setAttribute(g, a)
            }
        });
        B.prototype.yGetter = B.prototype.xGetter;
        B.prototype.translateXSetter = B.prototype.translateYSetter = B.prototype.rotationSetter = B.prototype.verticalAlignSetter = B.prototype.scaleXSetter = B.prototype.scaleYSetter = function(a, g) {
            this[g] = a;
            this.doTransform = !0
        };
        A = a.SVGRenderer = function() {
            this.init.apply(this, arguments)
        };
        k(A.prototype, {
            Element: B,
            SVG_NS: R,
            init: function(a, g, d, w,
                c, p) {
                var b;
                w = this.createElement("svg").attr({
                    version: "1.1",
                    "class": "highcharts-root"
                });
                b = w.element;
                a.appendChild(b); - 1 === a.innerHTML.indexOf("xmlns") && v(b, "xmlns", this.SVG_NS);
                this.isSVG = !0;
                this.box = b;
                this.boxWrapper = w;
                this.alignedObjects = [];
                this.url = (F || l) && m.getElementsByTagName("base").length ? O.location.href.replace(/#.*?$/, "").replace(/<[^>]*>/g, "").replace(/([\('\)])/g, "\\$1").replace(/ /g, "%20") : "";
                this.createElement("desc").add().element.appendChild(m.createTextNode("Created with Highstock 5.0.14"));
                this.defs = this.createElement("defs").add();
                this.allowHTML = p;
                this.forExport = c;
                this.gradients = {};
                this.cache = {};
                this.cacheKeys = [];
                this.imgCount = 0;
                this.setSize(g, d, !1);
                var k;
                F && a.getBoundingClientRect && (g = function() {
                    t(a, {
                        left: 0,
                        top: 0
                    });
                    k = a.getBoundingClientRect();
                    t(a, {
                        left: Math.ceil(k.left) - k.left + "px",
                        top: Math.ceil(k.top) - k.top + "px"
                    })
                }, g(), this.unSubPixelFix = C(O, "resize", g))
            },
            definition: function(a) {
                function g(a, w) {
                    var c;
                    b(K(a), function(a) {
                        var l = d.createElement(a.tagName),
                            p = {};
                        G(a, function(a, g) {
                            "tagName" !==
                            g && "children" !== g && "textContent" !== g && (p[g] = a)
                        });
                        l.attr(p);
                        l.add(w || d.defs);
                        a.textContent && l.element.appendChild(m.createTextNode(a.textContent));
                        g(a.children || [], l);
                        c = l
                    });
                    return c
                }
                var d = this;
                return g(a)
            },
            isHidden: function() {
                return !this.boxWrapper.getBBox().width
            },
            destroy: function() {
                var a = this.defs;
                this.box = null;
                this.boxWrapper = this.boxWrapper.destroy();
                e(this.gradients || {});
                this.gradients = null;
                a && (this.defs = a.destroy());
                this.unSubPixelFix && this.unSubPixelFix();
                return this.alignedObjects = null
            },
            createElement: function(a) {
                var g =
                    new this.Element;
                g.init(this, a);
                return g
            },
            draw: d,
            getRadialAttr: function(a, g) {
                return {
                    cx: a[0] - a[2] / 2 + g.cx * a[2],
                    cy: a[1] - a[2] / 2 + g.cy * a[2],
                    r: g.r * a[2]
                }
            },
            getSpanWidth: function(a, g) {
                var d = a.getBBox(!0).width;
                !N && this.forExport && (d = this.measureSpanWidth(g.firstChild.data, a.styles));
                return d
            },
            applyEllipsis: function(a, g, d, w) {
                var c = a.rotation,
                    l = d,
                    p, b = 0,
                    k = d.length,
                    e = function(a) {
                        g.removeChild(g.firstChild);
                        a && g.appendChild(m.createTextNode(a))
                    },
                    u;
                a.rotation = 0;
                l = this.getSpanWidth(a, g);
                if (u = l > w) {
                    for (; b <= k;) p = Math.ceil((b +
                        k) / 2), l = d.substring(0, p) + "\u2026", e(l), l = this.getSpanWidth(a, g), b === k ? b = k + 1 : l > w ? k = p - 1 : b = p;
                    0 === k && e("")
                }
                a.rotation = c;
                return u
            },
            buildText: function(a) {
                var d = a.element,
                    c = this,
                    l = c.forExport,
                    p = g(a.textStr, "").toString(),
                    k = -1 !== p.indexOf("\x3c"),
                    e = d.childNodes,
                    D, K, x, h, y = v(d, "x"),
                    z = a.styles,
                    G = a.textWidth,
                    L = z && z.lineHeight,
                    f = z && z.textOutline,
                    P = z && "ellipsis" === z.textOverflow,
                    r = z && "nowrap" === z.whiteSpace,
                    n, F = e.length,
                    M = G && !a.added && this.box,
                    H = function(a) {
                        return L ? w(L) : c.fontMetrics(void 0, a.getAttribute("style") ?
                            a : d).h
                    },
                    z = [p, P, r, L, f, z && z.fontSize, G].join();
                if (z !== a.textCache) {
                    for (a.textCache = z; F--;) d.removeChild(e[F]);
                    k || f || P || G || -1 !== p.indexOf(" ") ? (D = /<.*class="([^"]+)".*>/, K = /<.*style="([^"]+)".*>/, x = /<.*href="([^"]+)".*>/, M && M.appendChild(d), p = k ? p.replace(/<(b|strong)>/g, '\x3cspan class\x3d"highcharts-strong"\x3e').replace(/<(i|em)>/g, '\x3cspan class\x3d"highcharts-emphasized"\x3e').replace(/<a/g, "\x3cspan").replace(/<\/(b|strong|i|em|a)>/g, "\x3c/span\x3e").split(/<br.*?>/g) : [p], p = u(p, function(a) {
                        return "" !==
                            a
                    }), b(p, function(g, w) {
                        var p, k = 0;
                        g = g.replace(/^\s+|\s+$/g, "").replace(/<span/g, "|||\x3cspan").replace(/<\/span>/g, "\x3c/span\x3e|||");
                        p = g.split("|||");
                        b(p, function(g) {
                            if ("" !== g || 1 === p.length) {
                                var b = {},
                                    e = m.createElementNS(c.SVG_NS, "tspan"),
                                    u, z;
                                D.test(g) && (u = g.match(D)[1], v(e, "class", u));
                                K.test(g) && (z = g.match(K)[1].replace(/(;| |^)color([ :])/, "$1fill$2"), v(e, "style", z));
                                x.test(g) && !l && (v(e, "onclick", 'location.href\x3d"' + g.match(x)[1] + '"'), t(e, {
                                    cursor: "pointer"
                                }));
                                g = (g.replace(/<(.|\n)*?>/g, "") || " ").replace(/&lt;/g,
                                    "\x3c").replace(/&gt;/g, "\x3e");
                                if (" " !== g) {
                                    e.appendChild(m.createTextNode(g));
                                    k ? b.dx = 0 : w && null !== y && (b.x = y);
                                    v(e, b);
                                    d.appendChild(e);
                                    !k && n && (!N && l && t(e, {
                                        display: "block"
                                    }), v(e, "dy", H(e)));
                                    if (G) {
                                        b = g.replace(/([^\^])-/g, "$1- ").split(" ");
                                        u = 1 < p.length || w || 1 < b.length && !r;
                                        var L = [],
                                            f, F = H(e),
                                            M = a.rotation;
                                        for (P && (h = c.applyEllipsis(a, e, g, G)); !P && u && (b.length || L.length);) a.rotation = 0, f = c.getSpanWidth(a, e), g = f > G, void 0 === h && (h = g), g && 1 !== b.length ? (e.removeChild(e.firstChild), L.unshift(b.pop())) : (b = L, L = [], b.length &&
                                            !r && (e = m.createElementNS(R, "tspan"), v(e, {
                                                dy: F,
                                                x: y
                                            }), z && v(e, "style", z), d.appendChild(e)), f > G && (G = f)), b.length && e.appendChild(m.createTextNode(b.join(" ").replace(/- /g, "-")));
                                        a.rotation = M
                                    }
                                    k++
                                }
                            }
                        });
                        n = n || d.childNodes.length
                    }), h && a.attr("title", a.textStr), M && M.removeChild(d), f && a.applyTextOutline && a.applyTextOutline(f)) : d.appendChild(m.createTextNode(p.replace(/&lt;/g, "\x3c").replace(/&gt;/g, "\x3e")))
                }
            },
            getContrast: function(a) {
                a = n(a).rgba;
                return 510 < a[0] + a[1] + a[2] ? "#000000" : "#FFFFFF"
            },
            button: function(a,
                g, d, w, c, l, p, b, k) {
                var e = this.label(a, g, d, k, null, null, null, null, "button"),
                    u = 0;
                e.attr(D({
                    padding: 8,
                    r: 2
                }, c));
                C(e.element, H ? "mouseover" : "mouseenter", function() {
                    3 !== u && e.setState(1)
                });
                C(e.element, H ? "mouseout" : "mouseleave", function() {
                    3 !== u && e.setState(u)
                });
                e.setState = function(a) {
                    1 !== a && (e.state = u = a);
                    e.removeClass(/highcharts-button-(normal|hover|pressed|disabled)/).addClass("highcharts-button-" + ["normal", "hover", "pressed", "disabled"][a || 0])
                };
                return e.on("click", function(a) {
                    3 !== u && w.call(e, a)
                })
            },
            crispLine: function(a,
                g) {
                a[1] === a[4] && (a[1] = a[4] = Math.round(a[1]) - g % 2 / 2);
                a[2] === a[5] && (a[2] = a[5] = Math.round(a[2]) + g % 2 / 2);
                return a
            },
            path: function(a) {
                var g = {};
                I(a) ? g.d = a : p(a) && k(g, a);
                return this.createElement("path").attr(g)
            },
            circle: function(a, g, d) {
                a = p(a) ? a : {
                    x: a,
                    y: g,
                    r: d
                };
                g = this.createElement("circle");
                g.xSetter = g.ySetter = function(a, g, d) {
                    d.setAttribute("c" + g, a)
                };
                return g.attr(a)
            },
            arc: function(a, g, d, w, c, l) {
                p(a) ? (w = a, g = w.y, d = w.r, a = w.x) : w = {
                    innerR: w,
                    start: c,
                    end: l
                };
                a = this.symbol("arc", a, g, d, d, w);
                a.r = d;
                return a
            },
            rect: function(a,
                g, d, w, c, l) {
                c = p(a) ? a.r : c;
                l = this.createElement("rect");
                a = p(a) ? a : void 0 === a ? {} : {
                    x: a,
                    y: g,
                    width: Math.max(d, 0),
                    height: Math.max(w, 0)
                };
                c && (a.r = c);
                l.rSetter = function(a, g, d) {
                    v(d, {
                        rx: a,
                        ry: a
                    })
                };
                return l.attr(a)
            },
            setSize: function(a, d, w) {
                var c = this.alignedObjects,
                    l = c.length;
                this.width = a;
                this.height = d;
                for (this.boxWrapper.animate({
                        width: a,
                        height: d
                    }, {
                        step: function() {
                            this.attr({
                                viewBox: "0 0 " + this.attr("width") + " " + this.attr("height")
                            })
                        },
                        duration: g(w, !0) ? void 0 : 0
                    }); l--;) c[l].align()
            },
            g: function(a) {
                var g = this.createElement("g");
                return a ? g.attr({
                    "class": "highcharts-" + a
                }) : g
            },
            image: function(a, g, d, w, c) {
                var l = {
                    preserveAspectRatio: "none"
                };
                1 < arguments.length && k(l, {
                    x: g,
                    y: d,
                    width: w,
                    height: c
                });
                l = this.createElement("image").attr(l);
                l.element.setAttributeNS ? l.element.setAttributeNS("http://www.w3.org/1999/xlink", "href", a) : l.element.setAttribute("hc-svg-href", a);
                return l
            },
            symbol: function(a, d, w, c, l, p) {
                var e = this,
                    u, D = /^url\((.*?)\)$/,
                    K = D.test(a),
                    x = !K && (this.symbols[a] ? a : "circle"),
                    h = x && this.symbols[x],
                    y = r(d) && h && h.call(this.symbols, Math.round(d),
                        Math.round(w), c, l, p),
                    z, G;
                h ? (u = this.path(y), k(u, {
                    symbolName: x,
                    x: d,
                    y: w,
                    width: c,
                    height: l
                }), p && k(u, p)) : K && (z = a.match(D)[1], u = this.image(z), u.imgwidth = g(Q[z] && Q[z].width, p && p.width), u.imgheight = g(Q[z] && Q[z].height, p && p.height), G = function() {
                    u.attr({
                        width: u.width,
                        height: u.height
                    })
                }, b(["width", "height"], function(a) {
                    u[a + "Setter"] = function(a, g) {
                        var d = {},
                            w = this["img" + g],
                            c = "width" === g ? "translateX" : "translateY";
                        this[g] = a;
                        r(w) && (this.element && this.element.setAttribute(g, w), this.alignByTranslate || (d[c] = ((this[g] ||
                            0) - w) / 2, this.attr(d)))
                    }
                }), r(d) && u.attr({
                    x: d,
                    y: w
                }), u.isImg = !0, r(u.imgwidth) && r(u.imgheight) ? G() : (u.attr({
                    width: 0,
                    height: 0
                }), q("img", {
                    onload: function() {
                        var a = f[e.chartIndex];
                        0 === this.width && (t(this, {
                            position: "absolute",
                            top: "-999em"
                        }), m.body.appendChild(this));
                        Q[z] = {
                            width: this.width,
                            height: this.height
                        };
                        u.imgwidth = this.width;
                        u.imgheight = this.height;
                        u.element && G();
                        this.parentNode && this.parentNode.removeChild(this);
                        e.imgCount--;
                        if (!e.imgCount && a && a.onload) a.onload()
                    },
                    src: z
                }), this.imgCount++));
                return u
            },
            symbols: {
                circle: function(a, g, d, w) {
                    return this.arc(a + d / 2, g + w / 2, d / 2, w / 2, {
                        start: 0,
                        end: 2 * Math.PI,
                        open: !1
                    })
                },
                square: function(a, g, d, w) {
                    return ["M", a, g, "L", a + d, g, a + d, g + w, a, g + w, "Z"]
                },
                triangle: function(a, g, d, w) {
                    return ["M", a + d / 2, g, "L", a + d, g + w, a, g + w, "Z"]
                },
                "triangle-down": function(a, g, d, w) {
                    return ["M", a, g, "L", a + d, g, a + d / 2, g + w, "Z"]
                },
                diamond: function(a, g, d, w) {
                    return ["M", a + d / 2, g, "L", a + d, g + w / 2, a + d / 2, g + w, a, g + w / 2, "Z"]
                },
                arc: function(a, d, w, c, l) {
                    var p = l.start,
                        b = l.r || w,
                        k = l.r || c || w,
                        e = l.end - .001;
                    w = l.innerR;
                    c = g(l.open, .001 >
                        Math.abs(l.end - l.start - 2 * Math.PI));
                    var u = Math.cos(p),
                        D = Math.sin(p),
                        K = Math.cos(e),
                        e = Math.sin(e);
                    l = .001 > l.end - p - Math.PI ? 0 : 1;
                    b = ["M", a + b * u, d + k * D, "A", b, k, 0, l, 1, a + b * K, d + k * e];
                    r(w) && b.push(c ? "M" : "L", a + w * K, d + w * e, "A", w, w, 0, l, 0, a + w * u, d + w * D);
                    b.push(c ? "" : "Z");
                    return b
                },
                callout: function(a, g, d, w, c) {
                    var l = Math.min(c && c.r || 0, d, w),
                        p = l + 6,
                        b = c && c.anchorX;
                    c = c && c.anchorY;
                    var k;
                    k = ["M", a + l, g, "L", a + d - l, g, "C", a + d, g, a + d, g, a + d, g + l, "L", a + d, g + w - l, "C", a + d, g + w, a + d, g + w, a + d - l, g + w, "L", a + l, g + w, "C", a, g + w, a, g + w, a, g + w - l, "L", a, g + l, "C", a,
                        g, a, g, a + l, g
                    ];
                    b && b > d ? c > g + p && c < g + w - p ? k.splice(13, 3, "L", a + d, c - 6, a + d + 6, c, a + d, c + 6, a + d, g + w - l) : k.splice(13, 3, "L", a + d, w / 2, b, c, a + d, w / 2, a + d, g + w - l) : b && 0 > b ? c > g + p && c < g + w - p ? k.splice(33, 3, "L", a, c + 6, a - 6, c, a, c - 6, a, g + l) : k.splice(33, 3, "L", a, w / 2, b, c, a, w / 2, a, g + l) : c && c > w && b > a + p && b < a + d - p ? k.splice(23, 3, "L", b + 6, g + w, b, g + w + 6, b - 6, g + w, a + l, g + w) : c && 0 > c && b > a + p && b < a + d - p && k.splice(3, 3, "L", b - 6, g, b, g - 6, b + 6, g, d - l, g);
                    return k
                }
            },
            clipRect: function(g, d, w, c) {
                var l = a.uniqueKey(),
                    p = this.createElement("clipPath").attr({
                        id: l
                    }).add(this.defs);
                g = this.rect(g, d, w, c, 0).add(p);
                g.id = l;
                g.clipPath = p;
                g.count = 0;
                return g
            },
            text: function(a, g, d, w) {
                var c = !N && this.forExport,
                    l = {};
                if (w && (this.allowHTML || !this.forExport)) return this.html(a, g, d);
                l.x = Math.round(g || 0);
                d && (l.y = Math.round(d));
                if (a || 0 === a) l.text = a;
                a = this.createElement("text").attr(l);
                c && a.css({
                    position: "absolute"
                });
                w || (a.xSetter = function(a, g, d) {
                    var w = d.getElementsByTagName("tspan"),
                        c, l = d.getAttribute(g),
                        p;
                    for (p = 0; p < w.length; p++) c = w[p], c.getAttribute(g) === l && c.setAttribute(g, a);
                    d.setAttribute(g,
                        a)
                });
                return a
            },
            fontMetrics: function(a, g) {
                a = g && B.prototype.getStyle.call(g, "font-size");
                a = /px/.test(a) ? w(a) : /em/.test(a) ? parseFloat(a) * (g ? this.fontMetrics(null, g.parentNode).f : 16) : 12;
                g = 24 > a ? a + 3 : Math.round(1.2 * a);
                return {
                    h: g,
                    b: Math.round(.8 * g),
                    f: a
                }
            },
            rotCorr: function(a, g, d) {
                var w = a;
                g && d && (w = Math.max(w * Math.cos(g * h), 4));
                return {
                    x: -a / 3 * Math.sin(g * h),
                    y: w
                }
            },
            label: function(g, d, w, c, l, p, e, u, K) {
                var m = this,
                    x = m.g("button" !== K && "label"),
                    h = x.text = m.text("", 0, 0, e).attr({
                        zIndex: 1
                    }),
                    z, y, G = 0,
                    f = 3,
                    n = 0,
                    F, R, M, H, q, t = {},
                    I,
                    Q = /^url\((.*?)\)$/.test(c),
                    L = Q,
                    N, v, O, S;
                K && x.addClass("highcharts-" + K);
                L = !0;
                N = function() {
                    return z.strokeWidth() % 2 / 2
                };
                v = function() {
                    var a = h.element.style,
                        g = {};
                    y = (void 0 === F || void 0 === R || q) && r(h.textStr) && h.getBBox();
                    x.width = (F || y.width || 0) + 2 * f + n;
                    x.height = (R || y.height || 0) + 2 * f;
                    I = f + m.fontMetrics(a && a.fontSize, h).b;
                    L && (z || (x.box = z = m.symbols[c] || Q ? m.symbol(c) : m.rect(), z.addClass(("button" === K ? "" : "highcharts-label-box") + (K ? " highcharts-" + K + "-box" : "")), z.add(x), a = N(), g.x = a, g.y = (u ? -I : 0) + a), g.width = Math.round(x.width),
                        g.height = Math.round(x.height), z.attr(k(g, t)), t = {})
                };
                O = function() {
                    var a = n + f,
                        g;
                    g = u ? 0 : I;
                    r(F) && y && ("center" === q || "right" === q) && (a += {
                        center: .5,
                        right: 1
                    }[q] * (F - y.width));
                    if (a !== h.x || g !== h.y) h.attr("x", a), void 0 !== g && h.attr("y", g);
                    h.x = a;
                    h.y = g
                };
                S = function(a, g) {
                    z ? z.attr(a, g) : t[a] = g
                };
                x.onAdd = function() {
                    h.add(x);
                    x.attr({
                        text: g || 0 === g ? g : "",
                        x: d,
                        y: w
                    });
                    z && r(l) && x.attr({
                        anchorX: l,
                        anchorY: p
                    })
                };
                x.widthSetter = function(g) {
                    F = a.isNumber(g) ? g : null
                };
                x.heightSetter = function(a) {
                    R = a
                };
                x["text-alignSetter"] = function(a) {
                    q = a
                };
                x.paddingSetter =
                    function(a) {
                        r(a) && a !== f && (f = x.padding = a, O())
                    };
                x.paddingLeftSetter = function(a) {
                    r(a) && a !== n && (n = a, O())
                };
                x.alignSetter = function(a) {
                    a = {
                        left: 0,
                        center: .5,
                        right: 1
                    }[a];
                    a !== G && (G = a, y && x.attr({
                        x: M
                    }))
                };
                x.textSetter = function(a) {
                    void 0 !== a && h.textSetter(a);
                    v();
                    O()
                };
                x["stroke-widthSetter"] = function(a, g) {
                    a && (L = !0);
                    this["stroke-width"] = a;
                    S(g, a)
                };
                x.rSetter = function(a, g) {
                    S(g, a)
                };
                x.anchorXSetter = function(a, g) {
                    l = x.anchorX = a;
                    S(g, Math.round(a) - N() - M)
                };
                x.anchorYSetter = function(a, g) {
                    p = x.anchorY = a;
                    S(g, a - H)
                };
                x.xSetter = function(a) {
                    x.x =
                        a;
                    G && (a -= G * ((F || y.width) + 2 * f));
                    M = Math.round(a);
                    x.attr("translateX", M)
                };
                x.ySetter = function(a) {
                    H = x.y = Math.round(a);
                    x.attr("translateY", H)
                };
                var A = x.css;
                return k(x, {
                    css: function(a) {
                        if (a) {
                            var g = {};
                            a = D(a);
                            b(x.textProps, function(d) {
                                void 0 !== a[d] && (g[d] = a[d], delete a[d])
                            });
                            h.css(g)
                        }
                        return A.call(x, a)
                    },
                    getBBox: function() {
                        return {
                            width: y.width + 2 * f,
                            height: y.height + 2 * f,
                            x: y.x - f,
                            y: y.y - f
                        }
                    },
                    destroy: function() {
                        P(x.element, "mouseenter");
                        P(x.element, "mouseleave");
                        h && (h = h.destroy());
                        z && (z = z.destroy());
                        B.prototype.destroy.call(x);
                        x = m = v = O = S = null
                    }
                })
            }
        });
        a.Renderer = A
    })(J);
    (function(a) {
        var B = a.attr,
            A = a.createElement,
            C = a.css,
            E = a.defined,
            v = a.each,
            f = a.extend,
            n = a.isFirefox,
            t = a.isMS,
            q = a.isWebKit,
            r = a.pInt,
            h = a.SVGRenderer,
            e = a.win,
            m = a.wrap;
        f(a.SVGElement.prototype, {
            htmlCss: function(a) {
                var b = this.element;
                if (b = a && "SPAN" === b.tagName && a.width) delete a.width, this.textWidth = b, this.updateTransform();
                a && "ellipsis" === a.textOverflow && (a.whiteSpace = "nowrap", a.overflow = "hidden");
                this.styles = f(this.styles, a);
                C(this.element, a);
                return this
            },
            htmlGetBBox: function() {
                var a =
                    this.element;
                "text" === a.nodeName && (a.style.position = "absolute");
                return {
                    x: a.offsetLeft,
                    y: a.offsetTop,
                    width: a.offsetWidth,
                    height: a.offsetHeight
                }
            },
            htmlUpdateTransform: function() {
                if (this.added) {
                    var a = this.renderer,
                        k = this.element,
                        e = this.x || 0,
                        u = this.y || 0,
                        c = this.textAlign || "left",
                        x = {
                            left: 0,
                            center: .5,
                            right: 1
                        }[c],
                        h = this.styles;
                    C(k, {
                        marginLeft: this.translateX || 0,
                        marginTop: this.translateY || 0
                    });
                    this.inverted && v(k.childNodes, function(c) {
                        a.invertChild(c, k)
                    });
                    if ("SPAN" === k.tagName) {
                        var m = this.rotation,
                            f = r(this.textWidth),
                            p = h && h.whiteSpace,
                            y = [m, c, k.innerHTML, this.textWidth, this.textAlign].join();
                        y !== this.cTT && (h = a.fontMetrics(k.style.fontSize).b, E(m) && this.setSpanRotation(m, x, h), C(k, {
                            width: "",
                            whiteSpace: p || "nowrap"
                        }), k.offsetWidth > f && /[ \-]/.test(k.textContent || k.innerText) && C(k, {
                            width: f + "px",
                            display: "block",
                            whiteSpace: p || "normal"
                        }), this.getSpanCorrection(k.offsetWidth, h, x, m, c));
                        C(k, {
                            left: e + (this.xCorr || 0) + "px",
                            top: u + (this.yCorr || 0) + "px"
                        });
                        q && (h = k.offsetHeight);
                        this.cTT = y
                    }
                } else this.alignOnAdd = !0
            },
            setSpanRotation: function(a,
                k, h) {
                var b = {},
                    c = t ? "-ms-transform" : q ? "-webkit-transform" : n ? "MozTransform" : e.opera ? "-o-transform" : "";
                b[c] = b.transform = "rotate(" + a + "deg)";
                b[c + (n ? "Origin" : "-origin")] = b.transformOrigin = 100 * k + "% " + h + "px";
                C(this.element, b)
            },
            getSpanCorrection: function(a, k, e) {
                this.xCorr = -a * e;
                this.yCorr = -k
            }
        });
        f(h.prototype, {
            html: function(a, k, e) {
                var b = this.createElement("span"),
                    c = b.element,
                    x = b.renderer,
                    h = x.isSVG,
                    z = function(a, c) {
                        v(["opacity", "visibility"], function(p) {
                            m(a, p + "Setter", function(a, p, d, b) {
                                a.call(this, p, d, b);
                                c[d] =
                                    p
                            })
                        })
                    };
                b.textSetter = function(a) {
                    a !== c.innerHTML && delete this.bBox;
                    c.innerHTML = this.textStr = a;
                    b.htmlUpdateTransform()
                };
                h && z(b, b.element.style);
                b.xSetter = b.ySetter = b.alignSetter = b.rotationSetter = function(a, c) {
                    "align" === c && (c = "textAlign");
                    b[c] = a;
                    b.htmlUpdateTransform()
                };
                b.attr({
                    text: a,
                    x: Math.round(k),
                    y: Math.round(e)
                }).css({
                    position: "absolute"
                });
                c.style.whiteSpace = "nowrap";
                b.css = b.htmlCss;
                h && (b.add = function(a) {
                    var p, k = x.box.parentNode,
                        l = [];
                    if (this.parentGroup = a) {
                        if (p = a.div, !p) {
                            for (; a;) l.push(a), a = a.parentGroup;
                            v(l.reverse(), function(a) {
                                var d, c = B(a.element, "class");
                                c && (c = {
                                    className: c
                                });
                                p = a.div = a.div || A("div", c, {
                                    position: "absolute",
                                    left: (a.translateX || 0) + "px",
                                    top: (a.translateY || 0) + "px",
                                    display: a.display,
                                    opacity: a.opacity,
                                    pointerEvents: a.styles && a.styles.pointerEvents
                                }, p || k);
                                d = p.style;
                                f(a, {
                                    classSetter: function(a) {
                                        this.element.setAttribute("class", a);
                                        p.className = a
                                    },
                                    on: function() {
                                        l[0].div && b.on.apply({
                                            element: l[0].div
                                        }, arguments);
                                        return a
                                    },
                                    translateXSetter: function(g, w) {
                                        d.left = g + "px";
                                        a[w] = g;
                                        a.doTransform = !0
                                    },
                                    translateYSetter: function(g, w) {
                                        d.top = g + "px";
                                        a[w] = g;
                                        a.doTransform = !0
                                    }
                                });
                                z(a, d)
                            })
                        }
                    } else p = k;
                    p.appendChild(c);
                    b.added = !0;
                    b.alignOnAdd && b.htmlUpdateTransform();
                    return b
                });
                return b
            }
        })
    })(J);
    (function(a) {
        function B() {
            var f = a.defaultOptions.global,
                q = n.moment;
            if (f.timezone) {
                if (q) return function(a) {
                    return -q.tz(a, f.timezone).utcOffset()
                };
                a.error(25)
            }
            return f.useUTC && f.getTimezoneOffset
        }

        function A() {
            var t = a.defaultOptions.global,
                q, r = t.useUTC,
                h = r ? "getUTC" : "get",
                e = r ? "setUTC" : "set";
            a.Date = q = t.Date || n.Date;
            q.hcTimezoneOffset =
                r && t.timezoneOffset;
            q.hcGetTimezoneOffset = B();
            q.hcMakeTime = function(a, b, k, e, u, c) {
                var x;
                r ? (x = q.UTC.apply(0, arguments), x += E(x)) : x = (new q(a, b, f(k, 1), f(e, 0), f(u, 0), f(c, 0))).getTime();
                return x
            };
            C("Minutes Hours Day Date Month FullYear".split(" "), function(a) {
                q["hcGet" + a] = h + a
            });
            C("Milliseconds Seconds Minutes Hours Date Month FullYear".split(" "), function(a) {
                q["hcSet" + a] = e + a
            })
        }
        var C = a.each,
            E = a.getTZOffset,
            v = a.merge,
            f = a.pick,
            n = a.win;
        a.defaultOptions = {
            symbols: ["circle", "diamond", "square", "triangle", "triangle-down"],
            lang: {
                loading: "Loading...",
                months: "January February March April May June July August September October November December".split(" "),
                shortMonths: "Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec".split(" "),
                weekdays: "Sunday Monday Tuesday Wednesday Thursday Friday Saturday".split(" "),
                decimalPoint: ".",
                numericSymbols: "kMGTPE".split(""),
                resetZoom: "Reset zoom",
                resetZoomTitle: "Reset zoom level 1:1",
                thousandsSep: " "
            },
            global: {
                useUTC: !0
            },
            chart: {
                borderRadius: 0,
                colorCount: 10,
                defaultSeriesType: "line",
                ignoreHiddenSeries: !0,
                spacing: [10, 10, 15, 10],
                resetZoomButton: {
                    theme: {
                        zIndex: 20
                    },
                    position: {
                        align: "right",
                        x: -10,
                        y: 10
                    }
                },
                width: null,
                height: null
            },
            title: {
                text: "Chart title",
                align: "center",
                margin: 15,
                widthAdjust: -44
            },
            subtitle: {
                text: "",
                align: "center",
                widthAdjust: -44
            },
            plotOptions: {},
            labels: {
                style: {
                    position: "absolute",
                    color: "#333333"
                }
            },
            legend: {
                enabled: !0,
                align: "center",
                layout: "horizontal",
                labelFormatter: function() {
                    return this.name
                },
                borderColor: "#999999",
                borderRadius: 0,
                navigation: {},
                itemCheckboxStyle: {
                    position: "absolute",
                    width: "13px",
                    height: "13px"
                },
                squareSymbol: !0,
                symbolPadding: 5,
                verticalAlign: "bottom",
                x: 0,
                y: 0,
                title: {}
            },
            loading: {},
            tooltip: {
                enabled: !0,
                animation: a.svg,
                borderRadius: 3,
                dateTimeLabelFormats: {
                    millisecond: "%A, %b %e, %H:%M:%S.%L",
                    second: "%A, %b %e, %H:%M:%S",
                    minute: "%A, %b %e, %H:%M",
                    hour: "%A, %b %e, %H:%M",
                    day: "%A, %b %e, %Y",
                    week: "Week from %A, %b %e, %Y",
                    month: "%B %Y",
                    year: "%Y"
                },
                footerFormat: "",
                padding: 8,
                snap: a.isTouchDevice ? 25 : 10,
                headerFormat: '\x3cspan class\x3d"highcharts-header"\x3e{point.key}\x3c/span\x3e\x3cbr/\x3e',
                pointFormat: '\x3cspan class\x3d"highcharts-color-{point.colorIndex}"\x3e\u25cf\x3c/span\x3e {series.name}: \x3cspan class\x3d"highcharts-strong"\x3e{point.y}\x3c/span\x3e\x3cbr/\x3e'
            },
            credits: {
                enabled: !0,
                href: "http://www.highcharts.com",
                position: {
                    align: "right",
                    x: -10,
                    verticalAlign: "bottom",
                    y: -5
                },
                text: "Highcharts.com"
            }
        };
        a.setOptions = function(f) {
            a.defaultOptions = v(!0, a.defaultOptions, f);
            A();
            return a.defaultOptions
        };
        a.getOptions = function() {
            return a.defaultOptions
        };
        a.defaultPlotOptions = a.defaultOptions.plotOptions;
        A()
    })(J);
    (function(a) {
        var B = a.correctFloat,
            A = a.defined,
            C = a.destroyObjectProperties,
            E = a.isNumber,
            v = a.pick,
            f = a.deg2rad;
        a.Tick = function(a, f, q, r) {
            this.axis = a;
            this.pos = f;
            this.type = q || "";
            this.isNewLabel = this.isNew = !0;
            q || r || this.addLabel()
        };
        a.Tick.prototype = {
            addLabel: function() {
                var a = this.axis,
                    f = a.options,
                    q = a.chart,
                    r = a.categories,
                    h = a.names,
                    e = this.pos,
                    m = f.labels,
                    b = a.tickPositions,
                    k = e === b[0],
                    z = e === b[b.length - 1],
                    h = r ? v(r[e], h[e], e) : e,
                    r = this.label,
                    b = b.info,
                    u;
                a.isDatetimeAxis && b && (u = f.dateTimeLabelFormats[b.higherRanks[e] ||
                    b.unitName]);
                this.isFirst = k;
                this.isLast = z;
                f = a.labelFormatter.call({
                    axis: a,
                    chart: q,
                    isFirst: k,
                    isLast: z,
                    dateTimeLabelFormat: u,
                    value: a.isLog ? B(a.lin2log(h)) : h,
                    pos: e
                });
                A(r) ? r && r.attr({
                    text: f
                }) : (this.labelLength = (this.label = r = A(f) && m.enabled ? q.renderer.text(f, 0, 0, m.useHTML).add(a.labelGroup) : null) && r.getBBox().width, this.rotation = 0)
            },
            getLabelSize: function() {
                return this.label ? this.label.getBBox()[this.axis.horiz ? "height" : "width"] : 0
            },
            handleOverflow: function(a) {
                var n = this.axis,
                    q = a.x,
                    r = n.chart.chartWidth,
                    h =
                    n.chart.spacing,
                    e = v(n.labelLeft, Math.min(n.pos, h[3])),
                    h = v(n.labelRight, Math.max(n.pos + n.len, r - h[1])),
                    m = this.label,
                    b = this.rotation,
                    k = {
                        left: 0,
                        center: .5,
                        right: 1
                    }[n.labelAlign],
                    z = m.getBBox().width,
                    u = n.getSlotWidth(),
                    c = u,
                    x = 1,
                    I, F = {};
                if (b) 0 > b && q - k * z < e ? I = Math.round(q / Math.cos(b * f) - e) : 0 < b && q + k * z > h && (I = Math.round((r - q) / Math.cos(b * f)));
                else if (r = q + (1 - k) * z, q - k * z < e ? c = a.x + c * (1 - k) - e : r > h && (c = h - a.x + c * k, x = -1), c = Math.min(u, c), c < u && "center" === n.labelAlign && (a.x += x * (u - c - k * (u - Math.min(z, c)))), z > c || n.autoRotation && (m.styles || {}).width) I = c;
                I && (F.width = I, (n.options.labels.style || {}).textOverflow || (F.textOverflow = "ellipsis"), m.css(F))
            },
            getPosition: function(a, f, q, r) {
                var h = this.axis,
                    e = h.chart,
                    m = r && e.oldChartHeight || e.chartHeight;
                return {
                    x: a ? h.translate(f + q, null, null, r) + h.transB : h.left + h.offset + (h.opposite ? (r && e.oldChartWidth || e.chartWidth) - h.right - h.left : 0),
                    y: a ? m - h.bottom + h.offset - (h.opposite ? h.height : 0) : m - h.translate(f + q, null, null, r) - h.transB
                }
            },
            getLabelPosition: function(a, t, q, r, h, e, m, b) {
                var k = this.axis,
                    z = k.transA,
                    u = k.reversed,
                    c = k.staggerLines,
                    x = k.tickRotCorr || {
                        x: 0,
                        y: 0
                    },
                    n = h.y;
                A(n) || (n = 0 === k.side ? q.rotation ? -8 : -q.getBBox().height : 2 === k.side ? x.y + 8 : Math.cos(q.rotation * f) * (x.y - q.getBBox(!1, 0).height / 2));
                a = a + h.x + x.x - (e && r ? e * z * (u ? -1 : 1) : 0);
                t = t + n - (e && !r ? e * z * (u ? 1 : -1) : 0);
                c && (q = m / (b || 1) % c, k.opposite && (q = c - q - 1), t += k.labelOffset / c * q);
                return {
                    x: a,
                    y: Math.round(t)
                }
            },
            getMarkPath: function(a, f, q, r, h, e) {
                return e.crispLine(["M", a, f, "L", a + (h ? 0 : -q), f + (h ? q : 0)], r)
            },
            renderGridLine: function(a, f, q) {
                var r = this.axis,
                    h = this.gridLine,
                    e = {},
                    m = this.pos,
                    b =
                    this.type,
                    k = r.tickmarkOffset,
                    z = r.chart.renderer;
                h || (b || (e.zIndex = 1), a && (e.opacity = 0), this.gridLine = h = z.path().attr(e).addClass("highcharts-" + (b ? b + "-" : "") + "grid-line").add(r.gridGroup));
                if (!a && h && (a = r.getPlotLinePath(m + k, h.strokeWidth() * q, a, !0))) h[this.isNew ? "attr" : "animate"]({
                    d: a,
                    opacity: f
                })
            },
            renderMark: function(a, f, q) {
                var r = this.axis,
                    h = r.chart.renderer,
                    e = this.type,
                    m = r.tickSize(e ? e + "Tick" : "tick"),
                    b = this.mark,
                    k = !b,
                    z = a.x;
                a = a.y;
                m && (r.opposite && (m[0] = -m[0]), k && (this.mark = b = h.path().addClass("highcharts-" +
                    (e ? e + "-" : "") + "tick").add(r.axisGroup)), b[k ? "attr" : "animate"]({
                    d: this.getMarkPath(z, a, m[0], b.strokeWidth() * q, r.horiz, h),
                    opacity: f
                }))
            },
            renderLabel: function(a, f, q, r) {
                var h = this.axis,
                    e = h.horiz,
                    m = h.options,
                    b = this.label,
                    k = m.labels,
                    z = k.step,
                    u = h.tickmarkOffset,
                    c = !0,
                    x = a.x;
                a = a.y;
                b && E(x) && (b.xy = a = this.getLabelPosition(x, a, b, e, k, u, r, z), this.isFirst && !this.isLast && !v(m.showFirstLabel, 1) || this.isLast && !this.isFirst && !v(m.showLastLabel, 1) ? c = !1 : !e || h.isRadial || k.step || k.rotation || f || 0 === q || this.handleOverflow(a),
                    z && r % z && (c = !1), c && E(a.y) ? (a.opacity = q, b[this.isNewLabel ? "attr" : "animate"](a), this.isNewLabel = !1) : (b.attr("y", -9999), this.isNewLabel = !0), this.isNew = !1)
            },
            render: function(a, f, q) {
                var r = this.axis,
                    h = r.horiz,
                    e = this.getPosition(h, this.pos, r.tickmarkOffset, f),
                    m = e.x,
                    b = e.y,
                    r = h && m === r.pos + r.len || !h && b === r.pos ? -1 : 1;
                q = v(q, 1);
                this.isActive = !0;
                this.renderGridLine(f, q, r);
                this.renderMark(e, q, r);
                this.renderLabel(e, f, q, a)
            },
            destroy: function() {
                C(this, this.axis)
            }
        }
    })(J);
    var T = function(a) {
        var B = a.addEvent,
            A = a.animObject,
            C = a.arrayMax,
            E = a.arrayMin,
            v = a.correctFloat,
            f = a.defaultOptions,
            n = a.defined,
            t = a.deg2rad,
            q = a.destroyObjectProperties,
            r = a.each,
            h = a.extend,
            e = a.fireEvent,
            m = a.format,
            b = a.getMagnitude,
            k = a.grep,
            z = a.inArray,
            u = a.isArray,
            c = a.isNumber,
            x = a.isString,
            I = a.merge,
            F = a.normalizeTickInterval,
            H = a.objectEach,
            p = a.pick,
            y = a.removeEvent,
            l = a.splat,
            D = a.syncTimeout,
            d = a.Tick,
            G = function() {
                this.init.apply(this, arguments)
            };
        a.extend(G.prototype, {
            defaultOptions: {
                dateTimeLabelFormats: {
                    millisecond: "%H:%M:%S.%L",
                    second: "%H:%M:%S",
                    minute: "%H:%M",
                    hour: "%H:%M",
                    day: "%e. %b",
                    week: "%e. %b",
                    month: "%b '%y",
                    year: "%Y"
                },
                endOnTick: !1,
                labels: {
                    enabled: !0,
                    x: 0
                },
                minPadding: .01,
                maxPadding: .01,
                minorTickLength: 2,
                minorTickPosition: "outside",
                startOfWeek: 1,
                startOnTick: !1,
                tickLength: 10,
                tickmarkPlacement: "between",
                tickPixelInterval: 100,
                tickPosition: "outside",
                title: {
                    align: "middle"
                },
                type: "linear"
            },
            defaultYAxisOptions: {
                endOnTick: !0,
                tickPixelInterval: 72,
                showLastLabel: !0,
                labels: {
                    x: -8
                },
                maxPadding: .05,
                minPadding: .05,
                startOnTick: !0,
                title: {
                    rotation: 270,
                    text: "Values"
                },
                stackLabels: {
                    allowOverlap: !1,
                    enabled: !1,
                    formatter: function() {
                        return a.numberFormat(this.total, -1)
                    }
                }
            },
            defaultLeftAxisOptions: {
                labels: {
                    x: -15
                },
                title: {
                    rotation: 270
                }
            },
            defaultRightAxisOptions: {
                labels: {
                    x: 15
                },
                title: {
                    rotation: 90
                }
            },
            defaultBottomAxisOptions: {
                labels: {
                    autoRotation: [-45],
                    x: 0
                },
                title: {
                    rotation: 0
                }
            },
            defaultTopAxisOptions: {
                labels: {
                    autoRotation: [-45],
                    x: 0
                },
                title: {
                    rotation: 0
                }
            },
            init: function(a, d) {
                var g = d.isX,
                    w = this;
                w.chart = a;
                w.horiz = a.inverted && !w.isZAxis ? !g : g;
                w.isXAxis = g;
                w.coll = w.coll || (g ? "xAxis" : "yAxis");
                w.opposite = d.opposite;
                w.side =
                    d.side || (w.horiz ? w.opposite ? 0 : 2 : w.opposite ? 1 : 3);
                w.setOptions(d);
                var c = this.options,
                    b = c.type;
                w.labelFormatter = c.labels.formatter || w.defaultLabelFormatter;
                w.userOptions = d;
                w.minPixelPadding = 0;
                w.reversed = c.reversed;
                w.visible = !1 !== c.visible;
                w.zoomEnabled = !1 !== c.zoomEnabled;
                w.hasNames = "category" === b || !0 === c.categories;
                w.categories = c.categories || w.hasNames;
                w.names = w.names || [];
                w.plotLinesAndBandsGroups = {};
                w.isLog = "logarithmic" === b;
                w.isDatetimeAxis = "datetime" === b;
                w.positiveValuesOnly = w.isLog && !w.allowNegativeLog;
                w.isLinked = n(c.linkedTo);
                w.ticks = {};
                w.labelEdge = [];
                w.minorTicks = {};
                w.plotLinesAndBands = [];
                w.alternateBands = {};
                w.len = 0;
                w.minRange = w.userMinRange = c.minRange || c.maxZoom;
                w.range = c.range;
                w.offset = c.offset || 0;
                w.stacks = {};
                w.oldStacks = {};
                w.stacksTouched = 0;
                w.max = null;
                w.min = null;
                w.crosshair = p(c.crosshair, l(a.options.tooltip.crosshairs)[g ? 0 : 1], !1);
                d = w.options.events; - 1 === z(w, a.axes) && (g ? a.axes.splice(a.xAxis.length, 0, w) : a.axes.push(w), a[w.coll].push(w));
                w.series = w.series || [];
                a.inverted && !w.isZAxis && g && void 0 ===
                    w.reversed && (w.reversed = !0);
                H(d, function(a, g) {
                    B(w, g, a)
                });
                w.lin2log = c.linearToLogConverter || w.lin2log;
                w.isLog && (w.val2lin = w.log2lin, w.lin2val = w.lin2log)
            },
            setOptions: function(a) {
                this.options = I(this.defaultOptions, "yAxis" === this.coll && this.defaultYAxisOptions, [this.defaultTopAxisOptions, this.defaultRightAxisOptions, this.defaultBottomAxisOptions, this.defaultLeftAxisOptions][this.side], I(f[this.coll], a))
            },
            defaultLabelFormatter: function() {
                var g = this.axis,
                    d = this.value,
                    c = g.categories,
                    l = this.dateTimeLabelFormat,
                    b = f.lang,
                    p = b.numericSymbols,
                    b = b.numericSymbolMagnitude || 1E3,
                    k = p && p.length,
                    e, u = g.options.labels.format,
                    g = g.isLog ? Math.abs(d) : g.tickInterval;
                if (u) e = m(u, this);
                else if (c) e = d;
                else if (l) e = a.dateFormat(l, d);
                else if (k && 1E3 <= g)
                    for (; k-- && void 0 === e;) c = Math.pow(b, k + 1), g >= c && 0 === 10 * d % c && null !== p[k] && 0 !== d && (e = a.numberFormat(d / c, -1) + p[k]);
                void 0 === e && (e = 1E4 <= Math.abs(d) ? a.numberFormat(d, -1) : a.numberFormat(d, -1, void 0, ""));
                return e
            },
            getSeriesExtremes: function() {
                var a = this,
                    d = a.chart;
                a.hasVisibleSeries = !1;
                a.dataMin =
                    a.dataMax = a.threshold = null;
                a.softThreshold = !a.isXAxis;
                a.buildStacks && a.buildStacks();
                r(a.series, function(g) {
                    if (g.visible || !d.options.chart.ignoreHiddenSeries) {
                        var w = g.options,
                            l = w.threshold,
                            b;
                        a.hasVisibleSeries = !0;
                        a.positiveValuesOnly && 0 >= l && (l = null);
                        if (a.isXAxis) w = g.xData, w.length && (g = E(w), c(g) || g instanceof Date || (w = k(w, function(a) {
                            return c(a)
                        }), g = E(w)), a.dataMin = Math.min(p(a.dataMin, w[0]), g), a.dataMax = Math.max(p(a.dataMax, w[0]), C(w)));
                        else if (g.getExtremes(), b = g.dataMax, g = g.dataMin, n(g) && n(b) &&
                            (a.dataMin = Math.min(p(a.dataMin, g), g), a.dataMax = Math.max(p(a.dataMax, b), b)), n(l) && (a.threshold = l), !w.softThreshold || a.positiveValuesOnly) a.softThreshold = !1
                    }
                })
            },
            translate: function(a, d, l, b, p, k) {
                var g = this.linkedParent || this,
                    w = 1,
                    e = 0,
                    u = b ? g.oldTransA : g.transA;
                b = b ? g.oldMin : g.min;
                var D = g.minPixelPadding;
                p = (g.isOrdinal || g.isBroken || g.isLog && p) && g.lin2val;
                u || (u = g.transA);
                l && (w *= -1, e = g.len);
                g.reversed && (w *= -1, e -= w * (g.sector || g.len));
                d ? (a = (a * w + e - D) / u + b, p && (a = g.lin2val(a))) : (p && (a = g.val2lin(a)), a = w * (a - b) * u + e +
                    w * D + (c(k) ? u * k : 0));
                return a
            },
            toPixels: function(a, d) {
                return this.translate(a, !1, !this.horiz, null, !0) + (d ? 0 : this.pos)
            },
            toValue: function(a, d) {
                return this.translate(a - (d ? 0 : this.pos), !0, !this.horiz, null, !0)
            },
            getPlotLinePath: function(a, d, l, b, k) {
                var g = this.chart,
                    w = this.left,
                    e = this.top,
                    u, D, x = l && g.oldChartHeight || g.chartHeight,
                    h = l && g.oldChartWidth || g.chartWidth,
                    f;
                u = this.transB;
                var m = function(a, g, d) {
                    if (a < g || a > d) b ? a = Math.min(Math.max(g, a), d) : f = !0;
                    return a
                };
                k = p(k, this.translate(a, null, null, l));
                a = l = Math.round(k +
                    u);
                u = D = Math.round(x - k - u);
                c(k) ? this.horiz ? (u = e, D = x - this.bottom, a = l = m(a, w, w + this.width)) : (a = w, l = h - this.right, u = D = m(u, e, e + this.height)) : f = !0;
                return f && !b ? null : g.renderer.crispLine(["M", a, u, "L", l, D], d || 1)
            },
            getLinearTickPositions: function(a, d, c) {
                var g, w = v(Math.floor(d / a) * a);
                c = v(Math.ceil(c / a) * a);
                var l = [];
                if (this.single) return [d];
                for (d = w; d <= c;) {
                    l.push(d);
                    d = v(d + a);
                    if (d === g) break;
                    g = d
                }
                return l
            },
            getMinorTickPositions: function() {
                var a = this,
                    d = a.options,
                    c = a.tickPositions,
                    l = a.minorTickInterval,
                    b = [],
                    p = a.pointRangePadding ||
                    0,
                    k = a.min - p,
                    p = a.max + p,
                    e = p - k;
                if (e && e / l < a.len / 3)
                    if (a.isLog) r(this.paddedTicks, function(g, d, w) {
                        d && b.push.apply(b, a.getLogTickPositions(l, w[d - 1], w[d], !0))
                    });
                    else if (a.isDatetimeAxis && "auto" === d.minorTickInterval) b = b.concat(a.getTimeTicks(a.normalizeTimeTickInterval(l), k, p, d.startOfWeek));
                else
                    for (d = k + (c[0] - k) % l; d <= p && d !== b[0]; d += l) b.push(d);
                0 !== b.length && a.trimTicks(b);
                return b
            },
            adjustForMinRange: function() {
                var a = this.options,
                    d = this.min,
                    c = this.max,
                    l, b, k, e, u, D, x, h;
                this.isXAxis && void 0 === this.minRange &&
                    !this.isLog && (n(a.min) || n(a.max) ? this.minRange = null : (r(this.series, function(a) {
                        D = a.xData;
                        for (e = x = a.xIncrement ? 1 : D.length - 1; 0 < e; e--)
                            if (u = D[e] - D[e - 1], void 0 === k || u < k) k = u
                    }), this.minRange = Math.min(5 * k, this.dataMax - this.dataMin)));
                c - d < this.minRange && (b = this.dataMax - this.dataMin >= this.minRange, h = this.minRange, l = (h - c + d) / 2, l = [d - l, p(a.min, d - l)], b && (l[2] = this.isLog ? this.log2lin(this.dataMin) : this.dataMin), d = C(l), c = [d + h, p(a.max, d + h)], b && (c[2] = this.isLog ? this.log2lin(this.dataMax) : this.dataMax), c = E(c), c - d < h &&
                    (l[0] = c - h, l[1] = p(a.min, c - h), d = C(l)));
                this.min = d;
                this.max = c
            },
            getClosest: function() {
                var a;
                this.categories ? a = 1 : r(this.series, function(g) {
                    var d = g.closestPointRange,
                        w = g.visible || !g.chart.options.chart.ignoreHiddenSeries;
                    !g.noSharedTooltip && n(d) && w && (a = n(a) ? Math.min(a, d) : d)
                });
                return a
            },
            nameToX: function(a) {
                var g = u(this.categories),
                    d = g ? this.categories : this.names,
                    c = a.options.x,
                    l;
                a.series.requireSorting = !1;
                n(c) || (c = !1 === this.options.uniqueNames ? a.series.autoIncrement() : z(a.name, d)); - 1 === c ? g || (l = d.length) : l =
                    c;
                void 0 !== l && (this.names[l] = a.name);
                return l
            },
            updateNames: function() {
                var a = this;
                0 < this.names.length && (this.names.length = 0, this.minRange = this.userMinRange, r(this.series || [], function(g) {
                    g.xIncrement = null;
                    if (!g.points || g.isDirtyData) g.processData(), g.generatePoints();
                    r(g.points, function(d, w) {
                        var c;
                        d.options && (c = a.nameToX(d), void 0 !== c && c !== d.x && (d.x = c, g.xData[w] = c))
                    })
                }))
            },
            setAxisTranslation: function(a) {
                var g = this,
                    d = g.max - g.min,
                    c = g.axisPointRange || 0,
                    l, b = 0,
                    k = 0,
                    e = g.linkedParent,
                    u = !!g.categories,
                    D = g.transA,
                    h = g.isXAxis;
                if (h || u || c) l = g.getClosest(), e ? (b = e.minPointOffset, k = e.pointRangePadding) : r(g.series, function(a) {
                    var d = u ? 1 : h ? p(a.options.pointRange, l, 0) : g.axisPointRange || 0;
                    a = a.options.pointPlacement;
                    c = Math.max(c, d);
                    g.single || (b = Math.max(b, x(a) ? 0 : d / 2), k = Math.max(k, "on" === a ? 0 : d))
                }), e = g.ordinalSlope && l ? g.ordinalSlope / l : 1, g.minPointOffset = b *= e, g.pointRangePadding = k *= e, g.pointRange = Math.min(c, d), h && (g.closestPointRange = l);
                a && (g.oldTransA = D);
                g.translationSlope = g.transA = D = g.options.staticScale || g.len / (d + k ||
                    1);
                g.transB = g.horiz ? g.left : g.bottom;
                g.minPixelPadding = D * b
            },
            minFromRange: function() {
                return this.max - this.range
            },
            setTickInterval: function(g) {
                var d = this,
                    l = d.chart,
                    k = d.options,
                    u = d.isLog,
                    D = d.log2lin,
                    x = d.isDatetimeAxis,
                    h = d.isXAxis,
                    f = d.isLinked,
                    m = k.maxPadding,
                    z = k.minPadding,
                    y = k.tickInterval,
                    G = k.tickPixelInterval,
                    H = d.categories,
                    q = d.threshold,
                    I = d.softThreshold,
                    t, A, B, C;
                x || H || f || this.getTickAmount();
                B = p(d.userMin, k.min);
                C = p(d.userMax, k.max);
                f ? (d.linkedParent = l[d.coll][k.linkedTo], l = d.linkedParent.getExtremes(),
                    d.min = p(l.min, l.dataMin), d.max = p(l.max, l.dataMax), k.type !== d.linkedParent.options.type && a.error(11, 1)) : (!I && n(q) && (d.dataMin >= q ? (t = q, z = 0) : d.dataMax <= q && (A = q, m = 0)), d.min = p(B, t, d.dataMin), d.max = p(C, A, d.dataMax));
                u && (d.positiveValuesOnly && !g && 0 >= Math.min(d.min, p(d.dataMin, d.min)) && a.error(10, 1), d.min = v(D(d.min), 15), d.max = v(D(d.max), 15));
                d.range && n(d.max) && (d.userMin = d.min = B = Math.max(d.dataMin, d.minFromRange()), d.userMax = C = d.max, d.range = null);
                e(d, "foundExtremes");
                d.beforePadding && d.beforePadding();
                d.adjustForMinRange();
                !(H || d.axisPointRange || d.usePercentage || f) && n(d.min) && n(d.max) && (D = d.max - d.min) && (!n(B) && z && (d.min -= D * z), !n(C) && m && (d.max += D * m));
                c(k.softMin) && (d.min = Math.min(d.min, k.softMin));
                c(k.softMax) && (d.max = Math.max(d.max, k.softMax));
                c(k.floor) && (d.min = Math.max(d.min, k.floor));
                c(k.ceiling) && (d.max = Math.min(d.max, k.ceiling));
                I && n(d.dataMin) && (q = q || 0, !n(B) && d.min < q && d.dataMin >= q ? d.min = q : !n(C) && d.max > q && d.dataMax <= q && (d.max = q));
                d.tickInterval = d.min === d.max || void 0 === d.min || void 0 === d.max ? 1 : f && !y && G === d.linkedParent.options.tickPixelInterval ?
                    y = d.linkedParent.tickInterval : p(y, this.tickAmount ? (d.max - d.min) / Math.max(this.tickAmount - 1, 1) : void 0, H ? 1 : (d.max - d.min) * G / Math.max(d.len, G));
                h && !g && r(d.series, function(a) {
                    a.processData(d.min !== d.oldMin || d.max !== d.oldMax)
                });
                d.setAxisTranslation(!0);
                d.beforeSetTickPositions && d.beforeSetTickPositions();
                d.postProcessTickInterval && (d.tickInterval = d.postProcessTickInterval(d.tickInterval));
                d.pointRange && !y && (d.tickInterval = Math.max(d.pointRange, d.tickInterval));
                g = p(k.minTickInterval, d.isDatetimeAxis && d.closestPointRange);
                !y && d.tickInterval < g && (d.tickInterval = g);
                x || u || y || (d.tickInterval = F(d.tickInterval, null, b(d.tickInterval), p(k.allowDecimals, !(.5 < d.tickInterval && 5 > d.tickInterval && 1E3 < d.max && 9999 > d.max)), !!this.tickAmount));
                this.tickAmount || (d.tickInterval = d.unsquish());
                this.setTickPositions()
            },
            setTickPositions: function() {
                var a = this.options,
                    d, c = a.tickPositions,
                    l = a.tickPositioner,
                    b = a.startOnTick,
                    p = a.endOnTick;
                this.tickmarkOffset = this.categories && "between" === a.tickmarkPlacement && 1 === this.tickInterval ? .5 : 0;
                this.minorTickInterval =
                    "auto" === a.minorTickInterval && this.tickInterval ? this.tickInterval / 5 : a.minorTickInterval;
                this.single = this.min === this.max && n(this.min) && !this.tickAmount && (parseInt(this.min, 10) === this.min || !1 !== a.allowDecimals);
                this.tickPositions = d = c && c.slice();
                !d && (d = this.isDatetimeAxis ? this.getTimeTicks(this.normalizeTimeTickInterval(this.tickInterval, a.units), this.min, this.max, a.startOfWeek, this.ordinalPositions, this.closestPointRange, !0) : this.isLog ? this.getLogTickPositions(this.tickInterval, this.min, this.max) : this.getLinearTickPositions(this.tickInterval,
                    this.min, this.max), d.length > this.len && (d = [d[0], d.pop()]), this.tickPositions = d, l && (l = l.apply(this, [this.min, this.max]))) && (this.tickPositions = d = l);
                this.paddedTicks = d.slice(0);
                this.trimTicks(d, b, p);
                this.isLinked || (this.single && 2 > d.length && (this.min -= .5, this.max += .5), c || l || this.adjustTickAmount())
            },
            trimTicks: function(a, d, c) {
                var g = a[0],
                    l = a[a.length - 1],
                    b = this.minPointOffset || 0;
                if (!this.isLinked) {
                    if (d && -Infinity !== g) this.min = g;
                    else
                        for (; this.min - b > a[0];) a.shift();
                    if (c) this.max = l;
                    else
                        for (; this.max + b < a[a.length -
                                1];) a.pop();
                    0 === a.length && n(g) && a.push((l + g) / 2)
                }
            },
            alignToOthers: function() {
                var a = {},
                    d, c = this.options;
                !1 === this.chart.options.chart.alignTicks || !1 === c.alignTicks || this.isLog || r(this.chart[this.coll], function(g) {
                    var c = g.options,
                        c = [g.horiz ? c.left : c.top, c.width, c.height, c.pane].join();
                    g.series.length && (a[c] ? d = !0 : a[c] = 1)
                });
                return d
            },
            getTickAmount: function() {
                var a = this.options,
                    d = a.tickAmount,
                    c = a.tickPixelInterval;
                !n(a.tickInterval) && this.len < c && !this.isRadial && !this.isLog && a.startOnTick && a.endOnTick && (d =
                    2);
                !d && this.alignToOthers() && (d = Math.ceil(this.len / c) + 1);
                4 > d && (this.finalTickAmt = d, d = 5);
                this.tickAmount = d
            },
            adjustTickAmount: function() {
                var a = this.tickInterval,
                    d = this.tickPositions,
                    c = this.tickAmount,
                    l = this.finalTickAmt,
                    b = d && d.length;
                if (b < c) {
                    for (; d.length < c;) d.push(v(d[d.length - 1] + a));
                    this.transA *= (b - 1) / (c - 1);
                    this.max = d[d.length - 1]
                } else b > c && (this.tickInterval *= 2, this.setTickPositions());
                if (n(l)) {
                    for (a = c = d.length; a--;)(3 === l && 1 === a % 2 || 2 >= l && 0 < a && a < c - 1) && d.splice(a, 1);
                    this.finalTickAmt = void 0
                }
            },
            setScale: function() {
                var a,
                    d;
                this.oldMin = this.min;
                this.oldMax = this.max;
                this.oldAxisLength = this.len;
                this.setAxisSize();
                d = this.len !== this.oldAxisLength;
                r(this.series, function(d) {
                    if (d.isDirtyData || d.isDirty || d.xAxis.isDirty) a = !0
                });
                d || a || this.isLinked || this.forceRedraw || this.userMin !== this.oldUserMin || this.userMax !== this.oldUserMax || this.alignToOthers() ? (this.resetStacks && this.resetStacks(), this.forceRedraw = !1, this.getSeriesExtremes(), this.setTickInterval(), this.oldUserMin = this.userMin, this.oldUserMax = this.userMax, this.isDirty ||
                    (this.isDirty = d || this.min !== this.oldMin || this.max !== this.oldMax)) : this.cleanStacks && this.cleanStacks()
            },
            setExtremes: function(a, d, c, l, b) {
                var g = this,
                    k = g.chart;
                c = p(c, !0);
                r(g.series, function(a) {
                    delete a.kdTree
                });
                b = h(b, {
                    min: a,
                    max: d
                });
                e(g, "setExtremes", b, function() {
                    g.userMin = a;
                    g.userMax = d;
                    g.eventArgs = b;
                    c && k.redraw(l)
                })
            },
            zoom: function(a, d) {
                var g = this.dataMin,
                    c = this.dataMax,
                    l = this.options,
                    b = Math.min(g, p(l.min, g)),
                    l = Math.max(c, p(l.max, c));
                if (a !== this.min || d !== this.max) this.allowZoomOutside || (n(g) && (a < b && (a =
                    b), a > l && (a = l)), n(c) && (d < b && (d = b), d > l && (d = l))), this.displayBtn = void 0 !== a || void 0 !== d, this.setExtremes(a, d, !1, void 0, {
                    trigger: "zoom"
                });
                return !0
            },
            setAxisSize: function() {
                var d = this.chart,
                    c = this.options,
                    l = c.offsets || [0, 0, 0, 0],
                    b = this.horiz,
                    k = this.width = Math.round(a.relativeLength(p(c.width, d.plotWidth - l[3] + l[1]), d.plotWidth)),
                    e = this.height = Math.round(a.relativeLength(p(c.height, d.plotHeight - l[0] + l[2]), d.plotHeight)),
                    u = this.top = Math.round(a.relativeLength(p(c.top, d.plotTop + l[0]), d.plotHeight, d.plotTop)),
                    c = this.left = Math.round(a.relativeLength(p(c.left, d.plotLeft + l[3]), d.plotWidth, d.plotLeft));
                this.bottom = d.chartHeight - e - u;
                this.right = d.chartWidth - k - c;
                this.len = Math.max(b ? k : e, 0);
                this.pos = b ? c : u
            },
            getExtremes: function() {
                var a = this.isLog,
                    d = this.lin2log;
                return {
                    min: a ? v(d(this.min)) : this.min,
                    max: a ? v(d(this.max)) : this.max,
                    dataMin: this.dataMin,
                    dataMax: this.dataMax,
                    userMin: this.userMin,
                    userMax: this.userMax
                }
            },
            getThreshold: function(a) {
                var d = this.isLog,
                    g = this.lin2log,
                    c = d ? g(this.min) : this.min,
                    d = d ? g(this.max) : this.max;
                null === a ? a = c : c > a ? a = c : d < a && (a = d);
                return this.translate(a, 0, 1, 0, 1)
            },
            autoLabelAlign: function(a) {
                a = (p(a, 0) - 90 * this.side + 720) % 360;
                return 15 < a && 165 > a ? "right" : 195 < a && 345 > a ? "left" : "center"
            },
            tickSize: function(a) {
                var d = this.options,
                    g = d[a + "Length"],
                    c = p(d[a + "Width"], "tick" === a && this.isXAxis ? 1 : 0);
                if (c && g) return "inside" === d[a + "Position"] && (g = -g), [g, c]
            },
            labelMetrics: function() {
                var a = this.tickPositions && this.tickPositions[0] || 0;
                return this.chart.renderer.fontMetrics(this.options.labels.style && this.options.labels.style.fontSize,
                    this.ticks[a] && this.ticks[a].label)
            },
            unsquish: function() {
                var a = this.options.labels,
                    d = this.horiz,
                    c = this.tickInterval,
                    l = c,
                    b = this.len / (((this.categories ? 1 : 0) + this.max - this.min) / c),
                    k, e = a.rotation,
                    u = this.labelMetrics(),
                    D, x = Number.MAX_VALUE,
                    h, f = function(a) {
                        a /= b || 1;
                        a = 1 < a ? Math.ceil(a) : 1;
                        return a * c
                    };
                d ? (h = !a.staggerLines && !a.step && (n(e) ? [e] : b < p(a.autoRotationLimit, 80) && a.autoRotation)) && r(h, function(a) {
                        var d;
                        if (a === e || a && -90 <= a && 90 >= a) D = f(Math.abs(u.h / Math.sin(t * a))), d = D + Math.abs(a / 360), d < x && (x = d, k = a, l = D)
                    }) :
                    a.step || (l = f(u.h));
                this.autoRotation = h;
                this.labelRotation = p(k, e);
                return l
            },
            getSlotWidth: function() {
                var a = this.chart,
                    d = this.horiz,
                    c = this.options.labels,
                    l = Math.max(this.tickPositions.length - (this.categories ? 0 : 1), 1),
                    b = a.margin[3];
                return d && 2 > (c.step || 0) && !c.rotation && (this.staggerLines || 1) * this.len / l || !d && (b && b - a.spacing[3] || .33 * a.chartWidth)
            },
            renderUnsquish: function() {
                var a = this.chart,
                    d = a.renderer,
                    c = this.tickPositions,
                    l = this.ticks,
                    b = this.options.labels,
                    p = this.horiz,
                    k = this.getSlotWidth(),
                    e = Math.max(1,
                        Math.round(k - 2 * (b.padding || 5))),
                    u = {},
                    D = this.labelMetrics(),
                    h = b.style && b.style.textOverflow,
                    f, m = 0,
                    y, z;
                x(b.rotation) || (u.rotation = b.rotation || 0);
                r(c, function(a) {
                    (a = l[a]) && a.labelLength > m && (m = a.labelLength)
                });
                this.maxLabelLength = m;
                if (this.autoRotation) m > e && m > D.h ? u.rotation = this.labelRotation : this.labelRotation = 0;
                else if (k && (f = {
                        width: e + "px"
                    }, !h))
                    for (f.textOverflow = "clip", y = c.length; !p && y--;)
                        if (z = c[y], e = l[z].label) e.styles && "ellipsis" === e.styles.textOverflow ? e.css({
                                textOverflow: "clip"
                            }) : l[z].labelLength >
                            k && e.css({
                                width: k + "px"
                            }), e.getBBox().height > this.len / c.length - (D.h - D.f) && (e.specCss = {
                                textOverflow: "ellipsis"
                            });
                u.rotation && (f = {
                    width: (m > .5 * a.chartHeight ? .33 * a.chartHeight : a.chartHeight) + "px"
                }, h || (f.textOverflow = "ellipsis"));
                if (this.labelAlign = b.align || this.autoLabelAlign(this.labelRotation)) u.align = this.labelAlign;
                r(c, function(a) {
                    var d = (a = l[a]) && a.label;
                    d && (d.attr(u), f && d.css(I(f, d.specCss)), delete d.specCss, a.rotation = u.rotation)
                });
                this.tickRotCorr = d.rotCorr(D.b, this.labelRotation || 0, 0 !== this.side)
            },
            hasData: function() {
                return this.hasVisibleSeries || n(this.min) && n(this.max) && !!this.tickPositions
            },
            addTitle: function(a) {
                var d = this.chart.renderer,
                    g = this.horiz,
                    c = this.opposite,
                    l = this.options.title,
                    b;
                this.axisTitle || ((b = l.textAlign) || (b = (g ? {
                    low: "left",
                    middle: "center",
                    high: "right"
                } : {
                    low: c ? "right" : "left",
                    middle: "center",
                    high: c ? "left" : "right"
                })[l.align]), this.axisTitle = d.text(l.text, 0, 0, l.useHTML).attr({
                    zIndex: 7,
                    rotation: l.rotation || 0,
                    align: b
                }).addClass("highcharts-axis-title").add(this.axisGroup), this.axisTitle.isNew = !0);
                this.axisTitle.css({
                    width: this.len
                });
                this.axisTitle[a ? "show" : "hide"](!0)
            },
            generateTick: function(a) {
                var g = this.ticks;
                g[a] ? g[a].addLabel() : g[a] = new d(this, a)
            },
            getOffset: function() {
                var a = this,
                    d = a.chart,
                    c = d.renderer,
                    l = a.options,
                    b = a.tickPositions,
                    k = a.ticks,
                    e = a.horiz,
                    u = a.side,
                    D = d.inverted && !a.isZAxis ? [1, 0, 3, 2][u] : u,
                    x, h, f = 0,
                    m, y = 0,
                    z = l.title,
                    G = l.labels,
                    F = 0,
                    q = d.axisOffset,
                    d = d.clipOffset,
                    I = [-1, 1, 1, -1][u],
                    t = l.className,
                    v = a.axisParent,
                    A = this.tickSize("tick");
                x = a.hasData();
                a.showAxis = h = x || p(l.showEmpty, !0);
                a.staggerLines = a.horiz && G.staggerLines;
                a.axisGroup || (a.gridGroup = c.g("grid").attr({
                    zIndex: l.gridZIndex || 1
                }).addClass("highcharts-" + this.coll.toLowerCase() + "-grid " + (t || "")).add(v), a.axisGroup = c.g("axis").attr({
                    zIndex: l.zIndex || 2
                }).addClass("highcharts-" + this.coll.toLowerCase() + " " + (t || "")).add(v), a.labelGroup = c.g("axis-labels").attr({
                    zIndex: G.zIndex || 7
                }).addClass("highcharts-" + a.coll.toLowerCase() + "-labels " + (t || "")).add(v));
                x || a.isLinked ? (r(b, function(d, g) {
                    a.generateTick(d, g)
                }), a.renderUnsquish(), !1 === G.reserveSpace || 0 !== u && 2 !== u && {
                    1: "left",
                    3: "right"
                }[u] !== a.labelAlign && "center" !== a.labelAlign || r(b, function(a) {
                    F = Math.max(k[a].getLabelSize(), F)
                }), a.staggerLines && (F *= a.staggerLines, a.labelOffset = F * (a.opposite ? -1 : 1))) : H(k, function(a, d) {
                    a.destroy();
                    delete k[d]
                });
                z && z.text && !1 !== z.enabled && (a.addTitle(h), h && !1 !== z.reserveSpace && (a.titleOffset = f = a.axisTitle.getBBox()[e ? "height" : "width"], m = z.offset, y = n(m) ? 0 : p(z.margin, e ? 5 : 10)));
                a.renderLine();
                a.offset = I * p(l.offset, q[u]);
                a.tickRotCorr = a.tickRotCorr || {
                    x: 0,
                    y: 0
                };
                c = 0 === u ? -a.labelMetrics().h : 2 === u ? a.tickRotCorr.y : 0;
                y = Math.abs(F) + y;
                F && (y = y - c + I * (e ? p(G.y, a.tickRotCorr.y + 8 * I) : G.x));
                a.axisTitleMargin = p(m, y);
                q[u] = Math.max(q[u], a.axisTitleMargin + f + I * a.offset, y, x && b.length && A ? A[0] + I * a.offset : 0);
                b = 2 * Math.floor(a.axisLine.strokeWidth() / 2);
                0 < l.offset && (b -= 2 * l.offset);
                d[D] = Math.max(d[D] || b, b)
            },
            getLinePath: function(a) {
                var d = this.chart,
                    g = this.opposite,
                    c = this.offset,
                    l = this.horiz,
                    b = this.left + (g ? this.width : 0) + c,
                    c = d.chartHeight - this.bottom - (g ? this.height : 0) + c;
                g && (a *=
                    -1);
                return d.renderer.crispLine(["M", l ? this.left : b, l ? c : this.top, "L", l ? d.chartWidth - this.right : b, l ? c : d.chartHeight - this.bottom], a)
            },
            renderLine: function() {
                this.axisLine || (this.axisLine = this.chart.renderer.path().addClass("highcharts-axis-line").add(this.axisGroup))
            },
            getTitlePosition: function() {
                var a = this.horiz,
                    d = this.left,
                    c = this.top,
                    l = this.len,
                    b = this.options.title,
                    p = a ? d : c,
                    k = this.opposite,
                    e = this.offset,
                    u = b.x || 0,
                    D = b.y || 0,
                    x = this.axisTitle,
                    h = this.chart.renderer.fontMetrics(b.style && b.style.fontSize, x),
                    x = Math.max(x.getBBox(null, 0).height - h.h - 1, 0),
                    l = {
                        low: p + (a ? 0 : l),
                        middle: p + l / 2,
                        high: p + (a ? l : 0)
                    }[b.align],
                    d = (a ? c + this.height : d) + (a ? 1 : -1) * (k ? -1 : 1) * this.axisTitleMargin + [-x, x, h.f, -x][this.side];
                return {
                    x: a ? l + u : d + (k ? this.width : 0) + e + u,
                    y: a ? d + D - (k ? this.height : 0) + e : l + D
                }
            },
            renderMinorTick: function(a) {
                var g = this.chart.hasRendered && c(this.oldMin),
                    l = this.minorTicks;
                l[a] || (l[a] = new d(this, a, "minor"));
                g && l[a].isNew && l[a].render(null, !0);
                l[a].render(null, !1, 1)
            },
            renderTick: function(a, l) {
                var g = this.isLinked,
                    b = this.ticks,
                    p = this.chart.hasRendered && c(this.oldMin);
                if (!g || a >= this.min && a <= this.max) b[a] || (b[a] = new d(this, a)), p && b[a].isNew && b[a].render(l, !0, .1), b[a].render(l)
            },
            render: function() {
                var g = this,
                    l = g.chart,
                    b = g.options,
                    p = g.isLog,
                    k = g.lin2log,
                    e = g.isLinked,
                    u = g.tickPositions,
                    x = g.axisTitle,
                    h = g.ticks,
                    f = g.minorTicks,
                    m = g.alternateBands,
                    y = b.stackLabels,
                    z = b.alternateGridColor,
                    G = g.tickmarkOffset,
                    F = g.axisLine,
                    q = g.showAxis,
                    n = A(l.renderer.globalAnimation),
                    I, t;
                g.labelEdge.length = 0;
                g.overlap = !1;
                r([h, f, m], function(a) {
                    H(a, function(a) {
                        a.isActive = !1
                    })
                });
                if (g.hasData() || e) g.minorTickInterval && !g.categories && r(g.getMinorTickPositions(), function(a) {
                    g.renderMinorTick(a)
                }), u.length && (r(u, function(a, d) {
                    g.renderTick(a, d)
                }), G && (0 === g.min || g.single) && (h[-1] || (h[-1] = new d(g, -1, null, !0)), h[-1].render(-1))), z && r(u, function(d, c) {
                    t = void 0 !== u[c + 1] ? u[c + 1] + G : g.max - G;
                    0 === c % 2 && d < g.max && t <= g.max + (l.polar ? -G : G) && (m[d] || (m[d] = new a.PlotLineOrBand(g)), I = d + G, m[d].options = {
                        from: p ? k(I) : I,
                        to: p ? k(t) : t,
                        color: z
                    }, m[d].render(), m[d].isActive = !0)
                }), g._addedPlotLB || (r((b.plotLines || []).concat(b.plotBands || []), function(a) {
                    g.addPlotBandOrLine(a)
                }), g._addedPlotLB = !0);
                r([h, f, m], function(a) {
                    var d, g = [],
                        c = n.duration;
                    H(a, function(a, d) {
                        a.isActive || (a.render(d, !1, 0), a.isActive = !1, g.push(d))
                    });
                    D(function() {
                        for (d = g.length; d--;) a[g[d]] && !a[g[d]].isActive && (a[g[d]].destroy(), delete a[g[d]])
                    }, a !== m && l.hasRendered && c ? c : 0)
                });
                F && (F[F.isPlaced ? "animate" : "attr"]({
                    d: this.getLinePath(F.strokeWidth())
                }), F.isPlaced = !0, F[q ? "show" : "hide"](!0));
                x && q && (b = g.getTitlePosition(), c(b.y) ? (x[x.isNew ? "attr" : "animate"](b),
                    x.isNew = !1) : (x.attr("y", -9999), x.isNew = !0));
                y && y.enabled && g.renderStackTotals();
                g.isDirty = !1
            },
            redraw: function() {
                this.visible && (this.render(), r(this.plotLinesAndBands, function(a) {
                    a.render()
                }));
                r(this.series, function(a) {
                    a.isDirty = !0
                })
            },
            keepProps: "extKey hcEvents names series userMax userMin".split(" "),
            destroy: function(a) {
                var d = this,
                    g = d.stacks,
                    c = d.plotLinesAndBands,
                    l;
                a || y(d);
                H(g, function(a, d) {
                    q(a);
                    g[d] = null
                });
                r([d.ticks, d.minorTicks, d.alternateBands], function(a) {
                    q(a)
                });
                if (c)
                    for (a = c.length; a--;) c[a].destroy();
                r("stackTotalGroup axisLine axisTitle axisGroup gridGroup labelGroup cross".split(" "), function(a) {
                    d[a] && (d[a] = d[a].destroy())
                });
                for (l in d.plotLinesAndBandsGroups) d.plotLinesAndBandsGroups[l] = d.plotLinesAndBandsGroups[l].destroy();
                H(d, function(a, g) {
                    -1 === z(g, d.keepProps) && delete d[g]
                })
            },
            drawCrosshair: function(a, d) {
                var g, c = this.crosshair,
                    l = p(c.snap, !0),
                    b, k = this.cross;
                a || (a = this.cross && this.cross.e);
                this.crosshair && !1 !== (n(d) || !l) ? (l ? n(d) && (b = this.isXAxis ? d.plotX : this.len - d.plotY) : b = a && (this.horiz ?
                    a.chartX - this.pos : this.len - a.chartY + this.pos), n(b) && (g = this.getPlotLinePath(d && (this.isXAxis ? d.x : p(d.stackY, d.y)), null, null, null, b) || null), n(g) ? (d = this.categories && !this.isRadial, k || (this.cross = k = this.chart.renderer.path().addClass("highcharts-crosshair highcharts-crosshair-" + (d ? "category " : "thin ") + c.className).attr({
                    zIndex: p(c.zIndex, 2)
                }).add()), k.show().attr({
                    d: g
                }), d && !c.width && k.attr({
                    "stroke-width": this.transA
                }), this.cross.e = a) : this.hideCrosshair()) : this.hideCrosshair()
            },
            hideCrosshair: function() {
                this.cross &&
                    this.cross.hide()
            }
        });
        return a.Axis = G
    }(J);
    (function(a) {
        var B = a.Axis,
            A = a.Date,
            C = a.dateFormat,
            E = a.defaultOptions,
            v = a.defined,
            f = a.each,
            n = a.extend,
            t = a.getMagnitude,
            q = a.getTZOffset,
            r = a.normalizeTickInterval,
            h = a.pick,
            e = a.timeUnits;
        B.prototype.getTimeTicks = function(a, b, k, z) {
            var u = [],
                c = {},
                x = E.global.useUTC,
                m, F = new A(b - Math.max(q(b), q(k))),
                r = A.hcMakeTime,
                p = a.unitRange,
                y = a.count,
                l, D;
            if (v(b)) {
                F[A.hcSetMilliseconds](p >= e.second ? 0 : y * Math.floor(F.getMilliseconds() / y));
                if (p >= e.second) F[A.hcSetSeconds](p >= e.minute ?
                    0 : y * Math.floor(F.getSeconds() / y));
                if (p >= e.minute) F[A.hcSetMinutes](p >= e.hour ? 0 : y * Math.floor(F[A.hcGetMinutes]() / y));
                if (p >= e.hour) F[A.hcSetHours](p >= e.day ? 0 : y * Math.floor(F[A.hcGetHours]() / y));
                if (p >= e.day) F[A.hcSetDate](p >= e.month ? 1 : y * Math.floor(F[A.hcGetDate]() / y));
                p >= e.month && (F[A.hcSetMonth](p >= e.year ? 0 : y * Math.floor(F[A.hcGetMonth]() / y)), m = F[A.hcGetFullYear]());
                if (p >= e.year) F[A.hcSetFullYear](m - m % y);
                if (p === e.week) F[A.hcSetDate](F[A.hcGetDate]() - F[A.hcGetDay]() + h(z, 1));
                m = F[A.hcGetFullYear]();
                z = F[A.hcGetMonth]();
                var d = F[A.hcGetDate](),
                    G = F[A.hcGetHours]();
                if (A.hcTimezoneOffset || A.hcGetTimezoneOffset) D = (!x || !!A.hcGetTimezoneOffset) && (k - b > 4 * e.month || q(b) !== q(k)), F = F.getTime(), l = q(F), F = new A(F + l);
                x = F.getTime();
                for (b = 1; x < k;) u.push(x), x = p === e.year ? r(m + b * y, 0) : p === e.month ? r(m, z + b * y) : !D || p !== e.day && p !== e.week ? D && p === e.hour ? r(m, z, d, G + b * y, 0, 0, l) - l : x + p * y : r(m, z, d + b * y * (p === e.day ? 1 : 7)), b++;
                u.push(x);
                p <= e.hour && 1E4 > u.length && f(u, function(a) {
                    0 === a % 18E5 && "000000000" === C("%H%M%S%L", a) && (c[a] = "day")
                })
            }
            u.info = n(a, {
                higherRanks: c,
                totalRange: p * y
            });
            return u
        };
        B.prototype.normalizeTimeTickInterval = function(a, b) {
            var k = b || [
                ["millisecond", [1, 2, 5, 10, 20, 25, 50, 100, 200, 500]],
                ["second", [1, 2, 5, 10, 15, 30]],
                ["minute", [1, 2, 5, 10, 15, 30]],
                ["hour", [1, 2, 3, 4, 6, 8, 12]],
                ["day", [1, 2]],
                ["week", [1, 2]],
                ["month", [1, 2, 3, 4, 6]],
                ["year", null]
            ];
            b = k[k.length - 1];
            var h = e[b[0]],
                u = b[1],
                c;
            for (c = 0; c < k.length && !(b = k[c], h = e[b[0]], u = b[1], k[c + 1] && a <= (h * u[u.length - 1] + e[k[c + 1][0]]) / 2); c++);
            h === e.year && a < 5 * h && (u = [1, 2, 5]);
            a = r(a / h, u, "year" === b[0] ? Math.max(t(a / h), 1) : 1);
            return {
                unitRange: h,
                count: a,
                unitName: b[0]
            }
        }
    })(J);
    (function(a) {
        var B = a.Axis,
            A = a.getMagnitude,
            C = a.map,
            E = a.normalizeTickInterval,
            v = a.pick;
        B.prototype.getLogTickPositions = function(a, n, t, q) {
            var f = this.options,
                h = this.len,
                e = this.lin2log,
                m = this.log2lin,
                b = [];
            q || (this._minorAutoInterval = null);
            if (.5 <= a) a = Math.round(a), b = this.getLinearTickPositions(a, n, t);
            else if (.08 <= a)
                for (var h = Math.floor(n), k, z, u, c, x, f = .3 < a ? [1, 2, 4] : .15 < a ? [1, 2, 4, 6, 8] : [1, 2, 3, 4, 5, 6, 7, 8, 9]; h < t + 1 && !x; h++)
                    for (z = f.length, k = 0; k < z && !x; k++) u = m(e(h) * f[k]), u > n && (!q || c <=
                        t) && void 0 !== c && b.push(c), c > t && (x = !0), c = u;
            else n = e(n), t = e(t), a = f[q ? "minorTickInterval" : "tickInterval"], a = v("auto" === a ? null : a, this._minorAutoInterval, f.tickPixelInterval / (q ? 5 : 1) * (t - n) / ((q ? h / this.tickPositions.length : h) || 1)), a = E(a, null, A(a)), b = C(this.getLinearTickPositions(a, n, t), m), q || (this._minorAutoInterval = a / 5);
            q || (this.tickInterval = a);
            return b
        };
        B.prototype.log2lin = function(a) {
            return Math.log(a) / Math.LN10
        };
        B.prototype.lin2log = function(a) {
            return Math.pow(10, a)
        }
    })(J);
    (function(a, B) {
        var A = a.arrayMax,
            C = a.arrayMin,
            E = a.defined,
            v = a.destroyObjectProperties,
            f = a.each,
            n = a.erase,
            t = a.merge,
            q = a.pick;
        a.PlotLineOrBand = function(a, h) {
            this.axis = a;
            h && (this.options = h, this.id = h.id)
        };
        a.PlotLineOrBand.prototype = {
            render: function() {
                var f = this,
                    h = f.axis,
                    e = h.horiz,
                    m = f.options,
                    b = m.label,
                    k = f.label,
                    z = m.to,
                    u = m.from,
                    c = m.value,
                    x = E(u) && E(z),
                    n = E(c),
                    F = f.svgElem,
                    H = !F,
                    p = [],
                    y = q(m.zIndex, 0),
                    l = m.events,
                    p = {
                        "class": "highcharts-plot-" + (x ? "band " : "line ") + (m.className || "")
                    },
                    D = {},
                    d = h.chart.renderer,
                    G = x ? "bands" : "lines",
                    g;
                g = h.log2lin;
                h.isLog &&
                    (u = g(u), z = g(z), c = g(c));
                D.zIndex = y;
                G += "-" + y;
                (g = h.plotLinesAndBandsGroups[G]) || (h.plotLinesAndBandsGroups[G] = g = d.g("plot-" + G).attr(D).add());
                H && (f.svgElem = F = d.path().attr(p).add(g));
                if (n) p = h.getPlotLinePath(c, F.strokeWidth());
                else if (x) p = h.getPlotBandPath(u, z, m);
                else return;
                H && p && p.length ? (F.attr({
                    d: p
                }), l && a.objectEach(l, function(a, d) {
                    F.on(d, function(a) {
                        l[d].apply(f, [a])
                    })
                })) : F && (p ? (F.show(), F.animate({
                    d: p
                })) : (F.hide(), k && (f.label = k = k.destroy())));
                b && E(b.text) && p && p.length && 0 < h.width && 0 < h.height && !p.flat ?
                    (b = t({
                        align: e && x && "center",
                        x: e ? !x && 4 : 10,
                        verticalAlign: !e && x && "middle",
                        y: e ? x ? 16 : 10 : x ? 6 : -4,
                        rotation: e && !x && 90
                    }, b), this.renderLabel(b, p, x, y)) : k && k.hide();
                return f
            },
            renderLabel: function(a, h, e, m) {
                var b = this.label,
                    k = this.axis.chart.renderer;
                b || (b = {
                    align: a.textAlign || a.align,
                    rotation: a.rotation,
                    "class": "highcharts-plot-" + (e ? "band" : "line") + "-label " + (a.className || "")
                }, b.zIndex = m, this.label = b = k.text(a.text, 0, 0, a.useHTML).attr(b).add());
                m = [h[1], h[4], e ? h[6] : h[1]];
                h = [h[2], h[5], e ? h[7] : h[2]];
                e = C(m);
                k = C(h);
                b.align(a, !1, {
                    x: e,
                    y: k,
                    width: A(m) - e,
                    height: A(h) - k
                });
                b.show()
            },
            destroy: function() {
                n(this.axis.plotLinesAndBands, this);
                delete this.axis;
                v(this)
            }
        };
        a.extend(B.prototype, {
            getPlotBandPath: function(a, h) {
                var e = this.getPlotLinePath(h, null, null, !0),
                    m = this.getPlotLinePath(a, null, null, !0),
                    b = this.horiz,
                    k = 1;
                a = a < this.min && h < this.min || a > this.max && h > this.max;
                m && e ? (a && (m.flat = m.toString() === e.toString(), k = 0), m.push(b && e[4] === m[4] ? e[4] + k : e[4], b || e[5] !== m[5] ? e[5] : e[5] + k, b && e[1] === m[1] ? e[1] + k : e[1], b || e[2] !== m[2] ? e[2] : e[2] + k)) : m =
                    null;
                return m
            },
            addPlotBand: function(a) {
                return this.addPlotBandOrLine(a, "plotBands")
            },
            addPlotLine: function(a) {
                return this.addPlotBandOrLine(a, "plotLines")
            },
            addPlotBandOrLine: function(f, h) {
                var e = (new a.PlotLineOrBand(this, f)).render(),
                    m = this.userOptions;
                e && (h && (m[h] = m[h] || [], m[h].push(f)), this.plotLinesAndBands.push(e));
                return e
            },
            removePlotBandOrLine: function(a) {
                for (var h = this.plotLinesAndBands, e = this.options, m = this.userOptions, b = h.length; b--;) h[b].id === a && h[b].destroy();
                f([e.plotLines || [], m.plotLines || [], e.plotBands || [], m.plotBands || []], function(k) {
                    for (b = k.length; b--;) k[b].id === a && n(k, k[b])
                })
            },
            removePlotBand: function(a) {
                this.removePlotBandOrLine(a)
            },
            removePlotLine: function(a) {
                this.removePlotBandOrLine(a)
            }
        })
    })(J, T);
    (function(a) {
        var B = a.dateFormat,
            A = a.each,
            C = a.extend,
            E = a.format,
            v = a.isNumber,
            f = a.map,
            n = a.merge,
            t = a.pick,
            q = a.splat,
            r = a.syncTimeout,
            h = a.timeUnits;
        a.Tooltip = function() {
            this.init.apply(this, arguments)
        };
        a.Tooltip.prototype = {
            init: function(a, h) {
                this.chart = a;
                this.options = h;
                this.crosshairs = [];
                this.now = {
                    x: 0,
                    y: 0
                };
                this.isHidden = !0;
                this.split = h.split && !a.inverted;
                this.shared = h.shared || this.split
            },
            cleanSplit: function(a) {
                A(this.chart.series, function(e) {
                    var b = e && e.tt;
                    b && (!b.isActive || a ? e.tt = b.destroy() : b.isActive = !1)
                })
            },
            applyFilter: function() {
                var a = this.chart;
                a.renderer.definition({
                    tagName: "filter",
                    id: "drop-shadow-" + a.index,
                    opacity: .5,
                    children: [{
                        tagName: "feGaussianBlur",
                        in: "SourceAlpha",
                        stdDeviation: 1
                    }, {
                        tagName: "feOffset",
                        dx: 1,
                        dy: 1
                    }, {
                        tagName: "feComponentTransfer",
                        children: [{
                            tagName: "feFuncA",
                            type: "linear",
                            slope: .3
                        }]
                    }, {
                        tagName: "feMerge",
                        children: [{
                            tagName: "feMergeNode"
                        }, {
                            tagName: "feMergeNode",
                            in: "SourceGraphic"
                        }]
                    }]
                });
                a.renderer.definition({
                    tagName: "style",
                    textContent: ".highcharts-tooltip-" + a.index + "{filter:url(#drop-shadow-" + a.index + ")}"
                })
            },
            getLabel: function() {
                var a = this.chart.renderer,
                    h = this.options;
                this.label || (this.label = this.split ? a.g("tooltip") : a.label("", 0, 0, h.shape || "callout", null, null, h.useHTML, null, "tooltip").attr({
                    padding: h.padding,
                    r: h.borderRadius
                }), this.applyFilter(), this.label.addClass("highcharts-tooltip-" +
                    this.chart.index), this.label.attr({
                    zIndex: 8
                }).add());
                return this.label
            },
            update: function(a) {
                this.destroy();
                n(!0, this.chart.options.tooltip.userOptions, a);
                this.init(this.chart, n(!0, this.options, a))
            },
            destroy: function() {
                this.label && (this.label = this.label.destroy());
                this.split && this.tt && (this.cleanSplit(this.chart, !0), this.tt = this.tt.destroy());
                clearTimeout(this.hideTimer);
                clearTimeout(this.tooltipTimeout)
            },
            move: function(a, h, b, k) {
                var e = this,
                    u = e.now,
                    c = !1 !== e.options.animation && !e.isHidden && (1 < Math.abs(a -
                        u.x) || 1 < Math.abs(h - u.y)),
                    x = e.followPointer || 1 < e.len;
                C(u, {
                    x: c ? (2 * u.x + a) / 3 : a,
                    y: c ? (u.y + h) / 2 : h,
                    anchorX: x ? void 0 : c ? (2 * u.anchorX + b) / 3 : b,
                    anchorY: x ? void 0 : c ? (u.anchorY + k) / 2 : k
                });
                e.getLabel().attr(u);
                c && (clearTimeout(this.tooltipTimeout), this.tooltipTimeout = setTimeout(function() {
                    e && e.move(a, h, b, k)
                }, 32))
            },
            hide: function(a) {
                var e = this;
                clearTimeout(this.hideTimer);
                a = t(a, this.options.hideDelay, 500);
                this.isHidden || (this.hideTimer = r(function() {
                    e.getLabel()[a ? "fadeOut" : "hide"]();
                    e.isHidden = !0
                }, a))
            },
            getAnchor: function(a,
                h) {
                var b, k = this.chart,
                    e = k.inverted,
                    u = k.plotTop,
                    c = k.plotLeft,
                    x = 0,
                    m = 0,
                    F, n;
                a = q(a);
                b = a[0].tooltipPos;
                this.followPointer && h && (void 0 === h.chartX && (h = k.pointer.normalize(h)), b = [h.chartX - k.plotLeft, h.chartY - u]);
                b || (A(a, function(a) {
                    F = a.series.yAxis;
                    n = a.series.xAxis;
                    x += a.plotX + (!e && n ? n.left - c : 0);
                    m += (a.plotLow ? (a.plotLow + a.plotHigh) / 2 : a.plotY) + (!e && F ? F.top - u : 0)
                }), x /= a.length, m /= a.length, b = [e ? k.plotWidth - m : x, this.shared && !e && 1 < a.length && h ? h.chartY - u : e ? k.plotHeight - x : m]);
                return f(b, Math.round)
            },
            getPosition: function(a,
                h, b) {
                var k = this.chart,
                    e = this.distance,
                    u = {},
                    c = b.h || 0,
                    x, f = ["y", k.chartHeight, h, b.plotY + k.plotTop, k.plotTop, k.plotTop + k.plotHeight],
                    m = ["x", k.chartWidth, a, b.plotX + k.plotLeft, k.plotLeft, k.plotLeft + k.plotWidth],
                    q = !this.followPointer && t(b.ttBelow, !k.inverted === !!b.negative),
                    p = function(a, l, g, b, p, k) {
                        var d = g < b - e,
                            w = b + e + g < l,
                            h = b - e - g;
                        b += e;
                        if (q && w) u[a] = b;
                        else if (!q && d) u[a] = h;
                        else if (d) u[a] = Math.min(k - g, 0 > h - c ? h : h - c);
                        else if (w) u[a] = Math.max(p, b + c + g > l ? b : b + c);
                        else return !1
                    },
                    y = function(a, c, g, l) {
                        var d;
                        l < e || l > c - e ? d = !1 :
                            u[a] = l < g / 2 ? 1 : l > c - g / 2 ? c - g - 2 : l - g / 2;
                        return d
                    },
                    l = function(a) {
                        var d = f;
                        f = m;
                        m = d;
                        x = a
                    },
                    D = function() {
                        !1 !== p.apply(0, f) ? !1 !== y.apply(0, m) || x || (l(!0), D()) : x ? u.x = u.y = 0 : (l(!0), D())
                    };
                (k.inverted || 1 < this.len) && l();
                D();
                return u
            },
            defaultFormatter: function(a) {
                var e = this.points || q(this),
                    b;
                b = [a.tooltipFooterHeaderFormatter(e[0])];
                b = b.concat(a.bodyFormatter(e));
                b.push(a.tooltipFooterHeaderFormatter(e[0], !0));
                return b
            },
            refresh: function(a, h) {
                var b, k = this.options,
                    e = a,
                    u, c = {},
                    x = [];
                b = k.formatter || this.defaultFormatter;
                var c =
                    this.shared,
                    f;
                k.enabled && (clearTimeout(this.hideTimer), this.followPointer = q(e)[0].series.tooltipOptions.followPointer, u = this.getAnchor(e, h), h = u[0], k = u[1], !c || e.series && e.series.noSharedTooltip ? c = e.getLabelConfig() : (A(e, function(a) {
                    a.setState("hover");
                    x.push(a.getLabelConfig())
                }), c = {
                    x: e[0].category,
                    y: e[0].y
                }, c.points = x, e = e[0]), this.len = x.length, c = b.call(c, this), f = e.series, this.distance = t(f.tooltipOptions.distance, 16), !1 === c ? this.hide() : (b = this.getLabel(), this.isHidden && b.attr({
                        opacity: 1
                    }).show(), this.split ?
                    this.renderSplit(c, a) : (b.css({
                        width: this.chart.spacingBox.width
                    }), b.attr({
                        text: c && c.join ? c.join("") : c
                    }), b.removeClass(/highcharts-color-[\d]+/g).addClass("highcharts-color-" + t(e.colorIndex, f.colorIndex)), this.updatePosition({
                        plotX: h,
                        plotY: k,
                        negative: e.negative,
                        ttBelow: e.ttBelow,
                        h: u[2] || 0
                    })), this.isHidden = !1))
            },
            renderSplit: function(e, h) {
                var b = this,
                    k = [],
                    f = this.chart,
                    u = f.renderer,
                    c = !0,
                    x = this.options,
                    m = 0,
                    F = this.getLabel();
                A(e.slice(0, h.length + 1), function(a, p) {
                    if (!1 !== a) {
                        p = h[p - 1] || {
                            isHeader: !0,
                            plotX: h[0].plotX
                        };
                        var e = p.series || b,
                            l = e.tt,
                            D = "highcharts-color-" + t(p.colorIndex, (p.series || {}).colorIndex, "none");
                        l || (e.tt = l = u.label(null, null, null, "callout").addClass("highcharts-tooltip-box " + D).attr({
                            padding: x.padding,
                            r: x.borderRadius
                        }).add(F));
                        l.isActive = !0;
                        l.attr({
                            text: a
                        });
                        a = l.getBBox();
                        D = a.width + l.strokeWidth();
                        p.isHeader ? (m = a.height, D = Math.max(0, Math.min(p.plotX + f.plotLeft - D / 2, f.chartWidth - D))) : D = p.plotX + f.plotLeft - t(x.distance, 16) - D;
                        0 > D && (c = !1);
                        a = (p.series && p.series.yAxis && p.series.yAxis.pos) + (p.plotY || 0);
                        a -= f.plotTop;
                        k.push({
                            target: p.isHeader ? f.plotHeight + m : a,
                            rank: p.isHeader ? 1 : 0,
                            size: e.tt.getBBox().height + 1,
                            point: p,
                            x: D,
                            tt: l
                        })
                    }
                });
                this.cleanSplit();
                a.distribute(k, f.plotHeight + m);
                A(k, function(a) {
                    var b = a.point,
                        k = b.series;
                    a.tt.attr({
                        visibility: void 0 === a.pos ? "hidden" : "inherit",
                        x: c || b.isHeader ? a.x : b.plotX + f.plotLeft + t(x.distance, 16),
                        y: a.pos + f.plotTop,
                        anchorX: b.isHeader ? b.plotX + f.plotLeft : b.plotX + k.xAxis.pos,
                        anchorY: b.isHeader ? a.pos + f.plotTop - 15 : b.plotY + k.yAxis.pos
                    })
                })
            },
            updatePosition: function(a) {
                var e =
                    this.chart,
                    b = this.getLabel(),
                    b = (this.options.positioner || this.getPosition).call(this, b.width, b.height, a);
                this.move(Math.round(b.x), Math.round(b.y || 0), a.plotX + e.plotLeft, a.plotY + e.plotTop)
            },
            getDateFormat: function(a, f, b, k) {
                var e = B("%m-%d %H:%M:%S.%L", f),
                    u, c, x = {
                        millisecond: 15,
                        second: 12,
                        minute: 9,
                        hour: 6,
                        day: 3
                    },
                    m = "millisecond";
                for (c in h) {
                    if (a === h.week && +B("%w", f) === b && "00:00:00.000" === e.substr(6)) {
                        c = "week";
                        break
                    }
                    if (h[c] > a) {
                        c = m;
                        break
                    }
                    if (x[c] && e.substr(x[c]) !== "01-01 00:00:00.000".substr(x[c])) break;
                    "week" !==
                    c && (m = c)
                }
                c && (u = k[c]);
                return u
            },
            getXDateFormat: function(a, h, b) {
                h = h.dateTimeLabelFormats;
                var k = b && b.closestPointRange;
                return (k ? this.getDateFormat(k, a.x, b.options.startOfWeek, h) : h.day) || h.year
            },
            tooltipFooterHeaderFormatter: function(a, h) {
                var b = h ? "footer" : "header";
                h = a.series;
                var k = h.tooltipOptions,
                    e = k.xDateFormat,
                    u = h.xAxis,
                    c = u && "datetime" === u.options.type && v(a.key),
                    b = k[b + "Format"];
                c && !e && (e = this.getXDateFormat(a, k, u));
                c && e && (b = b.replace("{point.key}", "{point.key:" + e + "}"));
                return E(b, {
                    point: a,
                    series: h
                })
            },
            bodyFormatter: function(a) {
                return f(a, function(a) {
                    var b = a.series.tooltipOptions;
                    return (b.pointFormatter || a.point.tooltipFormatter).call(a.point, b.pointFormat)
                })
            }
        }
    })(J);
    (function(a) {
        var B = a.addEvent,
            A = a.attr,
            C = a.charts,
            E = a.css,
            v = a.defined,
            f = a.each,
            n = a.extend,
            t = a.find,
            q = a.fireEvent,
            r = a.isObject,
            h = a.offset,
            e = a.pick,
            m = a.removeEvent,
            b = a.splat,
            k = a.Tooltip,
            z = a.win;
        a.Pointer = function(a, c) {
            this.init(a, c)
        };
        a.Pointer.prototype = {
            init: function(a, c) {
                this.options = c;
                this.chart = a;
                this.runChartClick = c.chart.events &&
                    !!c.chart.events.click;
                this.pinchDown = [];
                this.lastValidTouch = {};
                k && (a.tooltip = new k(a, c.tooltip), this.followTouchMove = e(c.tooltip.followTouchMove, !0));
                this.setDOMEvents()
            },
            zoomOption: function(a) {
                var c = this.chart,
                    b = c.options.chart,
                    k = b.zoomType || "",
                    c = c.inverted;
                /touch/.test(a.type) && (k = e(b.pinchType, k));
                this.zoomX = a = /x/.test(k);
                this.zoomY = k = /y/.test(k);
                this.zoomHor = a && !c || k && c;
                this.zoomVert = k && !c || a && c;
                this.hasZoom = a || k
            },
            normalize: function(a, c) {
                var b, k;
                a = a || z.event;
                a.target || (a.target = a.srcElement);
                k = a.touches ? a.touches.length ? a.touches.item(0) : a.changedTouches[0] : a;
                c || (this.chartPosition = c = h(this.chart.container));
                void 0 === k.pageX ? (b = Math.max(a.x, a.clientX - c.left), c = a.y) : (b = k.pageX - c.left, c = k.pageY - c.top);
                return n(a, {
                    chartX: Math.round(b),
                    chartY: Math.round(c)
                })
            },
            getCoordinates: function(a) {
                var c = {
                    xAxis: [],
                    yAxis: []
                };
                f(this.chart.axes, function(b) {
                    c[b.isXAxis ? "xAxis" : "yAxis"].push({
                        axis: b,
                        value: b.toValue(a[b.horiz ? "chartX" : "chartY"])
                    })
                });
                return c
            },
            findNearestKDPoint: function(a, c, b) {
                var k;
                f(a, function(a) {
                    var e = !(a.noSharedTooltip && c) && 0 > a.options.findNearestPointBy.indexOf("y");
                    a = a.searchPoint(b, e);
                    if ((e = r(a, !0)) && !(e = !r(k, !0))) var e = k.distX - a.distX,
                        p = k.dist - a.dist,
                        h = (a.series.group && a.series.group.zIndex) - (k.series.group && k.series.group.zIndex),
                        e = 0 < (0 !== e && c ? e : 0 !== p ? p : 0 !== h ? h : k.series.index > a.series.index ? -1 : 1);
                    e && (k = a)
                });
                return k
            },
            getPointFromEvent: function(a) {
                a = a.target;
                for (var c; a && !c;) c = a.point, a = a.parentNode;
                return c
            },
            getChartCoordinatesFromPoint: function(a, c) {
                var b = a.series,
                    k = b.xAxis,
                    b = b.yAxis;
                if (k &&
                    b) return c ? {
                    chartX: k.len + k.pos - a.clientX,
                    chartY: b.len + b.pos - a.plotY
                } : {
                    chartX: a.clientX + k.pos,
                    chartY: a.plotY + b.pos
                }
            },
            getHoverData: function(b, c, k, h, m, z) {
                var p, u = [];
                h = !(!h || !b);
                var l = c && !c.stickyTracking ? [c] : a.grep(k, function(a) {
                    return a.visible && !(!m && a.directTouch) && e(a.options.enableMouseTracking, !0) && a.stickyTracking
                });
                c = (p = h ? b : this.findNearestKDPoint(l, m, z)) && p.series;
                p && (m && !c.noSharedTooltip ? (l = a.grep(k, function(a) {
                        return a.visible && !(!m && a.directTouch) && e(a.options.enableMouseTracking, !0) && !a.noSharedTooltip
                    }),
                    f(l, function(a) {
                        a = t(a.points, function(a) {
                            return a.x === p.x
                        });
                        r(a) && !a.isNull && u.push(a)
                    })) : u.push(p));
                return {
                    hoverPoint: p,
                    hoverSeries: c,
                    hoverPoints: u
                }
            },
            runPointActions: function(b, c) {
                var k = this.chart,
                    h = k.tooltip,
                    u = h ? h.shared : !1,
                    m = c || k.hoverPoint,
                    p = m && m.series || k.hoverSeries,
                    p = this.getHoverData(m, p, k.series, !!c || p && p.directTouch && this.isDirectTouch, u, b),
                    y, m = p.hoverPoint;
                y = p.hoverPoints;
                c = (p = p.hoverSeries) && p.tooltipOptions.followPointer;
                u = u && p && !p.noSharedTooltip;
                if (m && (m !== k.hoverPoint || h && h.isHidden)) {
                    f(k.hoverPoints || [], function(c) {
                        -1 === a.inArray(c, y) && c.setState()
                    });
                    f(y || [], function(a) {
                        a.setState("hover")
                    });
                    if (k.hoverSeries !== p) p.onMouseOver();
                    k.hoverPoint && k.hoverPoint.firePointEvent("mouseOut");
                    m.firePointEvent("mouseOver");
                    k.hoverPoints = y;
                    k.hoverPoint = m;
                    h && h.refresh(u ? y : m, b)
                } else c && h && !h.isHidden && (m = h.getAnchor([{}], b), h.updatePosition({
                    plotX: m[0],
                    plotY: m[1]
                }));
                this.unDocMouseMove || (this.unDocMouseMove = B(k.container.ownerDocument, "mousemove", function(c) {
                    var l = C[a.hoverChartIndex];
                    if (l) l.pointer.onDocumentMouseMove(c)
                }));
                f(k.axes, function(c) {
                    var l = e(c.crosshair.snap, !0),
                        d = l ? a.find(y, function(a) {
                            return a.series[c.coll] === c
                        }) : void 0;
                    d || !l ? c.drawCrosshair(b, d) : c.hideCrosshair()
                })
            },
            reset: function(a, c) {
                var k = this.chart,
                    e = k.hoverSeries,
                    h = k.hoverPoint,
                    u = k.hoverPoints,
                    p = k.tooltip,
                    y = p && p.shared ? u : h;
                a && y && f(b(y), function(c) {
                    c.series.isCartesian && void 0 === c.plotX && (a = !1)
                });
                if (a) p && y && (p.refresh(y), h && (h.setState(h.state, !0), f(k.axes, function(a) {
                    a.crosshair && a.drawCrosshair(null, h)
                })));
                else {
                    if (h) h.onMouseOut();
                    u && f(u, function(a) {
                        a.setState()
                    });
                    if (e) e.onMouseOut();
                    p && p.hide(c);
                    this.unDocMouseMove && (this.unDocMouseMove = this.unDocMouseMove());
                    f(k.axes, function(a) {
                        a.hideCrosshair()
                    });
                    this.hoverX = k.hoverPoints = k.hoverPoint = null
                }
            },
            scaleGroups: function(a, c) {
                var b = this.chart,
                    k;
                f(b.series, function(e) {
                    k = a || e.getPlotBox();
                    e.xAxis && e.xAxis.zoomEnabled && e.group && (e.group.attr(k), e.markerGroup && (e.markerGroup.attr(k), e.markerGroup.clip(c ? b.clipRect : null)), e.dataLabelsGroup && e.dataLabelsGroup.attr(k))
                });
                b.clipRect.attr(c || b.clipBox)
            },
            dragStart: function(a) {
                var c =
                    this.chart;
                c.mouseIsDown = a.type;
                c.cancelClick = !1;
                c.mouseDownX = this.mouseDownX = a.chartX;
                c.mouseDownY = this.mouseDownY = a.chartY
            },
            drag: function(a) {
                var c = this.chart,
                    b = c.options.chart,
                    k = a.chartX,
                    e = a.chartY,
                    h = this.zoomHor,
                    p = this.zoomVert,
                    u = c.plotLeft,
                    l = c.plotTop,
                    D = c.plotWidth,
                    d = c.plotHeight,
                    f, g = this.selectionMarker,
                    w = this.mouseDownX,
                    m = this.mouseDownY,
                    z = b.panKey && a[b.panKey + "Key"];
                g && g.touch || (k < u ? k = u : k > u + D && (k = u + D), e < l ? e = l : e > l + d && (e = l + d), this.hasDragged = Math.sqrt(Math.pow(w - k, 2) + Math.pow(m - e, 2)), 10 < this.hasDragged &&
                    (f = c.isInsidePlot(w - u, m - l), c.hasCartesianSeries && (this.zoomX || this.zoomY) && f && !z && !g && (this.selectionMarker = g = c.renderer.rect(u, l, h ? 1 : D, p ? 1 : d, 0).attr({
                        "class": "highcharts-selection-marker",
                        zIndex: 7
                    }).add()), g && h && (k -= w, g.attr({
                        width: Math.abs(k),
                        x: (0 < k ? 0 : k) + w
                    })), g && p && (k = e - m, g.attr({
                        height: Math.abs(k),
                        y: (0 < k ? 0 : k) + m
                    })), f && !g && b.panning && c.pan(a, b.panning)))
            },
            drop: function(a) {
                var c = this,
                    b = this.chart,
                    k = this.hasPinched;
                if (this.selectionMarker) {
                    var e = {
                            originalEvent: a,
                            xAxis: [],
                            yAxis: []
                        },
                        h = this.selectionMarker,
                        p = h.attr ? h.attr("x") : h.x,
                        u = h.attr ? h.attr("y") : h.y,
                        l = h.attr ? h.attr("width") : h.width,
                        D = h.attr ? h.attr("height") : h.height,
                        d;
                    if (this.hasDragged || k) f(b.axes, function(b) {
                        if (b.zoomEnabled && v(b.min) && (k || c[{
                                xAxis: "zoomX",
                                yAxis: "zoomY"
                            }[b.coll]])) {
                            var g = b.horiz,
                                h = "touchend" === a.type ? b.minPixelPadding : 0,
                                f = b.toValue((g ? p : u) + h),
                                g = b.toValue((g ? p + l : u + D) - h);
                            e[b.coll].push({
                                axis: b,
                                min: Math.min(f, g),
                                max: Math.max(f, g)
                            });
                            d = !0
                        }
                    }), d && q(b, "selection", e, function(a) {
                        b.zoom(n(a, k ? {
                            animation: !1
                        } : null))
                    });
                    this.selectionMarker =
                        this.selectionMarker.destroy();
                    k && this.scaleGroups()
                }
                b && (E(b.container, {
                    cursor: b._cursor
                }), b.cancelClick = 10 < this.hasDragged, b.mouseIsDown = this.hasDragged = this.hasPinched = !1, this.pinchDown = [])
            },
            onContainerMouseDown: function(a) {
                a = this.normalize(a);
                this.zoomOption(a);
                a.preventDefault && a.preventDefault();
                this.dragStart(a)
            },
            onDocumentMouseUp: function(b) {
                C[a.hoverChartIndex] && C[a.hoverChartIndex].pointer.drop(b)
            },
            onDocumentMouseMove: function(a) {
                var c = this.chart,
                    b = this.chartPosition;
                a = this.normalize(a, b);
                !b || this.inClass(a.target, "highcharts-tracker") || c.isInsidePlot(a.chartX - c.plotLeft, a.chartY - c.plotTop) || this.reset()
            },
            onContainerMouseLeave: function(b) {
                var c = C[a.hoverChartIndex];
                c && (b.relatedTarget || b.toElement) && (c.pointer.reset(), c.pointer.chartPosition = null)
            },
            onContainerMouseMove: function(b) {
                var c = this.chart;
                v(a.hoverChartIndex) && C[a.hoverChartIndex] && C[a.hoverChartIndex].mouseIsDown || (a.hoverChartIndex = c.index);
                b = this.normalize(b);
                b.returnValue = !1;
                "mousedown" === c.mouseIsDown && this.drag(b);
                !this.inClass(b.target,
                    "highcharts-tracker") && !c.isInsidePlot(b.chartX - c.plotLeft, b.chartY - c.plotTop) || c.openMenu || this.runPointActions(b)
            },
            inClass: function(a, c) {
                for (var b; a;) {
                    if (b = A(a, "class")) {
                        if (-1 !== b.indexOf(c)) return !0;
                        if (-1 !== b.indexOf("highcharts-container")) return !1
                    }
                    a = a.parentNode
                }
            },
            onTrackerMouseOut: function(a) {
                var c = this.chart.hoverSeries;
                a = a.relatedTarget || a.toElement;
                this.isDirectTouch = !1;
                if (!(!c || !a || c.stickyTracking || this.inClass(a, "highcharts-tooltip") || this.inClass(a, "highcharts-series-" + c.index) && this.inClass(a,
                        "highcharts-tracker"))) c.onMouseOut()
            },
            onContainerClick: function(a) {
                var c = this.chart,
                    b = c.hoverPoint,
                    k = c.plotLeft,
                    e = c.plotTop;
                a = this.normalize(a);
                c.cancelClick || (b && this.inClass(a.target, "highcharts-tracker") ? (q(b.series, "click", n(a, {
                    point: b
                })), c.hoverPoint && b.firePointEvent("click", a)) : (n(a, this.getCoordinates(a)), c.isInsidePlot(a.chartX - k, a.chartY - e) && q(c, "click", a)))
            },
            setDOMEvents: function() {
                var b = this,
                    c = b.chart.container,
                    k = c.ownerDocument;
                c.onmousedown = function(a) {
                    b.onContainerMouseDown(a)
                };
                c.onmousemove =
                    function(a) {
                        b.onContainerMouseMove(a)
                    };
                c.onclick = function(a) {
                    b.onContainerClick(a)
                };
                B(c, "mouseleave", b.onContainerMouseLeave);
                1 === a.chartCount && B(k, "mouseup", b.onDocumentMouseUp);
                a.hasTouch && (c.ontouchstart = function(a) {
                    b.onContainerTouchStart(a)
                }, c.ontouchmove = function(a) {
                    b.onContainerTouchMove(a)
                }, 1 === a.chartCount && B(k, "touchend", b.onDocumentTouchEnd))
            },
            destroy: function() {
                var b = this,
                    c = this.chart.container.ownerDocument;
                b.unDocMouseMove && b.unDocMouseMove();
                m(b.chart.container, "mouseleave", b.onContainerMouseLeave);
                a.chartCount || (m(c, "mouseup", b.onDocumentMouseUp), a.hasTouch && m(c, "touchend", b.onDocumentTouchEnd));
                clearInterval(b.tooltipTimeout);
                a.objectEach(b, function(a, c) {
                    b[c] = null
                })
            }
        }
    })(J);
    (function(a) {
        var B = a.charts,
            A = a.each,
            C = a.extend,
            E = a.map,
            v = a.noop,
            f = a.pick;
        C(a.Pointer.prototype, {
            pinchTranslate: function(a, f, q, r, h, e) {
                this.zoomHor && this.pinchTranslateDirection(!0, a, f, q, r, h, e);
                this.zoomVert && this.pinchTranslateDirection(!1, a, f, q, r, h, e)
            },
            pinchTranslateDirection: function(a, f, q, r, h, e, m, b) {
                var k = this.chart,
                    z = a ? "x" : "y",
                    u = a ? "X" : "Y",
                    c = "chart" + u,
                    x = a ? "width" : "height",
                    n = k["plot" + (a ? "Left" : "Top")],
                    F, t, p = b || 1,
                    y = k.inverted,
                    l = k.bounds[a ? "h" : "v"],
                    D = 1 === f.length,
                    d = f[0][c],
                    G = q[0][c],
                    g = !D && f[1][c],
                    w = !D && q[1][c],
                    v;
                q = function() {
                    !D && 20 < Math.abs(d - g) && (p = b || Math.abs(G - w) / Math.abs(d - g));
                    t = (n - G) / p + d;
                    F = k["plot" + (a ? "Width" : "Height")] / p
                };
                q();
                f = t;
                f < l.min ? (f = l.min, v = !0) : f + F > l.max && (f = l.max - F, v = !0);
                v ? (G -= .8 * (G - m[z][0]), D || (w -= .8 * (w - m[z][1])), q()) : m[z] = [G, w];
                y || (e[z] = t - n, e[x] = F);
                e = y ? 1 / p : p;
                h[x] = F;
                h[z] = f;
                r[y ? a ? "scaleY" : "scaleX" :
                    "scale" + u] = p;
                r["translate" + u] = e * n + (G - e * d)
            },
            pinch: function(a) {
                var n = this,
                    q = n.chart,
                    r = n.pinchDown,
                    h = a.touches,
                    e = h.length,
                    m = n.lastValidTouch,
                    b = n.hasZoom,
                    k = n.selectionMarker,
                    z = {},
                    u = 1 === e && (n.inClass(a.target, "highcharts-tracker") && q.runTrackerClick || n.runChartClick),
                    c = {};
                1 < e && (n.initiated = !0);
                b && n.initiated && !u && a.preventDefault();
                E(h, function(a) {
                    return n.normalize(a)
                });
                "touchstart" === a.type ? (A(h, function(a, b) {
                    r[b] = {
                        chartX: a.chartX,
                        chartY: a.chartY
                    }
                }), m.x = [r[0].chartX, r[1] && r[1].chartX], m.y = [r[0].chartY,
                    r[1] && r[1].chartY
                ], A(q.axes, function(a) {
                    if (a.zoomEnabled) {
                        var b = q.bounds[a.horiz ? "h" : "v"],
                            c = a.minPixelPadding,
                            k = a.toPixels(f(a.options.min, a.dataMin)),
                            e = a.toPixels(f(a.options.max, a.dataMax)),
                            h = Math.max(k, e);
                        b.min = Math.min(a.pos, Math.min(k, e) - c);
                        b.max = Math.max(a.pos + a.len, h + c)
                    }
                }), n.res = !0) : n.followTouchMove && 1 === e ? this.runPointActions(n.normalize(a)) : r.length && (k || (n.selectionMarker = k = C({
                    destroy: v,
                    touch: !0
                }, q.plotBox)), n.pinchTranslate(r, h, z, k, c, m), n.hasPinched = b, n.scaleGroups(z, c), n.res && (n.res = !1, this.reset(!1, 0)))
            },
            touch: function(n, t) {
                var q = this.chart,
                    r, h;
                if (q.index !== a.hoverChartIndex) this.onContainerMouseLeave({
                    relatedTarget: !0
                });
                a.hoverChartIndex = q.index;
                1 === n.touches.length ? (n = this.normalize(n), (h = q.isInsidePlot(n.chartX - q.plotLeft, n.chartY - q.plotTop)) && !q.openMenu ? (t && this.runPointActions(n), "touchmove" === n.type && (t = this.pinchDown, r = t[0] ? 4 <= Math.sqrt(Math.pow(t[0].chartX - n.chartX, 2) + Math.pow(t[0].chartY - n.chartY, 2)) : !1), f(r, !0) && this.pinch(n)) : t && this.reset()) : 2 === n.touches.length &&
                    this.pinch(n)
            },
            onContainerTouchStart: function(a) {
                this.zoomOption(a);
                this.touch(a, !0)
            },
            onContainerTouchMove: function(a) {
                this.touch(a)
            },
            onDocumentTouchEnd: function(f) {
                B[a.hoverChartIndex] && B[a.hoverChartIndex].pointer.drop(f)
            }
        })
    })(J);
    (function(a) {
        var B = a.addEvent,
            A = a.charts,
            C = a.css,
            E = a.doc,
            v = a.extend,
            f = a.noop,
            n = a.Pointer,
            t = a.removeEvent,
            q = a.win,
            r = a.wrap;
        if (!a.hasTouch && (q.PointerEvent || q.MSPointerEvent)) {
            var h = {},
                e = !!q.PointerEvent,
                m = function() {
                    var b = [];
                    b.item = function(a) {
                        return this[a]
                    };
                    a.objectEach(h,
                        function(a) {
                            b.push({
                                pageX: a.pageX,
                                pageY: a.pageY,
                                target: a.target
                            })
                        });
                    return b
                },
                b = function(b, e, h, c) {
                    "touch" !== b.pointerType && b.pointerType !== b.MSPOINTER_TYPE_TOUCH || !A[a.hoverChartIndex] || (c(b), c = A[a.hoverChartIndex].pointer, c[e]({
                        type: h,
                        target: b.currentTarget,
                        preventDefault: f,
                        touches: m()
                    }))
                };
            v(n.prototype, {
                onContainerPointerDown: function(a) {
                    b(a, "onContainerTouchStart", "touchstart", function(a) {
                        h[a.pointerId] = {
                            pageX: a.pageX,
                            pageY: a.pageY,
                            target: a.currentTarget
                        }
                    })
                },
                onContainerPointerMove: function(a) {
                    b(a,
                        "onContainerTouchMove", "touchmove",
                        function(a) {
                            h[a.pointerId] = {
                                pageX: a.pageX,
                                pageY: a.pageY
                            };
                            h[a.pointerId].target || (h[a.pointerId].target = a.currentTarget)
                        })
                },
                onDocumentPointerUp: function(a) {
                    b(a, "onDocumentTouchEnd", "touchend", function(a) {
                        delete h[a.pointerId]
                    })
                },
                batchMSEvents: function(a) {
                    a(this.chart.container, e ? "pointerdown" : "MSPointerDown", this.onContainerPointerDown);
                    a(this.chart.container, e ? "pointermove" : "MSPointerMove", this.onContainerPointerMove);
                    a(E, e ? "pointerup" : "MSPointerUp", this.onDocumentPointerUp)
                }
            });
            r(n.prototype, "init", function(a, b, e) {
                a.call(this, b, e);
                this.hasZoom && C(b.container, {
                    "-ms-touch-action": "none",
                    "touch-action": "none"
                })
            });
            r(n.prototype, "setDOMEvents", function(a) {
                a.apply(this);
                (this.hasZoom || this.followTouchMove) && this.batchMSEvents(B)
            });
            r(n.prototype, "destroy", function(a) {
                this.batchMSEvents(t);
                a.call(this)
            })
        }
    })(J);
    (function(a) {
        var B = a.addEvent,
            A = a.css,
            C = a.discardElement,
            E = a.defined,
            v = a.each,
            f = a.isFirefox,
            n = a.marginNames,
            t = a.merge,
            q = a.pick,
            r = a.setAnimation,
            h = a.stableSort,
            e = a.win,
            m = a.wrap;
        a.Legend = function(a, k) {
            this.init(a, k)
        };
        a.Legend.prototype = {
            init: function(a, k) {
                this.chart = a;
                this.setOptions(k);
                k.enabled && (this.render(), B(this.chart, "endResize", function() {
                    this.legend.positionCheckboxes()
                }))
            },
            setOptions: function(a) {
                var b = q(a.padding, 8);
                this.options = a;
                this.itemMarginTop = a.itemMarginTop || 0;
                this.padding = b;
                this.initialItemY = b - 5;
                this.itemHeight = this.maxItemWidth = 0;
                this.symbolWidth = q(a.symbolWidth, 16);
                this.pages = []
            },
            update: function(a, k) {
                var b = this.chart;
                this.setOptions(t(!0, this.options,
                    a));
                this.destroy();
                b.isDirtyLegend = b.isDirtyBox = !0;
                q(k, !0) && b.redraw()
            },
            colorizeItem: function(a, k) {
                a.legendGroup[k ? "removeClass" : "addClass"]("highcharts-legend-item-hidden")
            },
            positionItem: function(a) {
                var b = this.options,
                    e = b.symbolPadding,
                    b = !b.rtl,
                    h = a._legendItemPos,
                    c = h[0],
                    h = h[1],
                    f = a.checkbox;
                (a = a.legendGroup) && a.element && a.translate(b ? c : this.legendWidth - c - 2 * e - 4, h);
                f && (f.x = c, f.y = h)
            },
            destroyItem: function(a) {
                var b = a.checkbox;
                v(["legendItem", "legendLine", "legendSymbol", "legendGroup"], function(b) {
                    a[b] &&
                        (a[b] = a[b].destroy())
                });
                b && C(a.checkbox)
            },
            destroy: function() {
                function a(a) {
                    this[a] && (this[a] = this[a].destroy())
                }
                v(this.getAllItems(), function(b) {
                    v(["legendItem", "legendGroup"], a, b)
                });
                v("clipRect up down pager nav box title group".split(" "), a, this);
                this.display = null
            },
            positionCheckboxes: function(a) {
                var b = this.group && this.group.alignAttr,
                    e, h = this.clipHeight || this.legendHeight,
                    c = this.titleHeight;
                b && (e = b.translateY, v(this.allItems, function(k) {
                    var f = k.checkbox,
                        m;
                    f && (m = e + c + f.y + (a || 0) + 3, A(f, {
                        left: b.translateX +
                            k.checkboxOffset + f.x - 20 + "px",
                        top: m + "px",
                        display: m > e - 6 && m < e + h - 6 ? "" : "none"
                    }))
                }))
            },
            renderTitle: function() {
                var a = this.options,
                    k = this.padding,
                    e = a.title,
                    h = 0;
                e.text && (this.title || (this.title = this.chart.renderer.label(e.text, k - 3, k - 4, null, null, null, a.useHTML, null, "legend-title").attr({
                    zIndex: 1
                }).add(this.group)), a = this.title.getBBox(), h = a.height, this.offsetWidth = a.width, this.contentGroup.attr({
                    translateY: h
                }));
                this.titleHeight = h
            },
            setText: function(b) {
                var k = this.options;
                b.legendItem.attr({
                    text: k.labelFormat ?
                        a.format(k.labelFormat, b) : k.labelFormatter.call(b)
                })
            },
            renderItem: function(a) {
                var b = this.chart,
                    e = b.renderer,
                    h = this.options,
                    c = "horizontal" === h.layout,
                    f = this.symbolWidth,
                    m = h.symbolPadding,
                    n = this.padding,
                    r = c ? q(h.itemDistance, 20) : 0,
                    p = !h.rtl,
                    y = h.width,
                    l = h.itemMarginBottom || 0,
                    D = this.itemMarginTop,
                    d = a.legendItem,
                    G = !a.series,
                    g = !G && a.series.drawLegendSymbol ? a.series : a,
                    w = g.options,
                    t = this.createCheckboxForItem && w && w.showCheckbox,
                    w = f + m + r + (t ? 20 : 0),
                    v = h.useHTML,
                    M = a.options.className;
                d || (a.legendGroup = e.g("legend-item").addClass("highcharts-" +
                    g.type + "-series highcharts-color-" + a.colorIndex + (M ? " " + M : "") + (G ? " highcharts-series-" + a.index : "")).attr({
                    zIndex: 1
                }).add(this.scrollGroup), a.legendItem = d = e.text("", p ? f + m : -m, this.baseline || 0, v).attr({
                    align: p ? "left" : "right",
                    zIndex: 2
                }).add(a.legendGroup), this.baseline || (this.fontMetrics = e.fontMetrics(12, d), this.baseline = this.fontMetrics.f + 3 + D, d.attr("y", this.baseline)), this.symbolHeight = h.symbolHeight || this.fontMetrics.f, g.drawLegendSymbol(this, a), this.setItemEvents && this.setItemEvents(a, d, v), t && this.createCheckboxForItem(a));
                this.colorizeItem(a, a.visible);
                d.css({
                    width: (h.itemWidth || h.width || b.spacingBox.width) - w
                });
                this.setText(a);
                e = d.getBBox();
                f = a.checkboxOffset = h.itemWidth || a.legendItemWidth || e.width + w;
                this.itemHeight = e = Math.round(a.legendItemHeight || e.height || this.symbolHeight);
                c && this.itemX - n + f > (y || b.spacingBox.width - 2 * n - h.x) && (this.itemX = n, this.itemY += D + this.lastLineHeight + l, this.lastLineHeight = 0);
                this.maxItemWidth = Math.max(this.maxItemWidth, f);
                this.lastItemY = D + this.itemY + l;
                this.lastLineHeight = Math.max(e, this.lastLineHeight);
                a._legendItemPos = [this.itemX, this.itemY];
                c ? this.itemX += f : (this.itemY += D + e + l, this.lastLineHeight = e);
                this.offsetWidth = y || Math.max((c ? this.itemX - n - (a.checkbox ? 0 : r) : f) + n, this.offsetWidth)
            },
            getAllItems: function() {
                var a = [];
                v(this.chart.series, function(b) {
                    var k = b && b.options;
                    b && q(k.showInLegend, E(k.linkedTo) ? !1 : void 0, !0) && (a = a.concat(b.legendItems || ("point" === k.legendType ? b.data : b)))
                });
                return a
            },
            adjustMargins: function(a, k) {
                var b = this.chart,
                    e = this.options,
                    c = e.align.charAt(0) + e.verticalAlign.charAt(0) + e.layout.charAt(0);
                e.floating || v([/(lth|ct|rth)/, /(rtv|rm|rbv)/, /(rbh|cb|lbh)/, /(lbv|lm|ltv)/], function(h, f) {
                    h.test(c) && !E(a[f]) && (b[n[f]] = Math.max(b[n[f]], b.legend[(f + 1) % 2 ? "legendHeight" : "legendWidth"] + [1, -1, -1, 1][f] * e[f % 2 ? "x" : "y"] + q(e.margin, 12) + k[f]))
                })
            },
            render: function() {
                var a = this,
                    k = a.chart,
                    e = k.renderer,
                    f = a.group,
                    c, m, q, n, r = a.box,
                    p = a.options,
                    y = a.padding;
                a.itemX = y;
                a.itemY = a.initialItemY;
                a.offsetWidth = 0;
                a.lastItemY = 0;
                f || (a.group = f = e.g("legend").attr({
                        zIndex: 7
                    }).add(), a.contentGroup = e.g().attr({
                        zIndex: 1
                    }).add(f), a.scrollGroup =
                    e.g().add(a.contentGroup));
                a.renderTitle();
                c = a.getAllItems();
                h(c, function(a, c) {
                    return (a.options && a.options.legendIndex || 0) - (c.options && c.options.legendIndex || 0)
                });
                p.reversed && c.reverse();
                a.allItems = c;
                a.display = m = !!c.length;
                a.lastLineHeight = 0;
                v(c, function(c) {
                    a.renderItem(c)
                });
                q = (p.width || a.offsetWidth) + y;
                n = a.lastItemY + a.lastLineHeight + a.titleHeight;
                n = a.handleOverflow(n);
                n += y;
                r || (a.box = r = e.rect().addClass("highcharts-legend-box").attr({
                    r: p.borderRadius
                }).add(f), r.isNew = !0);
                0 < q && 0 < n && (r[r.isNew ? "attr" :
                    "animate"](r.crisp({
                    x: 0,
                    y: 0,
                    width: q,
                    height: n
                }, r.strokeWidth())), r.isNew = !1);
                r[m ? "show" : "hide"]();
                "none" === f.getStyle("display") && (q = n = 0);
                a.legendWidth = q;
                a.legendHeight = n;
                v(c, function(c) {
                    a.positionItem(c)
                });
                m && f.align(t(p, {
                    width: q,
                    height: n
                }), !0, "spacingBox");
                k.isResizing || this.positionCheckboxes()
            },
            handleOverflow: function(a) {
                var b = this,
                    e = this.chart,
                    h = e.renderer,
                    c = this.options,
                    f = c.y,
                    m = this.padding,
                    e = e.spacingBox.height + ("top" === c.verticalAlign ? -f : f) - m,
                    f = c.maxHeight,
                    n, r = this.clipRect,
                    p = c.navigation,
                    y = q(p.animation, !0),
                    l = p.arrowSize || 12,
                    D = this.nav,
                    d = this.pages,
                    G, g = this.allItems,
                    w = function(a) {
                        "number" === typeof a ? r.attr({
                            height: a
                        }) : r && (b.clipRect = r.destroy(), b.contentGroup.clip());
                        b.contentGroup.div && (b.contentGroup.div.style.clip = a ? "rect(" + m + "px,9999px," + (m + a) + "px,0)" : "auto")
                    };
                "horizontal" !== c.layout || "middle" === c.verticalAlign || c.floating || (e /= 2);
                f && (e = Math.min(e, f));
                d.length = 0;
                a > e && !1 !== p.enabled ? (this.clipHeight = n = Math.max(e - 20 - this.titleHeight - m, 0), this.currentPage = q(this.currentPage, 1), this.fullHeight =
                    a, v(g, function(a, c) {
                        var b = a._legendItemPos[1];
                        a = Math.round(a.legendItem.getBBox().height);
                        var l = d.length;
                        if (!l || b - d[l - 1] > n && (G || b) !== d[l - 1]) d.push(G || b), l++;
                        c === g.length - 1 && b + a - d[l - 1] > n && d.push(b);
                        b !== G && (G = b)
                    }), r || (r = b.clipRect = h.clipRect(0, m, 9999, 0), b.contentGroup.clip(r)), w(n), D || (this.nav = D = h.g().attr({
                            zIndex: 1
                        }).add(this.group), this.up = h.symbol("triangle", 0, 0, l, l).on("click", function() {
                            b.scroll(-1, y)
                        }).add(D), this.pager = h.text("", 15, 10).addClass("highcharts-legend-navigation").add(D), this.down =
                        h.symbol("triangle-down", 0, 0, l, l).on("click", function() {
                            b.scroll(1, y)
                        }).add(D)), b.scroll(0), a = e) : D && (w(), this.nav = D.destroy(), this.scrollGroup.attr({
                    translateY: 1
                }), this.clipHeight = 0);
                return a
            },
            scroll: function(a, e) {
                var b = this.pages,
                    k = b.length;
                a = this.currentPage + a;
                var c = this.clipHeight,
                    h = this.pager,
                    f = this.padding;
                a > k && (a = k);
                0 < a && (void 0 !== e && r(e, this.chart), this.nav.attr({
                    translateX: f,
                    translateY: c + this.padding + 7 + this.titleHeight,
                    visibility: "visible"
                }), this.up.attr({
                    "class": 1 === a ? "highcharts-legend-nav-inactive" : "highcharts-legend-nav-active"
                }), h.attr({
                    text: a + "/" + k
                }), this.down.attr({
                    x: 18 + this.pager.getBBox().width,
                    "class": a === k ? "highcharts-legend-nav-inactive" : "highcharts-legend-nav-active"
                }), e = -b[a - 1] + this.initialItemY, this.scrollGroup.animate({
                    translateY: e
                }), this.currentPage = a, this.positionCheckboxes(e))
            }
        };
        a.LegendSymbolMixin = {
            drawRectangle: function(a, e) {
                var b = a.symbolHeight,
                    k = a.options.squareSymbol;
                e.legendSymbol = this.chart.renderer.rect(k ? (a.symbolWidth - b) / 2 : 0, a.baseline - b + 1, k ? b : a.symbolWidth, b, q(a.options.symbolRadius,
                    b / 2)).addClass("highcharts-point").attr({
                    zIndex: 3
                }).add(e.legendGroup)
            },
            drawLineMarker: function(a) {
                var b = this.options.marker,
                    e, h = a.symbolWidth,
                    c = a.symbolHeight;
                e = c / 2;
                var f = this.chart.renderer,
                    m = this.legendGroup;
                a = a.baseline - Math.round(.3 * a.fontMetrics.b);
                this.legendLine = f.path(["M", 0, a, "L", h, a]).addClass("highcharts-graph").attr({}).add(m);
                b && !1 !== b.enabled && (e = Math.min(q(b.radius, e), e), 0 === this.symbol.indexOf("url") && (b = t(b, {
                    width: c,
                    height: c
                }), e = 0), this.legendSymbol = b = f.symbol(this.symbol, h / 2 - e,
                    a - e, 2 * e, 2 * e, b).addClass("highcharts-point").add(m), b.isMarker = !0)
            }
        };
        (/Trident\/7\.0/.test(e.navigator.userAgent) || f) && m(a.Legend.prototype, "positionItem", function(a, e) {
            var b = this,
                k = function() {
                    e._legendItemPos && a.call(b, e)
                };
            k();
            setTimeout(k)
        })
    })(J);
    (function(a) {
        var B = a.addEvent,
            A = a.animObject,
            C = a.attr,
            E = a.doc,
            v = a.Axis,
            f = a.createElement,
            n = a.defaultOptions,
            t = a.discardElement,
            q = a.charts,
            r = a.defined,
            h = a.each,
            e = a.extend,
            m = a.find,
            b = a.fireEvent,
            k = a.getStyle,
            z = a.grep,
            u = a.isNumber,
            c = a.isObject,
            x = a.isString,
            I = a.Legend,
            F = a.marginNames,
            H = a.merge,
            p = a.objectEach,
            y = a.Pointer,
            l = a.pick,
            D = a.pInt,
            d = a.removeEvent,
            G = a.seriesTypes,
            g = a.splat,
            w = a.svg,
            P = a.syncTimeout,
            K = a.win,
            M = a.Renderer,
            N = a.Chart = function() {
                this.getArgs.apply(this, arguments)
            };
        a.chart = function(a, d, g) {
            return new N(a, d, g)
        };
        e(N.prototype, {
            callbacks: [],
            getArgs: function() {
                var a = [].slice.call(arguments);
                if (x(a[0]) || a[0].nodeName) this.renderTo = a.shift();
                this.init(a[0], a[1])
            },
            init: function(d, g) {
                var c, b, l = d.series,
                    e = d.plotOptions || {};
                d.series = null;
                c = H(n, d);
                for (b in c.plotOptions) c.plotOptions[b].tooltip = e[b] && H(e[b].tooltip) || void 0;
                c.tooltip.userOptions = d.chart && d.chart.forExport && d.tooltip.userOptions || d.tooltip;
                c.series = d.series = l;
                this.userOptions = d;
                d = c.chart;
                b = d.events;
                this.margin = [];
                this.spacing = [];
                this.bounds = {
                    h: {},
                    v: {}
                };
                this.callback = g;
                this.isResizing = 0;
                this.options = c;
                this.axes = [];
                this.series = [];
                this.hasCartesianSeries = d.showAxes;
                var k = this;
                k.index = q.length;
                q.push(k);
                a.chartCount++;
                b && p(b, function(a, d) {
                    B(k, d, a)
                });
                k.xAxis = [];
                k.yAxis = [];
                k.pointCount =
                    k.colorCounter = k.symbolCounter = 0;
                k.firstRender()
            },
            initSeries: function(d) {
                var g = this.options.chart;
                (g = G[d.type || g.type || g.defaultSeriesType]) || a.error(17, !0);
                g = new g;
                g.init(this, d);
                return g
            },
            orderSeries: function(a) {
                var d = this.series;
                for (a = a || 0; a < d.length; a++) d[a] && (d[a].index = a, d[a].name = d[a].name || "Series " + (d[a].index + 1))
            },
            isInsidePlot: function(a, d, g) {
                var c = g ? d : a;
                a = g ? a : d;
                return 0 <= c && c <= this.plotWidth && 0 <= a && a <= this.plotHeight
            },
            redraw: function(d) {
                var g = this.axes,
                    c = this.series,
                    l = this.pointer,
                    k = this.legend,
                    p = this.isDirtyLegend,
                    f, w, D = this.hasCartesianSeries,
                    m = this.isDirtyBox,
                    y, G = this.renderer,
                    u = G.isHidden(),
                    x = [];
                this.setResponsive && this.setResponsive(!1);
                a.setAnimation(d, this);
                u && this.temporaryDisplay();
                this.layOutTitles();
                for (d = c.length; d--;)
                    if (y = c[d], y.options.stacking && (f = !0, y.isDirty)) {
                        w = !0;
                        break
                    }
                if (w)
                    for (d = c.length; d--;) y = c[d], y.options.stacking && (y.isDirty = !0);
                h(c, function(a) {
                    a.isDirty && "point" === a.options.legendType && (a.updateTotals && a.updateTotals(), p = !0);
                    a.isDirtyData && b(a, "updatedData")
                });
                p && k.options.enabled && (k.render(), this.isDirtyLegend = !1);
                f && this.getStacks();
                D && h(g, function(a) {
                    a.updateNames();
                    a.setScale()
                });
                this.getMargins();
                D && (h(g, function(a) {
                    a.isDirty && (m = !0)
                }), h(g, function(a) {
                    var d = a.min + "," + a.max;
                    a.extKey !== d && (a.extKey = d, x.push(function() {
                        b(a, "afterSetExtremes", e(a.eventArgs, a.getExtremes()));
                        delete a.eventArgs
                    }));
                    (m || f) && a.redraw()
                }));
                m && this.drawChartBox();
                b(this, "predraw");
                h(c, function(a) {
                    (m || a.isDirty) && a.visible && a.redraw();
                    a.isDirtyData = !1
                });
                l && l.reset(!0);
                G.draw();
                b(this, "redraw");
                b(this, "render");
                u && this.temporaryDisplay(!0);
                h(x, function(a) {
                    a.call()
                })
            },
            get: function(a) {
                function d(d) {
                    return d.id === a || d.options && d.options.id === a
                }
                var g, c = this.series,
                    b;
                g = m(this.axes, d) || m(this.series, d);
                for (b = 0; !g && b < c.length; b++) g = m(c[b].points || [], d);
                return g
            },
            getAxes: function() {
                var a = this,
                    d = this.options,
                    c = d.xAxis = g(d.xAxis || {}),
                    d = d.yAxis = g(d.yAxis || {});
                h(c, function(a, d) {
                    a.index = d;
                    a.isX = !0
                });
                h(d, function(a, d) {
                    a.index = d
                });
                c = c.concat(d);
                h(c, function(d) {
                    new v(a, d)
                })
            },
            getSelectedPoints: function() {
                var a = [];
                h(this.series, function(d) {
                    a = a.concat(z(d.data || [], function(a) {
                        return a.selected
                    }))
                });
                return a
            },
            getSelectedSeries: function() {
                return z(this.series, function(a) {
                    return a.selected
                })
            },
            setTitle: function(a, d, g) {
                var c = this,
                    b = c.options,
                    l;
                l = b.title = H(b.title, a);
                b = b.subtitle = H(b.subtitle, d);
                h([
                    ["title", a, l],
                    ["subtitle", d, b]
                ], function(a, d) {
                    var g = a[0],
                        b = c[g],
                        l = a[1];
                    a = a[2];
                    b && l && (c[g] = b = b.destroy());
                    a && a.text && !b && (c[g] = c.renderer.text(a.text, 0, 0, a.useHTML).attr({
                        align: a.align,
                        "class": "highcharts-" + g,
                        zIndex: a.zIndex ||
                            4
                    }).add(), c[g].update = function(a) {
                        c.setTitle(!d && a, d && a)
                    })
                });
                c.layOutTitles(g)
            },
            layOutTitles: function(a) {
                var d = 0,
                    g, c = this.renderer,
                    b = this.spacingBox;
                h(["title", "subtitle"], function(a) {
                    var g = this[a],
                        l = this.options[a];
                    a = "title" === a ? -3 : l.verticalAlign ? 0 : d + 2;
                    var k;
                    g && (k = c.fontMetrics(k, g).b, g.css({
                        width: (l.width || b.width + l.widthAdjust) + "px"
                    }).align(e({
                        y: a + k
                    }, l), !1, "spacingBox"), l.floating || l.verticalAlign || (d = Math.ceil(d + g.getBBox(l.useHTML).height)))
                }, this);
                g = this.titleOffset !== d;
                this.titleOffset = d;
                !this.isDirtyBox && g && (this.isDirtyBox = g, this.hasRendered && l(a, !0) && this.isDirtyBox && this.redraw())
            },
            getChartSize: function() {
                var d = this.options.chart,
                    g = d.width,
                    d = d.height,
                    c = this.renderTo;
                r(g) || (this.containerWidth = k(c, "width"));
                r(d) || (this.containerHeight = k(c, "height"));
                this.chartWidth = Math.max(0, g || this.containerWidth || 600);
                this.chartHeight = Math.max(0, a.relativeLength(d, this.chartWidth) || this.containerHeight || 400)
            },
            temporaryDisplay: function(d) {
                var g = this.renderTo;
                if (d)
                    for (; g && g.style;) g.hcOrigStyle &&
                        (a.css(g, g.hcOrigStyle), delete g.hcOrigStyle), g.hcOrigDetached && (E.body.removeChild(g), g.hcOrigDetached = !1), g = g.parentNode;
                else
                    for (; g && g.style;) {
                        E.body.contains(g) || (g.hcOrigDetached = !0, E.body.appendChild(g));
                        if ("none" === k(g, "display", !1) || g.hcOricDetached) g.hcOrigStyle = {
                            display: g.style.display,
                            height: g.style.height,
                            overflow: g.style.overflow
                        }, d = {
                            display: "block",
                            overflow: "hidden"
                        }, g !== this.renderTo && (d.height = 0), a.css(g, d), g.offsetWidth || g.style.setProperty("display", "block", "important");
                        g = g.parentNode;
                        if (g === E.body) break
                    }
            },
            setClassName: function(a) {
                this.container.className = "highcharts-container " + (a || "")
            },
            getContainer: function() {
                var d, g = this.options,
                    c = g.chart,
                    b, l;
                d = this.renderTo;
                var e = a.uniqueKey(),
                    k;
                d || (this.renderTo = d = c.renderTo);
                x(d) && (this.renderTo = d = E.getElementById(d));
                d || a.error(13, !0);
                b = D(C(d, "data-highcharts-chart"));
                u(b) && q[b] && q[b].hasRendered && q[b].destroy();
                C(d, "data-highcharts-chart", this.index);
                d.innerHTML = "";
                c.skipClone || d.offsetWidth || this.temporaryDisplay();
                this.getChartSize();
                b = this.chartWidth;
                l = this.chartHeight;
                this.container = d = f("div", {
                    id: e
                }, void 0, d);
                this._cursor = d.style.cursor;
                this.renderer = new(a[c.renderer] || M)(d, b, l, null, c.forExport, g.exporting && g.exporting.allowHTML);
                this.setClassName(c.className);
                for (k in g.defs) this.renderer.definition(g.defs[k]);
                this.renderer.chartIndex = this.index
            },
            getMargins: function(a) {
                var d = this.spacing,
                    g = this.margin,
                    c = this.titleOffset;
                this.resetMargins();
                c && !r(g[0]) && (this.plotTop = Math.max(this.plotTop, c + this.options.title.margin + d[0]));
                this.legend.display && this.legend.adjustMargins(g, d);
                this.extraMargin && (this[this.extraMargin.type] = (this[this.extraMargin.type] || 0) + this.extraMargin.value);
                this.extraTopMargin && (this.plotTop += this.extraTopMargin);
                a || this.getAxisMargins()
            },
            getAxisMargins: function() {
                var a = this,
                    d = a.axisOffset = [0, 0, 0, 0],
                    g = a.margin;
                a.hasCartesianSeries && h(a.axes, function(a) {
                    a.visible && a.getOffset()
                });
                h(F, function(c, b) {
                    r(g[b]) || (a[c] += d[b])
                });
                a.setChartSize()
            },
            reflow: function(a) {
                var d = this,
                    g = d.options.chart,
                    c = d.renderTo,
                    b = r(g.width) && r(g.height),
                    l = g.width || k(c, "width"),
                    g = g.height || k(c, "height"),
                    c = a ? a.target : K;
                if (!b && !d.isPrinting && l && g && (c === K || c === E)) {
                    if (l !== d.containerWidth || g !== d.containerHeight) clearTimeout(d.reflowTimeout), d.reflowTimeout = P(function() {
                        d.container && d.setSize(void 0, void 0, !1)
                    }, a ? 100 : 0);
                    d.containerWidth = l;
                    d.containerHeight = g
                }
            },
            initReflow: function() {
                var a = this,
                    d;
                d = B(K, "resize", function(d) {
                    a.reflow(d)
                });
                B(a, "destroy", d)
            },
            setSize: function(d, g, c) {
                var l = this,
                    e = l.renderer;
                l.isResizing += 1;
                a.setAnimation(c,
                    l);
                l.oldChartHeight = l.chartHeight;
                l.oldChartWidth = l.chartWidth;
                void 0 !== d && (l.options.chart.width = d);
                void 0 !== g && (l.options.chart.height = g);
                l.getChartSize();
                l.setChartSize(!0);
                e.setSize(l.chartWidth, l.chartHeight, c);
                h(l.axes, function(a) {
                    a.isDirty = !0;
                    a.setScale()
                });
                l.isDirtyLegend = !0;
                l.isDirtyBox = !0;
                l.layOutTitles();
                l.getMargins();
                l.redraw(c);
                l.oldChartHeight = null;
                b(l, "resize");
                P(function() {
                    l && b(l, "endResize", null, function() {
                        --l.isResizing
                    })
                }, A(void 0).duration)
            },
            setChartSize: function(a) {
                function d(a) {
                    a =
                        p[a] || 0;
                    return Math.max(y || a, a) / 2
                }
                var g = this.inverted,
                    c = this.renderer,
                    b = this.chartWidth,
                    l = this.chartHeight,
                    e = this.options.chart,
                    k = this.spacing,
                    p = this.clipOffset,
                    f, w, D, m, y;
                this.plotLeft = f = Math.round(this.plotLeft);
                this.plotTop = w = Math.round(this.plotTop);
                this.plotWidth = D = Math.max(0, Math.round(b - f - this.marginRight));
                this.plotHeight = m = Math.max(0, Math.round(l - w - this.marginBottom));
                this.plotSizeX = g ? m : D;
                this.plotSizeY = g ? D : m;
                this.plotBorderWidth = e.plotBorderWidth || 0;
                this.spacingBox = c.spacingBox = {
                    x: k[3],
                    y: k[0],
                    width: b - k[3] - k[1],
                    height: l - k[0] - k[2]
                };
                this.plotBox = c.plotBox = {
                    x: f,
                    y: w,
                    width: D,
                    height: m
                };
                y = 2 * Math.floor(this.plotBorderWidth / 2);
                g = Math.ceil(d(3));
                c = Math.ceil(d(0));
                this.clipBox = {
                    x: g,
                    y: c,
                    width: Math.floor(this.plotSizeX - d(1) - g),
                    height: Math.max(0, Math.floor(this.plotSizeY - d(2) - c))
                };
                a || h(this.axes, function(a) {
                    a.setAxisSize();
                    a.setAxisTranslation()
                })
            },
            resetMargins: function() {
                var a = this,
                    d = a.options.chart;
                h(["margin", "spacing"], function(g) {
                    var b = d[g],
                        e = c(b) ? b : [b, b, b, b];
                    h(["Top", "Right", "Bottom", "Left"], function(c,
                        b) {
                        a[g][b] = l(d[g + c], e[b])
                    })
                });
                h(F, function(d, g) {
                    a[d] = l(a.margin[g], a.spacing[g])
                });
                a.axisOffset = [0, 0, 0, 0];
                a.clipOffset = []
            },
            drawChartBox: function() {
                var a = this.options.chart,
                    d = this.renderer,
                    g = this.chartWidth,
                    c = this.chartHeight,
                    b = this.chartBackground,
                    l = this.plotBackground,
                    e = this.plotBorder,
                    k, p, h = this.plotLeft,
                    f = this.plotTop,
                    w = this.plotWidth,
                    D = this.plotHeight,
                    m = this.plotBox,
                    y = this.clipRect,
                    G = this.clipBox,
                    u = "animate";
                b || (this.chartBackground = b = d.rect().addClass("highcharts-background").add(), u = "attr");
                k = p = b.strokeWidth();
                b[u]({
                    x: p / 2,
                    y: p / 2,
                    width: g - p - k % 2,
                    height: c - p - k % 2,
                    r: a.borderRadius
                });
                u = "animate";
                l || (u = "attr", this.plotBackground = l = d.rect().addClass("highcharts-plot-background").add());
                l[u](m);
                y ? y.animate({
                    width: G.width,
                    height: G.height
                }) : this.clipRect = d.clipRect(G);
                u = "animate";
                e || (u = "attr", this.plotBorder = e = d.rect().addClass("highcharts-plot-border").attr({
                    zIndex: 1
                }).add());
                e[u](e.crisp({
                    x: h,
                    y: f,
                    width: w,
                    height: D
                }, -e.strokeWidth()));
                this.isDirtyBox = !1
            },
            propFromSeries: function() {
                var a = this,
                    d = a.options.chart,
                    g, c = a.options.series,
                    b, l;
                h(["inverted", "angular", "polar"], function(e) {
                    g = G[d.type || d.defaultSeriesType];
                    l = d[e] || g && g.prototype[e];
                    for (b = c && c.length; !l && b--;)(g = G[c[b].type]) && g.prototype[e] && (l = !0);
                    a[e] = l
                })
            },
            linkSeries: function() {
                var a = this,
                    d = a.series;
                h(d, function(a) {
                    a.linkedSeries.length = 0
                });
                h(d, function(d) {
                    var g = d.options.linkedTo;
                    x(g) && (g = ":previous" === g ? a.series[d.index - 1] : a.get(g)) && g.linkedParent !== d && (g.linkedSeries.push(d), d.linkedParent = g, d.visible = l(d.options.visible, g.options.visible, d.visible))
                })
            },
            renderSeries: function() {
                h(this.series, function(a) {
                    a.translate();
                    a.render()
                })
            },
            renderLabels: function() {
                var a = this,
                    d = a.options.labels;
                d.items && h(d.items, function(g) {
                    var c = e(d.style, g.style),
                        b = D(c.left) + a.plotLeft,
                        l = D(c.top) + a.plotTop + 12;
                    delete c.left;
                    delete c.top;
                    a.renderer.text(g.html, b, l).attr({
                        zIndex: 2
                    }).css(c).add()
                })
            },
            render: function() {
                var a = this.axes,
                    d = this.renderer,
                    g = this.options,
                    c, b, l;
                this.setTitle();
                this.legend = new I(this, g.legend);
                this.getStacks && this.getStacks();
                this.getMargins(!0);
                this.setChartSize();
                g = this.plotWidth;
                c = this.plotHeight -= 21;
                h(a, function(a) {
                    a.setScale()
                });
                this.getAxisMargins();
                b = 1.1 < g / this.plotWidth;
                l = 1.05 < c / this.plotHeight;
                if (b || l) h(a, function(a) {
                    (a.horiz && b || !a.horiz && l) && a.setTickInterval(!0)
                }), this.getMargins();
                this.drawChartBox();
                this.hasCartesianSeries && h(a, function(a) {
                    a.visible && a.render()
                });
                this.seriesGroup || (this.seriesGroup = d.g("series-group").attr({
                    zIndex: 3
                }).add());
                this.renderSeries();
                this.renderLabels();
                this.addCredits();
                this.setResponsive && this.setResponsive();
                this.hasRendered = !0
            },
            addCredits: function(a) {
                var d = this;
                a = H(!0, this.options.credits, a);
                a.enabled && !this.credits && (this.credits = this.renderer.text(a.text + (this.mapCredits || ""), 0, 0).addClass("highcharts-credits").on("click", function() {
                    a.href && (K.location.href = a.href)
                }).attr({
                    align: a.position.align,
                    zIndex: 8
                }).add().align(a.position), this.credits.update = function(a) {
                    d.credits = d.credits.destroy();
                    d.addCredits(a)
                })
            },
            destroy: function() {
                var g = this,
                    c = g.axes,
                    l = g.series,
                    e = g.container,
                    k, f = e && e.parentNode;
                b(g, "destroy");
                g.renderer.forExport ?
                    a.erase(q, g) : q[g.index] = void 0;
                a.chartCount--;
                g.renderTo.removeAttribute("data-highcharts-chart");
                d(g);
                for (k = c.length; k--;) c[k] = c[k].destroy();
                this.scroller && this.scroller.destroy && this.scroller.destroy();
                for (k = l.length; k--;) l[k] = l[k].destroy();
                h("title subtitle chartBackground plotBackground plotBGImage plotBorder seriesGroup clipRect credits pointer rangeSelector legend resetZoomButton tooltip renderer".split(" "), function(a) {
                    var d = g[a];
                    d && d.destroy && (g[a] = d.destroy())
                });
                e && (e.innerHTML = "", d(e),
                    f && t(e));
                p(g, function(a, d) {
                    delete g[d]
                })
            },
            isReadyToRender: function() {
                var a = this;
                return w || K != K.top || "complete" === E.readyState ? !0 : (E.attachEvent("onreadystatechange", function() {
                    E.detachEvent("onreadystatechange", a.firstRender);
                    "complete" === E.readyState && a.firstRender()
                }), !1)
            },
            firstRender: function() {
                var a = this,
                    d = a.options;
                if (a.isReadyToRender()) {
                    a.getContainer();
                    b(a, "init");
                    a.resetMargins();
                    a.setChartSize();
                    a.propFromSeries();
                    a.getAxes();
                    h(d.series || [], function(d) {
                        a.initSeries(d)
                    });
                    a.linkSeries();
                    b(a,
                        "beforeRender");
                    y && (a.pointer = new y(a, d));
                    a.render();
                    if (!a.renderer.imgCount && a.onload) a.onload();
                    a.temporaryDisplay(!0)
                }
            },
            onload: function() {
                h([this.callback].concat(this.callbacks), function(a) {
                    a && void 0 !== this.index && a.apply(this, [this])
                }, this);
                b(this, "load");
                b(this, "render");
                r(this.index) && !1 !== this.options.chart.reflow && this.initReflow();
                this.onload = null
            }
        })
    })(J);
    (function(a) {
        var B, A = a.each,
            C = a.extend,
            E = a.erase,
            v = a.fireEvent,
            f = a.format,
            n = a.isArray,
            t = a.isNumber,
            q = a.pick,
            r = a.removeEvent;
        a.Point = B =
            function() {};
        a.Point.prototype = {
            init: function(a, e, f) {
                var b = a.chart.options.chart.colorCount;
                this.series = a;
                this.applyOptions(e, f);
                a.options.colorByPoint ? (e = a.colorCounter, a.colorCounter++, a.colorCounter === b && (a.colorCounter = 0)) : e = a.colorIndex;
                this.colorIndex = q(this.colorIndex, e);
                a.chart.pointCount++;
                return this
            },
            applyOptions: function(a, e) {
                var h = this.series,
                    b = h.options.pointValKey || h.pointValKey;
                a = B.prototype.optionsToObject.call(this, a);
                C(this, a);
                this.options = this.options ? C(this.options, a) : a;
                a.group &&
                    delete this.group;
                b && (this.y = this[b]);
                this.isNull = q(this.isValid && !this.isValid(), null === this.x || !t(this.y, !0));
                this.selected && (this.state = "select");
                "name" in this && void 0 === e && h.xAxis && h.xAxis.hasNames && (this.x = h.xAxis.nameToX(this));
                void 0 === this.x && h && (this.x = void 0 === e ? h.autoIncrement(this) : e);
                return this
            },
            optionsToObject: function(a) {
                var e = {},
                    h = this.series,
                    b = h.options.keys,
                    k = b || h.pointArrayMap || ["y"],
                    f = k.length,
                    u = 0,
                    c = 0;
                if (t(a) || null === a) e[k[0]] = a;
                else if (n(a))
                    for (!b && a.length > f && (h = typeof a[0],
                            "string" === h ? e.name = a[0] : "number" === h && (e.x = a[0]), u++); c < f;) b && void 0 === a[u] || (e[k[c]] = a[u]), u++, c++;
                else "object" === typeof a && (e = a, a.dataLabels && (h._hasPointLabels = !0), a.marker && (h._hasPointMarkers = !0));
                return e
            },
            getClassName: function() {
                return "highcharts-point" + (this.selected ? " highcharts-point-select" : "") + (this.negative ? " highcharts-negative" : "") + (this.isNull ? " highcharts-null-point" : "") + (void 0 !== this.colorIndex ? " highcharts-color-" + this.colorIndex : "") + (this.options.className ? " " + this.options.className :
                    "") + (this.zone && this.zone.className ? " " + this.zone.className.replace("highcharts-negative", "") : "")
            },
            getZone: function() {
                var a = this.series,
                    e = a.zones,
                    a = a.zoneAxis || "y",
                    f = 0,
                    b;
                for (b = e[f]; this[a] >= b.value;) b = e[++f];
                b && b.color && !this.options.color && (this.color = b.color);
                return b
            },
            destroy: function() {
                var a = this.series.chart,
                    e = a.hoverPoints,
                    f;
                a.pointCount--;
                e && (this.setState(), E(e, this), e.length || (a.hoverPoints = null));
                if (this === a.hoverPoint) this.onMouseOut();
                if (this.graphic || this.dataLabel) r(this), this.destroyElements();
                this.legendItem && a.legend.destroyItem(this);
                for (f in this) this[f] = null
            },
            destroyElements: function() {
                for (var a = ["graphic", "dataLabel", "dataLabelUpper", "connector", "shadowGroup"], e, f = 6; f--;) e = a[f], this[e] && (this[e] = this[e].destroy())
            },
            getLabelConfig: function() {
                return {
                    x: this.category,
                    y: this.y,
                    color: this.color,
                    colorIndex: this.colorIndex,
                    key: this.name || this.category,
                    series: this.series,
                    point: this,
                    percentage: this.percentage,
                    total: this.total || this.stackTotal
                }
            },
            tooltipFormatter: function(a) {
                var e = this.series,
                    h = e.tooltipOptions,
                    b = q(h.valueDecimals, ""),
                    k = h.valuePrefix || "",
                    n = h.valueSuffix || "";
                A(e.pointArrayMap || ["y"], function(e) {
                    e = "{point." + e;
                    if (k || n) a = a.replace(e + "}", k + e + "}" + n);
                    a = a.replace(e + "}", e + ":,." + b + "f}")
                });
                return f(a, {
                    point: this,
                    series: this.series
                })
            },
            firePointEvent: function(a, e, f) {
                var b = this,
                    k = this.series.options;
                (k.point.events[a] || b.options && b.options.events && b.options.events[a]) && this.importEvents();
                "click" === a && k.allowPointSelect && (f = function(a) {
                    b.select && b.select(null, a.ctrlKey || a.metaKey ||
                        a.shiftKey)
                });
                v(this, a, e, f)
            },
            visible: !0
        }
    })(J);
    (function(a) {
        var B = a.addEvent,
            A = a.animObject,
            C = a.arrayMax,
            E = a.arrayMin,
            v = a.correctFloat,
            f = a.Date,
            n = a.defaultOptions,
            t = a.defined,
            q = a.each,
            r = a.erase,
            h = a.extend,
            e = a.fireEvent,
            m = a.grep,
            b = a.isArray,
            k = a.isNumber,
            z = a.isString,
            u = a.merge,
            c = a.objectEach,
            x = a.pick,
            I = a.removeEvent,
            F = a.splat,
            H = a.SVGElement,
            p = a.syncTimeout,
            y = a.win;
        a.Series = a.seriesType("line", null, {
            allowPointSelect: !1,
            showCheckbox: !1,
            animation: {
                duration: 1E3
            },
            events: {},
            marker: {
                radius: 4,
                states: {
                    hover: {
                        animation: {
                            duration: 50
                        },
                        enabled: !0,
                        radiusPlus: 2
                    }
                }
            },
            point: {
                events: {}
            },
            dataLabels: {
                align: "center",
                formatter: function() {
                    return null === this.y ? "" : a.numberFormat(this.y, -1)
                },
                verticalAlign: "bottom",
                x: 0,
                y: 0,
                padding: 5
            },
            cropThreshold: 300,
            pointRange: 0,
            softThreshold: !0,
            states: {
                hover: {
                    animation: {
                        duration: 50
                    },
                    lineWidthPlus: 1,
                    marker: {},
                    halo: {
                        size: 10
                    }
                },
                select: {
                    marker: {}
                }
            },
            stickyTracking: !0,
            turboThreshold: 1E3,
            findNearestPointBy: "x"
        }, {
            isCartesian: !0,
            pointClass: a.Point,
            sorted: !0,
            requireSorting: !0,
            directTouch: !1,
            axisTypes: ["xAxis", "yAxis"],
            colorCounter: 0,
            parallelArrays: ["x", "y"],
            coll: "series",
            init: function(a, b) {
                var d = this,
                    l, g = a.series,
                    e;
                d.chart = a;
                d.options = b = d.setOptions(b);
                d.linkedSeries = [];
                d.bindAxes();
                h(d, {
                    name: b.name,
                    state: "",
                    visible: !1 !== b.visible,
                    selected: !0 === b.selected
                });
                l = b.events;
                c(l, function(a, g) {
                    B(d, g, a)
                });
                if (l && l.click || b.point && b.point.events && b.point.events.click || b.allowPointSelect) a.runTrackerClick = !0;
                d.getColor();
                d.getSymbol();
                q(d.parallelArrays, function(a) {
                    d[a + "Data"] = []
                });
                d.setData(b.data, !1);
                d.isCartesian && (a.hasCartesianSeries = !0);
                g.length && (e = g[g.length - 1]);
                d._i = x(e && e._i, -1) + 1;
                a.orderSeries(this.insert(g))
            },
            insert: function(a) {
                var c = this.options.index,
                    d;
                if (k(c)) {
                    for (d = a.length; d--;)
                        if (c >= x(a[d].options.index, a[d]._i)) {
                            a.splice(d + 1, 0, this);
                            break
                        } - 1 === d && a.unshift(this);
                    d += 1
                } else a.push(this);
                return x(d, a.length - 1)
            },
            bindAxes: function() {
                var c = this,
                    b = c.options,
                    d = c.chart,
                    e;
                q(c.axisTypes || [], function(g) {
                    q(d[g], function(a) {
                        e = a.options;
                        if (b[g] === e.index || void 0 !== b[g] && b[g] === e.id || void 0 === b[g] && 0 === e.index) c.insert(a.series),
                            c[g] = a, a.isDirty = !0
                    });
                    c[g] || c.optionalAxis === g || a.error(18, !0)
                })
            },
            updateParallelArrays: function(a, c) {
                var d = a.series,
                    b = arguments,
                    g = k(c) ? function(g) {
                        var b = "y" === g && d.toYData ? d.toYData(a) : a[g];
                        d[g + "Data"][c] = b
                    } : function(a) {
                        Array.prototype[c].apply(d[a + "Data"], Array.prototype.slice.call(b, 2))
                    };
                q(d.parallelArrays, g)
            },
            autoIncrement: function() {
                var a = this.options,
                    c = this.xIncrement,
                    d, b = a.pointIntervalUnit,
                    c = x(c, a.pointStart, 0);
                this.pointInterval = d = x(this.pointInterval, a.pointInterval, 1);
                b && (a = new f(c), "day" ===
                    b ? a = +a[f.hcSetDate](a[f.hcGetDate]() + d) : "month" === b ? a = +a[f.hcSetMonth](a[f.hcGetMonth]() + d) : "year" === b && (a = +a[f.hcSetFullYear](a[f.hcGetFullYear]() + d)), d = a - c);
                this.xIncrement = c + d;
                return c
            },
            setOptions: function(a) {
                var c = this.chart,
                    d = c.options,
                    b = d.plotOptions,
                    g = (c.userOptions || {}).plotOptions || {},
                    l = b[this.type];
                this.userOptions = a;
                c = u(l, b.series, a);
                this.tooltipOptions = u(n.tooltip, n.plotOptions.series && n.plotOptions.series.tooltip, n.plotOptions[this.type].tooltip, d.tooltip.userOptions, b.series && b.series.tooltip,
                    b[this.type].tooltip, a.tooltip);
                this.stickyTracking = x(a.stickyTracking, g[this.type] && g[this.type].stickyTracking, g.series && g.series.stickyTracking, this.tooltipOptions.shared && !this.noSharedTooltip ? !0 : c.stickyTracking);
                null === l.marker && delete c.marker;
                this.zoneAxis = c.zoneAxis;
                a = this.zones = (c.zones || []).slice();
                !c.negativeColor && !c.negativeFillColor || c.zones || a.push({
                    value: c[this.zoneAxis + "Threshold"] || c.threshold || 0,
                    className: "highcharts-negative"
                });
                a.length && t(a[a.length - 1].value) && a.push({});
                return c
            },
            getCyclic: function(a, c, d) {
                var b, g = this.chart,
                    l = this.userOptions,
                    e = a + "Index",
                    k = a + "Counter",
                    p = d ? d.length : x(g.options.chart[a + "Count"], g[a + "Count"]);
                c || (b = x(l[e], l["_" + e]), t(b) || (g.series.length || (g[k] = 0), l["_" + e] = b = g[k] % p, g[k] += 1), d && (c = d[b]));
                void 0 !== b && (this[e] = b);
                this[a] = c
            },
            getColor: function() {
                this.getCyclic("color")
            },
            getSymbol: function() {
                this.getCyclic("symbol", this.options.marker.symbol, this.chart.options.symbols)
            },
            drawLegendSymbol: a.LegendSymbolMixin.drawLineMarker,
            setData: function(c, e, d, p) {
                var g =
                    this,
                    l = g.points,
                    h = l && l.length || 0,
                    f, D = g.options,
                    m = g.chart,
                    y = null,
                    u = g.xAxis,
                    G = D.turboThreshold,
                    n = this.xData,
                    r = this.yData,
                    F = (f = g.pointArrayMap) && f.length;
                c = c || [];
                f = c.length;
                e = x(e, !0);
                if (!1 !== p && f && h === f && !g.cropped && !g.hasGroupedData && g.visible) q(c, function(a, d) {
                    l[d].update && a !== D.data[d] && l[d].update(a, !1, null, !1)
                });
                else {
                    g.xIncrement = null;
                    g.colorCounter = 0;
                    q(this.parallelArrays, function(a) {
                        g[a + "Data"].length = 0
                    });
                    if (G && f > G) {
                        for (d = 0; null === y && d < f;) y = c[d], d++;
                        if (k(y))
                            for (d = 0; d < f; d++) n[d] = this.autoIncrement(),
                                r[d] = c[d];
                        else if (b(y))
                            if (F)
                                for (d = 0; d < f; d++) y = c[d], n[d] = y[0], r[d] = y.slice(1, F + 1);
                            else
                                for (d = 0; d < f; d++) y = c[d], n[d] = y[0], r[d] = y[1];
                        else a.error(12)
                    } else
                        for (d = 0; d < f; d++) void 0 !== c[d] && (y = {
                            series: g
                        }, g.pointClass.prototype.applyOptions.apply(y, [c[d]]), g.updateParallelArrays(y, d));
                    z(r[0]) && a.error(14, !0);
                    g.data = [];
                    g.options.data = g.userOptions.data = c;
                    for (d = h; d--;) l[d] && l[d].destroy && l[d].destroy();
                    u && (u.minRange = u.userMinRange);
                    g.isDirty = m.isDirtyBox = !0;
                    g.isDirtyData = !!l;
                    d = !1
                }
                "point" === D.legendType && (this.processData(),
                    this.generatePoints());
                e && m.redraw(d)
            },
            processData: function(c) {
                var b = this.xData,
                    d = this.yData,
                    l = b.length,
                    g;
                g = 0;
                var e, k, p = this.xAxis,
                    h, f = this.options;
                h = f.cropThreshold;
                var y = this.getExtremesFromAll || f.getExtremesFromAll,
                    m = this.isCartesian,
                    f = p && p.val2lin,
                    u = p && p.isLog,
                    x, n;
                if (m && !this.isDirty && !p.isDirty && !this.yAxis.isDirty && !c) return !1;
                p && (c = p.getExtremes(), x = c.min, n = c.max);
                if (m && this.sorted && !y && (!h || l > h || this.forceCrop))
                    if (b[l - 1] < x || b[0] > n) b = [], d = [];
                    else if (b[0] < x || b[l - 1] > n) g = this.cropData(this.xData,
                    this.yData, x, n), b = g.xData, d = g.yData, g = g.start, e = !0;
                for (h = b.length || 1; --h;) l = u ? f(b[h]) - f(b[h - 1]) : b[h] - b[h - 1], 0 < l && (void 0 === k || l < k) ? k = l : 0 > l && this.requireSorting && a.error(15);
                this.cropped = e;
                this.cropStart = g;
                this.processedXData = b;
                this.processedYData = d;
                this.closestPointRange = k
            },
            cropData: function(a, c, d, b) {
                var g = a.length,
                    l = 0,
                    e = g,
                    k = x(this.cropShoulder, 1),
                    p;
                for (p = 0; p < g; p++)
                    if (a[p] >= d) {
                        l = Math.max(0, p - k);
                        break
                    }
                for (d = p; d < g; d++)
                    if (a[d] > b) {
                        e = d + k;
                        break
                    }
                return {
                    xData: a.slice(l, e),
                    yData: c.slice(l, e),
                    start: l,
                    end: e
                }
            },
            generatePoints: function() {
                var a = this.options,
                    c = a.data,
                    d = this.data,
                    b, g = this.processedXData,
                    e = this.processedYData,
                    k = this.pointClass,
                    p = g.length,
                    h = this.cropStart || 0,
                    f, y = this.hasGroupedData,
                    a = a.keys,
                    m, u = [],
                    x;
                d || y || (d = [], d.length = c.length, d = this.data = d);
                a && y && (this.options.keys = !1);
                for (x = 0; x < p; x++) f = h + x, y ? (m = (new k).init(this, [g[x]].concat(F(e[x]))), m.dataGroup = this.groupMap[x]) : (m = d[f]) || void 0 === c[f] || (d[f] = m = (new k).init(this, c[f], g[x])), m && (m.index = f, u[x] = m);
                this.options.keys = a;
                if (d && (p !== (b = d.length) ||
                        y))
                    for (x = 0; x < b; x++) x !== h || y || (x += p), d[x] && (d[x].destroyElements(), d[x].plotX = void 0);
                this.data = d;
                this.points = u
            },
            getExtremes: function(a) {
                var c = this.yAxis,
                    d = this.processedXData,
                    l, g = [],
                    e = 0;
                l = this.xAxis.getExtremes();
                var p = l.min,
                    h = l.max,
                    f, y, m, u;
                a = a || this.stackedYData || this.processedYData || [];
                l = a.length;
                for (u = 0; u < l; u++)
                    if (y = d[u], m = a[u], f = (k(m, !0) || b(m)) && (!c.positiveValuesOnly || m.length || 0 < m), y = this.getExtremesFromAll || this.options.getExtremesFromAll || this.cropped || (d[u] || y) >= p && (d[u] || y) <= h, f && y)
                        if (f =
                            m.length)
                            for (; f--;) null !== m[f] && (g[e++] = m[f]);
                        else g[e++] = m;
                this.dataMin = E(g);
                this.dataMax = C(g)
            },
            translate: function() {
                this.processedXData || this.processData();
                this.generatePoints();
                var a = this.options,
                    c = a.stacking,
                    d = this.xAxis,
                    b = d.categories,
                    g = this.yAxis,
                    e = this.points,
                    p = e.length,
                    h = !!this.modifyValue,
                    f = a.pointPlacement,
                    y = "between" === f || k(f),
                    m = a.threshold,
                    u = a.startFromThreshold ? m : 0,
                    n, q, r, z, F = Number.MAX_VALUE;
                "between" === f && (f = .5);
                k(f) && (f *= x(a.pointRange || d.pointRange));
                for (a = 0; a < p; a++) {
                    var H = e[a],
                        I =
                        H.x,
                        A = H.y;
                    q = H.low;
                    var B = c && g.stacks[(this.negStacks && A < (u ? 0 : m) ? "-" : "") + this.stackKey],
                        C;
                    g.positiveValuesOnly && null !== A && 0 >= A && (H.isNull = !0);
                    H.plotX = n = v(Math.min(Math.max(-1E5, d.translate(I, 0, 0, 0, 1, f, "flags" === this.type)), 1E5));
                    c && this.visible && !H.isNull && B && B[I] && (z = this.getStackIndicator(z, I, this.index), C = B[I], A = C.points[z.key], q = A[0], A = A[1], q === u && z.key === B[I].base && (q = x(m, g.min)), g.positiveValuesOnly && 0 >= q && (q = null), H.total = H.stackTotal = C.total, H.percentage = C.total && H.y / C.total * 100, H.stackY = A,
                        C.setOffset(this.pointXOffset || 0, this.barW || 0));
                    H.yBottom = t(q) ? g.translate(q, 0, 1, 0, 1) : null;
                    h && (A = this.modifyValue(A, H));
                    H.plotY = q = "number" === typeof A && Infinity !== A ? Math.min(Math.max(-1E5, g.translate(A, 0, 1, 0, 1)), 1E5) : void 0;
                    H.isInside = void 0 !== q && 0 <= q && q <= g.len && 0 <= n && n <= d.len;
                    H.clientX = y ? v(d.translate(I, 0, 0, 0, 1, f)) : n;
                    H.negative = H.y < (m || 0);
                    H.category = b && void 0 !== b[H.x] ? b[H.x] : H.x;
                    H.isNull || (void 0 !== r && (F = Math.min(F, Math.abs(n - r))), r = n);
                    H.zone = this.zones.length && H.getZone()
                }
                this.closestPointRangePx =
                    F
            },
            getValidPoints: function(a, c) {
                var d = this.chart;
                return m(a || this.points || [], function(a) {
                    return c && !d.isInsidePlot(a.plotX, a.plotY, d.inverted) ? !1 : !a.isNull
                })
            },
            setClip: function(a) {
                var c = this.chart,
                    d = this.options,
                    b = c.renderer,
                    g = c.inverted,
                    l = this.clipBox,
                    e = l || c.clipBox,
                    k = this.sharedClipKey || ["_sharedClip", a && a.duration, a && a.easing, e.height, d.xAxis, d.yAxis].join(),
                    p = c[k],
                    h = c[k + "m"];
                p || (a && (e.width = 0, c[k + "m"] = h = b.clipRect(-99, g ? -c.plotLeft : -c.plotTop, 99, g ? c.chartWidth : c.chartHeight)), c[k] = p = b.clipRect(e),
                    p.count = {
                        length: 0
                    });
                a && !p.count[this.index] && (p.count[this.index] = !0, p.count.length += 1);
                !1 !== d.clip && (this.group.clip(a || l ? p : c.clipRect), this.markerGroup.clip(h), this.sharedClipKey = k);
                a || (p.count[this.index] && (delete p.count[this.index], --p.count.length), 0 === p.count.length && k && c[k] && (l || (c[k] = c[k].destroy()), c[k + "m"] && (c[k + "m"] = c[k + "m"].destroy())))
            },
            animate: function(a) {
                var c = this.chart,
                    d = A(this.options.animation),
                    b;
                a ? this.setClip(d) : (b = this.sharedClipKey, (a = c[b]) && a.animate({
                        width: c.plotSizeX
                    }, d),
                    c[b + "m"] && c[b + "m"].animate({
                        width: c.plotSizeX + 99
                    }, d), this.animate = null)
            },
            afterAnimate: function() {
                this.setClip();
                e(this, "afterAnimate");
                this.finishedAnimating = !0
            },
            drawPoints: function() {
                var a = this.points,
                    c = this.chart,
                    d, b, g, e, p = this.options.marker,
                    h, f, m, y, u = this[this.specialGroup] || this.markerGroup,
                    n = x(p.enabled, this.xAxis.isRadial ? !0 : null, this.closestPointRangePx >= 2 * p.radius);
                if (!1 !== p.enabled || this._hasPointMarkers)
                    for (b = 0; b < a.length; b++) g = a[b], d = g.plotY, e = g.graphic, h = g.marker || {}, f = !!g.marker, m = n &&
                        void 0 === h.enabled || h.enabled, y = g.isInside, m && k(d) && null !== g.y ? (d = x(h.symbol, this.symbol), g.hasImage = 0 === d.indexOf("url"), m = this.markerAttribs(g, g.selected && "select"), e ? e[y ? "show" : "hide"](!0).animate(m) : y && (0 < m.width || g.hasImage) && (g.graphic = e = c.renderer.symbol(d, m.x, m.y, m.width, m.height, f ? h : p).add(u)), e && e.addClass(g.getClassName(), !0)) : e && (g.graphic = e.destroy())
            },
            markerAttribs: function(a, c) {
                var d = this.options.marker,
                    b = a.marker || {},
                    g = x(b.radius, d.radius);
                c && (d = d.states[c], c = b.states && b.states[c],
                    g = x(c && c.radius, d && d.radius, g + (d && d.radiusPlus || 0)));
                a.hasImage && (g = 0);
                a = {
                    x: Math.floor(a.plotX) - g,
                    y: a.plotY - g
                };
                g && (a.width = a.height = 2 * g);
                return a
            },
            destroy: function() {
                var a = this,
                    b = a.chart,
                    d = /AppleWebKit\/533/.test(y.navigator.userAgent),
                    k, g, p = a.data || [],
                    h, f;
                e(a, "destroy");
                I(a);
                q(a.axisTypes || [], function(d) {
                    (f = a[d]) && f.series && (r(f.series, a), f.isDirty = f.forceRedraw = !0)
                });
                a.legendItem && a.chart.legend.destroyItem(a);
                for (g = p.length; g--;)(h = p[g]) && h.destroy && h.destroy();
                a.points = null;
                clearTimeout(a.animationTimeout);
                c(a, function(a, c) {
                    a instanceof H && !a.survive && (k = d && "group" === c ? "hide" : "destroy", a[k]())
                });
                b.hoverSeries === a && (b.hoverSeries = null);
                r(b.series, a);
                b.orderSeries();
                c(a, function(d, c) {
                    delete a[c]
                })
            },
            getGraphPath: function(a, c, d) {
                var b = this,
                    g = b.options,
                    e = g.step,
                    l, k = [],
                    p = [],
                    h;
                a = a || b.points;
                (l = a.reversed) && a.reverse();
                (e = {
                    right: 1,
                    center: 2
                }[e] || e && 3) && l && (e = 4 - e);
                !g.connectNulls || c || d || (a = this.getValidPoints(a));
                q(a, function(l, f) {
                    var m = l.plotX,
                        y = l.plotY,
                        w = a[f - 1];
                    (l.leftCliff || w && w.rightCliff) && !d && (h = !0);
                    l.isNull &&
                        !t(c) && 0 < f ? h = !g.connectNulls : l.isNull && !c ? h = !0 : (0 === f || h ? f = ["M", l.plotX, l.plotY] : b.getPointSpline ? f = b.getPointSpline(a, l, f) : e ? (f = 1 === e ? ["L", w.plotX, y] : 2 === e ? ["L", (w.plotX + m) / 2, w.plotY, "L", (w.plotX + m) / 2, y] : ["L", m, w.plotY], f.push("L", m, y)) : f = ["L", m, y], p.push(l.x), e && p.push(l.x), k.push.apply(k, f), h = !1)
                });
                k.xMap = p;
                return b.graphPath = k
            },
            drawGraph: function() {
                var a = this,
                    c = (this.gappedPath || this.getGraphPath).call(this),
                    d = [
                        ["graph", "highcharts-graph"]
                    ];
                q(this.zones, function(a, c) {
                    d.push(["zone-graph-" + c, "highcharts-graph highcharts-zone-graph-" +
                        c + " " + (a.className || "")
                    ])
                });
                q(d, function(d, g) {
                    g = d[0];
                    var b = a[g];
                    b ? (b.endX = c.xMap, b.animate({
                        d: c
                    })) : c.length && (a[g] = a.chart.renderer.path(c).addClass(d[1]).attr({
                        zIndex: 1
                    }).add(a.group));
                    b && (b.startX = c.xMap, b.isArea = c.isArea)
                })
            },
            applyZones: function() {
                var a = this,
                    c = this.chart,
                    d = c.renderer,
                    b = this.zones,
                    g, e, k = this.clips || [],
                    p, h = this.graph,
                    f = this.area,
                    m = Math.max(c.chartWidth, c.chartHeight),
                    y = this[(this.zoneAxis || "y") + "Axis"],
                    u, n, r = c.inverted,
                    z, F, H, t, v = !1;
                b.length && (h || f) && y && void 0 !== y.min && (n = y.reversed,
                    z = y.horiz, h && h.hide(), f && f.hide(), u = y.getExtremes(), q(b, function(b, l) {
                        g = n ? z ? c.plotWidth : 0 : z ? 0 : y.toPixels(u.min);
                        g = Math.min(Math.max(x(e, g), 0), m);
                        e = Math.min(Math.max(Math.round(y.toPixels(x(b.value, u.max), !0)), 0), m);
                        v && (g = e = y.toPixels(u.max));
                        F = Math.abs(g - e);
                        H = Math.min(g, e);
                        t = Math.max(g, e);
                        y.isXAxis ? (p = {
                            x: r ? t : H,
                            y: 0,
                            width: F,
                            height: m
                        }, z || (p.x = c.plotHeight - p.x)) : (p = {
                            x: 0,
                            y: r ? t : H,
                            width: m,
                            height: F
                        }, z && (p.y = c.plotWidth - p.y));
                        k[l] ? k[l].animate(p) : (k[l] = d.clipRect(p), h && a["zone-graph-" + l].clip(k[l]), f && a["zone-area-" +
                            l].clip(k[l]));
                        v = b.value > u.max
                    }), this.clips = k)
            },
            invertGroups: function(a) {
                function c() {
                    q(["group", "markerGroup"], function(c) {
                        d[c] && (b.renderer.isVML && d[c].attr({
                            width: d.yAxis.len,
                            height: d.xAxis.len
                        }), d[c].width = d.yAxis.len, d[c].height = d.xAxis.len, d[c].invert(a))
                    })
                }
                var d = this,
                    b = d.chart,
                    g;
                d.xAxis && (g = B(b, "resize", c), B(d, "destroy", g), c(a), d.invertGroups = c)
            },
            plotGroup: function(a, c, d, b, g) {
                var e = this[a],
                    l = !e;
                l && (this[a] = e = this.chart.renderer.g().attr({
                    zIndex: b || .1
                }).add(g));
                e.addClass("highcharts-" + c + " highcharts-series-" +
                    this.index + " highcharts-" + this.type + "-series highcharts-color-" + this.colorIndex + " " + (this.options.className || ""), !0);
                e.attr({
                    visibility: d
                })[l ? "attr" : "animate"](this.getPlotBox());
                return e
            },
            getPlotBox: function() {
                var a = this.chart,
                    c = this.xAxis,
                    d = this.yAxis;
                a.inverted && (c = d, d = this.xAxis);
                return {
                    translateX: c ? c.left : a.plotLeft,
                    translateY: d ? d.top : a.plotTop,
                    scaleX: 1,
                    scaleY: 1
                }
            },
            render: function() {
                var a = this,
                    c = a.chart,
                    d, b = a.options,
                    g = !!a.animate && c.renderer.isSVG && A(b.animation).duration,
                    e = a.visible ? "inherit" :
                    "hidden",
                    k = b.zIndex,
                    h = a.hasRendered,
                    f = c.seriesGroup,
                    m = c.inverted;
                d = a.plotGroup("group", "series", e, k, f);
                a.markerGroup = a.plotGroup("markerGroup", "markers", e, k, f);
                g && a.animate(!0);
                d.inverted = a.isCartesian ? m : !1;
                a.drawGraph && (a.drawGraph(), a.applyZones());
                a.drawDataLabels && a.drawDataLabels();
                a.visible && a.drawPoints();
                a.drawTracker && !1 !== a.options.enableMouseTracking && a.drawTracker();
                a.invertGroups(m);
                !1 === b.clip || a.sharedClipKey || h || d.clip(c.clipRect);
                g && a.animate();
                h || (a.animationTimeout = p(function() {
                        a.afterAnimate()
                    },
                    g));
                a.isDirty = !1;
                a.hasRendered = !0
            },
            redraw: function() {
                var a = this.chart,
                    c = this.isDirty || this.isDirtyData,
                    d = this.group,
                    b = this.xAxis,
                    g = this.yAxis;
                d && (a.inverted && d.attr({
                    width: a.plotWidth,
                    height: a.plotHeight
                }), d.animate({
                    translateX: x(b && b.left, a.plotLeft),
                    translateY: x(g && g.top, a.plotTop)
                }));
                this.translate();
                this.render();
                c && delete this.kdTree
            },
            kdAxisArray: ["clientX", "plotY"],
            searchPoint: function(a, c) {
                var d = this.xAxis,
                    b = this.yAxis,
                    g = this.chart.inverted;
                return this.searchKDTree({
                    clientX: g ? d.len - a.chartY +
                        d.pos : a.chartX - d.pos,
                    plotY: g ? b.len - a.chartX + b.pos : a.chartY - b.pos
                }, c)
            },
            buildKDTree: function() {
                function a(d, g, b) {
                    var e, k;
                    if (k = d && d.length) return e = c.kdAxisArray[g % b], d.sort(function(a, d) {
                        return a[e] - d[e]
                    }), k = Math.floor(k / 2), {
                        point: d[k],
                        left: a(d.slice(0, k), g + 1, b),
                        right: a(d.slice(k + 1), g + 1, b)
                    }
                }
                this.buildingKdTree = !0;
                var c = this,
                    d = -1 < c.options.findNearestPointBy.indexOf("y") ? 2 : 1;
                delete c.kdTree;
                p(function() {
                    c.kdTree = a(c.getValidPoints(null, !c.directTouch), d, d);
                    c.buildingKdTree = !1
                }, c.options.kdNow ? 0 : 1)
            },
            searchKDTree: function(a, c) {
                function d(a, c, l, p) {
                    var h = c.point,
                        f = b.kdAxisArray[l % p],
                        m, y, w = h;
                    y = t(a[g]) && t(h[g]) ? Math.pow(a[g] - h[g], 2) : null;
                    m = t(a[e]) && t(h[e]) ? Math.pow(a[e] - h[e], 2) : null;
                    m = (y || 0) + (m || 0);
                    h.dist = t(m) ? Math.sqrt(m) : Number.MAX_VALUE;
                    h.distX = t(y) ? Math.sqrt(y) : Number.MAX_VALUE;
                    f = a[f] - h[f];
                    m = 0 > f ? "left" : "right";
                    y = 0 > f ? "right" : "left";
                    c[m] && (m = d(a, c[m], l + 1, p), w = m[k] < w[k] ? m : h);
                    c[y] && Math.sqrt(f * f) < w[k] && (a = d(a, c[y], l + 1, p), w = a[k] < w[k] ? a : w);
                    return w
                }
                var b = this,
                    g = this.kdAxisArray[0],
                    e = this.kdAxisArray[1],
                    k = c ? "distX" : "dist";
                c = -1 < b.options.findNearestPointBy.indexOf("y") ? 2 : 1;
                this.kdTree || this.buildingKdTree || this.buildKDTree();
                if (this.kdTree) return d(a, this.kdTree, c, c)
            }
        })
    })(J);
    (function(a) {
        var B = a.Axis,
            A = a.Chart,
            C = a.correctFloat,
            E = a.defined,
            v = a.destroyObjectProperties,
            f = a.each,
            n = a.format,
            t = a.objectEach,
            q = a.pick,
            r = a.Series;
        a.StackItem = function(a, e, f, b, k) {
            var h = a.chart.inverted;
            this.axis = a;
            this.isNegative = f;
            this.options = e;
            this.x = b;
            this.total = null;
            this.points = {};
            this.stack = k;
            this.rightCliff = this.leftCliff =
                0;
            this.alignOptions = {
                align: e.align || (h ? f ? "left" : "right" : "center"),
                verticalAlign: e.verticalAlign || (h ? "middle" : f ? "bottom" : "top"),
                y: q(e.y, h ? 4 : f ? 14 : -6),
                x: q(e.x, h ? f ? -6 : 6 : 0)
            };
            this.textAlign = e.textAlign || (h ? f ? "right" : "left" : "center")
        };
        a.StackItem.prototype = {
            destroy: function() {
                v(this, this.axis)
            },
            render: function(a) {
                var e = this.options,
                    f = e.format,
                    f = f ? n(f, this) : e.formatter.call(this);
                this.label ? this.label.attr({
                    text: f,
                    visibility: "hidden"
                }) : this.label = this.axis.chart.renderer.text(f, null, null, e.useHTML).css(e.style).attr({
                    align: this.textAlign,
                    rotation: e.rotation,
                    visibility: "hidden"
                }).add(a)
            },
            setOffset: function(a, e) {
                var f = this.axis,
                    b = f.chart,
                    k = f.translate(f.usePercentage ? 100 : this.total, 0, 0, 0, 1),
                    f = f.translate(0),
                    f = Math.abs(k - f);
                a = b.xAxis[0].translate(this.x) + a;
                k = this.getStackBox(b, this, a, k, e, f);
                if (e = this.label) e.align(this.alignOptions, null, k), k = e.alignAttr, e[!1 === this.options.crop || b.isInsidePlot(k.x, k.y) ? "show" : "hide"](!0)
            },
            getStackBox: function(a, e, f, b, k, n) {
                var h = e.axis.reversed,
                    c = a.inverted;
                a = a.plotHeight;
                e = e.isNegative && !h || !e.isNegative &&
                    h;
                return {
                    x: c ? e ? b : b - n : f,
                    y: c ? a - f - k : e ? a - b - n : a - b,
                    width: c ? n : k,
                    height: c ? k : n
                }
            }
        };
        A.prototype.getStacks = function() {
            var a = this;
            f(a.yAxis, function(a) {
                a.stacks && a.hasVisibleSeries && (a.oldStacks = a.stacks)
            });
            f(a.series, function(e) {
                !e.options.stacking || !0 !== e.visible && !1 !== a.options.chart.ignoreHiddenSeries || (e.stackKey = e.type + q(e.options.stack, ""))
            })
        };
        B.prototype.buildStacks = function() {
            var a = this.series,
                e = q(this.options.reversedStacks, !0),
                f = a.length,
                b;
            if (!this.isXAxis) {
                this.usePercentage = !1;
                for (b = f; b--;) a[e ? b :
                    f - b - 1].setStackedPoints();
                if (this.usePercentage)
                    for (b = 0; b < f; b++) a[b].setPercentStacks()
            }
        };
        B.prototype.renderStackTotals = function() {
            var a = this.chart,
                e = a.renderer,
                f = this.stacks,
                b = this.stackTotalGroup;
            b || (this.stackTotalGroup = b = e.g("stack-labels").attr({
                visibility: "visible",
                zIndex: 6
            }).add());
            b.translate(a.plotLeft, a.plotTop);
            t(f, function(a) {
                t(a, function(a) {
                    a.render(b)
                })
            })
        };
        B.prototype.resetStacks = function() {
            var a = this,
                e = a.stacks;
            a.isXAxis || t(e, function(e) {
                t(e, function(b, k) {
                    b.touched < a.stacksTouched ?
                        (b.destroy(), delete e[k]) : (b.total = null, b.cum = null)
                })
            })
        };
        B.prototype.cleanStacks = function() {
            var a;
            this.isXAxis || (this.oldStacks && (a = this.stacks = this.oldStacks), t(a, function(a) {
                t(a, function(a) {
                    a.cum = a.total
                })
            }))
        };
        r.prototype.setStackedPoints = function() {
            if (this.options.stacking && (!0 === this.visible || !1 === this.chart.options.chart.ignoreHiddenSeries)) {
                var f = this.processedXData,
                    e = this.processedYData,
                    m = [],
                    b = e.length,
                    k = this.options,
                    n = k.threshold,
                    u = k.startFromThreshold ? n : 0,
                    c = k.stack,
                    k = k.stacking,
                    x = this.stackKey,
                    r = "-" + x,
                    F = this.negStacks,
                    H = this.yAxis,
                    p = H.stacks,
                    y = H.oldStacks,
                    l, D, d, G, g, w, t;
                H.stacksTouched += 1;
                for (g = 0; g < b; g++) w = f[g], t = e[g], l = this.getStackIndicator(l, w, this.index), G = l.key, d = (D = F && t < (u ? 0 : n)) ? r : x, p[d] || (p[d] = {}), p[d][w] || (y[d] && y[d][w] ? (p[d][w] = y[d][w], p[d][w].total = null) : p[d][w] = new a.StackItem(H, H.options.stackLabels, D, w, c)), d = p[d][w], null !== t && (d.points[G] = d.points[this.index] = [q(d.cum, u)], E(d.cum) || (d.base = G), d.touched = H.stacksTouched, 0 < l.index && !1 === this.singleStacks && (d.points[G][0] = d.points[this.index +
                    "," + w + ",0"][0])), "percent" === k ? (D = D ? x : r, F && p[D] && p[D][w] ? (D = p[D][w], d.total = D.total = Math.max(D.total, d.total) + Math.abs(t) || 0) : d.total = C(d.total + (Math.abs(t) || 0))) : d.total = C(d.total + (t || 0)), d.cum = q(d.cum, u) + (t || 0), null !== t && (d.points[G].push(d.cum), m[g] = d.cum);
                "percent" === k && (H.usePercentage = !0);
                this.stackedYData = m;
                H.oldStacks = {}
            }
        };
        r.prototype.setPercentStacks = function() {
            var a = this,
                e = a.stackKey,
                m = a.yAxis.stacks,
                b = a.processedXData,
                k;
            f([e, "-" + e], function(e) {
                for (var f = b.length, c, h; f--;)
                    if (c = b[f], k = a.getStackIndicator(k,
                            c, a.index, e), c = (h = m[e] && m[e][c]) && h.points[k.key]) h = h.total ? 100 / h.total : 0, c[0] = C(c[0] * h), c[1] = C(c[1] * h), a.stackedYData[f] = c[1]
            })
        };
        r.prototype.getStackIndicator = function(a, e, f, b) {
            !E(a) || a.x !== e || b && a.key !== b ? a = {
                x: e,
                index: 0,
                key: b
            } : a.index++;
            a.key = [f, e, a.index].join();
            return a
        }
    })(J);
    (function(a) {
        var B = a.addEvent,
            A = a.Axis,
            C = a.createElement,
            E = a.css,
            v = a.defined,
            f = a.each,
            n = a.erase,
            t = a.extend,
            q = a.fireEvent,
            r = a.inArray,
            h = a.isNumber,
            e = a.isObject,
            m = a.isArray,
            b = a.merge,
            k = a.objectEach,
            z = a.pick,
            u = a.Point,
            c = a.Series,
            x = a.seriesTypes,
            I = a.setAnimation,
            F = a.splat;
        t(a.Chart.prototype, {
            addSeries: function(a, c, b) {
                var e, k = this;
                a && (c = z(c, !0), q(k, "addSeries", {
                    options: a
                }, function() {
                    e = k.initSeries(a);
                    k.isDirtyLegend = !0;
                    k.linkSeries();
                    c && k.redraw(b)
                }));
                return e
            },
            addAxis: function(a, c, e, k) {
                var l = c ? "xAxis" : "yAxis",
                    d = this.options;
                a = b(a, {
                    index: this[l].length,
                    isX: c
                });
                c = new A(this, a);
                d[l] = F(d[l] || {});
                d[l].push(a);
                z(e, !0) && this.redraw(k);
                return c
            },
            showLoading: function(a) {
                var c = this,
                    b = c.options,
                    e = c.loadingDiv,
                    k = function() {
                        e && E(e, {
                            left: c.plotLeft +
                                "px",
                            top: c.plotTop + "px",
                            width: c.plotWidth + "px",
                            height: c.plotHeight + "px"
                        })
                    };
                e || (c.loadingDiv = e = C("div", {
                    className: "highcharts-loading highcharts-loading-hidden"
                }, null, c.container), c.loadingSpan = C("span", {
                    className: "highcharts-loading-inner"
                }, null, e), B(c, "redraw", k));
                e.className = "highcharts-loading";
                c.loadingSpan.innerHTML = a || b.lang.loading;
                c.loadingShown = !0;
                k()
            },
            hideLoading: function() {
                var a = this.loadingDiv;
                a && (a.className = "highcharts-loading highcharts-loading-hidden");
                this.loadingShown = !1
            },
            propsRequireDirtyBox: "backgroundColor borderColor borderWidth margin marginTop marginRight marginBottom marginLeft spacing spacingTop spacingRight spacingBottom spacingLeft borderRadius plotBackgroundColor plotBackgroundImage plotBorderColor plotBorderWidth plotShadow shadow".split(" "),
            propsRequireUpdateSeries: "chart.inverted chart.polar chart.ignoreHiddenSeries chart.type colors plotOptions tooltip".split(" "),
            update: function(a, c, e) {
                var l = this,
                    p = {
                        credits: "addCredits",
                        title: "setTitle",
                        subtitle: "setSubtitle"
                    },
                    d = a.chart,
                    y, g, m = [];
                if (d) {
                    b(!0, l.options.chart, d);
                    "className" in d && l.setClassName(d.className);
                    if ("inverted" in d || "polar" in d) l.propFromSeries(), y = !0;
                    "alignTicks" in d && (y = !0);
                    k(d, function(a, d) {
                        -1 !== r("chart." + d, l.propsRequireUpdateSeries) && (g = !0); - 1 !== r(d, l.propsRequireDirtyBox) &&
                            (l.isDirtyBox = !0)
                    })
                }
                a.plotOptions && b(!0, this.options.plotOptions, a.plotOptions);
                k(a, function(a, d) {
                    if (l[d] && "function" === typeof l[d].update) l[d].update(a, !1);
                    else if ("function" === typeof l[p[d]]) l[p[d]](a);
                    "chart" !== d && -1 !== r(d, l.propsRequireUpdateSeries) && (g = !0)
                });
                f("xAxis yAxis zAxis series colorAxis pane".split(" "), function(d) {
                    a[d] && (f(F(a[d]), function(a, c) {
                        (c = v(a.id) && l.get(a.id) || l[d][c]) && c.coll === d && (c.update(a, !1), e && (c.touched = !0));
                        if (!c && e)
                            if ("series" === d) l.addSeries(a, !1).touched = !0;
                            else if ("xAxis" ===
                            d || "yAxis" === d) l.addAxis(a, "xAxis" === d, !1).touched = !0
                    }), e && f(l[d], function(a) {
                        a.touched ? delete a.touched : m.push(a)
                    }))
                });
                f(m, function(a) {
                    a.remove(!1)
                });
                y && f(l.axes, function(a) {
                    a.update({}, !1)
                });
                g && f(l.series, function(a) {
                    a.update({}, !1)
                });
                a.loading && b(!0, l.options.loading, a.loading);
                y = d && d.width;
                d = d && d.height;
                h(y) && y !== l.chartWidth || h(d) && d !== l.chartHeight ? l.setSize(y, d) : z(c, !0) && l.redraw()
            },
            setSubtitle: function(a) {
                this.setTitle(void 0, a)
            }
        });
        t(u.prototype, {
            update: function(a, c, b, k) {
                function l() {
                    d.applyOptions(a);
                    null === d.y && g && (d.graphic = g.destroy());
                    e(a, !0) && (g && g.element && a && a.marker && void 0 !== a.marker.symbol && (d.graphic = g.destroy()), a && a.dataLabels && d.dataLabel && (d.dataLabel = d.dataLabel.destroy()));
                    f = d.index;
                    p.updateParallelArrays(d, f);
                    y.data[f] = e(y.data[f], !0) || e(a, !0) ? d.options : a;
                    p.isDirty = p.isDirtyData = !0;
                    !p.fixedBox && p.hasCartesianSeries && (h.isDirtyBox = !0);
                    "point" === y.legendType && (h.isDirtyLegend = !0);
                    c && h.redraw(b)
                }
                var d = this,
                    p = d.series,
                    g = d.graphic,
                    f, h = p.chart,
                    y = p.options;
                c = z(c, !0);
                !1 === k ? l() : d.firePointEvent("update", {
                    options: a
                }, l)
            },
            remove: function(a, c) {
                this.series.removePoint(r(this, this.series.data), a, c)
            }
        });
        t(c.prototype, {
            addPoint: function(a, c, b, e) {
                var k = this.options,
                    d = this.data,
                    l = this.chart,
                    g = this.xAxis,
                    g = g && g.hasNames && g.names,
                    p = k.data,
                    f, h, y = this.xData,
                    m, u;
                c = z(c, !0);
                f = {
                    series: this
                };
                this.pointClass.prototype.applyOptions.apply(f, [a]);
                u = f.x;
                m = y.length;
                if (this.requireSorting && u < y[m - 1])
                    for (h = !0; m && y[m - 1] > u;) m--;
                this.updateParallelArrays(f, "splice", m, 0, 0);
                this.updateParallelArrays(f, m);
                g && f.name && (g[u] = f.name);
                p.splice(m, 0, a);
                h && (this.data.splice(m, 0, null), this.processData());
                "point" === k.legendType && this.generatePoints();
                b && (d[0] && d[0].remove ? d[0].remove(!1) : (d.shift(), this.updateParallelArrays(f, "shift"), p.shift()));
                this.isDirtyData = this.isDirty = !0;
                c && l.redraw(e)
            },
            removePoint: function(a, c, b) {
                var e = this,
                    k = e.data,
                    d = k[a],
                    p = e.points,
                    g = e.chart,
                    f = function() {
                        p && p.length === k.length && p.splice(a, 1);
                        k.splice(a, 1);
                        e.options.data.splice(a, 1);
                        e.updateParallelArrays(d || {
                            series: e
                        }, "splice", a, 1);
                        d && d.destroy();
                        e.isDirty = !0;
                        e.isDirtyData = !0;
                        c && g.redraw()
                    };
                I(b, g);
                c = z(c, !0);
                d ? d.firePointEvent("remove", null, f) : f()
            },
            remove: function(a, c, b) {
                function e() {
                    k.destroy();
                    d.isDirtyLegend = d.isDirtyBox = !0;
                    d.linkSeries();
                    z(a, !0) && d.redraw(c)
                }
                var k = this,
                    d = k.chart;
                !1 !== b ? q(k, "remove", null, e) : e()
            },
            update: function(a, c) {
                var e = this,
                    k = e.chart,
                    p = e.userOptions,
                    d = e.oldType || e.type,
                    h = a.type || p.type || k.options.chart.type,
                    g = x[d].prototype,
                    m, u = ["group", "markerGroup", "dataLabelsGroup", "navigatorSeries", "baseSeries"],
                    n = e.finishedAnimating && {
                        animation: !1
                    };
                if (Object.keys && "data" === Object.keys(a).toString()) return this.setData(a.data, c);
                if (h && h !== d || void 0 !== a.zIndex) u.length = 0;
                f(u, function(a) {
                    u[a] = e[a];
                    delete e[a]
                });
                a = b(p, n, {
                    index: e.index,
                    pointStart: e.xData[0]
                }, {
                    data: e.options.data
                }, a);
                e.remove(!1, null, !1);
                for (m in g) e[m] = void 0;
                t(e, x[h || d].prototype);
                f(u, function(a) {
                    e[a] = u[a]
                });
                e.init(k, a);
                e.oldType = d;
                k.linkSeries();
                z(c, !0) && k.redraw(!1)
            }
        });
        t(A.prototype, {
            update: function(a, c) {
                var e = this.chart;
                a = e.options[this.coll][this.options.index] = b(this.userOptions,
                    a);
                this.destroy(!0);
                this.init(e, t(a, {
                    events: void 0
                }));
                e.isDirtyBox = !0;
                z(c, !0) && e.redraw()
            },
            remove: function(a) {
                for (var c = this.chart, b = this.coll, e = this.series, k = e.length; k--;) e[k] && e[k].remove(!1);
                n(c.axes, this);
                n(c[b], this);
                m(c.options[b]) ? c.options[b].splice(this.options.index, 1) : delete c.options[b];
                f(c[b], function(a, c) {
                    a.options.index = c
                });
                this.destroy();
                c.isDirtyBox = !0;
                z(a, !0) && c.redraw()
            },
            setTitle: function(a, c) {
                this.update({
                    title: a
                }, c)
            },
            setCategories: function(a, c) {
                this.update({
                    categories: a
                }, c)
            }
        })
    })(J);
    (function(a) {
        var B = a.each,
            A = a.map,
            C = a.pick,
            E = a.Series,
            v = a.seriesType;
        v("area", "line", {
            softThreshold: !1,
            threshold: 0
        }, {
            singleStacks: !1,
            getStackPoints: function(f) {
                var n = [],
                    t = [],
                    q = this.xAxis,
                    r = this.yAxis,
                    h = r.stacks[this.stackKey],
                    e = {},
                    m = this.index,
                    b = r.series,
                    k = b.length,
                    z, u = C(r.options.reversedStacks, !0) ? 1 : -1,
                    c;
                f = f || this.points;
                if (this.options.stacking) {
                    for (c = 0; c < f.length; c++) e[f[c].x] = f[c];
                    a.objectEach(h, function(a, c) {
                        null !== a.total && t.push(c)
                    });
                    t.sort(function(a, c) {
                        return a - c
                    });
                    z = A(b, function() {
                        return this.visible
                    });
                    B(t, function(a, b) {
                        var f = 0,
                            x, p;
                        if (e[a] && !e[a].isNull) n.push(e[a]), B([-1, 1], function(f) {
                            var l = 1 === f ? "rightNull" : "leftNull",
                                y = 0,
                                d = h[t[b + f]];
                            if (d)
                                for (c = m; 0 <= c && c < k;) x = d.points[c], x || (c === m ? e[a][l] = !0 : z[c] && (p = h[a].points[c]) && (y -= p[1] - p[0])), c += u;
                            e[a][1 === f ? "rightCliff" : "leftCliff"] = y
                        });
                        else {
                            for (c = m; 0 <= c && c < k;) {
                                if (x = h[a].points[c]) {
                                    f = x[1];
                                    break
                                }
                                c += u
                            }
                            f = r.translate(f, 0, 1, 0, 1);
                            n.push({
                                isNull: !0,
                                plotX: q.translate(a, 0, 0, 0, 1),
                                x: a,
                                plotY: f,
                                yBottom: f
                            })
                        }
                    })
                }
                return n
            },
            getGraphPath: function(a) {
                var f = E.prototype.getGraphPath,
                    t = this.options,
                    q = t.stacking,
                    r = this.yAxis,
                    h, e, m = [],
                    b = [],
                    k = this.index,
                    z, u = r.stacks[this.stackKey],
                    c = t.threshold,
                    x = r.getThreshold(t.threshold),
                    v, t = t.connectNulls || "percent" === q,
                    F = function(e, f, h) {
                        var l = a[e];
                        e = q && u[l.x].points[k];
                        var p = l[h + "Null"] || 0;
                        h = l[h + "Cliff"] || 0;
                        var d, y, l = !0;
                        h || p ? (d = (p ? e[0] : e[1]) + h, y = e[0] + h, l = !!p) : !q && a[f] && a[f].isNull && (d = y = c);
                        void 0 !== d && (b.push({
                            plotX: z,
                            plotY: null === d ? x : r.getThreshold(d),
                            isNull: l,
                            isCliff: !0
                        }), m.push({
                            plotX: z,
                            plotY: null === y ? x : r.getThreshold(y),
                            doCurve: !1
                        }))
                    };
                a =
                    a || this.points;
                q && (a = this.getStackPoints(a));
                for (h = 0; h < a.length; h++)
                    if (e = a[h].isNull, z = C(a[h].rectPlotX, a[h].plotX), v = C(a[h].yBottom, x), !e || t) t || F(h, h - 1, "left"), e && !q && t || (b.push(a[h]), m.push({
                        x: h,
                        plotX: z,
                        plotY: v
                    })), t || F(h, h + 1, "right");
                h = f.call(this, b, !0, !0);
                m.reversed = !0;
                e = f.call(this, m, !0, !0);
                e.length && (e[0] = "L");
                e = h.concat(e);
                f = f.call(this, b, !1, t);
                e.xMap = h.xMap;
                this.areaPath = e;
                return f
            },
            drawGraph: function() {
                this.areaPath = [];
                E.prototype.drawGraph.apply(this);
                var a = this,
                    n = this.areaPath,
                    t = this.options,
                    q = [
                        ["area", "highcharts-area"]
                    ];
                B(this.zones, function(a, f) {
                    q.push(["zone-area-" + f, "highcharts-area highcharts-zone-area-" + f + " " + a.className])
                });
                B(q, function(f) {
                    var h = f[0],
                        e = a[h];
                    e ? (e.endX = n.xMap, e.animate({
                        d: n
                    })) : (e = a[h] = a.chart.renderer.path(n).addClass(f[1]).attr({
                        zIndex: 0
                    }).add(a.group), e.isArea = !0);
                    e.startX = n.xMap;
                    e.shiftUnit = t.step ? 2 : 1
                })
            },
            drawLegendSymbol: a.LegendSymbolMixin.drawRectangle
        })
    })(J);
    (function(a) {
        var B = a.pick;
        a = a.seriesType;
        a("spline", "line", {}, {
            getPointSpline: function(a, C, E) {
                var v =
                    C.plotX,
                    f = C.plotY,
                    n = a[E - 1];
                E = a[E + 1];
                var t, q, r, h;
                if (n && !n.isNull && !1 !== n.doCurve && !C.isCliff && E && !E.isNull && !1 !== E.doCurve && !C.isCliff) {
                    a = n.plotY;
                    r = E.plotX;
                    E = E.plotY;
                    var e = 0;
                    t = (1.5 * v + n.plotX) / 2.5;
                    q = (1.5 * f + a) / 2.5;
                    r = (1.5 * v + r) / 2.5;
                    h = (1.5 * f + E) / 2.5;
                    r !== t && (e = (h - q) * (r - v) / (r - t) + f - h);
                    q += e;
                    h += e;
                    q > a && q > f ? (q = Math.max(a, f), h = 2 * f - q) : q < a && q < f && (q = Math.min(a, f), h = 2 * f - q);
                    h > E && h > f ? (h = Math.max(E, f), q = 2 * f - h) : h < E && h < f && (h = Math.min(E, f), q = 2 * f - h);
                    C.rightContX = r;
                    C.rightContY = h
                }
                C = ["C", B(n.rightContX, n.plotX), B(n.rightContY,
                    n.plotY), B(t, v), B(q, f), v, f];
                n.rightContX = n.rightContY = null;
                return C
            }
        })
    })(J);
    (function(a) {
        var B = a.seriesTypes.area.prototype,
            A = a.seriesType;
        A("areaspline", "spline", a.defaultPlotOptions.area, {
            getStackPoints: B.getStackPoints,
            getGraphPath: B.getGraphPath,
            drawGraph: B.drawGraph,
            drawLegendSymbol: a.LegendSymbolMixin.drawRectangle
        })
    })(J);
    (function(a) {
        var B = a.animObject,
            A = a.each,
            C = a.extend,
            E = a.isNumber,
            v = a.merge,
            f = a.pick,
            n = a.Series,
            t = a.seriesType,
            q = a.svg;
        t("column", "line", {
            borderRadius: 0,
            crisp: !0,
            groupPadding: .2,
            marker: null,
            pointPadding: .1,
            minPointLength: 0,
            cropThreshold: 50,
            pointRange: null,
            states: {
                hover: {
                    halo: !1
                }
            },
            dataLabels: {
                align: null,
                verticalAlign: null,
                y: null
            },
            softThreshold: !1,
            startFromThreshold: !0,
            stickyTracking: !1,
            tooltip: {
                distance: 6
            },
            threshold: 0
        }, {
            cropShoulder: 0,
            directTouch: !0,
            trackerGroups: ["group", "dataLabelsGroup"],
            negStacks: !0,
            init: function() {
                n.prototype.init.apply(this, arguments);
                var a = this,
                    f = a.chart;
                f.hasRendered && A(f.series, function(e) {
                    e.type === a.type && (e.isDirty = !0)
                })
            },
            getColumnMetrics: function() {
                var a =
                    this,
                    h = a.options,
                    e = a.xAxis,
                    m = a.yAxis,
                    b = e.reversed,
                    k, n = {},
                    u = 0;
                !1 === h.grouping ? u = 1 : A(a.chart.series, function(c) {
                    var b = c.options,
                        e = c.yAxis,
                        f;
                    c.type !== a.type || !c.visible && a.chart.options.chart.ignoreHiddenSeries || m.len !== e.len || m.pos !== e.pos || (b.stacking ? (k = c.stackKey, void 0 === n[k] && (n[k] = u++), f = n[k]) : !1 !== b.grouping && (f = u++), c.columnIndex = f)
                });
                var c = Math.min(Math.abs(e.transA) * (e.ordinalSlope || h.pointRange || e.closestPointRange || e.tickInterval || 1), e.len),
                    x = c * h.groupPadding,
                    q = (c - 2 * x) / (u || 1),
                    h = Math.min(h.maxPointWidth ||
                        e.len, f(h.pointWidth, q * (1 - 2 * h.pointPadding)));
                a.columnMetrics = {
                    width: h,
                    offset: (q - h) / 2 + (x + ((a.columnIndex || 0) + (b ? 1 : 0)) * q - c / 2) * (b ? -1 : 1)
                };
                return a.columnMetrics
            },
            crispCol: function(a, f, e, m) {
                var b = this.chart,
                    k = this.borderWidth,
                    h = -(k % 2 ? .5 : 0),
                    k = k % 2 ? .5 : 1;
                b.inverted && b.renderer.isVML && (k += 1);
                this.options.crisp && (e = Math.round(a + e) + h, a = Math.round(a) + h, e -= a);
                m = Math.round(f + m) + k;
                h = .5 >= Math.abs(f) && .5 < m;
                f = Math.round(f) + k;
                m -= f;
                h && m && (--f, m += 1);
                return {
                    x: a,
                    y: f,
                    width: e,
                    height: m
                }
            },
            translate: function() {
                var a = this,
                    h =
                    a.chart,
                    e = a.options,
                    m = a.dense = 2 > a.closestPointRange * a.xAxis.transA,
                    m = a.borderWidth = f(e.borderWidth, m ? 0 : 1),
                    b = a.yAxis,
                    k = a.translatedThreshold = b.getThreshold(e.threshold),
                    q = f(e.minPointLength, 5),
                    u = a.getColumnMetrics(),
                    c = u.width,
                    x = a.barW = Math.max(c, 1 + 2 * m),
                    t = a.pointXOffset = u.offset;
                h.inverted && (k -= .5);
                e.pointPadding && (x = Math.ceil(x));
                n.prototype.translate.apply(a);
                A(a.points, function(e) {
                    var m = f(e.yBottom, k),
                        p = 999 + Math.abs(m),
                        p = Math.min(Math.max(-p, e.plotY), b.len + p),
                        y = e.plotX + t,
                        l = x,
                        u = Math.min(p, m),
                        d, n =
                        Math.max(p, m) - u;
                    Math.abs(n) < q && q && (n = q, d = !b.reversed && !e.negative || b.reversed && e.negative, u = Math.abs(u - k) > q ? m - q : k - (d ? q : 0));
                    e.barX = y;
                    e.pointWidth = c;
                    e.tooltipPos = h.inverted ? [b.len + b.pos - h.plotLeft - p, a.xAxis.len - y - l / 2, n] : [y + l / 2, p + b.pos - h.plotTop, n];
                    e.shapeType = "rect";
                    e.shapeArgs = a.crispCol.apply(a, e.isNull ? [y, k, l, 0] : [y, u, l, n])
                })
            },
            getSymbol: a.noop,
            drawLegendSymbol: a.LegendSymbolMixin.drawRectangle,
            drawGraph: function() {
                this.group[this.dense ? "addClass" : "removeClass"]("highcharts-dense-data")
            },
            drawPoints: function() {
                var a =
                    this,
                    f = this.chart,
                    e = a.options,
                    m = f.renderer,
                    b = e.animationLimit || 250,
                    k;
                A(a.points, function(h) {
                    var u = h.graphic;
                    if (E(h.plotY) && null !== h.y) {
                        k = h.shapeArgs;
                        if (u) u[f.pointCount < b ? "animate" : "attr"](v(k));
                        else h.graphic = u = m[h.shapeType](k).add(h.group || a.group);
                        e.borderRadius && u.attr({
                            r: e.borderRadius
                        });
                        u.addClass(h.getClassName(), !0)
                    } else u && (h.graphic = u.destroy())
                })
            },
            animate: function(a) {
                var f = this,
                    e = this.yAxis,
                    m = f.options,
                    b = this.chart.inverted,
                    k = {};
                q && (a ? (k.scaleY = .001, a = Math.min(e.pos + e.len, Math.max(e.pos,
                    e.toPixels(m.threshold))), b ? k.translateX = a - e.len : k.translateY = a, f.group.attr(k)) : (k[b ? "translateX" : "translateY"] = e.pos, f.group.animate(k, C(B(f.options.animation), {
                    step: function(a, b) {
                        f.group.attr({
                            scaleY: Math.max(.001, b.pos)
                        })
                    }
                })), f.animate = null))
            },
            remove: function() {
                var a = this,
                    f = a.chart;
                f.hasRendered && A(f.series, function(e) {
                    e.type === a.type && (e.isDirty = !0)
                });
                n.prototype.remove.apply(a, arguments)
            }
        })
    })(J);
    (function(a) {
        a = a.seriesType;
        a("bar", "column", null, {
            inverted: !0
        })
    })(J);
    (function(a) {
        var B = a.Series;
        a = a.seriesType;
        a("scatter", "line", {
            lineWidth: 0,
            findNearestPointBy: "xy",
            marker: {
                enabled: !0
            },
            tooltip: {
                headerFormat: '\x3cspan class\x3d"highcharts-color-{point.colorIndex}"\x3e\u25cf\x3c/span\x3e \x3cspan class\x3d"highcharts-header"\x3e {series.name}\x3c/span\x3e\x3cbr/\x3e',
                pointFormat: "x: \x3cb\x3e{point.x}\x3c/b\x3e\x3cbr/\x3ey: \x3cb\x3e{point.y}\x3c/b\x3e\x3cbr/\x3e"
            }
        }, {
            sorted: !1,
            requireSorting: !1,
            noSharedTooltip: !0,
            trackerGroups: ["group", "markerGroup", "dataLabelsGroup"],
            takeOrdinalPosition: !1,
            drawGraph: function() {
                this.options.lineWidth && B.prototype.drawGraph.call(this)
            }
        })
    })(J);
    (function(a) {
        var B = a.pick,
            A = a.relativeLength;
        a.CenteredSeriesMixin = {
            getCenter: function() {
                var a = this.options,
                    E = this.chart,
                    v = 2 * (a.slicedOffset || 0),
                    f = E.plotWidth - 2 * v,
                    E = E.plotHeight - 2 * v,
                    n = a.center,
                    n = [B(n[0], "50%"), B(n[1], "50%"), a.size || "100%", a.innerSize || 0],
                    t = Math.min(f, E),
                    q, r;
                for (q = 0; 4 > q; ++q) r = n[q], a = 2 > q || 2 === q && /%$/.test(r), n[q] = A(r, [f, E, t, n[2]][q]) + (a ? v : 0);
                n[3] > n[2] && (n[3] = n[2]);
                return n
            }
        }
    })(J);
    (function(a) {
        var B =
            a.addEvent,
            A = a.defined,
            C = a.each,
            E = a.extend,
            v = a.inArray,
            f = a.noop,
            n = a.pick,
            t = a.Point,
            q = a.Series,
            r = a.seriesType,
            h = a.setAnimation;
        r("pie", "line", {
            center: [null, null],
            clip: !1,
            colorByPoint: !0,
            dataLabels: {
                distance: 30,
                enabled: !0,
                formatter: function() {
                    return this.point.isNull ? void 0 : this.point.name
                },
                x: 0
            },
            ignoreHiddenPoint: !0,
            legendType: "point",
            marker: null,
            size: null,
            showInLegend: !1,
            slicedOffset: 10,
            stickyTracking: !1,
            tooltip: {
                followPointer: !0
            }
        }, {
            isCartesian: !1,
            requireSorting: !1,
            directTouch: !0,
            noSharedTooltip: !0,
            trackerGroups: ["group", "dataLabelsGroup"],
            axisTypes: [],
            pointAttribs: a.seriesTypes.column.prototype.pointAttribs,
            animate: function(a) {
                var e = this,
                    b = e.points,
                    k = e.startAngleRad;
                a || (C(b, function(a) {
                    var b = a.graphic,
                        c = a.shapeArgs;
                    b && (b.attr({
                        r: a.startR || e.center[3] / 2,
                        start: k,
                        end: k
                    }), b.animate({
                        r: c.r,
                        start: c.start,
                        end: c.end
                    }, e.options.animation))
                }), e.animate = null)
            },
            updateTotals: function() {
                var a, f = 0,
                    b = this.points,
                    k = b.length,
                    h, u = this.options.ignoreHiddenPoint;
                for (a = 0; a < k; a++) h = b[a], f += u && !h.visible ? 0 : h.isNull ?
                    0 : h.y;
                this.total = f;
                for (a = 0; a < k; a++) h = b[a], h.percentage = 0 < f && (h.visible || !u) ? h.y / f * 100 : 0, h.total = f
            },
            generatePoints: function() {
                q.prototype.generatePoints.call(this);
                this.updateTotals()
            },
            translate: function(a) {
                this.generatePoints();
                var e = 0,
                    b = this.options,
                    k = b.slicedOffset,
                    f = k + (b.borderWidth || 0),
                    h, c, x, q = b.startAngle || 0,
                    r = this.startAngleRad = Math.PI / 180 * (q - 90),
                    q = (this.endAngleRad = Math.PI / 180 * (n(b.endAngle, q + 360) - 90)) - r,
                    t = this.points,
                    p, y = b.dataLabels.distance,
                    b = b.ignoreHiddenPoint,
                    l, D = t.length,
                    d;
                a || (this.center =
                    a = this.getCenter());
                this.getX = function(d, c, b) {
                    x = Math.asin(Math.min((d - a[1]) / (a[2] / 2 + b.labelDistance), 1));
                    return a[0] + (c ? -1 : 1) * Math.cos(x) * (a[2] / 2 + b.labelDistance)
                };
                for (l = 0; l < D; l++) {
                    d = t[l];
                    d.labelDistance = n(d.options.dataLabels && d.options.dataLabels.distance, y);
                    this.maxLabelDistance = Math.max(this.maxLabelDistance || 0, d.labelDistance);
                    h = r + e * q;
                    if (!b || d.visible) e += d.percentage / 100;
                    c = r + e * q;
                    d.shapeType = "arc";
                    d.shapeArgs = {
                        x: a[0],
                        y: a[1],
                        r: a[2] / 2,
                        innerR: a[3] / 2,
                        start: Math.round(1E3 * h) / 1E3,
                        end: Math.round(1E3 *
                            c) / 1E3
                    };
                    x = (c + h) / 2;
                    x > 1.5 * Math.PI ? x -= 2 * Math.PI : x < -Math.PI / 2 && (x += 2 * Math.PI);
                    d.slicedTranslation = {
                        translateX: Math.round(Math.cos(x) * k),
                        translateY: Math.round(Math.sin(x) * k)
                    };
                    c = Math.cos(x) * a[2] / 2;
                    p = Math.sin(x) * a[2] / 2;
                    d.tooltipPos = [a[0] + .7 * c, a[1] + .7 * p];
                    d.half = x < -Math.PI / 2 || x > Math.PI / 2 ? 1 : 0;
                    d.angle = x;
                    h = Math.min(f, d.labelDistance / 5);
                    d.labelPos = [a[0] + c + Math.cos(x) * d.labelDistance, a[1] + p + Math.sin(x) * d.labelDistance, a[0] + c + Math.cos(x) * h, a[1] + p + Math.sin(x) * h, a[0] + c, a[1] + p, 0 > d.labelDistance ? "center" : d.half ? "right" :
                        "left", x
                    ]
                }
            },
            drawGraph: null,
            drawPoints: function() {
                var a = this,
                    f = a.chart.renderer,
                    b, k, h;
                C(a.points, function(e) {
                    e.isNull || (k = e.graphic, h = e.shapeArgs, b = e.getTranslate(), k ? k.setRadialReference(a.center).animate(E(h, b)) : (e.graphic = k = f[e.shapeType](h).setRadialReference(a.center).attr(b).add(a.group), e.visible || k.attr({
                        visibility: "hidden"
                    })), k.addClass(e.getClassName()))
                })
            },
            searchPoint: f,
            sortByAngle: function(a, f) {
                a.sort(function(a, e) {
                    return void 0 !== a.angle && (e.angle - a.angle) * f
                })
            },
            drawLegendSymbol: a.LegendSymbolMixin.drawRectangle,
            getCenter: a.CenteredSeriesMixin.getCenter,
            getSymbol: f
        }, {
            init: function() {
                t.prototype.init.apply(this, arguments);
                var a = this,
                    f;
                a.name = n(a.name, "Slice");
                f = function(b) {
                    a.slice("select" === b.type)
                };
                B(a, "select", f);
                B(a, "unselect", f);
                return a
            },
            isValid: function() {
                return a.isNumber(this.y, !0) && 0 <= this.y
            },
            setVisible: function(a, f) {
                var b = this,
                    e = b.series,
                    h = e.chart,
                    m = e.options.ignoreHiddenPoint;
                f = n(f, m);
                a !== b.visible && (b.visible = b.options.visible = a = void 0 === a ? !b.visible : a, e.options.data[v(b, e.data)] = b.options, C(["graphic",
                    "dataLabel", "connector", "shadowGroup"
                ], function(c) {
                    if (b[c]) b[c][a ? "show" : "hide"](!0)
                }), b.legendItem && h.legend.colorizeItem(b, a), a || "hover" !== b.state || b.setState(""), m && (e.isDirty = !0), f && h.redraw())
            },
            slice: function(a, f, b) {
                var e = this.series;
                h(b, e.chart);
                n(f, !0);
                this.sliced = this.options.sliced = A(a) ? a : !this.sliced;
                e.options.data[v(this, e.data)] = this.options;
                this.graphic.animate(this.getTranslate())
            },
            getTranslate: function() {
                return this.sliced ? this.slicedTranslation : {
                    translateX: 0,
                    translateY: 0
                }
            },
            haloPath: function(a) {
                var e =
                    this.shapeArgs;
                return this.sliced || !this.visible ? [] : this.series.chart.renderer.symbols.arc(e.x, e.y, e.r + a, e.r + a, {
                    innerR: this.shapeArgs.r,
                    start: e.start,
                    end: e.end
                })
            }
        })
    })(J);
    (function(a) {
        var B = a.addEvent,
            A = a.arrayMax,
            C = a.defined,
            E = a.each,
            v = a.extend,
            f = a.format,
            n = a.map,
            t = a.merge,
            q = a.noop,
            r = a.pick,
            h = a.relativeLength,
            e = a.Series,
            m = a.seriesTypes,
            b = a.stableSort;
        a.distribute = function(a, e) {
            function k(a, c) {
                return a.target - c.target
            }
            var c, f = !0,
                h = a,
                m = [],
                q;
            q = 0;
            for (c = a.length; c--;) q += a[c].size;
            if (q > e) {
                b(a, function(a,
                    c) {
                    return (c.rank || 0) - (a.rank || 0)
                });
                for (q = c = 0; q <= e;) q += a[c].size, c++;
                m = a.splice(c - 1, a.length)
            }
            b(a, k);
            for (a = n(a, function(a) {
                    return {
                        size: a.size,
                        targets: [a.target]
                    }
                }); f;) {
                for (c = a.length; c--;) f = a[c], q = (Math.min.apply(0, f.targets) + Math.max.apply(0, f.targets)) / 2, f.pos = Math.min(Math.max(0, q - f.size / 2), e - f.size);
                c = a.length;
                for (f = !1; c--;) 0 < c && a[c - 1].pos + a[c - 1].size > a[c].pos && (a[c - 1].size += a[c].size, a[c - 1].targets = a[c - 1].targets.concat(a[c].targets), a[c - 1].pos + a[c - 1].size > e && (a[c - 1].pos = e - a[c - 1].size), a.splice(c,
                    1), f = !0)
            }
            c = 0;
            E(a, function(a) {
                var b = 0;
                E(a.targets, function() {
                    h[c].pos = a.pos + b;
                    b += h[c].size;
                    c++
                })
            });
            h.push.apply(h, m);
            b(h, k)
        };
        e.prototype.drawDataLabels = function() {
            var b = this,
                e = b.options,
                h = e.dataLabels,
                c = b.points,
                m, n, q = b.hasRendered || 0,
                v, p, y = r(h.defer, !!e.animation),
                l = b.chart.renderer;
            if (h.enabled || b._hasPointLabels) b.dlProcessOptions && b.dlProcessOptions(h), p = b.plotGroup("dataLabelsGroup", "data-labels", y && !q ? "hidden" : "visible", h.zIndex || 6), y && (p.attr({
                opacity: +q
            }), q || B(b, "afterAnimate", function() {
                b.visible &&
                    p.show(!0);
                p[e.animation ? "animate" : "attr"]({
                    opacity: 1
                }, {
                    duration: 200
                })
            })), n = h, E(c, function(c) {
                var d, e = c.dataLabel,
                    g, k, y = c.connector,
                    q = !e;
                m = c.dlOptions || c.options && c.options.dataLabels;
                if (d = r(m && m.enabled, n.enabled) && null !== c.y) h = t(n, m), g = c.getLabelConfig(), v = h.format ? f(h.format, g) : h.formatter.call(g, h), g = h.rotation, k = {
                    r: h.borderRadius || 0,
                    rotation: g,
                    padding: h.padding,
                    zIndex: 1
                }, a.objectEach(k, function(a, d) {
                    void 0 === a && delete k[d]
                });
                !e || d && C(v) ? d && C(v) && (e ? k.text = v : (e = c.dataLabel = l[g ? "text" : "label"](v,
                    0, -9999, h.shape, null, null, h.useHTML, null, "data-label"), e.addClass("highcharts-data-label-color-" + c.colorIndex + " " + (h.className || "") + (h.useHTML ? "highcharts-tracker" : ""))), e.attr(k), e.added || e.add(p), b.alignDataLabel(c, e, h, null, q)) : (c.dataLabel = e = e.destroy(), y && (c.connector = y.destroy()))
            })
        };
        e.prototype.alignDataLabel = function(a, b, e, c, f) {
            var k = this.chart,
                h = k.inverted,
                m = r(a.plotX, -9999),
                p = r(a.plotY, -9999),
                y = b.getBBox(),
                l, n = e.rotation,
                d = e.align,
                q = this.visible && (a.series.forceDL || k.isInsidePlot(m, Math.round(p),
                    h) || c && k.isInsidePlot(m, h ? c.x + 1 : c.y + c.height - 1, h)),
                g = "justify" === r(e.overflow, "justify");
            if (q && (l = k.renderer.fontMetrics(void 0, b).b, c = v({
                    x: h ? this.yAxis.len - p : m,
                    y: Math.round(h ? this.xAxis.len - m : p),
                    width: 0,
                    height: 0
                }, c), v(e, {
                    width: y.width,
                    height: y.height
                }), n ? (g = !1, m = k.renderer.rotCorr(l, n), m = {
                    x: c.x + e.x + c.width / 2 + m.x,
                    y: c.y + e.y + {
                        top: 0,
                        middle: .5,
                        bottom: 1
                    }[e.verticalAlign] * c.height
                }, b[f ? "attr" : "animate"](m).attr({
                    align: d
                }), p = (n + 720) % 360, p = 180 < p && 360 > p, "left" === d ? m.y -= p ? y.height : 0 : "center" === d ? (m.x -= y.width /
                    2, m.y -= y.height / 2) : "right" === d && (m.x -= y.width, m.y -= p ? 0 : y.height)) : (b.align(e, null, c), m = b.alignAttr), g ? a.isLabelJustified = this.justifyDataLabel(b, e, m, y, c, f) : r(e.crop, !0) && (q = k.isInsidePlot(m.x, m.y) && k.isInsidePlot(m.x + y.width, m.y + y.height)), e.shape && !n)) b[f ? "attr" : "animate"]({
                anchorX: h ? k.plotWidth - a.plotY : a.plotX,
                anchorY: h ? k.plotHeight - a.plotX : a.plotY
            });
            q || (b.attr({
                y: -9999
            }), b.placed = !1)
        };
        e.prototype.justifyDataLabel = function(a, b, e, c, f, h) {
            var k = this.chart,
                m = b.align,
                p = b.verticalAlign,
                y, l, n = a.box ? 0 :
                a.padding || 0;
            y = e.x + n;
            0 > y && ("right" === m ? b.align = "left" : b.x = -y, l = !0);
            y = e.x + c.width - n;
            y > k.plotWidth && ("left" === m ? b.align = "right" : b.x = k.plotWidth - y, l = !0);
            y = e.y + n;
            0 > y && ("bottom" === p ? b.verticalAlign = "top" : b.y = -y, l = !0);
            y = e.y + c.height - n;
            y > k.plotHeight && ("top" === p ? b.verticalAlign = "bottom" : b.y = k.plotHeight - y, l = !0);
            l && (a.placed = !h, a.align(b, null, f));
            return l
        };
        m.pie && (m.pie.prototype.drawDataLabels = function() {
                var b = this,
                    f = b.data,
                    h, c = b.chart,
                    m = b.options.dataLabels,
                    n = r(m.connectorPadding, 10),
                    q = r(m.connectorWidth,
                        1),
                    t = c.plotWidth,
                    p = c.plotHeight,
                    y, l = b.center,
                    D = l[2] / 2,
                    d = l[1],
                    v, g, w, P, K = [
                        [],
                        []
                    ],
                    M, N, B, Q, O = [0, 0, 0, 0];
                b.visible && (m.enabled || b._hasPointLabels) && (E(f, function(a) {
                    a.dataLabel && a.visible && a.dataLabel.shortened && (a.dataLabel.attr({
                        width: "auto"
                    }).css({
                        width: "auto",
                        textOverflow: "clip"
                    }), a.dataLabel.shortened = !1)
                }), e.prototype.drawDataLabels.apply(b), E(f, function(a) {
                    a.dataLabel && a.visible && (K[a.half].push(a), a.dataLabel._pos = null)
                }), E(K, function(e, f) {
                    var k, y, q = e.length,
                        x = [],
                        u;
                    if (q)
                        for (b.sortByAngle(e, f - .5),
                            0 < b.maxLabelDistance && (k = Math.max(0, d - D - b.maxLabelDistance), y = Math.min(d + D + b.maxLabelDistance, c.plotHeight), E(e, function(a) {
                                0 < a.labelDistance && a.dataLabel && (a.top = Math.max(0, d - D - a.labelDistance), a.bottom = Math.min(d + D + a.labelDistance, c.plotHeight), u = a.dataLabel.getBBox().height || 21, a.positionsIndex = x.push({
                                    target: a.labelPos[1] - a.top + u / 2,
                                    size: u,
                                    rank: a.y
                                }) - 1)
                            }), a.distribute(x, y + u - k)), Q = 0; Q < q; Q++) h = e[Q], y = h.positionsIndex, w = h.labelPos, v = h.dataLabel, B = !1 === h.visible ? "hidden" : "inherit", k = w[1], x && C(x[y]) ?
                            void 0 === x[y].pos ? B = "hidden" : (P = x[y].size, N = h.top + x[y].pos) : N = k, delete h.positionIndex, M = m.justify ? l[0] + (f ? -1 : 1) * (D + h.labelDistance) : b.getX(N < h.top + 2 || N > h.bottom - 2 ? k : N, f, h), v._attr = {
                                visibility: B,
                                align: w[6]
                            }, v._pos = {
                                x: M + m.x + ({
                                    left: n,
                                    right: -n
                                }[w[6]] || 0),
                                y: N + m.y - 10
                            }, w.x = M, w.y = N, r(m.crop, !0) && (g = v.getBBox().width, k = null, M - g < n ? (k = Math.round(g - M + n), O[3] = Math.max(k, O[3])) : M + g > t - n && (k = Math.round(M + g - t + n), O[1] = Math.max(k, O[1])), 0 > N - P / 2 ? O[0] = Math.max(Math.round(-N + P / 2), O[0]) : N + P / 2 > p && (O[2] = Math.max(Math.round(N +
                                P / 2 - p), O[2])), v.sideOverflow = k)
                }), 0 === A(O) || this.verifyDataLabelOverflow(O)) && (this.placeDataLabels(), q && E(this.points, function(a) {
                    var d;
                    y = a.connector;
                    if ((v = a.dataLabel) && v._pos && a.visible && 0 < a.labelDistance) {
                        B = v._attr.visibility;
                        if (d = !y) a.connector = y = c.renderer.path().addClass("highcharts-data-label-connector highcharts-color-" + a.colorIndex).add(b.dataLabelsGroup);
                        y[d ? "attr" : "animate"]({
                            d: b.connectorPath(a.labelPos)
                        });
                        y.attr("visibility", B)
                    } else y && (a.connector = y.destroy())
                }))
            }, m.pie.prototype.connectorPath =
            function(a) {
                var b = a.x,
                    e = a.y;
                return r(this.options.dataLabels.softConnector, !0) ? ["M", b + ("left" === a[6] ? 5 : -5), e, "C", b, e, 2 * a[2] - a[4], 2 * a[3] - a[5], a[2], a[3], "L", a[4], a[5]] : ["M", b + ("left" === a[6] ? 5 : -5), e, "L", a[2], a[3], "L", a[4], a[5]]
            }, m.pie.prototype.placeDataLabels = function() {
                E(this.points, function(a) {
                    var b = a.dataLabel;
                    b && a.visible && ((a = b._pos) ? (b.sideOverflow && (b._attr.width = b.getBBox().width - b.sideOverflow, b.css({
                        width: b._attr.width + "px",
                        textOverflow: "ellipsis"
                    }), b.shortened = !0), b.attr(b._attr), b[b.moved ?
                        "animate" : "attr"](a), b.moved = !0) : b && b.attr({
                        y: -9999
                    }))
                }, this)
            }, m.pie.prototype.alignDataLabel = q, m.pie.prototype.verifyDataLabelOverflow = function(a) {
                var b = this.center,
                    e = this.options,
                    c = e.center,
                    f = e.minSize || 80,
                    k, m = null !== e.size;
                m || (null !== c[0] ? k = Math.max(b[2] - Math.max(a[1], a[3]), f) : (k = Math.max(b[2] - a[1] - a[3], f), b[0] += (a[3] - a[1]) / 2), null !== c[1] ? k = Math.max(Math.min(k, b[2] - Math.max(a[0], a[2])), f) : (k = Math.max(Math.min(k, b[2] - a[0] - a[2]), f), b[1] += (a[0] - a[2]) / 2), k < b[2] ? (b[2] = k, b[3] = Math.min(h(e.innerSize ||
                    0, k), k), this.translate(b), this.drawDataLabels && this.drawDataLabels()) : m = !0);
                return m
            });
        m.column && (m.column.prototype.alignDataLabel = function(a, b, f, c, h) {
            var k = this.chart.inverted,
                m = a.series,
                n = a.dlBox || a.shapeArgs,
                p = r(a.below, a.plotY > r(this.translatedThreshold, m.yAxis.len)),
                y = r(f.inside, !!this.options.stacking);
            n && (c = t(n), 0 > c.y && (c.height += c.y, c.y = 0), n = c.y + c.height - m.yAxis.len, 0 < n && (c.height -= n), k && (c = {
                x: m.yAxis.len - c.y - c.height,
                y: m.xAxis.len - c.x - c.width,
                width: c.height,
                height: c.width
            }), y || (k ? (c.x +=
                p ? 0 : c.width, c.width = 0) : (c.y += p ? c.height : 0, c.height = 0)));
            f.align = r(f.align, !k || y ? "center" : p ? "right" : "left");
            f.verticalAlign = r(f.verticalAlign, k || y ? "middle" : p ? "top" : "bottom");
            e.prototype.alignDataLabel.call(this, a, b, f, c, h);
            a.isLabelJustified && a.contrastColor && a.dataLabel.css({
                color: a.contrastColor
            })
        })
    })(J);
    (function(a) {
        var B = a.Chart,
            A = a.each,
            C = a.objectEach,
            E = a.pick,
            v = a.addEvent;
        B.prototype.callbacks.push(function(a) {
            function f() {
                var f = [];
                A(a.yAxis || [], function(a) {
                    a.options.stackLabels && !a.options.stackLabels.allowOverlap &&
                        C(a.stacks, function(a) {
                            C(a, function(a) {
                                f.push(a.label)
                            })
                        })
                });
                A(a.series || [], function(a) {
                    var n = a.options.dataLabels,
                        h = a.dataLabelCollections || ["dataLabel"];
                    (n.enabled || a._hasPointLabels) && !n.allowOverlap && a.visible && A(h, function(e) {
                        A(a.points, function(a) {
                            a[e] && (a[e].labelrank = E(a.labelrank, a.shapeArgs && a.shapeArgs.height), f.push(a[e]))
                        })
                    })
                });
                a.hideOverlappingLabels(f)
            }
            f();
            v(a, "redraw", f)
        });
        B.prototype.hideOverlappingLabels = function(a) {
            var f = a.length,
                t, q, r, h, e, m, b, k, v, u = function(a, b, e, f, k, h, m, l) {
                    return !(k >
                        a + e || k + m < a || h > b + f || h + l < b)
                };
            for (q = 0; q < f; q++)
                if (t = a[q]) t.oldOpacity = t.opacity, t.newOpacity = 1, t.width || (r = t.getBBox(), t.width = r.width, t.height = r.height);
            a.sort(function(a, b) {
                return (b.labelrank || 0) - (a.labelrank || 0)
            });
            for (q = 0; q < f; q++)
                for (r = a[q], t = q + 1; t < f; ++t)
                    if (h = a[t], r && h && r !== h && r.placed && h.placed && 0 !== r.newOpacity && 0 !== h.newOpacity && (e = r.alignAttr, m = h.alignAttr, b = r.parentGroup, k = h.parentGroup, v = 2 * (r.box ? 0 : r.padding || 0), e = u(e.x + b.translateX, e.y + b.translateY, r.width - v, r.height - v, m.x + k.translateX, m.y +
                            k.translateY, h.width - v, h.height - v)))(r.labelrank < h.labelrank ? r : h).newOpacity = 0;
            A(a, function(a) {
                var c, b;
                a && (b = a.newOpacity, a.oldOpacity !== b && a.placed && (b ? a.show(!0) : c = function() {
                    a.hide()
                }, a.alignAttr.opacity = b, a[a.isOld ? "animate" : "attr"](a.alignAttr, null, c)), a.isOld = !0)
            })
        }
    })(J);
    (function(a) {
        var B = a.addEvent,
            A = a.Chart,
            C = a.createElement,
            E = a.css,
            v = a.defaultOptions,
            f = a.defaultPlotOptions,
            n = a.each,
            t = a.extend,
            q = a.fireEvent,
            r = a.hasTouch,
            h = a.inArray,
            e = a.isObject,
            m = a.Legend,
            b = a.merge,
            k = a.pick,
            z = a.Point,
            u = a.Series,
            c = a.seriesTypes,
            x = a.svg,
            I;
        I = a.TrackerMixin = {
            drawTrackerPoint: function() {
                var a = this,
                    c = a.chart.pointer,
                    b = function(a) {
                        var b = c.getPointFromEvent(a);
                        void 0 !== b && (c.isDirectTouch = !0, b.onMouseOver(a))
                    };
                n(a.points, function(a) {
                    a.graphic && (a.graphic.element.point = a);
                    a.dataLabel && (a.dataLabel.div ? a.dataLabel.div.point = a : a.dataLabel.element.point = a)
                });
                a._hasTracking || (n(a.trackerGroups, function(e) {
                    if (a[e] && (a[e].addClass("highcharts-tracker").on("mouseover", b).on("mouseout", function(a) {
                                c.onTrackerMouseOut(a)
                            }),
                            r)) a[e].on("touchstart", b)
                }), a._hasTracking = !0)
            },
            drawTrackerGraph: function() {
                var a = this,
                    c = a.options.trackByArea,
                    b = [].concat(c ? a.areaPath : a.graphPath),
                    e = b.length,
                    f = a.chart,
                    k = f.pointer,
                    d = f.renderer,
                    h = f.options.tooltip.snap,
                    g = a.tracker,
                    m, q = function() {
                        if (f.hoverSeries !== a) a.onMouseOver()
                    },
                    u = "rgba(192,192,192," + (x ? .0001 : .002) + ")";
                if (e && !c)
                    for (m = e + 1; m--;) "M" === b[m] && b.splice(m + 1, 0, b[m + 1] - h, b[m + 2], "L"), (m && "M" === b[m] || m === e) && b.splice(m, 0, "L", b[m - 2] + h, b[m - 1]);
                g ? g.attr({
                    d: b
                }) : a.graph && (a.tracker = d.path(b).attr({
                    "stroke-linejoin": "round",
                    visibility: a.visible ? "visible" : "hidden",
                    stroke: u,
                    fill: c ? u : "none",
                    "stroke-width": a.graph.strokeWidth() + (c ? 0 : 2 * h),
                    zIndex: 2
                }).add(a.group), n([a.tracker, a.markerGroup], function(a) {
                    a.addClass("highcharts-tracker").on("mouseover", q).on("mouseout", function(a) {
                        k.onTrackerMouseOut(a)
                    });
                    if (r) a.on("touchstart", q)
                }))
            }
        };
        c.column && (c.column.prototype.drawTracker = I.drawTrackerPoint);
        c.pie && (c.pie.prototype.drawTracker = I.drawTrackerPoint);
        c.scatter && (c.scatter.prototype.drawTracker = I.drawTrackerPoint);
        t(m.prototype, {
            setItemEvents: function(a, c, b) {
                var e = this.chart.renderer.boxWrapper,
                    f = "highcharts-legend-" + (a.series ? "point" : "series") + "-active";
                (b ? c : a.legendGroup).on("mouseover", function() {
                    a.setState("hover");
                    e.addClass(f)
                }).on("mouseout", function() {
                    e.removeClass(f);
                    a.setState()
                }).on("click", function(c) {
                    var d = function() {
                        a.setVisible && a.setVisible()
                    };
                    c = {
                        browserEvent: c
                    };
                    a.firePointEvent ? a.firePointEvent("legendItemClick", c, d) : q(a, "legendItemClick", c, d)
                })
            },
            createCheckboxForItem: function(a) {
                a.checkbox = C("input", {
                    type: "checkbox",
                    checked: a.selected,
                    defaultChecked: a.selected
                }, this.options.itemCheckboxStyle, this.chart.container);
                B(a.checkbox, "click", function(c) {
                    q(a.series || a, "checkboxClick", {
                        checked: c.target.checked,
                        item: a
                    }, function() {
                        a.select()
                    })
                })
            }
        });
        t(A.prototype, {
            showResetZoom: function() {
                var a = this,
                    c = v.lang,
                    b = a.options.chart.resetZoomButton,
                    e = b.theme,
                    f = e.states,
                    k = "chart" === b.relativeTo ? null : "plotBox";
                this.resetZoomButton = a.renderer.button(c.resetZoom, null, null, function() {
                    a.zoomOut()
                }, e, f && f.hover).attr({
                    align: b.position.align,
                    title: c.resetZoomTitle
                }).addClass("highcharts-reset-zoom").add().align(b.position, !1, k)
            },
            zoomOut: function() {
                var a = this;
                q(a, "selection", {
                    resetSelection: !0
                }, function() {
                    a.zoom()
                })
            },
            zoom: function(a) {
                var c, b = this.pointer,
                    f = !1,
                    l;
                !a || a.resetSelection ? (n(this.axes, function(a) {
                    c = a.zoom()
                }), b.initiated = !1) : n(a.xAxis.concat(a.yAxis), function(a) {
                    var d = a.axis;
                    b[d.isXAxis ? "zoomX" : "zoomY"] && (c = d.zoom(a.min, a.max), d.displayBtn && (f = !0))
                });
                l = this.resetZoomButton;
                f && !l ? this.showResetZoom() : !f && e(l) && (this.resetZoomButton =
                    l.destroy());
                c && this.redraw(k(this.options.chart.animation, a && a.animation, 100 > this.pointCount))
            },
            pan: function(a, c) {
                var b = this,
                    e = b.hoverPoints,
                    f;
                e && n(e, function(a) {
                    a.setState()
                });
                n("xy" === c ? [1, 0] : [1], function(c) {
                    c = b[c ? "xAxis" : "yAxis"][0];
                    var d = c.horiz,
                        e = a[d ? "chartX" : "chartY"],
                        d = d ? "mouseDownX" : "mouseDownY",
                        g = b[d],
                        k = (c.pointRange || 0) / 2,
                        l = c.getExtremes(),
                        h = c.toValue(g - e, !0) + k,
                        k = c.toValue(g + c.len - e, !0) - k,
                        p = k < h,
                        g = p ? k : h,
                        h = p ? h : k,
                        k = Math.min(l.dataMin, c.toValue(c.toPixels(l.min) - c.minPixelPadding)),
                        p = Math.max(l.dataMax,
                            c.toValue(c.toPixels(l.max) + c.minPixelPadding)),
                        m;
                    m = k - g;
                    0 < m && (h += m, g = k);
                    m = h - p;
                    0 < m && (h = p, g -= m);
                    c.series.length && g !== l.min && h !== l.max && (c.setExtremes(g, h, !1, !1, {
                        trigger: "pan"
                    }), f = !0);
                    b[d] = e
                });
                f && b.redraw(!1);
                E(b.container, {
                    cursor: "move"
                })
            }
        });
        t(z.prototype, {
            select: function(a, c) {
                var b = this,
                    e = b.series,
                    f = e.chart;
                a = k(a, !b.selected);
                b.firePointEvent(a ? "select" : "unselect", {
                    accumulate: c
                }, function() {
                    b.selected = b.options.selected = a;
                    e.options.data[h(b, e.data)] = b.options;
                    b.setState(a && "select");
                    c || n(f.getSelectedPoints(),
                        function(a) {
                            a.selected && a !== b && (a.selected = a.options.selected = !1, e.options.data[h(a, e.data)] = a.options, a.setState(""), a.firePointEvent("unselect"))
                        })
                })
            },
            onMouseOver: function(a) {
                var c = this.series.chart,
                    b = c.pointer;
                a = a ? b.normalize(a) : b.getChartCoordinatesFromPoint(this, c.inverted);
                b.runPointActions(a, this)
            },
            onMouseOut: function() {
                var a = this.series.chart;
                this.firePointEvent("mouseOut");
                n(a.hoverPoints || [], function(a) {
                    a.setState()
                });
                a.hoverPoints = a.hoverPoint = null
            },
            importEvents: function() {
                if (!this.hasImportedEvents) {
                    var c =
                        this,
                        e = b(c.series.options.point, c.options).events;
                    c.events = e;
                    a.objectEach(e, function(a, b) {
                        B(c, b, a)
                    });
                    this.hasImportedEvents = !0
                }
            },
            setState: function(a, c) {
                var b = Math.floor(this.plotX),
                    e = this.plotY,
                    l = this.series,
                    h = l.options.states[a] || {},
                    d = f[l.type].marker && l.options.marker,
                    m = d && !1 === d.enabled,
                    g = d && d.states && d.states[a] || {},
                    n = !1 === g.enabled,
                    q = l.stateMarkerGraphic,
                    x = this.marker || {},
                    u = l.chart,
                    r = l.halo,
                    t, v = d && l.markerAttribs;
                a = a || "";
                if (!(a === this.state && !c || this.selected && "select" !== a || !1 === h.enabled || a &&
                        (n || m && !1 === g.enabled) || a && x.states && x.states[a] && !1 === x.states[a].enabled)) {
                    v && (t = l.markerAttribs(this, a));
                    if (this.graphic) this.state && this.graphic.removeClass("highcharts-point-" + this.state), a && this.graphic.addClass("highcharts-point-" + a), t && this.graphic.animate(t, k(u.options.chart.animation, g.animation, d.animation)), q && q.hide();
                    else {
                        if (a && g)
                            if (d = x.symbol || l.symbol, q && q.currentSymbol !== d && (q = q.destroy()), q) q[c ? "animate" : "attr"]({
                                x: t.x,
                                y: t.y
                            });
                            else d && (l.stateMarkerGraphic = q = u.renderer.symbol(d,
                                t.x, t.y, t.width, t.height).add(l.markerGroup), q.currentSymbol = d);
                        q && (q[a && u.isInsidePlot(b, e, u.inverted) ? "show" : "hide"](), q.element.point = this)
                    }(b = h.halo) && b.size ? (r || (l.halo = r = u.renderer.path().add((this.graphic || q).parentGroup)), r[c ? "animate" : "attr"]({
                        d: this.haloPath(b.size)
                    }), r.attr({
                        "class": "highcharts-halo highcharts-color-" + k(this.colorIndex, l.colorIndex)
                    }), r.point = this) : r && r.point && r.point.haloPath && r.animate({
                        d: r.point.haloPath(0)
                    });
                    this.state = a
                }
            },
            haloPath: function(a) {
                return this.series.chart.renderer.symbols.circle(Math.floor(this.plotX) -
                    a, this.plotY - a, 2 * a, 2 * a)
            }
        });
        t(u.prototype, {
            onMouseOver: function() {
                var a = this.chart,
                    c = a.hoverSeries;
                if (c && c !== this) c.onMouseOut();
                this.options.events.mouseOver && q(this, "mouseOver");
                this.setState("hover");
                a.hoverSeries = this
            },
            onMouseOut: function() {
                var a = this.options,
                    c = this.chart,
                    b = c.tooltip,
                    e = c.hoverPoint;
                c.hoverSeries = null;
                if (e) e.onMouseOut();
                this && a.events.mouseOut && q(this, "mouseOut");
                !b || this.stickyTracking || b.shared && !this.noSharedTooltip || b.hide();
                this.setState()
            },
            setState: function(a) {
                var c = this;
                a = a || "";
                c.state !== a && (n([c.group, c.markerGroup, c.dataLabelsGroup], function(b) {
                    b && (c.state && b.removeClass("highcharts-series-" + c.state), a && b.addClass("highcharts-series-" + a))
                }), c.state = a)
            },
            setVisible: function(a, c) {
                var b = this,
                    e = b.chart,
                    f = b.legendItem,
                    k, d = e.options.chart.ignoreHiddenSeries,
                    h = b.visible;
                k = (b.visible = a = b.options.visible = b.userOptions.visible = void 0 === a ? !h : a) ? "show" : "hide";
                n(["group", "dataLabelsGroup", "markerGroup", "tracker", "tt"], function(a) {
                    if (b[a]) b[a][k]()
                });
                if (e.hoverSeries === b || (e.hoverPoint &&
                        e.hoverPoint.series) === b) b.onMouseOut();
                f && e.legend.colorizeItem(b, a);
                b.isDirty = !0;
                b.options.stacking && n(e.series, function(a) {
                    a.options.stacking && a.visible && (a.isDirty = !0)
                });
                n(b.linkedSeries, function(d) {
                    d.setVisible(a, !1)
                });
                d && (e.isDirtyBox = !0);
                !1 !== c && e.redraw();
                q(b, k)
            },
            show: function() {
                this.setVisible(!0)
            },
            hide: function() {
                this.setVisible(!1)
            },
            select: function(a) {
                this.selected = a = void 0 === a ? !this.selected : a;
                this.checkbox && (this.checkbox.checked = a);
                q(this, a ? "select" : "unselect")
            },
            drawTracker: I.drawTrackerGraph
        })
    })(J);
    (function(a) {
        var B = a.Chart,
            A = a.each,
            C = a.inArray,
            E = a.isArray,
            v = a.isObject,
            f = a.pick,
            n = a.splat;
        B.prototype.setResponsive = function(f) {
            var n = this.options.responsive,
                r = [],
                h = this.currentResponsive;
            n && n.rules && A(n.rules, function(e) {
                void 0 === e._id && (e._id = a.uniqueKey());
                this.matchResponsiveRule(e, r, f)
            }, this);
            var e = a.merge.apply(0, a.map(r, function(e) {
                    return a.find(n.rules, function(a) {
                        return a._id === e
                    }).chartOptions
                })),
                r = r.toString() || void 0;
            r !== (h && h.ruleIds) && (h && this.update(h.undoOptions, f), r ? (this.currentResponsive = {
                ruleIds: r,
                mergedOptions: e,
                undoOptions: this.currentOptions(e)
            }, this.update(e, f)) : this.currentResponsive = void 0)
        };
        B.prototype.matchResponsiveRule = function(a, n) {
            var q = a.condition;
            (q.callback || function() {
                return this.chartWidth <= f(q.maxWidth, Number.MAX_VALUE) && this.chartHeight <= f(q.maxHeight, Number.MAX_VALUE) && this.chartWidth >= f(q.minWidth, 0) && this.chartHeight >= f(q.minHeight, 0)
            }).call(this) && n.push(a._id)
        };
        B.prototype.currentOptions = function(f) {
            function q(f, e, m, b) {
                var k;
                a.objectEach(f, function(a, h) {
                    if (!b &&
                        -1 < C(h, ["series", "xAxis", "yAxis"]))
                        for (f[h] = n(f[h]), m[h] = [], k = 0; k < f[h].length; k++) e[h][k] && (m[h][k] = {}, q(a[k], e[h][k], m[h][k], b + 1));
                    else v(a) ? (m[h] = E(a) ? [] : {}, q(a, e[h] || {}, m[h], b + 1)) : m[h] = e[h] || null
                })
            }
            var r = {};
            q(f, this.options, r, 0);
            return r
        }
    })(J);
    (function(a) {
        var B = a.addEvent,
            A = a.Axis,
            C = a.Chart,
            E = a.css,
            v = a.dateFormat,
            f = a.defined,
            n = a.each,
            t = a.extend,
            q = a.noop,
            r = a.timeUnits,
            h = a.wrap;
        h(a.Series.prototype, "init", function(a) {
            var e;
            a.apply(this, Array.prototype.slice.call(arguments, 1));
            (e = this.xAxis) && e.options.ordinal &&
                B(this, "updatedData", function() {
                    delete e.ordinalIndex
                })
        });
        h(A.prototype, "getTimeTicks", function(a, h, b, k, n, q, c, x) {
            var e = 0,
                m, u, p = {},
                y, l, t, d = [],
                G = -Number.MAX_VALUE,
                g = this.options.tickPixelInterval;
            if (!this.options.ordinal && !this.options.breaks || !q || 3 > q.length || void 0 === b) return a.call(this, h, b, k, n);
            l = q.length;
            for (m = 0; m < l; m++) {
                t = m && q[m - 1] > k;
                q[m] < b && (e = m);
                if (m === l - 1 || q[m + 1] - q[m] > 5 * c || t) {
                    if (q[m] > G) {
                        for (u = a.call(this, h, q[e], q[m], n); u.length && u[0] <= G;) u.shift();
                        u.length && (G = u[u.length - 1]);
                        d = d.concat(u)
                    }
                    e =
                        m + 1
                }
                if (t) break
            }
            a = u.info;
            if (x && a.unitRange <= r.hour) {
                m = d.length - 1;
                for (e = 1; e < m; e++) v("%d", d[e]) !== v("%d", d[e - 1]) && (p[d[e]] = "day", y = !0);
                y && (p[d[0]] = "day");
                a.higherRanks = p
            }
            d.info = a;
            if (x && f(g)) {
                x = a = d.length;
                m = [];
                var w;
                for (y = []; x--;) e = this.translate(d[x]), w && (y[x] = w - e), m[x] = w = e;
                y.sort();
                y = y[Math.floor(y.length / 2)];
                y < .6 * g && (y = null);
                x = d[a - 1] > k ? a - 1 : a;
                for (w = void 0; x--;) e = m[x], k = Math.abs(w - e), w && k < .8 * g && (null === y || k < .8 * y) ? (p[d[x]] && !p[d[x + 1]] ? (k = x + 1, w = e) : k = x, d.splice(k, 1)) : w = e
            }
            return d
        });
        t(A.prototype, {
            beforeSetTickPositions: function() {
                var a,
                    f = [],
                    b = !1,
                    k, h = this.getExtremes(),
                    q = h.min,
                    c = h.max,
                    x, r = this.isXAxis && !!this.options.breaks,
                    h = this.options.ordinal,
                    t = this.chart.options.chart.ignoreHiddenSeries;
                if (h || r) {
                    n(this.series, function(c, b) {
                        if (!(t && !1 === c.visible || !1 === c.takeOrdinalPosition && !r) && (f = f.concat(c.processedXData), a = f.length, f.sort(function(a, c) {
                                return a - c
                            }), a))
                            for (b = a - 1; b--;) f[b] === f[b + 1] && f.splice(b, 1)
                    });
                    a = f.length;
                    if (2 < a) {
                        k = f[1] - f[0];
                        for (x = a - 1; x-- && !b;) f[x + 1] - f[x] !== k && (b = !0);
                        !this.options.keepOrdinalPadding && (f[0] - q > k || c - f[f.length -
                            1] > k) && (b = !0)
                    }
                    b ? (this.ordinalPositions = f, k = this.ordinal2lin(Math.max(q, f[0]), !0), x = Math.max(this.ordinal2lin(Math.min(c, f[f.length - 1]), !0), 1), this.ordinalSlope = c = (c - q) / (x - k), this.ordinalOffset = q - k * c) : this.ordinalPositions = this.ordinalSlope = this.ordinalOffset = void 0
                }
                this.isOrdinal = h && b;
                this.groupIntervalFactor = null
            },
            val2lin: function(a, f) {
                var b = this.ordinalPositions;
                if (b) {
                    var e = b.length,
                        h, m;
                    for (h = e; h--;)
                        if (b[h] === a) {
                            m = h;
                            break
                        }
                    for (h = e - 1; h--;)
                        if (a > b[h] || 0 === h) {
                            a = (a - b[h]) / (b[h + 1] - b[h]);
                            m = h + a;
                            break
                        }
                    f = f ?
                        m : this.ordinalSlope * (m || 0) + this.ordinalOffset
                } else f = a;
                return f
            },
            lin2val: function(a, f) {
                var b = this.ordinalPositions;
                if (b) {
                    var e = this.ordinalSlope,
                        h = this.ordinalOffset,
                        m = b.length - 1,
                        c;
                    if (f) 0 > a ? a = b[0] : a > m ? a = b[m] : (m = Math.floor(a), c = a - m);
                    else
                        for (; m--;)
                            if (f = e * m + h, a >= f) {
                                e = e * (m + 1) + h;
                                c = (a - f) / (e - f);
                                break
                            } return void 0 !== c && void 0 !== b[m] ? b[m] + (c ? c * (b[m + 1] - b[m]) : 0) : a
                }
                return a
            },
            getExtendedPositions: function() {
                var a = this.chart,
                    f = this.series[0].currentDataGrouping,
                    b = this.ordinalIndex,
                    k = f ? f.count + f.unitName : "raw",
                    h = this.getExtremes(),
                    u, c;
                b || (b = this.ordinalIndex = {});
                b[k] || (u = {
                        series: [],
                        chart: a,
                        getExtremes: function() {
                            return {
                                min: h.dataMin,
                                max: h.dataMax
                            }
                        },
                        options: {
                            ordinal: !0
                        },
                        val2lin: A.prototype.val2lin,
                        ordinal2lin: A.prototype.ordinal2lin
                    }, n(this.series, function(b) {
                        c = {
                            xAxis: u,
                            xData: b.xData,
                            chart: a,
                            destroyGroupedData: q
                        };
                        c.options = {
                            dataGrouping: f ? {
                                enabled: !0,
                                forced: !0,
                                approximation: "open",
                                units: [
                                    [f.unitName, [f.count]]
                                ]
                            } : {
                                enabled: !1
                            }
                        };
                        b.processData.apply(c);
                        u.series.push(c)
                    }), this.beforeSetTickPositions.apply(u),
                    b[k] = u.ordinalPositions);
                return b[k]
            },
            getGroupIntervalFactor: function(a, f, b) {
                var e;
                b = b.processedXData;
                var h = b.length,
                    m = [];
                e = this.groupIntervalFactor;
                if (!e) {
                    for (e = 0; e < h - 1; e++) m[e] = b[e + 1] - b[e];
                    m.sort(function(a, b) {
                        return a - b
                    });
                    m = m[Math.floor(h / 2)];
                    a = Math.max(a, b[0]);
                    f = Math.min(f, b[h - 1]);
                    this.groupIntervalFactor = e = h * m / (f - a)
                }
                return e
            },
            postProcessTickInterval: function(a) {
                var e = this.ordinalSlope;
                return e ? this.options.breaks ? this.closestPointRange : a / (e / this.closestPointRange) : a
            }
        });
        A.prototype.ordinal2lin =
            A.prototype.val2lin;
        h(C.prototype, "pan", function(a, f) {
            var b = this.xAxis[0],
                e = f.chartX,
                h = !1;
            if (b.options.ordinal && b.series.length) {
                var m = this.mouseDownX,
                    c = b.getExtremes(),
                    q = c.dataMax,
                    r = c.min,
                    t = c.max,
                    v = this.hoverPoints,
                    p = b.closestPointRange,
                    m = (m - e) / (b.translationSlope * (b.ordinalSlope || p)),
                    y = {
                        ordinalPositions: b.getExtendedPositions()
                    },
                    p = b.lin2val,
                    l = b.val2lin,
                    D;
                y.ordinalPositions ? 1 < Math.abs(m) && (v && n(v, function(a) {
                        a.setState()
                    }), 0 > m ? (v = y, D = b.ordinalPositions ? b : y) : (v = b.ordinalPositions ? b : y, D = y), y = D.ordinalPositions,
                    q > y[y.length - 1] && y.push(q), this.fixedRange = t - r, m = b.toFixedRange(null, null, p.apply(v, [l.apply(v, [r, !0]) + m, !0]), p.apply(D, [l.apply(D, [t, !0]) + m, !0])), m.min >= Math.min(c.dataMin, r) && m.max <= Math.max(q, t) && b.setExtremes(m.min, m.max, !0, !1, {
                        trigger: "pan"
                    }), this.mouseDownX = e, E(this.container, {
                        cursor: "move"
                    })) : h = !0
            } else h = !0;
            h && a.apply(this, Array.prototype.slice.call(arguments, 1))
        })
    })(J);
    (function(a) {
        function B() {
            return Array.prototype.slice.call(arguments, 1)
        }

        function A(a) {
            a.apply(this);
            this.drawBreaks(this.xAxis, ["x"]);
            this.drawBreaks(this.yAxis, C(this.pointArrayMap, ["y"]))
        }
        var C = a.pick,
            E = a.wrap,
            v = a.each,
            f = a.extend,
            n = a.isArray,
            t = a.fireEvent,
            q = a.Axis,
            r = a.Series;
        f(q.prototype, {
            isInBreak: function(a, e) {
                var f = a.repeat || Infinity,
                    b = a.from,
                    h = a.to - a.from;
                e = e >= b ? (e - b) % f : f - (b - e) % f;
                return a.inclusive ? e <= h : e < h && 0 !== e
            },
            isInAnyBreak: function(a, e) {
                var f = this.options.breaks,
                    b = f && f.length,
                    h, q, n;
                if (b) {
                    for (; b--;) this.isInBreak(f[b], a) && (h = !0, q || (q = C(f[b].showPoints, this.isXAxis ? !1 : !0)));
                    n = h && e ? h && !q : h
                }
                return n
            }
        });
        E(q.prototype,
            "setTickPositions",
            function(a) {
                a.apply(this, Array.prototype.slice.call(arguments, 1));
                if (this.options.breaks) {
                    var e = this.tickPositions,
                        f = this.tickPositions.info,
                        b = [],
                        h;
                    for (h = 0; h < e.length; h++) this.isInAnyBreak(e[h]) || b.push(e[h]);
                    this.tickPositions = b;
                    this.tickPositions.info = f
                }
            });
        E(q.prototype, "init", function(a, e, f) {
            var b = this;
            f.breaks && f.breaks.length && (f.ordinal = !1);
            a.call(this, e, f);
            a = this.options.breaks;
            b.isBroken = n(a) && !!a.length;
            b.isBroken && (b.val2lin = function(a) {
                var e = a,
                    f, c;
                for (c = 0; c < b.breakArray.length; c++)
                    if (f =
                        b.breakArray[c], f.to <= a) e -= f.len;
                    else if (f.from >= a) break;
                else if (b.isInBreak(f, a)) {
                    e -= a - f.from;
                    break
                }
                return e
            }, b.lin2val = function(a) {
                var e, f;
                for (f = 0; f < b.breakArray.length && !(e = b.breakArray[f], e.from >= a); f++) e.to < a ? a += e.len : b.isInBreak(e, a) && (a += e.len);
                return a
            }, b.setExtremes = function(a, b, e, c, f) {
                for (; this.isInAnyBreak(a);) a -= this.closestPointRange;
                for (; this.isInAnyBreak(b);) b -= this.closestPointRange;
                q.prototype.setExtremes.call(this, a, b, e, c, f)
            }, b.setAxisTranslation = function(a) {
                q.prototype.setAxisTranslation.call(this,
                    a);
                a = b.options.breaks;
                var e = [],
                    f = [],
                    c = 0,
                    h, k, m = b.userMin || b.min,
                    n = b.userMax || b.max,
                    p = C(b.pointRangePadding, 0),
                    y, l;
                v(a, function(a) {
                    k = a.repeat || Infinity;
                    b.isInBreak(a, m) && (m += a.to % k - m % k);
                    b.isInBreak(a, n) && (n -= n % k - a.from % k)
                });
                v(a, function(a) {
                    y = a.from;
                    for (k = a.repeat || Infinity; y - k > m;) y -= k;
                    for (; y < m;) y += k;
                    for (l = y; l < n; l += k) e.push({
                        value: l,
                        move: "in"
                    }), e.push({
                        value: l + (a.to - a.from),
                        move: "out",
                        size: a.breakSize
                    })
                });
                e.sort(function(a, d) {
                    return a.value === d.value ? ("in" === a.move ? 0 : 1) - ("in" === d.move ? 0 : 1) : a.value - d.value
                });
                h = 0;
                y = m;
                v(e, function(a) {
                    h += "in" === a.move ? 1 : -1;
                    1 === h && "in" === a.move && (y = a.value);
                    0 === h && (f.push({
                        from: y,
                        to: a.value,
                        len: a.value - y - (a.size || 0)
                    }), c += a.value - y - (a.size || 0))
                });
                b.breakArray = f;
                b.unitLength = n - m - c + p;
                t(b, "afterBreaks");
                b.options.staticScale ? b.transA = b.options.staticScale : b.unitLength && (b.transA *= (n - b.min + p) / b.unitLength);
                p && (b.minPixelPadding = b.transA * b.minPointOffset);
                b.min = m;
                b.max = n
            })
        });
        E(r.prototype, "generatePoints", function(a) {
            a.apply(this, B(arguments));
            var e = this.xAxis,
                f = this.yAxis,
                b = this.points,
                h, n = b.length,
                q = this.options.connectNulls,
                c;
            if (e && f && (e.options.breaks || f.options.breaks))
                for (; n--;) h = b[n], c = null === h.y && !1 === q, c || !e.isInAnyBreak(h.x, !0) && !f.isInAnyBreak(h.y, !0) || (b.splice(n, 1), this.data[n] && this.data[n].destroyElements())
        });
        a.Series.prototype.drawBreaks = function(a, e) {
            var f = this,
                b = f.points,
                h, n, q, c;
            a && v(e, function(e) {
                h = a.breakArray || [];
                n = a.isXAxis ? a.min : C(f.options.threshold, a.min);
                v(b, function(b) {
                    c = C(b["stack" + e.toUpperCase()], b[e]);
                    v(h, function(e) {
                        q = !1;
                        if (n < e.from && c > e.to || n > e.from &&
                            c < e.from) q = "pointBreak";
                        else if (n < e.from && c > e.from && c < e.to || n > e.from && c > e.to && c < e.from) q = "pointInBreak";
                        q && t(a, q, {
                            point: b,
                            brk: e
                        })
                    })
                })
            })
        };
        a.Series.prototype.gappedPath = function() {
            var f = this.options.gapSize,
                e = this.points.slice(),
                m = e.length - 1,
                b = this.yAxis,
                k;
            if (f && 0 < m)
                for ("value" !== this.options.gapUnit && (f *= this.closestPointRange); m--;) e[m + 1].x - e[m].x > f && (k = (e[m].x + e[m + 1].x) / 2, e.splice(m + 1, 0, {
                    isNull: !0,
                    x: k
                }), this.options.stacking && (k = b.stacks[this.stackKey][k] = new a.StackItem(b, b.options.stackLabels, !1, k, this.stack), k.total = 0));
            return this.getGraphPath(e)
        };
        E(a.seriesTypes.column.prototype, "drawPoints", A);
        E(a.Series.prototype, "drawPoints", A)
    })(J);
    (function(a) {
        var B = a.arrayMax,
            A = a.arrayMin,
            C = a.Axis,
            E = a.defaultPlotOptions,
            v = a.defined,
            f = a.each,
            n = a.extend,
            t = a.format,
            q = a.isNumber,
            r = a.merge,
            h = a.pick,
            e = a.Point,
            m = a.Tooltip,
            b = a.wrap,
            k = a.Series.prototype,
            z = k.processData,
            u = k.generatePoints,
            c = k.destroy,
            x = {
                approximation: "average",
                groupPixelWidth: 2,
                dateTimeLabelFormats: {
                    millisecond: ["%A, %b %e, %H:%M:%S.%L",
                        "%A, %b %e, %H:%M:%S.%L", "-%H:%M:%S.%L"
                    ],
                    second: ["%A, %b %e, %H:%M:%S", "%A, %b %e, %H:%M:%S", "-%H:%M:%S"],
                    minute: ["%A, %b %e, %H:%M", "%A, %b %e, %H:%M", "-%H:%M"],
                    hour: ["%A, %b %e, %H:%M", "%A, %b %e, %H:%M", "-%H:%M"],
                    day: ["%A, %b %e, %Y", "%A, %b %e", "-%A, %b %e, %Y"],
                    week: ["Week from %A, %b %e, %Y", "%A, %b %e", "-%A, %b %e, %Y"],
                    month: ["%B %Y", "%B", "-%B %Y"],
                    year: ["%Y", "%Y", "-%Y"]
                }
            },
            I = {
                line: {},
                spline: {},
                area: {},
                areaspline: {},
                column: {
                    approximation: "sum",
                    groupPixelWidth: 10
                },
                arearange: {
                    approximation: "range"
                },
                areasplinerange: {
                    approximation: "range"
                },
                columnrange: {
                    approximation: "range",
                    groupPixelWidth: 10
                },
                candlestick: {
                    approximation: "ohlc",
                    groupPixelWidth: 10
                },
                ohlc: {
                    approximation: "ohlc",
                    groupPixelWidth: 5
                }
            },
            F = a.defaultDataGroupingUnits = [
                ["millisecond", [1, 2, 5, 10, 20, 25, 50, 100, 200, 500]],
                ["second", [1, 2, 5, 10, 15, 30]],
                ["minute", [1, 2, 5, 10, 15, 30]],
                ["hour", [1, 2, 3, 4, 6, 8, 12]],
                ["day", [1]],
                ["week", [1]],
                ["month", [1, 3, 6]],
                ["year", null]
            ],
            H = {
                sum: function(a) {
                    var c = a.length,
                        b;
                    if (!c && a.hasNulls) b = null;
                    else if (c)
                        for (b = 0; c--;) b +=
                            a[c];
                    return b
                },
                average: function(a) {
                    var c = a.length;
                    a = H.sum(a);
                    q(a) && c && (a /= c);
                    return a
                },
                averages: function() {
                    var a = [];
                    f(arguments, function(c) {
                        a.push(H.average(c))
                    });
                    return a
                },
                open: function(a) {
                    return a.length ? a[0] : a.hasNulls ? null : void 0
                },
                high: function(a) {
                    return a.length ? B(a) : a.hasNulls ? null : void 0
                },
                low: function(a) {
                    return a.length ? A(a) : a.hasNulls ? null : void 0
                },
                close: function(a) {
                    return a.length ? a[a.length - 1] : a.hasNulls ? null : void 0
                },
                ohlc: function(a, c, b, e) {
                    a = H.open(a);
                    c = H.high(c);
                    b = H.low(b);
                    e = H.close(e);
                    if (q(a) || q(c) || q(b) || q(e)) return [a, c, b, e]
                },
                range: function(a, c) {
                    a = H.low(a);
                    c = H.high(c);
                    if (q(a) || q(c)) return [a, c];
                    if (null === a && null === c) return null
                }
            };
        k.groupData = function(a, c, b, e) {
            var d = this.data,
                h = this.options.data,
                g = [],
                k = [],
                l = [],
                p = a.length,
                m, n, y = !!c,
                r = [];
            e = "function" === typeof e ? e : H[e] || I[this.type] && H[I[this.type].approximation] || H[x.approximation];
            var u = this.pointArrayMap,
                t = u && u.length,
                v = 0;
            n = 0;
            var D, z;
            t ? f(u, function() {
                r.push([])
            }) : r.push([]);
            D = t || 1;
            for (z = 0; z <= p && !(a[z] >= b[0]); z++);
            for (z; z <= p; z++) {
                for (; void 0 !==
                    b[v + 1] && a[z] >= b[v + 1] || z === p;) {
                    m = b[v];
                    this.dataGroupInfo = {
                        start: n,
                        length: r[0].length
                    };
                    n = e.apply(this, r);
                    void 0 !== n && (g.push(m), k.push(n), l.push(this.dataGroupInfo));
                    n = z;
                    for (m = 0; m < D; m++) r[m].length = 0, r[m].hasNulls = !1;
                    v += 1;
                    if (z === p) break
                }
                if (z === p) break;
                if (u) {
                    m = this.cropStart + z;
                    var A = d && d[m] || this.pointClass.prototype.applyOptions.apply({
                            series: this
                        }, [h[m]]),
                        F;
                    for (m = 0; m < t; m++) F = A[u[m]], q(F) ? r[m].push(F) : null === F && (r[m].hasNulls = !0)
                } else m = y ? c[z] : null, q(m) ? r[0].push(m) : null === m && (r[0].hasNulls = !0)
            }
            return [g,
                k, l
            ]
        };
        k.processData = function() {
            var a = this.chart,
                c = this.options.dataGrouping,
                b = !1 !== this.allowDG && c && h(c.enabled, a.options.isStock),
                e = this.visible || !a.options.chart.ignoreHiddenSeries,
                d;
            this.forceCrop = b;
            this.groupPixelWidth = null;
            this.hasProcessed = !0;
            if (!1 !== z.apply(this, arguments) && b) {
                this.destroyGroupedData();
                var f = this.processedXData,
                    g = this.processedYData,
                    m = a.plotSizeX,
                    a = this.xAxis,
                    n = a.options.ordinal,
                    q = this.groupPixelWidth = a.getGroupPixelWidth && a.getGroupPixelWidth();
                if (q) {
                    this.isDirty = d = !0;
                    this.points =
                        null;
                    var x = a.getExtremes(),
                        b = x.min,
                        x = x.max,
                        n = n && a.getGroupIntervalFactor(b, x, this) || 1,
                        m = q * (x - b) / m * n,
                        q = a.getTimeTicks(a.normalizeTimeTickInterval(m, c.units || F), Math.min(b, f[0]), Math.max(x, f[f.length - 1]), a.options.startOfWeek, f, this.closestPointRange),
                        f = k.groupData.apply(this, [f, g, q, c.approximation]),
                        g = f[0],
                        n = f[1];
                    if (c.smoothed) {
                        c = g.length - 1;
                        for (g[c] = Math.min(g[c], x); c-- && 0 < c;) g[c] += m / 2;
                        g[0] = Math.max(g[0], b)
                    }
                    this.currentDataGrouping = q.info;
                    this.closestPointRange = q.info.totalRange;
                    this.groupMap = f[2];
                    v(g[0]) && g[0] < a.dataMin && e && (a.min === a.dataMin && (a.min = g[0]), a.dataMin = g[0]);
                    this.processedXData = g;
                    this.processedYData = n
                } else this.currentDataGrouping = this.groupMap = null;
                this.hasGroupedData = d
            }
        };
        k.destroyGroupedData = function() {
            var a = this.groupedData;
            f(a || [], function(c, b) {
                c && (a[b] = c.destroy ? c.destroy() : null)
            });
            this.groupedData = null
        };
        k.generatePoints = function() {
            u.apply(this);
            this.destroyGroupedData();
            this.groupedData = this.hasGroupedData ? this.points : null
        };
        b(e.prototype, "update", function(c) {
            this.dataGroup ?
                a.error(24) : c.apply(this, [].slice.call(arguments, 1))
        });
        b(m.prototype, "tooltipFooterHeaderFormatter", function(c, b, e) {
            var f = b.series,
                d = f.tooltipOptions,
                h = f.options.dataGrouping,
                g = d.xDateFormat,
                k, l = f.xAxis,
                p = a.dateFormat;
            return l && "datetime" === l.options.type && h && q(b.key) ? (c = f.currentDataGrouping, h = h.dateTimeLabelFormats, c ? (l = h[c.unitName], 1 === c.count ? g = l[0] : (g = l[1], k = l[2])) : !g && h && (g = this.getXDateFormat(b, d, l)), g = p(g, b.key), k && (g += p(k, b.key + c.totalRange - 1)), t(d[(e ? "footer" : "header") + "Format"], {
                point: n(b.point, {
                    key: g
                }),
                series: f
            })) : c.call(this, b, e)
        });
        k.destroy = function() {
            for (var a = this.groupedData || [], b = a.length; b--;) a[b] && a[b].destroy();
            c.apply(this)
        };
        b(k, "setOptions", function(a, c) {
            a = a.call(this, c);
            var b = this.type,
                e = this.chart.options.plotOptions,
                d = E[b].dataGrouping;
            I[b] && (d || (d = r(x, I[b])), a.dataGrouping = r(d, e.series && e.series.dataGrouping, e[b].dataGrouping, c.dataGrouping));
            this.chart.options.isStock && (this.requireSorting = !0);
            return a
        });
        b(C.prototype, "setScale", function(a) {
            a.call(this);
            f(this.series, function(a) {
                a.hasProcessed = !1
            })
        });
        C.prototype.getGroupPixelWidth = function() {
            var a = this.series,
                c = a.length,
                b, e = 0,
                d = !1,
                f;
            for (b = c; b--;)(f = a[b].options.dataGrouping) && (e = Math.max(e, f.groupPixelWidth));
            for (b = c; b--;)(f = a[b].options.dataGrouping) && a[b].hasProcessed && (c = (a[b].processedXData || a[b].data).length, a[b].groupPixelWidth || c > this.chart.plotSizeX / e || c && f.forced) && (d = !0);
            return d ? e : 0
        };
        C.prototype.setDataGrouping = function(a, c) {
            var b;
            c = h(c, !0);
            a || (a = {
                forced: !1,
                units: null
            });
            if (this instanceof C)
                for (b = this.series.length; b--;) this.series[b].update({
                    dataGrouping: a
                }, !1);
            else f(this.chart.options.series, function(c) {
                c.dataGrouping = a
            }, !1);
            c && this.chart.redraw()
        }
    })(J);
    (function(a) {
        var B = a.each,
            A = a.Point,
            C = a.seriesType,
            E = a.seriesTypes;
        C("ohlc", "column", {
            lineWidth: 1,
            tooltip: {
                pointFormat: '\x3cspan class\x3d"highcharts-color-{point.colorIndex}"\x3e\u25cf\x3c/span\x3e \x3cb\x3e {series.name}\x3c/b\x3e\x3cbr/\x3eOpen: {point.open}\x3cbr/\x3eHigh: {point.high}\x3cbr/\x3eLow: {point.low}\x3cbr/\x3eClose: {point.close}\x3cbr/\x3e'
            },
            threshold: null
        }, {
            directTouch: !1,
            pointArrayMap: ["open",
                "high", "low", "close"
            ],
            toYData: function(a) {
                return [a.open, a.high, a.low, a.close]
            },
            pointValKey: "close",
            translate: function() {
                var a = this,
                    f = a.yAxis,
                    n = !!a.modifyValue,
                    t = ["plotOpen", "plotHigh", "plotLow", "plotClose", "yBottom"];
                E.column.prototype.translate.apply(a);
                B(a.points, function(q) {
                    B([q.open, q.high, q.low, q.close, q.low], function(r, h) {
                        null !== r && (n && (r = a.modifyValue(r)), q[t[h]] = f.toPixels(r, !0))
                    });
                    q.tooltipPos[1] = q.plotHigh + f.pos - a.chart.plotTop
                })
            },
            drawPoints: function() {
                var a = this,
                    f = a.chart;
                B(a.points, function(n) {
                    var t,
                        q, r, h, e = n.graphic,
                        m, b = !e;
                    void 0 !== n.plotY && (e || (n.graphic = e = f.renderer.path().add(a.group)), q = e.strokeWidth() % 2 / 2, m = Math.round(n.plotX) - q, r = Math.round(n.shapeArgs.width / 2), h = ["M", m, Math.round(n.yBottom), "L", m, Math.round(n.plotHigh)], null !== n.open && (t = Math.round(n.plotOpen) + q, h.push("M", m, t, "L", m - r, t)), null !== n.close && (t = Math.round(n.plotClose) + q, h.push("M", m, t, "L", m + r, t)), e[b ? "attr" : "animate"]({
                        d: h
                    }).addClass(n.getClassName(), !0))
                })
            },
            animate: null
        }, {
            getClassName: function() {
                return A.prototype.getClassName.call(this) +
                    (this.open < this.close ? " highcharts-point-up" : " highcharts-point-down")
            }
        })
    })(J);
    (function(a) {
        var B = a.defaultPlotOptions,
            A = a.each,
            C = a.merge;
        a = a.seriesType;
        a("candlestick", "ohlc", C(B.column, {
            states: {
                hover: {
                    lineWidth: 2
                }
            },
            tooltip: B.ohlc.tooltip,
            threshold: null
        }), {
            drawPoints: function() {
                var a = this,
                    v = a.chart;
                A(a.points, function(f) {
                    var n = f.graphic,
                        t, q, r, h, e, m, b, k = !n;
                    void 0 !== f.plotY && (n || (f.graphic = n = v.renderer.path().add(a.group)), e = n.strokeWidth() % 2 / 2, m = Math.round(f.plotX) - e, t = f.plotOpen, q = f.plotClose, r =
                        Math.min(t, q), t = Math.max(t, q), b = Math.round(f.shapeArgs.width / 2), q = Math.round(r) !== Math.round(f.plotHigh), h = t !== f.yBottom, r = Math.round(r) + e, t = Math.round(t) + e, e = [], e.push("M", m - b, t, "L", m - b, r, "L", m + b, r, "L", m + b, t, "Z", "M", m, r, "L", m, q ? Math.round(f.plotHigh) : r, "M", m, t, "L", m, h ? Math.round(f.yBottom) : t), n[k ? "attr" : "animate"]({
                            d: e
                        }).addClass(f.getClassName(), !0))
                })
            }
        })
    })(J);
    (function(a) {
        var B = a.addEvent,
            A = a.each,
            C = a.noop,
            E = a.seriesType,
            v = a.seriesTypes,
            f = a.TrackerMixin,
            n = a.SVGRenderer.prototype.symbols,
            t = a.stableSort;
        E("flags", "column", {
            pointRange: 0,
            shape: "flag",
            stackDistance: 12,
            textAlign: "center",
            tooltip: {
                pointFormat: "{point.text}\x3cbr/\x3e"
            },
            threshold: null,
            y: -30
        }, {
            sorted: !1,
            noSharedTooltip: !0,
            allowDG: !1,
            takeOrdinalPosition: !1,
            trackerGroups: ["markerGroup"],
            forceCrop: !0,
            init: a.Series.prototype.init,
            translate: function() {
                v.column.prototype.translate.apply(this);
                var a = this.options,
                    f = this.chart,
                    h = this.points,
                    e = h.length - 1,
                    m, b, k = a.onSeries;
                m = k && f.get(k);
                var a = a.onKey || "y",
                    k = m && m.options.step,
                    n = m && m.points,
                    u = n && n.length,
                    c = this.xAxis,
                    x = this.yAxis,
                    B = c.getExtremes(),
                    F = 0,
                    C, p, y;
                if (m && m.visible && u)
                    for (F = (m.pointXOffset || 0) + (m.barW || 0) / 2, m = m.currentDataGrouping, p = n[u - 1].x + (m ? m.totalRange : 0), t(h, function(a, c) {
                            return a.x - c.x
                        }), a = "plot" + a[0].toUpperCase() + a.substr(1); u-- && h[e] && !(m = h[e], C = n[u], C.x <= m.x && void 0 !== C[a] && (m.x <= p && (m.plotY = C[a], C.x < m.x && !k && (y = n[u + 1]) && void 0 !== y[a] && (m.plotY += (m.x - C.x) / (y.x - C.x) * (y[a] - C[a]))), e--, u++, 0 > e)););
                A(h, function(a, e) {
                    var d;
                    void 0 === a.plotY && (a.x >= B.min && a.x <= B.max ? a.plotY = f.chartHeight -
                        c.bottom - (c.opposite ? c.height : 0) + c.offset - x.top : a.shapeArgs = {});
                    a.plotX += F;
                    (b = h[e - 1]) && b.plotX === a.plotX && (void 0 === b.stackIndex && (b.stackIndex = 0), d = b.stackIndex + 1);
                    a.stackIndex = d
                })
            },
            drawPoints: function() {
                var f = this.points,
                    n = this.chart,
                    h = n.renderer,
                    e, m, b = this.options,
                    k = b.y,
                    t, u, c, x, v, A, B, p = this.yAxis;
                for (u = f.length; u--;) c = f[u], B = c.plotX > this.xAxis.len, e = c.plotX, x = c.stackIndex, t = c.options.shape || b.shape, m = c.plotY, void 0 !== m && (m = c.plotY + k - (void 0 !== x && x * b.stackDistance)), v = x ? void 0 : c.plotX, A = x ? void 0 :
                    c.plotY, x = c.graphic, void 0 !== m && 0 <= e && !B ? (x || (x = c.graphic = h.label("", null, null, t, null, null, b.useHTML).attr({
                        align: "flag" === t ? "left" : "center",
                        width: b.width,
                        height: b.height,
                        "text-align": b.textAlign
                    }).addClass("highcharts-point").add(this.markerGroup), c.graphic.div && (c.graphic.div.point = c)), 0 < e && (e -= x.strokeWidth() % 2), x.attr({
                        text: c.options.title || b.title || "A",
                        x: e,
                        y: m,
                        anchorX: v,
                        anchorY: A
                    }), c.tooltipPos = n.inverted ? [p.len + p.pos - n.plotLeft - m, this.xAxis.len - e] : [e, m + p.pos - n.plotTop]) : x && (c.graphic = x.destroy());
                b.useHTML && a.wrap(this.markerGroup, "on", function(c) {
                    return a.SVGElement.prototype.on.apply(c.apply(this, [].slice.call(arguments, 1)), [].slice.call(arguments, 1))
                })
            },
            drawTracker: function() {
                var a = this.points;
                f.drawTrackerPoint.apply(this);
                A(a, function(f) {
                    var h = f.graphic;
                    h && B(h.element, "mouseover", function() {
                        0 < f.stackIndex && !f.raised && (f._y = h.y, h.attr({
                            y: f._y - 8
                        }), f.raised = !0);
                        A(a, function(a) {
                            a !== f && a.raised && a.graphic && (a.graphic.attr({
                                y: a._y
                            }), a.raised = !1)
                        })
                    })
                })
            },
            animate: C,
            buildKDTree: C,
            setClip: C
        });
        n.flag =
            function(a, f, h, e, m) {
                return ["M", m && m.anchorX || a, m && m.anchorY || f, "L", a, f + e, a, f, a + h, f, a + h, f + e, a, f + e, "Z"]
            };
        A(["circle", "square"], function(a) {
            n[a + "pin"] = function(f, h, e, m, b) {
                var k = b && b.anchorX;
                b = b && b.anchorY;
                "circle" === a && m > e && (f -= Math.round((m - e) / 2), e = m);
                f = n[a](f, h, e, m);
                k && b && f.push("M", k, h > b ? h : h + m, "L", k, b);
                return f
            }
        })
    })(J);
    (function(a) {
        function B(a, b, e) {
            this.init(a, b, e)
        }
        var A = a.addEvent,
            C = a.Axis,
            E = a.correctFloat,
            v = a.defaultOptions,
            f = a.defined,
            n = a.destroyObjectProperties,
            t = a.each,
            q = a.fireEvent,
            r = a.hasTouch,
            h = a.isTouchDevice,
            e = a.merge,
            m = a.pick,
            b = a.removeEvent,
            k = a.wrap,
            z, u = {
                height: h ? 20 : 14,
                barBorderRadius: 0,
                buttonBorderRadius: 0,
                liveRedraw: a.svg && !h,
                margin: 10,
                minWidth: 6,
                step: .2,
                zIndex: 3
            };
        v.scrollbar = e(!0, u, v.scrollbar);
        a.swapXY = z = function(a, b) {
            var c = a.length,
                e;
            if (b)
                for (b = 0; b < c; b += 3) e = a[b + 1], a[b + 1] = a[b + 2], a[b + 2] = e;
            return a
        };
        B.prototype = {
            init: function(a, b, f) {
                this.scrollbarButtons = [];
                this.renderer = a;
                this.userOptions = b;
                this.options = e(u, b);
                this.chart = f;
                this.size = m(this.options.size, this.options.height);
                b.enabled &&
                    (this.render(), this.initEvents(), this.addEvents())
            },
            render: function() {
                var a = this.renderer,
                    b = this.options,
                    e = this.size,
                    f;
                this.group = f = a.g("scrollbar").attr({
                    zIndex: b.zIndex,
                    translateY: -99999
                }).add();
                this.track = a.rect().addClass("highcharts-scrollbar-track").attr({
                    x: 0,
                    r: b.trackBorderRadius || 0,
                    height: e,
                    width: e
                }).add(f);
                this.trackBorderWidth = this.track.strokeWidth();
                this.track.attr({
                    y: -this.trackBorderWidth % 2 / 2
                });
                this.scrollbarGroup = a.g().add(f);
                this.scrollbar = a.rect().addClass("highcharts-scrollbar-thumb").attr({
                    height: e,
                    width: e,
                    r: b.barBorderRadius || 0
                }).add(this.scrollbarGroup);
                this.scrollbarRifles = a.path(z(["M", -3, e / 4, "L", -3, 2 * e / 3, "M", 0, e / 4, "L", 0, 2 * e / 3, "M", 3, e / 4, "L", 3, 2 * e / 3], b.vertical)).addClass("highcharts-scrollbar-rifles").add(this.scrollbarGroup);
                this.scrollbarStrokeWidth = this.scrollbar.strokeWidth();
                this.scrollbarGroup.translate(-this.scrollbarStrokeWidth % 2 / 2, -this.scrollbarStrokeWidth % 2 / 2);
                this.drawScrollbarButton(0);
                this.drawScrollbarButton(1)
            },
            position: function(a, b, e, f) {
                var c = this.options.vertical,
                    h = 0,
                    k =
                    this.rendered ? "animate" : "attr";
                this.x = a;
                this.y = b + this.trackBorderWidth;
                this.width = e;
                this.xOffset = this.height = f;
                this.yOffset = h;
                c ? (this.width = this.yOffset = e = h = this.size, this.xOffset = b = 0, this.barWidth = f - 2 * e, this.x = a += this.options.margin) : (this.height = this.xOffset = f = b = this.size, this.barWidth = e - 2 * f, this.y += this.options.margin);
                this.group[k]({
                    translateX: a,
                    translateY: this.y
                });
                this.track[k]({
                    width: e,
                    height: f
                });
                this.scrollbarButtons[1][k]({
                    translateX: c ? 0 : e - b,
                    translateY: c ? f - h : 0
                })
            },
            drawScrollbarButton: function(a) {
                var c =
                    this.renderer,
                    b = this.scrollbarButtons,
                    e = this.options,
                    f = this.size,
                    h;
                h = c.g().add(this.group);
                b.push(h);
                h = c.rect().addClass("highcharts-scrollbar-button").add(h);
                h.attr(h.crisp({
                    x: -.5,
                    y: -.5,
                    width: f + 1,
                    height: f + 1,
                    r: e.buttonBorderRadius
                }, h.strokeWidth()));
                c.path(z(["M", f / 2 + (a ? -1 : 1), f / 2 - 3, "L", f / 2 + (a ? -1 : 1), f / 2 + 3, "L", f / 2 + (a ? 2 : -2), f / 2], e.vertical)).addClass("highcharts-scrollbar-arrow").add(b[a])
            },
            setRange: function(a, b) {
                var c = this.options,
                    e = c.vertical,
                    h = c.minWidth,
                    k = this.barWidth,
                    m, l, n = this.rendered && !this.hasDragged ?
                    "animate" : "attr";
                f(k) && (a = Math.max(a, 0), m = Math.ceil(k * a), this.calculatedWidth = l = E(k * Math.min(b, 1) - m), l < h && (m = (k - h + l) * a, l = h), h = Math.floor(m + this.xOffset + this.yOffset), k = l / 2 - .5, this.from = a, this.to = b, e ? (this.scrollbarGroup[n]({
                        translateY: h
                    }), this.scrollbar[n]({
                        height: l
                    }), this.scrollbarRifles[n]({
                        translateY: k
                    }), this.scrollbarTop = h, this.scrollbarLeft = 0) : (this.scrollbarGroup[n]({
                        translateX: h
                    }), this.scrollbar[n]({
                        width: l
                    }), this.scrollbarRifles[n]({
                        translateX: k
                    }), this.scrollbarLeft = h, this.scrollbarTop = 0),
                    12 >= l ? this.scrollbarRifles.hide() : this.scrollbarRifles.show(!0), !1 === c.showFull && (0 >= a && 1 <= b ? this.group.hide() : this.group.show()), this.rendered = !0)
            },
            initEvents: function() {
                var a = this;
                a.mouseMoveHandler = function(b) {
                    var c = a.chart.pointer.normalize(b),
                        e = a.options.vertical ? "chartY" : "chartX",
                        f = a.initPositions;
                    !a.grabbedCenter || b.touches && 0 === b.touches[0][e] || (c = a.cursorToScrollbarPosition(c)[e], e = a[e], e = c - e, a.hasDragged = !0, a.updatePosition(f[0] + e, f[1] + e), a.hasDragged && q(a, "changed", {
                        from: a.from,
                        to: a.to,
                        trigger: "scrollbar",
                        DOMType: b.type,
                        DOMEvent: b
                    }))
                };
                a.mouseUpHandler = function(b) {
                    a.hasDragged && q(a, "changed", {
                        from: a.from,
                        to: a.to,
                        trigger: "scrollbar",
                        DOMType: b.type,
                        DOMEvent: b
                    });
                    a.grabbedCenter = a.hasDragged = a.chartX = a.chartY = null
                };
                a.mouseDownHandler = function(b) {
                    b = a.chart.pointer.normalize(b);
                    b = a.cursorToScrollbarPosition(b);
                    a.chartX = b.chartX;
                    a.chartY = b.chartY;
                    a.initPositions = [a.from, a.to];
                    a.grabbedCenter = !0
                };
                a.buttonToMinClick = function(b) {
                    var c = E(a.to - a.from) * a.options.step;
                    a.updatePosition(E(a.from -
                        c), E(a.to - c));
                    q(a, "changed", {
                        from: a.from,
                        to: a.to,
                        trigger: "scrollbar",
                        DOMEvent: b
                    })
                };
                a.buttonToMaxClick = function(b) {
                    var c = (a.to - a.from) * a.options.step;
                    a.updatePosition(a.from + c, a.to + c);
                    q(a, "changed", {
                        from: a.from,
                        to: a.to,
                        trigger: "scrollbar",
                        DOMEvent: b
                    })
                };
                a.trackClick = function(b) {
                    var c = a.chart.pointer.normalize(b),
                        e = a.to - a.from,
                        f = a.y + a.scrollbarTop,
                        h = a.x + a.scrollbarLeft;
                    a.options.vertical && c.chartY > f || !a.options.vertical && c.chartX > h ? a.updatePosition(a.from + e, a.to + e) : a.updatePosition(a.from - e, a.to - e);
                    q(a, "changed", {
                        from: a.from,
                        to: a.to,
                        trigger: "scrollbar",
                        DOMEvent: b
                    })
                }
            },
            cursorToScrollbarPosition: function(a) {
                var b = this.options,
                    b = b.minWidth > this.calculatedWidth ? b.minWidth : 0;
                return {
                    chartX: (a.chartX - this.x - this.xOffset) / (this.barWidth - b),
                    chartY: (a.chartY - this.y - this.yOffset) / (this.barWidth - b)
                }
            },
            updatePosition: function(a, b) {
                1 < b && (a = E(1 - E(b - a)), b = 1);
                0 > a && (b = E(b - a), a = 0);
                this.from = a;
                this.to = b
            },
            update: function(a) {
                this.destroy();
                this.init(this.chart.renderer, e(!0, this.options, a), this.chart)
            },
            addEvents: function() {
                var a =
                    this.options.inverted ? [1, 0] : [0, 1],
                    b = this.scrollbarButtons,
                    e = this.scrollbarGroup.element,
                    f = this.mouseDownHandler,
                    h = this.mouseMoveHandler,
                    k = this.mouseUpHandler,
                    a = [
                        [b[a[0]].element, "click", this.buttonToMinClick],
                        [b[a[1]].element, "click", this.buttonToMaxClick],
                        [this.track.element, "click", this.trackClick],
                        [e, "mousedown", f],
                        [e.ownerDocument, "mousemove", h],
                        [e.ownerDocument, "mouseup", k]
                    ];
                r && a.push([e, "touchstart", f], [e.ownerDocument, "touchmove", h], [e.ownerDocument, "touchend", k]);
                t(a, function(a) {
                    A.apply(null,
                        a)
                });
                this._events = a
            },
            removeEvents: function() {
                t(this._events, function(a) {
                    b.apply(null, a)
                });
                this._events.length = 0
            },
            destroy: function() {
                var a = this.chart.scroller;
                this.removeEvents();
                t(["track", "scrollbarRifles", "scrollbar", "scrollbarGroup", "group"], function(a) {
                    this[a] && this[a].destroy && (this[a] = this[a].destroy())
                }, this);
                a && this === a.scrollbar && (a.scrollbar = null, n(a.scrollbarButtons))
            }
        };
        k(C.prototype, "init", function(a) {
            var b = this;
            a.apply(b, Array.prototype.slice.call(arguments, 1));
            b.options.scrollbar && b.options.scrollbar.enabled &&
                (b.options.scrollbar.vertical = !b.horiz, b.options.startOnTick = b.options.endOnTick = !1, b.scrollbar = new B(b.chart.renderer, b.options.scrollbar, b.chart), A(b.scrollbar, "changed", function(a) {
                    var c = Math.min(m(b.options.min, b.min), b.min, b.dataMin),
                        e = Math.max(m(b.options.max, b.max), b.max, b.dataMax) - c,
                        f;
                    b.horiz && !b.reversed || !b.horiz && b.reversed ? (f = c + e * this.to, c += e * this.from) : (f = c + e * (1 - this.from), c += e * (1 - this.to));
                    b.setExtremes(c, f, !0, !1, a)
                }))
        });
        k(C.prototype, "render", function(a) {
            var b = Math.min(m(this.options.min,
                    this.min), this.min, m(this.dataMin, this.min)),
                c = Math.max(m(this.options.max, this.max), this.max, m(this.dataMax, this.max)),
                e = this.scrollbar,
                h = this.titleOffset || 0;
            a.apply(this, Array.prototype.slice.call(arguments, 1));
            if (e) {
                this.horiz ? (e.position(this.left, this.top + this.height + 2 + this.chart.scrollbarsOffsets[1] + (this.opposite ? 0 : h + this.axisTitleMargin + this.offset), this.width, this.height), h = 1) : (e.position(this.left + this.width + 2 + this.chart.scrollbarsOffsets[0] + (this.opposite ? h + this.axisTitleMargin + this.offset :
                    0), this.top, this.width, this.height), h = 0);
                if (!this.opposite && !this.horiz || this.opposite && this.horiz) this.chart.scrollbarsOffsets[h] += this.scrollbar.size + this.scrollbar.options.margin;
                isNaN(b) || isNaN(c) || !f(this.min) || !f(this.max) ? e.setRange(0, 0) : (h = (this.min - b) / (c - b), b = (this.max - b) / (c - b), this.horiz && !this.reversed || !this.horiz && this.reversed ? e.setRange(h, b) : e.setRange(1 - b, 1 - h))
            }
        });
        k(C.prototype, "getOffset", function(a) {
            var b = this.horiz ? 2 : 1,
                c = this.scrollbar;
            a.apply(this, Array.prototype.slice.call(arguments,
                1));
            c && (this.chart.scrollbarsOffsets = [0, 0], this.chart.axisOffset[b] += c.size + c.options.margin)
        });
        k(C.prototype, "destroy", function(a) {
            this.scrollbar && (this.scrollbar = this.scrollbar.destroy());
            a.apply(this, Array.prototype.slice.call(arguments, 1))
        });
        a.Scrollbar = B
    })(J);
    (function(a) {
        function B(a) {
            this.init(a)
        }
        var A = a.addEvent,
            C = a.Axis,
            E = a.Chart,
            v = a.defaultOptions,
            f = a.defined,
            n = a.destroyObjectProperties,
            t = a.each,
            q = a.erase,
            r = a.error,
            h = a.extend,
            e = a.grep,
            m = a.hasTouch,
            b = a.isArray,
            k = a.isNumber,
            z = a.isObject,
            u =
            a.merge,
            c = a.pick,
            x = a.removeEvent,
            I = a.Scrollbar,
            F = a.Series,
            H = a.seriesTypes,
            p = a.wrap,
            y = a.swapXY,
            l = [].concat(a.defaultDataGroupingUnits),
            D = function(a) {
                var b = e(arguments, k);
                if (b.length) return Math[a].apply(0, b)
            };
        l[4] = ["day", [1, 2, 3, 4]];
        l[5] = ["week", [1, 2, 3]];
        h(v, {
            navigator: {
                height: 40,
                margin: 25,
                maskInside: !0,
                series: {
                    type: void 0 === H.areaspline ? "line" : "areaspline",
                    compare: null,
                    dataGrouping: {
                        approximation: "average",
                        enabled: !0,
                        groupPixelWidth: 2,
                        smoothed: !0,
                        units: l
                    },
                    dataLabels: {
                        enabled: !1,
                        zIndex: 2
                    },
                    id: "highcharts-navigator-series",
                    className: "highcharts-navigator-series",
                    lineColor: null,
                    marker: {
                        enabled: !1
                    },
                    pointRange: 0,
                    shadow: !1,
                    threshold: null
                },
                xAxis: {
                    className: "highcharts-navigator-xaxis",
                    tickLength: 0,
                    tickPixelInterval: 200,
                    labels: {
                        align: "left",
                        x: 3,
                        y: -4
                    },
                    crosshair: !1
                },
                yAxis: {
                    className: "highcharts-navigator-yaxis",
                    startOnTick: !1,
                    endOnTick: !1,
                    minPadding: .1,
                    maxPadding: .1,
                    labels: {
                        enabled: !1
                    },
                    crosshair: !1,
                    title: {
                        text: null
                    },
                    tickLength: 0,
                    tickWidth: 0
                }
            }
        });
        B.prototype = {
            drawHandle: function(a, b, c, e) {
                this.handles[b][e](c ? {
                    translateX: Math.round(this.left +
                        this.height / 2 - 8),
                    translateY: Math.round(this.top + parseInt(a, 10) + .5)
                } : {
                    translateX: Math.round(this.left + parseInt(a, 10)),
                    translateY: Math.round(this.top + this.height / 2 - 8)
                })
            },
            getHandlePath: function(a) {
                return y(["M", -4.5, .5, "L", 3.5, .5, "L", 3.5, 15.5, "L", -4.5, 15.5, "L", -4.5, .5, "M", -1.5, 4, "L", -1.5, 12, "M", .5, 4, "L", .5, 12], a)
            },
            drawOutline: function(a, b, c, e) {
                var d = this.navigatorOptions.maskInside,
                    g = this.outline.strokeWidth(),
                    f = g / 2,
                    g = g % 2 / 2,
                    h = this.outlineHeight,
                    k = this.scrollbarHeight,
                    l = this.size,
                    m = this.left - k,
                    p = this.top;
                c ? (m -= f, c = p + b + g, b = p + a + g, a = ["M", m + h, p - k - g, "L", m + h, c, "L", m, c, "L", m, b, "L", m + h, b, "L", m + h, p + l + k].concat(d ? ["M", m + h, c - f, "L", m + h, b + f] : [])) : (a += m + k - g, b += m + k - g, p += f, a = ["M", m, p, "L", a, p, "L", a, p + h, "L", b, p + h, "L", b, p, "L", m + l + 2 * k, p].concat(d ? ["M", a - f, p, "L", b + f, p] : []));
                this.outline[e]({
                    d: a
                })
            },
            drawMasks: function(a, b, c, e) {
                var d = this.left,
                    g = this.top,
                    f = this.height,
                    h, k, l, m;
                c ? (l = [d, d, d], m = [g, g + a, g + b], k = [f, f, f], h = [a, b - a, this.size - b]) : (l = [d, d + a, d + b], m = [g, g, g], k = [a, b - a, this.size - b], h = [f, f, f]);
                t(this.shades, function(a, b) {
                    a[e]({
                        x: l[b],
                        y: m[b],
                        width: k[b],
                        height: h[b]
                    })
                })
            },
            renderElements: function() {
                var a = this,
                    b = a.navigatorOptions.maskInside,
                    c = a.chart,
                    e = c.inverted,
                    f = c.renderer,
                    h;
                a.navigatorGroup = h = f.g("navigator").attr({
                    zIndex: 8,
                    visibility: "hidden"
                }).add();
                t([!b, b, !b], function(b, d) {
                    a.shades[d] = f.rect().addClass("highcharts-navigator-mask" + (1 === d ? "-inside" : "-outside")).add(h)
                });
                a.outline = f.path().addClass("highcharts-navigator-outline").add(h);
                t([0, 1], function(b) {
                    a.handles[b] = f.path(a.getHandlePath(e)).attr({
                        zIndex: 7 - b
                    }).addClass("highcharts-navigator-handle highcharts-navigator-handle-" + ["left", "right"][b]).add(h)
                })
            },
            update: function(a) {
                t(this.series || [], function(a) {
                    a.baseSeries && delete a.baseSeries.navigatorSeries
                });
                this.destroy();
                u(!0, this.chart.options.navigator, this.options, a);
                this.init(this.chart)
            },
            render: function(a, b, e, h) {
                var d = this.chart,
                    g, l, m = this.scrollbarHeight,
                    p, n = this.xAxis;
                g = n.fake ? d.xAxis[0] : n;
                var q = this.navigatorEnabled,
                    w, y = this.rendered;
                l = d.inverted;
                var r = d.xAxis[0].minRange;
                if (!this.hasDragged || f(e)) {
                    if (!k(a) || !k(b))
                        if (y) e = 0, h = n.width;
                        else return;
                    this.left = c(n.left,
                        d.plotLeft + m + (l ? d.plotWidth : 0));
                    this.size = w = p = c(n.len, (l ? d.plotHeight : d.plotWidth) - 2 * m);
                    d = l ? m : p + 2 * m;
                    e = c(e, n.toPixels(a, !0));
                    h = c(h, n.toPixels(b, !0));
                    k(e) && Infinity !== Math.abs(e) || (e = 0, h = d);
                    a = n.toValue(e, !0);
                    b = n.toValue(h, !0);
                    if (Math.abs(b - a) < r)
                        if (this.grabbedLeft) e = n.toPixels(b - r, !0);
                        else if (this.grabbedRight) h = n.toPixels(a + r, !0);
                    else return;
                    this.zoomedMax = Math.min(Math.max(e, h, 0), w);
                    this.zoomedMin = Math.min(Math.max(this.fixedWidth ? this.zoomedMax - this.fixedWidth : Math.min(e, h), 0), w);
                    this.range = this.zoomedMax -
                        this.zoomedMin;
                    w = Math.round(this.zoomedMax);
                    e = Math.round(this.zoomedMin);
                    q && (this.navigatorGroup.attr({
                        visibility: "visible"
                    }), y = y && !this.hasDragged ? "animate" : "attr", this.drawMasks(e, w, l, y), this.drawOutline(e, w, l, y), this.drawHandle(e, 0, l, y), this.drawHandle(w, 1, l, y));
                    this.scrollbar && (l ? (l = this.top - m, g = this.left - m + (q || !g.opposite ? 0 : (g.titleOffset || 0) + g.axisTitleMargin), m = p + 2 * m) : (l = this.top + (q ? this.height : -m), g = this.left - m), this.scrollbar.position(g, l, d, m), this.scrollbar.setRange(this.zoomedMin / p, this.zoomedMax /
                        p));
                    this.rendered = !0
                }
            },
            addMouseEvents: function() {
                var a = this,
                    b = a.chart,
                    c = b.container,
                    e = [],
                    f, h;
                a.mouseMoveHandler = f = function(b) {
                    a.onMouseMove(b)
                };
                a.mouseUpHandler = h = function(b) {
                    a.onMouseUp(b)
                };
                e = a.getPartsEvents("mousedown");
                e.push(A(c, "mousemove", f), A(c.ownerDocument, "mouseup", h));
                m && (e.push(A(c, "touchmove", f), A(c.ownerDocument, "touchend", h)), e.concat(a.getPartsEvents("touchstart")));
                a.eventsToUnbind = e;
                a.series && a.series[0] && e.push(A(a.series[0].xAxis, "foundExtremes", function() {
                    b.navigator.modifyNavigatorAxisExtremes()
                }))
            },
            getPartsEvents: function(a) {
                var b = this,
                    d = [];
                t(["shades", "handles"], function(c) {
                    t(b[c], function(e, g) {
                        d.push(A(e.element, a, function(a) {
                            b[c + "Mousedown"](a, g)
                        }))
                    })
                });
                return d
            },
            shadesMousedown: function(a, b) {
                a = this.chart.pointer.normalize(a);
                var d = this.chart,
                    c = this.xAxis,
                    e = this.zoomedMin,
                    f = this.left,
                    h = this.size,
                    k = this.range,
                    l = a.chartX,
                    m;
                d.inverted && (l = a.chartY, f = this.top);
                1 === b ? (this.grabbedCenter = l, this.fixedWidth = k, this.dragOffset = l - e) : (a = l - f - k / 2, 0 === b ? a = Math.max(0, a) : 2 === b && a + k >= h && (a = h - k, m = this.getUnionExtremes().dataMax),
                    a !== e && (this.fixedWidth = k, b = c.toFixedRange(a, a + k, null, m), d.xAxis[0].setExtremes(Math.min(b.min, b.max), Math.max(b.min, b.max), !0, null, {
                        trigger: "navigator"
                    })))
            },
            handlesMousedown: function(a, b) {
                this.chart.pointer.normalize(a);
                a = this.chart;
                var d = a.xAxis[0],
                    c = a.inverted && !d.reversed || !a.inverted && d.reversed;
                0 === b ? (this.grabbedLeft = !0, this.otherHandlePos = this.zoomedMax, this.fixedExtreme = c ? d.min : d.max) : (this.grabbedRight = !0, this.otherHandlePos = this.zoomedMin, this.fixedExtreme = c ? d.max : d.min);
                a.fixedRange = null
            },
            onMouseMove: function(a) {
                var b = this,
                    d = b.chart,
                    c = b.left,
                    e = b.navigatorSize,
                    f = b.range,
                    h = b.dragOffset,
                    k = d.inverted;
                a.touches && 0 === a.touches[0].pageX || (a = d.pointer.normalize(a), d = a.chartX, k && (c = b.top, d = a.chartY), b.grabbedLeft ? (b.hasDragged = !0, b.render(0, 0, d - c, b.otherHandlePos)) : b.grabbedRight ? (b.hasDragged = !0, b.render(0, 0, b.otherHandlePos, d - c)) : b.grabbedCenter && (b.hasDragged = !0, d < h ? d = h : d > e + h - f && (d = e + h - f), b.render(0, 0, d - h, d - h + f)), b.hasDragged && b.scrollbar && b.scrollbar.options.liveRedraw && (a.DOMType = a.type,
                    setTimeout(function() {
                        b.onMouseUp(a)
                    }, 0)))
            },
            onMouseUp: function(a) {
                var b = this.chart,
                    d = this.xAxis,
                    c = this.scrollbar,
                    e, h, k = a.DOMEvent || a;
                (!this.hasDragged || c && c.hasDragged) && "scrollbar" !== a.trigger || (this.zoomedMin === this.otherHandlePos ? e = this.fixedExtreme : this.zoomedMax === this.otherHandlePos && (h = this.fixedExtreme), this.zoomedMax === this.size && (h = this.getUnionExtremes().dataMax), d = d.toFixedRange(this.zoomedMin, this.zoomedMax, e, h), f(d.min) && b.xAxis[0].setExtremes(Math.min(d.min, d.max), Math.max(d.min, d.max), !0, this.hasDragged ? !1 : null, {
                    trigger: "navigator",
                    triggerOp: "navigator-drag",
                    DOMEvent: k
                }));
                "mousemove" !== a.DOMType && (this.grabbedLeft = this.grabbedRight = this.grabbedCenter = this.fixedWidth = this.fixedExtreme = this.otherHandlePos = this.hasDragged = this.dragOffset = null)
            },
            removeEvents: function() {
                this.eventsToUnbind && (t(this.eventsToUnbind, function(a) {
                    a()
                }), this.eventsToUnbind = void 0);
                this.removeBaseSeriesEvents()
            },
            removeBaseSeriesEvents: function() {
                var a = this.baseSeries || [];
                this.navigatorEnabled && a[0] && (!1 !==
                    this.navigatorOptions.adaptToUpdatedData && t(a, function(a) {
                        x(a, "updatedData", this.updatedDataHandler)
                    }, this), a[0].xAxis && x(a[0].xAxis, "foundExtremes", this.modifyBaseAxisExtremes))
            },
            init: function(a) {
                var b = a.options,
                    d = b.navigator,
                    e = d.enabled,
                    f = b.scrollbar,
                    h = f.enabled,
                    b = e ? d.height : 0,
                    k = h ? f.height : 0;
                this.handles = [];
                this.shades = [];
                this.chart = a;
                this.setBaseSeries();
                this.height = b;
                this.scrollbarHeight = k;
                this.scrollbarEnabled = h;
                this.navigatorEnabled = e;
                this.navigatorOptions = d;
                this.scrollbarOptions = f;
                this.outlineHeight =
                    b + k;
                this.opposite = c(d.opposite, !e && a.inverted);
                var l = this,
                    f = l.baseSeries,
                    h = a.xAxis.length,
                    m = a.yAxis.length,
                    n = f && f[0] && f[0].xAxis || a.xAxis[0];
                a.extraMargin = {
                    type: l.opposite ? "plotTop" : "marginBottom",
                    value: (e || !a.inverted ? l.outlineHeight : 0) + d.margin
                };
                a.inverted && (a.extraMargin.type = l.opposite ? "marginRight" : "plotLeft");
                a.isDirtyBox = !0;
                l.navigatorEnabled ? (l.xAxis = new C(a, u({
                        breaks: n.options.breaks,
                        ordinal: n.options.ordinal
                    }, d.xAxis, {
                        id: "navigator-x-axis",
                        yAxis: "navigator-y-axis",
                        isX: !0,
                        type: "datetime",
                        index: h,
                        offset: 0,
                        keepOrdinalPadding: !0,
                        startOnTick: !1,
                        endOnTick: !1,
                        minPadding: 0,
                        maxPadding: 0,
                        zoomEnabled: !1
                    }, a.inverted ? {
                        offsets: [k, 0, -k, 0],
                        width: b
                    } : {
                        offsets: [0, -k, 0, k],
                        height: b
                    })), l.yAxis = new C(a, u(d.yAxis, {
                        id: "navigator-y-axis",
                        alignTicks: !1,
                        offset: 0,
                        index: m,
                        zoomEnabled: !1
                    }, a.inverted ? {
                        width: b
                    } : {
                        height: b
                    })), f || d.series.data ? l.updateNavigatorSeries() : 0 === a.series.length && p(a, "redraw", function(b, d) {
                        0 < a.series.length && !l.series && (l.setBaseSeries(), a.redraw = b);
                        b.call(a, d)
                    }), l.renderElements(), l.addMouseEvents()) :
                    l.xAxis = {
                        translate: function(b, d) {
                            var c = a.xAxis[0],
                                e = c.getExtremes(),
                                f = c.len - 2 * k,
                                g = D("min", c.options.min, e.dataMin),
                                c = D("max", c.options.max, e.dataMax) - g;
                            return d ? b * c / f + g : f * (b - g) / c
                        },
                        toPixels: function(a) {
                            return this.translate(a)
                        },
                        toValue: function(a) {
                            return this.translate(a, !0)
                        },
                        toFixedRange: C.prototype.toFixedRange,
                        fake: !0
                    };
                a.options.scrollbar.enabled && (a.scrollbar = l.scrollbar = new I(a.renderer, u(a.options.scrollbar, {
                    margin: l.navigatorEnabled ? 0 : 10,
                    vertical: a.inverted
                }), a), A(l.scrollbar, "changed", function(b) {
                    var d =
                        l.size,
                        c = d * this.to,
                        d = d * this.from;
                    l.hasDragged = l.scrollbar.hasDragged;
                    l.render(0, 0, d, c);
                    (a.options.scrollbar.liveRedraw || "mousemove" !== b.DOMType) && setTimeout(function() {
                        l.onMouseUp(b)
                    })
                }));
                l.addBaseSeriesEvents();
                l.addChartEvents()
            },
            getUnionExtremes: function(a) {
                var b = this.chart.xAxis[0],
                    d = this.xAxis,
                    e = d.options,
                    f = b.options,
                    h;
                a && null === b.dataMin || (h = {
                    dataMin: c(e && e.min, D("min", f.min, b.dataMin, d.dataMin, d.min)),
                    dataMax: c(e && e.max, D("max", f.max, b.dataMax, d.dataMax, d.max))
                });
                return h
            },
            setBaseSeries: function(a) {
                var b =
                    this.chart,
                    d = this.baseSeries = [];
                a = a || b.options && b.options.navigator.baseSeries || 0;
                t(b.series || [], function(b, c) {
                    b.options.isInternal || !b.options.showInNavigator && (c !== a && b.options.id !== a || !1 === b.options.showInNavigator) || d.push(b)
                });
                this.xAxis && !this.xAxis.fake && this.updateNavigatorSeries()
            },
            updateNavigatorSeries: function() {
                var d = this,
                    c = d.chart,
                    e = d.baseSeries,
                    f, h, k = d.navigatorOptions.series,
                    l, m = {
                        enableMouseTracking: !1,
                        index: null,
                        linkedTo: null,
                        group: "nav",
                        padXAxis: !1,
                        xAxis: "navigator-x-axis",
                        yAxis: "navigator-y-axis",
                        showInLegend: !1,
                        stacking: !1,
                        isInternal: !0,
                        visible: !0
                    },
                    p = d.series = a.grep(d.series || [], function(b) {
                        var c = b.baseSeries;
                        return 0 > a.inArray(c, e) ? (c && (x(c, "updatedData", d.updatedDataHandler), delete c.navigatorSeries), b.destroy(), !1) : !0
                    });
                e && e.length && t(e, function(a, e) {
                    var g = a.navigatorSeries,
                        n = b(k) ? {} : k;
                    g && !1 === d.navigatorOptions.adaptToUpdatedData || (m.name = "Navigator " + (e + 1), f = a.options || {}, l = f.navigatorOptions || {}, h = u(f, m, n, l), e = l.data || n.data, d.hasNavigatorData = d.hasNavigatorData || !!e, h.data = e || f.data &&
                        f.data.slice(0), g ? g.update(h) : (a.navigatorSeries = c.initSeries(h), a.navigatorSeries.baseSeries = a, p.push(a.navigatorSeries)))
                });
                if (k.data && (!e || !e.length) || b(k)) d.hasNavigatorData = !1, k = a.splat(k), t(k, function(a, b) {
                    h = u({
                        color: c.series[b] && !c.series[b].options.isInternal && c.series[b].color || c.options.colors[b] || c.options.colors[0]
                    }, a, m);
                    h.data = a.data;
                    h.data && (d.hasNavigatorData = !0, p.push(c.initSeries(h)))
                });
                this.addBaseSeriesEvents()
            },
            addBaseSeriesEvents: function() {
                var a = this,
                    b = a.baseSeries || [];
                b[0] &&
                    b[0].xAxis && A(b[0].xAxis, "foundExtremes", this.modifyBaseAxisExtremes);
                t(b, function(b) {
                    A(b, "show", function() {
                        this.navigatorSeries && this.navigatorSeries.show()
                    });
                    A(b, "hide", function() {
                        this.navigatorSeries && this.navigatorSeries.hide()
                    });
                    !1 !== this.navigatorOptions.adaptToUpdatedData && b.xAxis && A(b, "updatedData", this.updatedDataHandler);
                    A(b, "remove", function() {
                        this.navigatorSeries && (q(a.series, this.navigatorSeries), this.navigatorSeries.remove(!1), delete this.navigatorSeries)
                    })
                }, this)
            },
            modifyNavigatorAxisExtremes: function() {
                var a =
                    this.xAxis,
                    b;
                a.getExtremes && (!(b = this.getUnionExtremes(!0)) || b.dataMin === a.min && b.dataMax === a.max || (a.min = b.dataMin, a.max = b.dataMax))
            },
            modifyBaseAxisExtremes: function() {
                var a = this.chart.navigator,
                    b = this.getExtremes(),
                    c = b.dataMin,
                    e = b.dataMax,
                    b = b.max - b.min,
                    f = a.stickToMin,
                    h = a.stickToMax,
                    l, m, p = a.series && a.series[0],
                    n = !!this.setExtremes;
                this.eventArgs && "rangeSelectorButton" === this.eventArgs.trigger || (f && (m = c, l = m + b), h && (l = e, f || (m = Math.max(l - b, p && p.xData ? p.xData[0] : -Number.MAX_VALUE))), n && (f || h) && k(m) &&
                    (this.min = this.userMin = m, this.max = this.userMax = l));
                a.stickToMin = a.stickToMax = null
            },
            updatedDataHandler: function() {
                var a = this.chart.navigator,
                    b = this.navigatorSeries;
                a.stickToMax = Math.round(a.zoomedMax) >= Math.round(a.size);
                a.stickToMin = k(this.xAxis.min) && this.xAxis.min <= this.xData[0] && (!this.chart.fixedRange || !a.stickToMax);
                b && !a.hasNavigatorData && (b.options.pointStart = this.xData[0], b.setData(this.options.data, !1, null, !1))
            },
            addChartEvents: function() {
                A(this.chart, "redraw", function() {
                    var a = this.navigator,
                        b = a && (a.baseSeries && a.baseSeries[0] && a.baseSeries[0].xAxis || a.scrollbar && this.xAxis[0]);
                    b && a.render(b.min, b.max)
                })
            },
            destroy: function() {
                this.removeEvents();
                this.xAxis && (q(this.chart.xAxis, this.xAxis), q(this.chart.axes, this.xAxis));
                this.yAxis && (q(this.chart.yAxis, this.yAxis), q(this.chart.axes, this.yAxis));
                t(this.series || [], function(a) {
                    a.destroy && a.destroy()
                });
                t("series xAxis yAxis shades outline scrollbarTrack scrollbarRifles scrollbarGroup scrollbar navigatorGroup rendered".split(" "), function(a) {
                    this[a] &&
                        this[a].destroy && this[a].destroy();
                    this[a] = null
                }, this);
                t([this.handles], function(a) {
                    n(a)
                }, this)
            }
        };
        a.Navigator = B;
        p(C.prototype, "zoom", function(a, b, c) {
            var d = this.chart,
                e = d.options,
                g = e.chart.zoomType,
                h = e.navigator,
                e = e.rangeSelector,
                k;
            this.isXAxis && (h && h.enabled || e && e.enabled) && ("x" === g ? d.resetZoomButton = "blocked" : "y" === g ? k = !1 : "xy" === g && (d = this.previousZoom, f(b) ? this.previousZoom = [this.min, this.max] : d && (b = d[0], c = d[1], delete this.previousZoom)));
            return void 0 !== k ? k : a.call(this, b, c)
        });
        p(E.prototype, "init",
            function(a, b, c) {
                A(this, "beforeRender", function() {
                    var a = this.options;
                    if (a.navigator.enabled || a.scrollbar.enabled) this.scroller = this.navigator = new B(this)
                });
                a.call(this, b, c)
            });
        p(E.prototype, "setChartSize", function(a) {
            var b = this.legend,
                d = this.navigator,
                e, f, h, k;
            a.apply(this, [].slice.call(arguments, 1));
            d && (f = b.options, h = d.xAxis, k = d.yAxis, e = d.scrollbarHeight, this.inverted ? (d.left = d.opposite ? this.chartWidth - e - d.height : this.spacing[3] + e, d.top = this.plotTop + e) : (d.left = this.plotLeft + e, d.top = d.navigatorOptions.top ||
                this.chartHeight - d.height - e - this.spacing[2] - ("bottom" === f.verticalAlign && f.enabled && !f.floating ? b.legendHeight + c(f.margin, 10) : 0)), h && k && (this.inverted ? h.options.left = k.options.left = d.left : h.options.top = k.options.top = d.top, h.setAxisSize(), k.setAxisSize()))
        });
        p(F.prototype, "addPoint", function(a, b, c, e, f) {
            var d = this.options.turboThreshold;
            d && this.xData.length > d && z(b, !0) && this.chart.navigator && r(20, !0);
            a.call(this, b, c, e, f)
        });
        p(E.prototype, "addSeries", function(a, b, e, f) {
            a = a.call(this, b, !1, f);
            this.navigator &&
                this.navigator.setBaseSeries();
            c(e, !0) && this.redraw();
            return a
        });
        p(F.prototype, "update", function(a, b, e) {
            a.call(this, b, !1);
            this.chart.navigator && !this.options.isInternal && this.chart.navigator.setBaseSeries();
            c(e, !0) && this.chart.redraw()
        });
        E.prototype.callbacks.push(function(a) {
            var b = a.navigator;
            b && (a = a.xAxis[0].getExtremes(), b.render(a.min, a.max))
        })
    })(J);
    (function(a) {
        function B(a) {
            this.init(a)
        }
        var A = a.addEvent,
            C = a.Axis,
            E = a.Chart,
            v = a.css,
            f = a.createElement,
            n = a.dateFormat,
            t = a.defaultOptions,
            q = t.global.useUTC,
            r = a.defined,
            h = a.destroyObjectProperties,
            e = a.discardElement,
            m = a.each,
            b = a.extend,
            k = a.fireEvent,
            z = a.Date,
            u = a.isNumber,
            c = a.merge,
            x = a.pick,
            I = a.pInt,
            F = a.splat,
            H = a.wrap;
        b(t, {
            rangeSelector: {
                buttonTheme: {
                    "stroke-width": 0,
                    width: 28,
                    height: 18,
                    padding: 2,
                    zIndex: 7
                },
                height: 35,
                inputPosition: {
                    align: "right"
                }
            }
        });
        t.lang = c(t.lang, {
            rangeSelectorZoom: "Zoom",
            rangeSelectorFrom: "From",
            rangeSelectorTo: "To"
        });
        B.prototype = {
            clickButton: function(a, b) {
                var c = this,
                    e = c.chart,
                    d = c.buttonOptions[a],
                    f = e.xAxis[0],
                    g = e.scroller && e.scroller.getUnionExtremes() ||
                    f || {},
                    h = g.dataMin,
                    k = g.dataMax,
                    p, n = f && Math.round(Math.min(f.max, x(k, f.max))),
                    y = d.type,
                    r, g = d._range,
                    t, v, z, B = d.dataGrouping;
                if (null !== h && null !== k) {
                    e.fixedRange = g;
                    B && (this.forcedDataGrouping = !0, C.prototype.setDataGrouping.call(f || {
                        chart: this.chart
                    }, B, !1));
                    if ("month" === y || "year" === y) f ? (y = {
                        range: d,
                        max: n,
                        dataMin: h,
                        dataMax: k
                    }, p = f.minFromRange.call(y), u(y.newMax) && (n = y.newMax)) : g = d;
                    else if (g) p = Math.max(n - g, h), n = Math.min(p + g, k);
                    else if ("ytd" === y)
                        if (f) void 0 === k && (h = Number.MAX_VALUE, k = Number.MIN_VALUE, m(e.series,
                            function(a) {
                                a = a.xData;
                                h = Math.min(a[0], h);
                                k = Math.max(a[a.length - 1], k)
                            }), b = !1), n = c.getYTDExtremes(k, h, q), p = t = n.min, n = n.max;
                        else {
                            A(e, "beforeRender", function() {
                                c.clickButton(a)
                            });
                            return
                        }
                    else "all" === y && f && (p = h, n = k);
                    c.setSelected(a);
                    f ? f.setExtremes(p, n, x(b, 1), null, {
                        trigger: "rangeSelectorButton",
                        rangeSelectorButton: d
                    }) : (r = F(e.options.xAxis)[0], z = r.range, r.range = g, v = r.min, r.min = t, A(e, "load", function() {
                        r.range = z;
                        r.min = v
                    }))
                }
            },
            setSelected: function(a) {
                this.selected = this.options.selected = a
            },
            defaultButtons: [{
                type: "month",
                count: 1,
                text: "1m"
            }, {
                type: "month",
                count: 3,
                text: "3m"
            }, {
                type: "month",
                count: 6,
                text: "6m"
            }, {
                type: "ytd",
                text: "YTD"
            }, {
                type: "year",
                count: 1,
                text: "1y"
            }, {
                type: "all",
                text: "All"
            }],
            init: function(a) {
                var b = this,
                    c = a.options.rangeSelector,
                    e = c.buttons || [].concat(b.defaultButtons),
                    d = c.selected,
                    f = function() {
                        var a = b.minInput,
                            c = b.maxInput;
                        a && a.blur && k(a, "blur");
                        c && c.blur && k(c, "blur")
                    };
                b.chart = a;
                b.options = c;
                b.buttons = [];
                a.extraTopMargin = c.height;
                b.buttonOptions = e;
                this.unMouseDown = A(a.container, "mousedown", f);
                this.unResize =
                    A(a, "resize", f);
                m(e, b.computeButtonRange);
                void 0 !== d && e[d] && this.clickButton(d, !1);
                A(a, "load", function() {
                    A(a.xAxis[0], "setExtremes", function(c) {
                        this.max - this.min !== a.fixedRange && "rangeSelectorButton" !== c.trigger && "updatedData" !== c.trigger && b.forcedDataGrouping && this.setDataGrouping(!1, !1)
                    })
                })
            },
            updateButtonStates: function() {
                var a = this.chart,
                    b = a.xAxis[0],
                    c = Math.round(b.max - b.min),
                    e = !b.hasVisibleSeries,
                    a = a.scroller && a.scroller.getUnionExtremes() || b,
                    d = a.dataMin,
                    f = a.dataMax,
                    a = this.getYTDExtremes(f, d, q),
                    g = a.min,
                    h = a.max,
                    k = this.selected,
                    n = u(k),
                    r = this.options.allButtonsEnabled,
                    t = this.buttons;
                m(this.buttonOptions, function(a, l) {
                    var m = a._range,
                        p = a.type,
                        q = a.count || 1;
                    a = t[l];
                    var y = 0;
                    l = l === k;
                    var w = m > f - d,
                        u = m < b.minRange,
                        v = !1,
                        x = !1,
                        m = m === c;
                    ("month" === p || "year" === p) && c >= 864E5 * {
                        month: 28,
                        year: 365
                    }[p] * q && c <= 864E5 * {
                        month: 31,
                        year: 366
                    }[p] * q ? m = !0 : "ytd" === p ? (m = h - g === c, v = !l) : "all" === p && (m = b.max - b.min >= f - d, x = !l && n && m);
                    p = !r && (w || u || x || e);
                    m = l && m || m && !n && !v;
                    p ? y = 3 : m && (n = !0, y = 2);
                    a.state !== y && a.setState(y)
                })
            },
            computeButtonRange: function(a) {
                var b =
                    a.type,
                    c = a.count || 1,
                    e = {
                        millisecond: 1,
                        second: 1E3,
                        minute: 6E4,
                        hour: 36E5,
                        day: 864E5,
                        week: 6048E5
                    };
                if (e[b]) a._range = e[b] * c;
                else if ("month" === b || "year" === b) a._range = 864E5 * {
                    month: 30,
                    year: 365
                }[b] * c
            },
            setInputValue: function(a, b) {
                var c = this.chart.options.rangeSelector,
                    e = this[a + "Input"];
                r(b) && (e.previousValue = e.HCTime, e.HCTime = b);
                e.value = n(c.inputEditDateFormat || "%Y-%m-%d", e.HCTime);
                this[a + "DateBox"].attr({
                    text: n(c.inputDateFormat || "%b %e, %Y", e.HCTime)
                })
            },
            showInput: function(a) {
                var b = this.inputGroup,
                    c = this[a + "DateBox"];
                v(this[a + "Input"], {
                    left: b.translateX + c.x + "px",
                    top: b.translateY + "px",
                    width: c.width - 2 + "px",
                    height: c.height - 2 + "px",
                    border: "2px solid silver"
                })
            },
            hideInput: function(a) {
                v(this[a + "Input"], {
                    border: 0,
                    width: "1px",
                    height: "1px"
                });
                this.setInputValue(a)
            },
            drawInput: function(a) {
                function b() {
                    var a = m.value,
                        b = (h.inputDateParser || Date.parse)(a),
                        d = e.xAxis[0],
                        f = e.scroller && e.scroller.xAxis ? e.scroller.xAxis : d,
                        g = f.dataMin,
                        f = f.dataMax;
                    b !== m.previousValue && (m.previousValue = b, u(b) || (b = a.split("-"), b = Date.UTC(I(b[0]), I(b[1]) -
                        1, I(b[2]))), u(b) && (q || (b += 6E4 * (new Date).getTimezoneOffset()), k ? b > c.maxInput.HCTime ? b = void 0 : b < g && (b = g) : b < c.minInput.HCTime ? b = void 0 : b > f && (b = f), void 0 !== b && d.setExtremes(k ? b : d.min, k ? d.max : b, void 0, void 0, {
                        trigger: "rangeSelectorInput"
                    })))
                }
                var c = this,
                    e = c.chart,
                    d = e.renderer,
                    h = e.options.rangeSelector,
                    g = c.div,
                    k = "min" === a,
                    m, n, p = this.inputGroup;
                this[a + "Label"] = n = d.label(t.lang[k ? "rangeSelectorFrom" : "rangeSelectorTo"], this.inputGroup.offset).addClass("highcharts-range-label").attr({
                    padding: 2
                }).add(p);
                p.offset +=
                    n.width + 5;
                this[a + "DateBox"] = d = d.label("", p.offset).addClass("highcharts-range-input").attr({
                    padding: 2,
                    width: h.inputBoxWidth || 90,
                    height: h.inputBoxHeight || 17,
                    stroke: h.inputBoxBorderColor || "#cccccc",
                    "stroke-width": 1,
                    "text-align": "center"
                }).on("click", function() {
                    c.showInput(a);
                    c[a + "Input"].focus()
                }).add(p);
                p.offset += d.width + (k ? 10 : 0);
                this[a + "Input"] = m = f("input", {
                    name: a,
                    className: "highcharts-range-selector",
                    type: "text"
                }, {
                    top: e.plotTop + "px"
                }, g);
                m.onfocus = function() {
                    c.showInput(a)
                };
                m.onblur = function() {
                    c.hideInput(a)
                };
                m.onchange = b;
                m.onkeypress = function(a) {
                    13 === a.keyCode && b()
                }
            },
            getPosition: function() {
                var a = this.chart,
                    b = a.options.rangeSelector,
                    a = x((b.buttonPosition || {}).y, a.plotTop - a.axisOffset[0] - b.height);
                return {
                    buttonTop: a,
                    inputTop: a - 10
                }
            },
            getYTDExtremes: function(a, b, c) {
                var e = new z(a),
                    d = e[z.hcGetFullYear]();
                c = c ? z.UTC(d, 0, 1) : +new z(d, 0, 1);
                b = Math.max(b || 0, c);
                e = e.getTime();
                return {
                    max: Math.min(a || e, e),
                    min: b
                }
            },
            render: function(a, c) {
                var e = this,
                    h = e.chart,
                    d = h.renderer,
                    k = h.container,
                    g = h.options,
                    n = g.exporting && !1 !== g.exporting.enabled &&
                    g.navigation && g.navigation.buttonOptions,
                    p = g.rangeSelector,
                    q = e.buttons,
                    g = t.lang,
                    y = e.div,
                    y = e.inputGroup,
                    u = p.buttonTheme,
                    v = p.buttonPosition || {},
                    z = p.inputEnabled,
                    A = u && u.states,
                    B = h.plotLeft,
                    C, E = this.getPosition(),
                    F = e.group,
                    H = e.rendered;
                !1 !== p.enabled && (H || (e.group = F = d.g("range-selector-buttons").add(), e.zoomText = d.text(g.rangeSelectorZoom, x(v.x, B), 15).css(p.labelStyle).add(F), C = x(v.x, B) + e.zoomText.getBBox().width + 5, m(e.buttonOptions, function(a, b) {
                    q[b] = d.button(a.text, C, 0, function() {
                        e.clickButton(b);
                        e.isActive = !0
                    }, u, A && A.hover, A && A.select, A && A.disabled).attr({
                        "text-align": "center"
                    }).add(F);
                    C += q[b].width + x(p.buttonSpacing, 5)
                }), !1 !== z && (e.div = y = f("div", null, {
                    position: "relative",
                    height: 0,
                    zIndex: 1
                }), k.parentNode.insertBefore(y, k), e.inputGroup = y = d.g("input-group").add(), y.offset = 0, e.drawInput("min"), e.drawInput("max"))), e.updateButtonStates(), F[H ? "animate" : "attr"]({
                    translateY: E.buttonTop
                }), !1 !== z && (y.align(b({
                    y: E.inputTop,
                    width: y.offset,
                    x: n && E.inputTop < (n.y || 0) + n.height - h.spacing[0] ? -40 : 0
                }, p.inputPosition), !0, h.spacingBox), r(z) || (h = F.getBBox(), y[y.alignAttr.translateX < h.x + h.width + 10 ? "hide" : "show"]()), e.setInputValue("min", a), e.setInputValue("max", c)), e.rendered = !0)
            },
            update: function(a) {
                var b = this.chart;
                c(!0, b.options.rangeSelector, a);
                this.destroy();
                this.init(b)
            },
            destroy: function() {
                var b = this,
                    c = b.minInput,
                    f = b.maxInput;
                b.unMouseDown();
                b.unResize();
                h(b.buttons);
                c && (c.onfocus = c.onblur = c.onchange = null);
                f && (f.onfocus = f.onblur = f.onchange = null);
                a.objectEach(b, function(a, c) {
                    a && "chart" !== c && (a.destroy ? a.destroy() :
                        a.nodeType && e(this[c]));
                    a !== B.prototype[c] && (b[c] = null)
                }, this)
            }
        };
        C.prototype.toFixedRange = function(a, b, c, e) {
            var d = this.chart && this.chart.fixedRange;
            a = x(c, this.translate(a, !0, !this.horiz));
            b = x(e, this.translate(b, !0, !this.horiz));
            c = d && (b - a) / d;
            .7 < c && 1.3 > c && (e ? a = b - d : b = a + d);
            u(a) || (a = b = void 0);
            return {
                min: a,
                max: b
            }
        };
        C.prototype.minFromRange = function() {
            var a = this.range,
                b = {
                    month: "Month",
                    year: "FullYear"
                }[a.type],
                c, e = this.max,
                d, f, g = function(a, c) {
                    var d = new Date(a),
                        e = d["get" + b]();
                    d["set" + b](e + c);
                    e === d["get" + b]() &&
                        d.setDate(0);
                    return d.getTime() - a
                };
            u(a) ? (c = e - a, f = a) : (c = e + g(e, -a.count), this.chart && (this.chart.fixedRange = e - c));
            d = x(this.dataMin, Number.MIN_VALUE);
            u(c) || (c = d);
            c <= d && (c = d, void 0 === f && (f = g(c, a.count)), this.newMax = Math.min(c + f, this.dataMax));
            u(e) || (c = void 0);
            return c
        };
        H(E.prototype, "init", function(a, b, c) {
            A(this, "init", function() {
                this.options.rangeSelector.enabled && (this.rangeSelector = new B(this))
            });
            a.call(this, b, c)
        });
        E.prototype.callbacks.push(function(a) {
            function b() {
                c = a.xAxis[0].getExtremes();
                u(c.min) &&
                    e.render(c.min, c.max)
            }
            var c, e = a.rangeSelector,
                d, f;
            e && (f = A(a.xAxis[0], "afterSetExtremes", function(a) {
                e.render(a.min, a.max)
            }), d = A(a, "redraw", b), b());
            A(a, "destroy", function() {
                e && (d(), f())
            })
        });
        a.RangeSelector = B
    })(J);
    (function(a) {
        var B = a.arrayMax,
            A = a.arrayMin,
            C = a.Axis,
            E = a.Chart,
            v = a.defined,
            f = a.each,
            n = a.format,
            t = a.grep,
            q = a.inArray,
            r = a.isNumber,
            h = a.isString,
            e = a.map,
            m = a.merge,
            b = a.pick,
            k = a.Point,
            z = a.Series,
            u = a.splat,
            c = a.SVGRenderer,
            x = a.wrap,
            I = z.prototype,
            F = I.init,
            H = I.processData,
            p = k.prototype.tooltipFormatter;
        a.StockChart = a.stockChart = function(c, f, k) {
            var d = h(c) || c.nodeName,
                l = arguments[d ? 1 : 0],
                g = l.series,
                n = a.getOptions(),
                p, q = b(l.navigator && l.navigator.enabled, n.navigator.enabled, !0),
                r = q ? {
                    startOnTick: !1,
                    endOnTick: !1
                } : null,
                y = {
                    marker: {
                        enabled: !1,
                        radius: 2
                    }
                },
                t = {
                    shadow: !1,
                    borderWidth: 0
                };
            l.xAxis = e(u(l.xAxis || {}), function(a) {
                return m({
                    minPadding: 0,
                    maxPadding: 0,
                    ordinal: !0,
                    title: {
                        text: null
                    },
                    labels: {
                        overflow: "justify"
                    },
                    showLastLabel: !0
                }, n.xAxis, a, {
                    type: "datetime",
                    categories: null
                }, r)
            });
            l.yAxis = e(u(l.yAxis || {}), function(a) {
                p =
                    b(a.opposite, !0);
                return m({
                    labels: {
                        y: -2
                    },
                    opposite: p,
                    showLastLabel: !1,
                    title: {
                        text: null
                    }
                }, n.yAxis, a)
            });
            l.series = null;
            l = m({
                chart: {
                    panning: !0,
                    pinchType: "x"
                },
                navigator: {
                    enabled: q
                },
                scrollbar: {
                    enabled: b(n.scrollbar.enabled, !0)
                },
                rangeSelector: {
                    enabled: b(n.rangeSelector.enabled, !0)
                },
                title: {
                    text: null
                },
                tooltip: {
                    shared: !0,
                    crosshairs: !0
                },
                legend: {
                    enabled: !1
                },
                plotOptions: {
                    line: y,
                    spline: y,
                    area: y,
                    areaspline: y,
                    arearange: y,
                    areasplinerange: y,
                    column: t,
                    columnrange: t,
                    candlestick: t,
                    ohlc: t
                }
            }, l, {
                isStock: !0
            });
            l.series = g;
            return d ?
                new E(c, l, k) : new E(l, f)
        };
        x(C.prototype, "autoLabelAlign", function(a) {
            var b = this.chart,
                c = this.options,
                b = b._labelPanes = b._labelPanes || {},
                d = this.options.labels;
            return this.chart.options.isStock && "yAxis" === this.coll && (c = c.top + "," + c.height, !b[c] && d.enabled) ? (15 === d.x && (d.x = 0), void 0 === d.align && (d.align = "right"), b[c] = this, "right") : a.apply(this, [].slice.call(arguments, 1))
        });
        x(C.prototype, "destroy", function(a) {
            var b = this.chart,
                c = this.options && this.options.top + "," + this.options.height;
            c && b._labelPanes && b._labelPanes[c] ===
                this && delete b._labelPanes[c];
            return a.apply(this, Array.prototype.slice.call(arguments, 1))
        });
        x(C.prototype, "getPlotLinePath", function(c, k, m, d, n, g) {
            var l = this,
                p = this.isLinked && !this.series ? this.linkedParent.series : this.series,
                t = l.chart,
                y = t.renderer,
                u = l.left,
                x = l.top,
                z, A, D, B, C = [],
                E = [],
                F, G;
            if ("xAxis" !== l.coll && "yAxis" !== l.coll) return c.apply(this, [].slice.call(arguments, 1));
            E = function(a) {
                var b = "xAxis" === a ? "yAxis" : "xAxis";
                a = l.options[b];
                return r(a) ? [t[b][a]] : h(a) ? [t.get(a)] : e(p, function(a) {
                    return a[b]
                })
            }(l.coll);
            f(l.isXAxis ? t.yAxis : t.xAxis, function(a) {
                if (v(a.options.id) ? -1 === a.options.id.indexOf("navigator") : 1) {
                    var b = a.isXAxis ? "yAxis" : "xAxis",
                        b = v(a.options[b]) ? t[b][a.options[b]] : t[b][0];
                    l === b && E.push(a)
                }
            });
            F = E.length ? [] : [l.isXAxis ? t.yAxis[0] : t.xAxis[0]];
            f(E, function(b) {
                -1 !== q(b, F) || a.find(F, function(a) {
                    return a.pos === b.pos && a.len && b.len
                }) || F.push(b)
            });
            G = b(g, l.translate(k, null, null, d));
            r(G) && (l.horiz ? f(F, function(a) {
                var b;
                A = a.pos;
                B = A + a.len;
                z = D = Math.round(G + l.transB);
                if (z < u || z > u + l.width) n ? z = D = Math.min(Math.max(u,
                    z), u + l.width) : b = !0;
                b || C.push("M", z, A, "L", D, B)
            }) : f(F, function(a) {
                var b;
                z = a.pos;
                D = z + a.len;
                A = B = Math.round(x + l.height - G);
                if (A < x || A > x + l.height) n ? A = B = Math.min(Math.max(x, A), l.top + l.height) : b = !0;
                b || C.push("M", z, A, "L", D, B)
            }));
            return 0 < C.length ? y.crispPolyLine(C, m || 1) : null
        });
        C.prototype.getPlotBandPath = function(a, b) {
            b = this.getPlotLinePath(b, null, null, !0);
            a = this.getPlotLinePath(a, null, null, !0);
            var c = [],
                d;
            if (a && b)
                if (a.toString() === b.toString()) c = a, c.flat = !0;
                else
                    for (d = 0; d < a.length; d += 6) c.push("M", a[d + 1], a[d +
                        2], "L", a[d + 4], a[d + 5], b[d + 4], b[d + 5], b[d + 1], b[d + 2], "z");
            else c = null;
            return c
        };
        c.prototype.crispPolyLine = function(a, b) {
            var c;
            for (c = 0; c < a.length; c += 6) a[c + 1] === a[c + 4] && (a[c + 1] = a[c + 4] = Math.round(a[c + 1]) - b % 2 / 2), a[c + 2] === a[c + 5] && (a[c + 2] = a[c + 5] = Math.round(a[c + 2]) + b % 2 / 2);
            return a
        };
        x(C.prototype, "hideCrosshair", function(a, b) {
            a.call(this, b);
            this.crossLabel && (this.crossLabel = this.crossLabel.hide())
        });
        x(C.prototype, "drawCrosshair", function(a, c, e) {
            var d, f;
            a.call(this, c, e);
            if (v(this.crosshair.label) && this.crosshair.label.enabled &&
                this.cross) {
                a = this.chart;
                var g = this.options.crosshair.label,
                    h = this.horiz;
                d = this.opposite;
                f = this.left;
                var k = this.top,
                    l = this.crossLabel,
                    m, p = g.format,
                    q = "",
                    r = "inside" === this.options.tickPosition,
                    t = !1 !== this.crosshair.snap,
                    u = 0;
                c || (c = this.cross && this.cross.e);
                m = h ? "center" : d ? "right" === this.labelAlign ? "right" : "left" : "left" === this.labelAlign ? "left" : "center";
                l || (l = this.crossLabel = a.renderer.label(null, null, null, g.shape || "callout").addClass("highcharts-crosshair-label" + (this.series[0] && " highcharts-color-" +
                    this.series[0].colorIndex)).attr({
                    align: g.align || m,
                    padding: b(g.padding, 8),
                    r: b(g.borderRadius, 3),
                    zIndex: 2
                }).add(this.labelGroup));
                h ? (m = t ? e.plotX + f : c.chartX, k += d ? 0 : this.height) : (m = d ? this.width + f : 0, k = t ? e.plotY + k : c.chartY);
                p || g.formatter || (this.isDatetimeAxis && (q = "%b %d, %Y"), p = "{value" + (q ? ":" + q : "") + "}");
                c = t ? e[this.isXAxis ? "x" : "y"] : this.toValue(h ? c.chartX : c.chartY);
                l.attr({
                    text: p ? n(p, {
                        value: c
                    }) : g.formatter.call(this, c),
                    x: m,
                    y: k,
                    visibility: "visible"
                });
                c = l.getBBox();
                if (h) {
                    if (r && !d || !r && d) k = l.y - c.height
                } else k =
                    l.y - c.height / 2;
                h ? (d = f - c.x, f = f + this.width - c.x) : (d = "left" === this.labelAlign ? f : 0, f = "right" === this.labelAlign ? f + this.width : a.chartWidth);
                l.translateX < d && (u = d - l.translateX);
                l.translateX + c.width >= f && (u = -(l.translateX + c.width - f));
                l.attr({
                    x: m + u,
                    y: k,
                    anchorX: h ? m : this.opposite ? 0 : a.chartWidth,
                    anchorY: h ? this.opposite ? a.chartHeight : 0 : k + c.height / 2
                })
            }
        });
        I.init = function() {
            F.apply(this, arguments);
            this.setCompare(this.options.compare)
        };
        I.setCompare = function(a) {
            this.modifyValue = "value" === a || "percent" === a ? function(b,
                c) {
                var d = this.compareValue;
                if (void 0 !== b && void 0 !== d) return b = "value" === a ? b - d : b / d * 100 - (100 === this.options.compareBase ? 0 : 100), c && (c.change = b), b
            } : null;
            this.userOptions.compare = a;
            this.chart.hasRendered && (this.isDirty = !0)
        };
        I.processData = function() {
            var a, b = -1,
                c, d, e, f;
            H.apply(this, arguments);
            if (this.xAxis && this.processedYData)
                for (c = this.processedXData, d = this.processedYData, e = d.length, this.pointArrayMap && (b = q("close", this.pointArrayMap), -1 === b && (b = q(this.pointValKey || "y", this.pointArrayMap))), a = 0; a < e - 1; a++)
                    if (f =
                        d[a] && -1 < b ? d[a][b] : d[a], r(f) && c[a + 1] >= this.xAxis.min && 0 !== f) {
                        this.compareValue = f;
                        break
                    }
        };
        x(I, "getExtremes", function(a) {
            var b;
            a.apply(this, [].slice.call(arguments, 1));
            this.modifyValue && (b = [this.modifyValue(this.dataMin), this.modifyValue(this.dataMax)], this.dataMin = A(b), this.dataMax = B(b))
        });
        C.prototype.setCompare = function(a, c) {
            this.isXAxis || (f(this.series, function(b) {
                b.setCompare(a)
            }), b(c, !0) && this.chart.redraw())
        };
        k.prototype.tooltipFormatter = function(c) {
            c = c.replace("{point.change}", (0 < this.change ?
                "+" : "") + a.numberFormat(this.change, b(this.series.tooltipOptions.changeDecimals, 2)));
            return p.apply(this, [c])
        };
        x(z.prototype, "render", function(a) {
            this.chart.is3d && this.chart.is3d() || this.chart.polar || !this.xAxis || this.xAxis.isRadial || (!this.clipBox && this.animate ? (this.clipBox = m(this.chart.clipBox), this.clipBox.width = this.xAxis.len, this.clipBox.height = this.yAxis.len) : this.chart[this.sharedClipKey] ? this.chart[this.sharedClipKey].attr({
                width: this.xAxis.len,
                height: this.yAxis.len
            }) : this.clipBox && (this.clipBox.width =
                this.xAxis.len, this.clipBox.height = this.yAxis.len));
            a.call(this)
        });
        x(E.prototype, "getSelectedPoints", function(a) {
            var b = a.call(this);
            f(this.series, function(a) {
                a.hasGroupedData && (b = b.concat(t(a.points || [], function(a) {
                    return a.selected
                })))
            });
            return b
        });
        x(E.prototype, "update", function(a, b) {
            "scrollbar" in b && this.navigator && (m(!0, this.options.scrollbar, b.scrollbar), this.navigator.update({}, !1), delete b.scrollbar);
            return a.apply(this, Array.prototype.slice.call(arguments, 1))
        })
    })(J);
    return J
});