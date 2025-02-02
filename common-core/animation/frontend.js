! function () {
	const t = ["none", "bounce", "flash", "pulse", "rubberBand", "shakeX", "shakeY", "headShake", "swing", "tada", "wobble", "jello", "heartBeat", "hinge", "jackInTheBox", "backInDown", "backInLeft", "backInRight", "backInUp", "backOutDown", "backOutLeft", "backOutRight", "backOutUp", "bounceIn", "bounceInDown", "bounceInLeft", "bounceInRight", "bounceInUp", "bounceOut", "bounceOutDown", "bounceOutLeft", "bounceOutRight", "bounceOutUp", "fadeIn", "fadeInDown", "fadeInDownBig", "fadeInLeft", "fadeInLeftBig", "fadeInRight", "fadeInRightBig", "fadeInUp", "fadeInTopLeft", "fadeInTopRight", "fadeInBottomLeft", "fadeInBottomRight", "fadeOut", "fadeOutDown", "fadeOutDownBig", "fadeOutLeft", "fadeOutLeftBig", "fadeOutRight", "fadeOutRightBig", "fadeOutUp", "fadeOutUpBig", "fadeOutTopLeft", "fadeOutTopRight", "fadeOutBottomRight", "fadeOutBottomLeft", "flip", "flipInX", "flipInY", "flipOutX", "flipOutY", "lightSpeedInRight", "lightSpeedInLeft", "lightSpeedOutRight", "lightSpeedOutLeft", "rotateIn", "rotateInDownLeft", "rotateInDownRight", "rotateInUpLeft", "rotateInUpRight", "rotateOut", "rotateOutDownLeft", "rotateOutDownRight", "rotateOutUpLeft", "rotateOutUpRight", "slideInDown", "slideInLeft", "slideInRight", "slideInUp", "slideOutDown", "slideOutLeft", "slideOutRight", "slideOutUp", "zoomIn", "zoomInDown", "zoomInLeft", "zoomInRight", "zoomInUp", "zoomOut", "zoomOutDown", "zoomOutLeft", "zoomOutRight", "zoomOutUp", "rollIn", "rollOut"],
		e = ["backOutDown", "backOutLeft", "backOutRight", "backOutUp", "bounceOut", "bounceOutDown", "bounceOutLeft", "bounceOutRight", "bounceOutUp", "fadeOut", "fadeOutDown", "fadeOutDownBig", "fadeOutLeft", "fadeOutLeftBig", "fadeOutRight", "fadeOutRightBig", "fadeOutUp", "fadeOutUpBig", "fadeOutTopLeft", "fadeOutTopRight", "fadeOutBottomRight", "fadeOutBottomLeft", "flipOutX", "flipOutY", "lightSpeedOutRight", "lightSpeedOutLeft", "rotateOut", "rotateOutDownLeft", "rotateOutDownRight", "rotateOutUpLeft", "rotateOutUpRight", "slideOutDown", "slideOutLeft", "slideOutRight", "slideOutUp", "zoomOut", "zoomOutDown", "zoomOutLeft", "zoomOutRight", "zoomOutUp", "rollOut"],
		o = ["none", "delay-100ms", "delay-200ms", "delay-500ms", "delay-1s", "delay-2s", "delay-3s", "delay-4s", "delay-5s"],
		n = ["none", "slow", "slower", "fast", "faster"];
	window.addEventListener("load", (() => {
		const i = document.querySelectorAll(".animated");
		for (const u of i) {
			if (classes = u.classList, u.animationClasses = [], !a(u)) {
				const e = t.find((t => Array.from(classes).find((e => e === t)))),
					a = o.find((t => Array.from(classes).find((e => e === t)))),
					i = n.find((t => Array.from(classes).find((e => e === t))));
				u.classList.add("hidden-animated"), e && (u.animationClasses.push(e), u.classList.remove(e)), a && (u.animationClasses.push(a), u.classList.remove(a)), i && (u.animationClasses.push(i), u.classList.remove(i))
			}
			e.forEach((t => {
				u.className.includes(t) && u.addEventListener("animationend", (() => {
					u.classList.remove(t)
				}))
			}))
		}
		window.addEventListener("scroll", (() => {
			for (const t of i) t.getBoundingClientRect().top <= .95 * window.innerHeight && 0 < t.getBoundingClientRect().top && t.animationClasses && 0 < t.animationClasses.length && (t.animationClasses.forEach((e => t.classList.add(e))), t.classList.remove("hidden-animated"), delete t.animationClasses)
		}))
	}));
	const a = t => {
		const e = window.scrollY || window.pageYOffset,
			o = t.getBoundingClientRect().top + e,
			n = e,
			a = e + window.innerHeight,
			i = o,
			u = o + t.clientHeight;
		return u >= n && u <= a || i <= a && i >= n
	}
}();
