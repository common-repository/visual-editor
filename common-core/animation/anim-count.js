! function () {
	"use strict";
	var e = {
			n: function (t) {
				var n = t && t.__esModule ? function () {
					return t.default
				} : function () {
					return t
				};
				return e.d(n, {
					a: n
				}), n
			},
			d: function (t, n) {
				for (var o in n) e.o(n, o) && !e.o(t, o) && Object.defineProperty(t, o, {
					enumerable: !0,
					get: n[o]
				})
			},
			o: function (e, t) {
				return Object.prototype.hasOwnProperty.call(e, t)
			}
		},
		t = window.wp.domReady,
		n = e.n(t);
	const o = {
			none: void 0,
			"vis-edit-count-slower": 3,
			"vis-edit-count-slow": 2,
			"vis-edit-count-fast": 1.5,
			"vis-edit-count-fastest": 1
		},
		r = new Set(Array.from("0123456789,.")),
		l = new Set(Array.from(","));
	n()((() => {
		const e = {
				root: null,
				rootMargin: "0px",
				threshold: [.6]
			},
			t = new Set("0123456789");
		setTimeout((() => {
			document.querySelectorAll("vis-edit-anim-count").forEach((n => {
				if (Array.from(n.innerHTML).some((e => t.has(e)))) {
					const t = new IntersectionObserver((e => {
						e.forEach((e => {
							e.isIntersecting && 0 < e.intersectionRect.height && (t.unobserve(n), (e => {
								var t, n, s;
								const i = (null == e ? void 0 : e.innerHTML) || "",
									u = (e => {
										let t = e.parentElement;
										for (let e = 0; e < 3; ++e)
											if (Array.from(t.classList).some((e => e.includes("vis-edit-count-")))) {
												var n, r;
												const e = Array.from(t.classList),
													l = e.filter((e => e.includes("vis-edit-count-delay-"))).pop(),
													s = parseInt((null == l || null === (n = l.split("-")) || void 0 === n ? void 0 : n[3]) || "0"),
													i = null == l ? void 0 : l.includes("ms"),
													u = Object.keys(o),
													a = (null == e || null === (r = e.filter((e => u.includes(e)))) || void 0 === r ? void 0 : r.pop()) || "fast";
												return {
													speed: o[a],
													delay: s * (i ? 0 : 1e3)
												}
											}
									})(e),
									{
										suffix: a,
										prefix: c,
										number: p
									} = (e => {
										const t = Array.from(e),
											n = [],
											o = [],
											l = [];
										let s = !0,
											i = !1;
										for (let e of t) r.has(e) ? (s && (s = !1), i ? o.push(e) : l.push(e)) : s ? n.push(e) : (i || (i = !0), o.push(e));
										return {
											prefix: n.join(""),
											suffix: o.join(""),
											number: l
										}
									})(i),
									f = [...p].reverse().map(((e, t) => l.has(e) ? {
										position: t,
										character: e
									} : null)).filter((e => e)),
									d = (null === (t = p.join("")) || void 0 === t || null === (n = t.split(".")) || void 0 === n || null === (s = n[1]) || void 0 === s ? void 0 : s.length) || 0,
									h = parseFloat(p.filter((e => "," !== e)).join("")),
									v = i.length - a.length,
									m = e => {
										const t = e.split("").reverse();
										return f.forEach((e => {
											e.position < t.length && t.splice(e.position, 0, e.character)
										})), ((c || "") + t.reverse().join("")).padStart(v, " ") + a || ""
									},
									{
										start: y,
										steps: w
									} = ((e, t) => {
										let n, o = 0;
										const r = Math.ceil(e / .05) + 1 || 1,
											l = e => {
												clearInterval(n), null == e || e()
											};
										return {
											steps: r,
											start: (e, t) => {
												n = setInterval((() => {
													o < r ? (null == e || e(o), o += 1) : l(t)
												}), 50)
											},
											stop: l
										}
									})((null == u ? void 0 : u.speed) || 2),
									g = parseFloat((h / w).toFixed(d || 2));
								if (1e-12 > g) return;
								let b = [0];
								for (let e = 1; e < w; ++e) b.push(b[e - 1] + g);
								b = b.map((e => e.toFixed(d))), 0 < b.length && (b[w - 1] = h.toFixed(d || 0), e.innerHTML = m(b[0]), setTimeout((() => {
									e.style.whiteSpace = "pre", y((t => {
										e.innerHTML = m(b[t])
									}), (() => {
										e.style.whiteSpace = "", e.innerHTML = i
									}))
								}), (null == u ? void 0 : u.delay) || 0))
							})(n))
						}))
					}), e);
					t.observe(n)
				} else console.log(n)
			}))
		}), 300)
	}))
}();
