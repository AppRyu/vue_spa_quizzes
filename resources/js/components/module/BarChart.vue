<script>
import { Bar } from 'vue-chartjs';
export default {
	extends: Bar,
	props: {
    chartData: {
		type: Object
		}
	},
	methods: {
		renderBarChart() {
			this.renderChart(
				this.chartData,
				{
					scales: {
						yAxes: [
							{
								ticks: {
									beginAtZero: true,
									min: 0,
									max: 100
								}
							}
						]
					}
				}
			);
		}
	}
};
</script>
