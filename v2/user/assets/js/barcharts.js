if ($('#canvas').length) {
	var ctx = document.getElementById("canvas").getContext("2d");
	window.myBar = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
			datasets: [{
				label: 'Dataset 1',
				backgroundColor: "#f47b25",
				borderColor: "#f47b25",
				data: [45, 58, 62, 89, 63, 46, 63]
			}, {
				label: 'Dataset 2',
				backgroundColor: "#920b7f",
				borderColor: "#920b7f",
				data: [25, 55, 64, 9, 30, 96, 33]
			}, {
				label: 'Dataset 3',
				backgroundColor: "#3e1088",
				borderColor: "#3e1088",
				data: [24, 14, 53, 18, 19, 65]
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			elements: {
				rectangle: {
					borderWidth: 3,
					borderColor: 'rgb(0, 255, 0)',
					borderSkipped: 'bottom'
				}
			},
			responsive: true,
			legend: {
				position: 'top',
			},
			title: {
				display: false,
				text: 'Chart.js Bar Chart'
			}
		}
	});
};
//horizontalbarchart
if ($('#canvashbar').length) {
	var ctx = document.getElementById("canvashbar").getContext("2d");
	window.myHorizontalBar = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
			datasets: [{
				label: 'Dataset 1',
				backgroundColor: "#f47b25",
				borderColor: '#f47b25',
				data: [45, 58, 62, 89, 63, 46, 63]
			}, {
				label: 'Dataset 2',
				backgroundColor: "#920b7f",
				borderColor: '#920b7f',
				data: [25, 55, 64, 9, 30, 96, 33]
			}, {
				label: 'Dataset 3',
				backgroundColor: "#3e1088",
				borderColor: '#3e1088',
				data: [24, 14, 53, 18, 19, 65]
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			elements: {
				rectangle: {
					borderWidth: 2,
					borderColor: 'rgb(0, 255, 0)',
					borderSkipped: 'left'
				}
			},
			responsive: true,
			legend: {
				position: 'top',
			},
			title: {
				display: false,
				text: 'Chart.js Horizontal Bar Chart'
			}
		}
	});
};
//barchart multix
if ($('#canvas2').length) {
	var ctx = document.getElementById("canvas2").getContext("2d");
	window.myBar = Chart.Bar(ctx, {
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
			datasets: [{
				label: 'Dataset 1',
				backgroundColor: "#f47b25",
				borderColor: "#f47b25",
				yAxisID: "y-axis-1",
				data: [14, 18, 25, 36, 54, 42, 52]
			}, {
				label: 'Dataset 2',
				backgroundColor: "#920b7f",
				borderColor: "#920b7f",
				yAxisID: "y-axis-2",
				data: [2, 18, 25, 38, 48, 24, 24]
			}, {
				label: 'Dataset 3',
				backgroundColor: "#3e1088",
				borderColor: "#3e1088",
				yAxisID: "y-axis-1",
				data: [14, 25, 32, 36, 14, 12, 48]
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			hoverMode: 'label',
			hoverAnimationDuration: 400,
			stacked: false,
			title: {
				display: false,
				text: "Chart.js Bar Chart - Multi Axis"
			},
			scales: {
				yAxes: [{
					type: "linear",
					display: true,
					position: "left",
					id: "y-axis-1",
				}, {
					type: "linear",
					display: true,
					position: "right",
					id: "y-axis-2",
					gridLines: {
						drawOnChartArea: false
					}
				}],
			}
		}
	});
};
//Stacked barchart
if ($('#canvas3').length) {
	var ctx = document.getElementById("canvas3").getContext("2d");
	window.myBar = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
			datasets: [{
				label: 'Dataset 1',
				backgroundColor: "#f47b25",
				borderColor: "#f47b25",
				data: [14, 25, 32, 36, 14, 12, 48]
			}, {
				label: 'Dataset 2',
				backgroundColor: "#920b7f",
				borderColor: "#920b7f",
				data: [14, 25, 32, 36, 14, 12, 48]
			}, {
				label: 'Dataset 3',
				backgroundColor: "#3e1088",
				borderColor: "#3e1088",
				data: [14, 25, 32, 36, 14, 12, 48]
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			title: {
				display: false,
				text: "Chart.js Bar Chart - Stacked"
			},
			tooltips: {
				mode: 'label'
			},
			responsive: true,
			scales: {
				xAxes: [{
					stacked: true,
				}],
				yAxes: [{
					stacked: true
				}]
			}
		}
	});
};