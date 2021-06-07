<template>
    <div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="fullname">Full Name</label>
            <input class="form-control" v-model="fullname" type="text" id="fullname" name="fullname">
        </div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <div class="custom-file">
                <input id="file" @change="labelChange()" ref="fileInput" name="file" type="file" class="custom-file-input">
                <label class="custom-file-label" id="file_label" for="file">{{fileLabel}}</label>
            </div>
        </div>
        <div class="form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <label for="docType">Company</label>
            <select id="docType" class="form-control"  v-model="company" name="company_id">
                <option v-for="company in companyList" :value="company.id">{{company.name}}</option>
            </select>
        </div>
        <div v-for="(question, index) in questions">
            <div class="form-group offset-md-2 offset-lg-2 offset-0 col-md-8 col-lg-8 col-12">
                <label for="question">Вопрос {{index+1}}</label>
                <input class="form-control" type="text" v-model="question.question" id="question">
            </div>
            <div class="form-group offset-md-2 offset-lg-2 offset-0 col-md-8 col-lg-8 col-12">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" v-model="question.answers.a1" :placeholder="`Ответ A`" :aria-label="`Ответ A`" aria-describedby="basic-addon2">
                </div>
            </div>
            <div class="form-group offset-md-2 offset-lg-2 offset-0 col-md-8 col-lg-8 col-12">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" v-model="question.answers.a2" :placeholder="`Ответ B`" :aria-label="`Ответ B`" aria-describedby="basic-addon2">
                </div>
            </div>
            <div class="form-group offset-md-2 offset-lg-2 offset-0 col-md-8 col-lg-8 col-12">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" v-model="question.answers.a3" :placeholder="`Ответ C`" :aria-label="`Ответ C`" aria-describedby="basic-addon2">
                </div>
            </div>
            <div class="form-group offset-md-2 offset-lg-2 offset-0 col-md-8 col-lg-8 col-12">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" v-model="question.answers.a4" :placeholder="`Ответ D`" :aria-label="`Ответ D`" aria-describedby="basic-addon2">
                </div>
            </div>
            <div class="form-group offset-md-2 offset-lg-2 offset-0 col-md-8 col-lg-8 col-12">
                <div class="input-group mb-3">
                    <select id="docType" class="form-control"  v-model="question.correct" name="company_id">
                        <option :value="question.answers.a1">{{question.answers.a1}}</option>
                        <option :value="question.answers.a2">{{question.answers.a2}}</option>
                        <option :value="question.answers.a3">{{question.answers.a3}}</option>
                        <option :value="question.answers.a4">{{question.answers.a4}}</option>
                    </select>
                </div>
            </div>

            <div class="form-group offset-md-2 offset-lg-2 offset-0 col-md-8 col-lg-8 col-12">
                <input class="btn btn-outline-secondary col-2 offset-5" @click="remove(index)" v-if="questions.length > 1" type="button" value="-">
            </div>
        </div>
        <div class="form-group offset-md-2 offset-lg-2 offset-0 col-md-8 col-lg-8 col-12">
            <input type="button" value="+" class="btn btn-outline-success col-2 offset-5" @click="add">
        </div>

        <div class="flex justify-content-center form-group offset-md-2 offset-ld-2 offset-0 col-md-8 col-lg-8 col-12">
            <button type="button" @click="send" class="btn-info btn-lg btn">Отправить</button>
        </div>

    </div>
</template>

<script>
    export default {
        name: "Test",
        data() {
            return {
                companyList : [],
                fileLabel : 'Загрузите файл',
                img : null,
                fullname : null,
                company : null,
                questions : [
                    {
                        question : null,
                        answers : {
                            a1 : null,
                            a2 : null,
                            a3 : null,
                            a4 : null
                        },
                        correct : null
                    },
                ],
                formData : null,
            }
        },
        mounted(){
            this.getCompanyList()
        },
        methods : {
            getCompanyList() {
                this.axios.post('/getCompanyList', {})
                    .then(response => {
                        this.companyList = response.data.company
                    });
            },
            labelChange() {
                var files = this.$refs.fileInput.files;
                this.fileLabel = files[0].name;
                this.img = files[0];
            },
            add(){
                this.questions.push({
                    question : null,
                    answers : {
                        a1 : null,
                        a2 : null,
                        a3 : null,
                        a4 : null
                    },
                    correct : null
                });
            },
            remove(index){
                this.questions.splice(index, 1);
            },
            send(){
                if(this.validate()) {
                    this.axios.post('/test/add', this.formData)
                        .then(response => {
                            if (response.data.success) {
                                location.href = '/';
                            } else {
                                alert("Error : " + response.data.errorText);
                            }
                        });
                }
            },
            validate(){
                this.formData = null;
                var form = new FormData();
                if(this.company === '' || this.company === null) {
                    alert('Error : Company Field')
                    return false;
                }
                form.append('company', this.company);
                if(this.fullname === '' || this.fullname === null) {
                    alert('Error : Fullname Field')
                    return false;
                }
                form.append('fullname', this.fullname);
                if(this.img === '' || this.img === null) {
                    alert('Upload an image');
                    return false;
                }
                form.append('image', this.img, this.img.name);
                this.questions.forEach((question, index) => {
                    console.log(question);
                    if(question.question === '' || question.question=== null) {
                        alert('Question #' + (index+1) + ', Question Field');
                        return false;
                    }
                    if(
                        question.answers.a1 === '' || question.answers.a1 === null ||
                        question.answers.a2 === '' || question.answers.a2 === null ||
                        question.answers.a3 === '' || question.answers.a3 === null ||
                        question.answers.a4 === '' || question.answers.a4 === null
                    ){
                        alert('Question #' + (index+1) + ', Answers Field');
                        return false;
                    }
                    if(question.correct === null){
                        alert('Question #' + (index+1) + ', Correct Answer Field');
                        return false;
                    }
                    form.append(`questions[${index}][question]`, question.question);
                    form.append(`questions[${index}][a1]`, question.answers.a1);
                    form.append(`questions[${index}][a2]`, question.answers.a2);
                    form.append(`questions[${index}][a3]`, question.answers.a3);
                    form.append(`questions[${index}][a4]`, question.answers.a4);
                    form.append(`questions[${index}][correct]`, question.correct);
                });
                this.formData = form;
                return true;
            },
        }
    }
</script>

<style scoped>

</style>