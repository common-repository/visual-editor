! function () {
	"use strict";
	var e = {
			n: function (n) {
				var t = n && n.__esModule ? function () {
					return n.default
				} : function () {
					return n
				};
				return e.d(t, {
					a: t
				}), t
			},
			d: function (n, t) {
				for (var r in t) e.o(t, r) && !e.o(n, r) && Object.defineProperty(n, r, {
					enumerable: !0,
					get: t[r]
				})
			},
			o: function (e, n) {
				return Object.prototype.hasOwnProperty.call(e, n)
			}
		},
		n = window.wp.domReady;
	const t = {
		none: void 0,
		"vis-edit-typing-slower": .4,
		"vis-edit-typing-slow": .25,
		"vis-edit-typing-fast": .05,
		"vis-edit-typing-fastest": .01
	};
	e.n(n)()((() => {
		const e = {
			root: null,
			rootMargin: "0px",
			threshold: [.6]
		};
		setTimeout((() => {
			document.querySelectorAll("vis-edit-anim-typing").forEach((n => {
				const r = (e => {
						const n = (null == e ? void 0 : e.innerHTML) || "",
							r = (e => {
								let n = e.parentElement;
								for (let e = 0; e < 3; ++e)
									if (Array.from(n.classList).some((e => e.includes("vis-edit-typing-")))) {
										var r, l;
										const e = Array.from(n.classList),
											i = e.filter((e => e.includes("vis-edit-typing-delay-"))).pop(),
											o = parseInt((null == i || null === (r = i.split("-")) || void 0 === r ? void 0 : r[3]) || "0"),
											s = null == i ? void 0 : i.includes("ms"),
											c = Object.keys(t),
											a = (null == e || null === (l = e.filter((e => c.includes(e)))) || void 0 === l ? void 0 : l.pop()) || "fast";
										return {
											speed: t[a],
											delay: o * (s ? 0 : 1e3)
										}
									}
							})(e);
						null != n && n.length || returnl;
						const l = n.length,
							i = ((null == r ? void 0 : r.speed) || .1) * l,
							{
								start: o,
								steps: s,
								stop: c
							} = ((e, n) => {
								let t, r = 0;
								const l = Math.ceil(e / n) + 1 || 1,
									i = e => {
										clearInterval(t), null == e || e()
									};
								return {
									steps: l,
									start: (e, o) => {
										t = setInterval((() => {
											r < l ? (null == e || e(r), r += 1) : i(o)
										}), 1e3 * n)
									},
									stop: i
								}
							})(i, (null == r ? void 0 : r.speed) || .1),
							a = document.createElement("span");
						a.classList.add("vis-edit-anim-typing-caret"), a.style.whiteSpace = "pre-wrap";
						const u = document.createElement("span");
						u.style.whiteSpace = "pre-wrap", u.style.visibility = "hidden";
						const d = e.innerHTML;
						return e.innerHTML = "", e.appendChild(a), e.appendChild(u), a.innerHTML = n.slice(0, 0), u.innerHTML = n.slice(0), () => {
							setTimeout((() => {
								o((e => {
									a.innerHTML = n.slice(0, e), e < l && (u.innerHTML = n.slice(e)), l >= s && c()
								}), (() => {
									e.innerHTML = d
								}))
							}), (null == r ? void 0 : r.delay) || 0)
						}
					})(n),
					l = new IntersectionObserver((e => {
						e.forEach((e => {
							e.isIntersecting && 0 < e.intersectionRect.height && (l.unobserve(n), r())
						}))
					}), e);
				l.observe(n)
			}))
		}), 100)
	}))
}();
