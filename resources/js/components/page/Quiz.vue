<template>
  <div>
    <main>
      <div class="container">
        <article class="col-md-8 col-xs-12">
          <section>
            <h2 class="quiz-question-h2">
              <img class="quiz-question__logo" src="/images/what-is-mark.png" />
              第{{ quizNumber }}問
            </h2>
            <p>{{ title }}</p>
            <div v-if="imageSrc">
              <img class="img-responsive" id="quiz-image" :src="'/images/quiz/' + imageSrc" />
            </div>
            <div class="quiz-answer__list">
              <ul>
                <li v-for="(answer, index) in answers" :key="index">
                  <a>
                    <button
                      @click="goAnswer(index + 1)"
                      :disabled="isAlreadyAnswered"
                    >{{ index + 1 }}</button>
                  </a>
                  {{ answer }}
                </li>
              </ul>
            </div>
            <div class="text-right">カテゴリー: {{ categoryName }}</div>
          </section>
          <section>
            <h2 class="quiz-correct-h2">
              <img class="quiz-correct__logo" src="/images/correct-mark.png" />正解
            </h2>
            <p>
              <button
                class="quiz-correct-answer"
                v-show="isAlreadyAnswered"
                disabled
              >{{ correctAnswerNo }}</button>
            </p>
            <button @click="goAnswer(0)" v-show="!isAlreadyAnswered">正解を表示する</button>
            <div class="alert alert-info" v-show="isCorrect">
              <strong>正解!</strong>
            </div>
            <div class="alert alert-danger" v-show="isMistake">
              <strong>不正解!</strong>
            </div>
          </section>
          <section>
            <h2 class="quiz-commentary-h2">
              <img class="quiz-commentary__logo" src="/images/commentary-mark.png" />解説
            </h2>
            <div
              class="quiz-commentary__text"
              v-show="isAlreadyAnswered"
              style="white-space:pre-wrap; word-wrap:break-word;"
            >{{ commentary }}</div>
            <button
              type="button"
              class="btn btn-primary center-block"
              @click="goNextQuiz"
              v-if="!isQuizFinish"
            >次の問題へ</button>
            <button
              type="button"
              data-toggle="modal"
              data-target="#modal-result"
              class="center-block"
              v-show="isQuizFinish"
              @click="showResult"
            >結果を見る</button>
          </section>
        </article>
        <the-sidebar></the-sidebar>
      </div>
    </main>
    <!--  ここから追加 -->
    <the-modal :correctPercentageObject="correctPercentageObject" ref="modal" ></the-modal>
    <!--  ここまで追加 -->

  </div>
</template>

<script>
import TheSidebar from "../layout/TheSidebar";

// ここから追加
import TheModal from "../module/TheModal";
// ここまで追加

export default {
  components: {
    TheSidebar,

    // ここから追加
    TheModal
    // ここまで追加

  },
  data() {
    return {
      quizData: [],
      title: "",
      imageSrc: "",
      answers: [],
      commentary: "",
      correctAnswerNo: 0,
      isCorrect: false, //正解かどうか
      isMistake: false, //間違いかどうか
      isAlreadyAnswered: false, //回答済みかどうか
      isQuizFinish: false, //クイズが終了したかどうか
      score: 0,
      quizNumber: 1,
      categoryName: "",

      // ここから追加
      correctPercentageObject: {}
      // ここまで追加
    };
  },
  mounted() {
    const categories = this.$route.query.categories;
    const loader = this.$loading.show();
    this.$http.get(`/api/quiz?categories=${categories}`).then(response => {
      this.quizData = response.data;
      if(this.quizData.length < 10) {
        alert('クイズ10問以下のため、初期画面に戻ります。カテゴリーを選択し直してください');
        location.href = "/";
      } else {
        this.findNextQuiz(0);
        loader.hide();
      }
    });
  },
  methods: {
    goAnswer(selectAnswerNum) {
      if (selectAnswerNum === 0) {
        // selectAnswerNumが0の場合は、click 「正解を表示する」ボタンのクリック
        this.isCorrect = false;
        this.isMistake = false;
      } else if (selectAnswerNum === Number(this.correctAnswerNo)) {
        // 正解を押した場合
        this.isCorrect = true;
        this.isMistake = false;
        this.score += 1;
      } else {
        // 不正解の場合
        this.isMistake = true;
        this.isCorrect = false;
      }
      // 回答済み
      this.isAlreadyAnswered = true;
      if (this.quizNumber >= 10) {
        this.endQuiz();
      }
    },
    findNextQuiz(quizNumber) {
      window.scroll(0, 0);
      this.title = this.quizData[quizNumber].title;
      this.answers = [
        this.quizData[quizNumber].answer.answer_1,
        this.quizData[quizNumber].answer.answer_2,
        this.quizData[quizNumber].answer.answer_3,
        this.quizData[quizNumber].answer.answer_4
      ];
      this.commentary = this.quizData[quizNumber].answer.commentary;
      this.correctAnswerNo = this.quizData[quizNumber].answer.correct_answer_no;
      this.categoryName = this.quizData[quizNumber].category.name;
    },
    goNextQuiz() {
      // 次の問題へをクリック
      if (this.quizNumber >= 10) {
        this.endQuiz();
      } else {
        this.findNextQuiz(this.quizNumber);
        this.quizNumber += 1;
        this.isCorrect = false;
        this.isMistake = false;
        this.isAlreadyAnswered = false;
      }
    },
    endQuiz() {
      this.isQuizFinish = true;
      this.answerNo = "-";
      this.isAlreadyAnswered = true;

      // ここから追加
      this.correctPercentageObject = {
        correctScore: this.score,
        mistakeScore: 10 - this.score
      };
    },
    showResult() {
      this.$refs.modal.render();
    }
    // ここまで追加

  }
};
</script>
