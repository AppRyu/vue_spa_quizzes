<template>
  <div>
    <main>
      <div class="container">
        <article class="col-md-8 col-xs-12">
          <section class="home-quiz__introduction">
            <h2 class="home-quiz__introduction-h2">
              <img class="home-quiz__introduction-h2-logo" src="/images/what-is-mark.png" />4 Answers Quizとは?
            </h2>
            <p>4 Answers Quizとはビジネスマナーから一般常識に至るまで様々なクイズを4択で出題するWEBアプリです。</p>
            <p>何度もトライしてみて正解率100%を目指してみてください。</p>
          </section>
          <section class="home-quiz__setting">
            <h2 class="home-quiz__setting-h2">
              <img class="home-quiz__setting-h2-logo" src="/images/directory-icon.png" />出題設定
            </h2>
            <form>
              <label v-for="(cate, index) in category" :key="index">
                <input type="checkbox" v-model="categories" :value="cate.id" checked />
                {{cate.name}}&ensp;
              </label>
              <div>
                全項目チェック
                <button type="button" @click="checkAll">ON</button>
                <button type="button" @click="checkAllOff">OFF</button>
              </div>
              <button type="submit" class="btn btn-primary" @click.stop.prevent="goQuiz()">出題開始</button>
            </form>
          </section>
          <section class="home-quiz__ranking">
            <h2 class="home-quiz__ranking-h2">
              <img class="home-quiz__ranking-h2-logo" src="/images/graph-icon.png" />ランキング
            </h2>
            <div>
              <label>
                <input class="ranking-radio" type="radio" v-model="rankingType" value="1" />総合
              </label>
              <label>
                <input class="ranking-radio" type="radio" v-model="rankingType" value="2" />今月
              </label>
              <label>
                <input class="ranking-radio" type="radio" v-model="rankingType" value="3" />今週
              </label>
            </div>
            <div class="home_quiz__ranking-chart">
              <bar-chart :chartData="total" ref="totalChart" v-show="rankingType === '1'"></bar-chart>
              <bar-chart :chartData="month" ref="monthChart" v-show="rankingType === '2'"></bar-chart>
              <bar-chart :chartData="week" ref="weekChart" v-show="rankingType === '3'"></bar-chart>
            </div>
          </section>
          <section class="home__notice">
            <h2 class="home__notice-h2">
              <img class="home__notice-h2-logo" src="/images/news-icon.png" />お知らせ情報
            </h2>
            <dl v-for="(info, index) in information" :key="index">
              <dt>{{info.created_at}}</dt>
              <dd>{{info.information}}</dd>
            </dl>
          </section>
        </article>
        <the-sidebar></the-sidebar>
      </div>
      <notifications />
    </main>
  </div>
</template>

<script>
import TheSidebar from "../layout/TheSidebar";
import BarChart from "../module/BarChart";

export default {
  components: {
    TheSidebar,
    BarChart
  },
  data() {
    return {
      categories: [1],
      information: [],
      category: [],
      rankingAlldata: {},
      week: {},
      month: {},
      total: {},
      rankingType: "1",
      selectAll: false
    };
  },
  mounted() {
    this.$http.get("/api/category").then(response => {
      this.category = response.data;
    });
    this.$http.get("/api/information").then(response => {
      this.information = response.data;
    });
    this.$http.get("/api/ranking").then(response => {
      this.rankingAlldata = response.data;
      this.setRanking();
    });
    const referrer = document.referrer;
    if (referrer.indexOf("/login") !== -1) {
      this.displayNotification("ログインしました", "info");
      this.resetReferrer();
    } else if (referrer.indexOf("/register") !== -1) {
      this.displayNotification("会員登録しました", "success");
      this.resetReferrer();
    }
  },
  methods: {
    checkAll() {
      let val = [];
      this.category.forEach(element => {
        val.push(element.id);
      });
      this.categories = val;
    },
    checkAllOff() {
      this.categories = [];
    },
    goQuiz() {
      this.$router.push("/quiz?categories=" + this.categories);
    },
    setRanking() {
      this.week = Object.assign({}, this.week, {
        labels: this.rankingAlldata.weekRankingData.name,
        datasets: [
          {
            label: ["最高得点率"],
            backgroundColor: "rgba(0, 170, 248, 0.47)",
            data: this.rankingAlldata.weekRankingData.percentage_correct_answer
          }
        ]
      });
      this.month = Object.assign({}, this.month, {
        labels: this.rankingAlldata.monthRankingData.name,
        datasets: [
          {
            label: ["最高得点率"],
            backgroundColor: "rgba(0, 170, 248, 0.47)",
            data: this.rankingAlldata.monthRankingData.percentage_correct_answer
          }
        ]
      });
      this.total = Object.assign({}, this.total, {
        labels: this.rankingAlldata.totalRankingData.name,
        datasets: [
          {
            label: ["最高得点率"],
            backgroundColor: "rgba(0, 170, 248, 0.47)",
            data: this.rankingAlldata.totalRankingData.percentage_correct_answer
          }
        ]
      });
      this.$nextTick(() => {
        this.$refs.totalChart.renderBarChart();
        this.$refs.monthChart.renderBarChart();
        this.$refs.weekChart.renderBarChart();
      });
    },
    resetReferrer() {
      Object.defineProperty(document, "referrer", {
        value: location.href
      });
    },
    displayNotification(text, type) {
      this.$notify({
        title: "お知らせ",
        text: text,
        type: type
      });
    }
  }
};
</script>