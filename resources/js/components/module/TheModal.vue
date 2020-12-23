<template>
  <form action="/insertRanking" method="post" id="finish-form">
    <div id="modal-result" tabindex="-1" class="modal fade" aria-hidden="true" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" data-dismiss="modal" class="close">
              <span>×</span>
            </button>
            <h4 class="modal-title text-center">正解率</h4>
          </div>
          <div class="modal-body text-center">
            <pie-chart :chartData="chartData" ref="chart"></pie-chart>
            <div>正解率 {{ correctPercentageObject['correctScore'] * 10 }} %</div>
            <input type="hidden" name="correctRatio" :value="correctPercentageObject['correctScore'] * 10"/>
            <input type="hidden" name="_token" :value="csrf">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="quizFinish">終了する</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import PieChart from "./PieChart";

export default {
  components: {
    PieChart
  },
  props: {
    correctPercentageObject: {
      type: Object
    }
  },
  data() {
    return {
      chartOptions: {
        hoverBorderWidth: 20
      },
      chartData: {
        hoverBackgroundColor: "red",
        hoverBorderWidth: 10,
        labels: ["正解", "不正解"],
        datasets: []
      },
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    };
  },
  methods: {
    render() {
      this.$set(this.chartData, "datasets", [
        {
          backgroundColor: ["#00D8FF", "#E46651"],
          data: [
            this.correctPercentageObject["correctScore"],
            this.correctPercentageObject["mistakeScore"]
          ]
        }
      ]);
      this.$refs.chart.renderPieChart();
    },
    quizFinish() {
      document.querySelector('#finish-form').submit();
    }
  }
};
</script>
