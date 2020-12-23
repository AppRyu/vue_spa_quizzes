<script>
import { Pie } from "vue-chartjs";
export default {
  extends: Pie,
  props: {
    chartData: {
      type: Object
    }
  },
  methods: {
    renderPieChart() {
      this.renderChart(this.chartData, {
        borderWidth: "10px",
        hoverBackgroundColor: "red",
        hoverBorderWidth: "10px"
      });
    }
  }
};
</script>
