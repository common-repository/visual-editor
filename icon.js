const visualeditorIcon = wp.element.createElement(
    'svg',
    {
        width: 30,
        height: 30,
		preserveAspectRatio: 'xMidYMid meet',
        viewBox: '0 0 36 36',
        x: '0px',
        y: '0px',
    },

    wp.element.createElement('path', {
        style: { fill: '#991199'},
        d:  'M23.21,6.67a.09.09,0,0,0,0,0h0a.09.09,0,0,0-.09-.08H19.56a.09.09,0,0,0-.08,0L12.07,19.06a.09.09,0,0,1-.06,0h0a.09.09,0,0,1-.06,0L4.66,6.58a.11.11,0,0,0-.09-.05H.94a.09.09,0,0,0-.08.14l9.58,15.76a1.86,1.86,0,0,0,1.61.9,2.2,2.2,0,0,0,.3,0s1-.28,1.25-.72Z',
    }),
	
	wp.element.createElement('polygon', {
        style: { fill: '#991199'},
        points:  '14.72 23.31 28.93 23.31 28.93 19.45 17.04 19.45 14.72 23.31',
    }),
	
	wp.element.createElement('polygon', {
        style: { fill: '#991199'},
        points:  '18.57 16.91 28.93 16.91 28.93 13.06 20.88 13.06 18.57 16.91',
    }),
	wp.element.createElement('polygon', {
        style: { fill: '#991199'},
        points:  '23.26 6.53 20.02 10.45 28.93 10.45 28.93 6.53 23.26 6.53',
    })
);
