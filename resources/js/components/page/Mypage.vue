<template>
  <div>
    <main>
      <div class="container">
        <article class="col-md-8 col-xs-12">
          <section class="article-section">
            <h2 class="mypage-h2">
              <img class="mypage__logo" src="/images/mypage-icon.png" />マイページ
            </h2>
            <h3
              v-if="changeCorrectRatioData.length !== 0"
            >直近{{changeCorrectRatioData.percentage_correct_answer.length }}回の正解率推移</h3>
            <line-chart :chartData="lineChartData" ref="chart"></line-chart>
          </section>
        </article>
        <the-sidebar></the-sidebar>
      </div>
    </main>
  </div>
</template>

<script>
import TheSidebar from "../layout/TheSidebar";
import LineChart from "../module/LineChart";
export default {
  components: {
    TheSidebar,
    LineChart
  },
  data() {
    return {
      changeCorrectRatioData: [],
      lineChartData: {}
    };
  },
  mounted() {
    this.$http.get("/api/mypage").then(response => {
      this.changeCorrectRatioData = response.data;
      this.lineChartData = Object.assign({}, this.lineChartData, {
        labels: this.changeCorrectRatioData.created_at,
        datasets: [
          {
            label: ["最高得点率"],
            backgroundColor: "rgba(0, 170, 248, 0.47)",
            borderColor: "rgba(0, 170, 248, 1)",
            data: this.changeCorrectRatioData.percentage_correct_answer
          }
        ]
      });
      this.$nextTick(() => {
        this.$refs.chart.renderLineChart();
      });
    });
  }
};
</script>