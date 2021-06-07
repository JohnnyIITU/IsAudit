<template>
    <div v-if="questions.length > 0" class="container" style="margin-top: 200px; margin-bottom: 20px">
        <div class="col-12">
            <h1>{{label}}</h1>
            <h6>{{fullname}}</h6>
        </div>
        <div class="row" v-if="!finished">
            <div class="col-12 col-lg-4 col-md-4 row" style="height: fit-content" >
                <div v-for="(qq, ind) in questions" class="col-2 mb-2">
                    <button class="btn" :class="qq.u_answer === null ? 'btn-outline-info' : 'btn-info'" @click="index = ind"
                            style=" width: 50px;
                            height: 50px">{{ind+1}}</button>
                </div>
            </div>
            <div class="col-12 col-lg-7 col-md-7 offset-lg-1 offset-md-1">
                <label>{{index+1}}. {{questions[index].question}}</label>
                <br>
                <div v-for="answer in questions[index].choices">
                    <label class="checkbox-inline"><input :name="'q_'+index" id="temp" type="radio" v-model="questions[index].u_answer" :value="answer">{{answer}}</label><br>
                </div>
                <button class="btn btn-outline-info" @click="prev" :disabled="index === 0">Prev</button>
                <button class="btn btn-outline-info" @click="next" :disabled="index === questions.length - 1">Next</button>
                <p>Current : {{index+1}}</p>
                <p>Questions : {{questions.length}}</p>
                <button class="btn btn-outline-info" @click="finish">Finish</button>
            </div>
        </div>
        <div class="row" v-else>
            <h1>
                Правильные ответы : {{count}}
            </h1>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                questions : [],
                index : 0,
                finished : false,
                count : 0
            }
        },
        props : {
            tId : Number,
            label : String,
            fullname : String
        },
        methods : {
            getQuestion() {
                this.axios.post('/getQuestions', {tId : this.tId})
                    .then(response => {
                        this.questions = response.data.questions;
                    });
            },
            next() {
                this.index++;
            },
            prev() {
                this.index--;
            },
            finish(){
                if(confirm('Finish ???')){
                    this.axios.post('/setQuestionResult', {questions : this.questions, test : this.tId})
                        .then(response => {
                            this.count = response.data.count
                            this.finished = true;
                        });
                }
            }
        },
        mounted(){
            this.getQuestion()
        }
    }
</script>
