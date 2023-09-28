<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Landing Page</title>
    @vite('resources/css/app.css')


</head>
<body>
<div id="app" class="relative">
    <div v-cloak v-if="isSend" class="z-50 absolute mx-auto w-10/12 sm:w-7/12 md:w-6/12 xl:w-4/12  bg-green-400 p-5 mt-3 ml-3 text-green-700">Your application has been sent!</div>

    <section class="w-full absolute right-0 min-h-screen p-4 sm:p-10 md:p-24 flex justify-between items-center z-2 bg-black">




        <header class=" absolute top-0 left-0 w-full pt-1 pl-10 sm:pl-24 sm:pt-10 z-49 flex justify-between items-center" >
            <h2 class="text-white uppercase cursor-pointer">Travel</h2>
        </header>
        <video class="absolute top-0 left-0 w-full h-full object-cover opacity-80" src="{{asset('/img/video2.mp4')}}" muted loop autoplay></video>
        <div class="overlay absolute top-0 left-0 w-full h-full mix-blend-overlay bg-main-50"></div>
        <div v-cloak v-if="openModal" class="relative z-1  w-full sm:w-8/12 md:w-6/12  xl:w-4/12  mx-auto relative">
            <div v-if:="sending" class=" absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                <div role="status" >
                    <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <div v-on:click="toggle" class="absolute top-1 right-1 cursor-pointer" >
                <svg class="w-4 h-4" fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="15px" height="15px">    <path d="M 7 4 C 6.744125 4 6.4879687 4.0974687 6.2929688 4.2929688 L 4.2929688 6.2929688 C 3.9019687 6.6839688 3.9019687 7.3170313 4.2929688 7.7070312 L 11.585938 15 L 4.2929688 22.292969 C 3.9019687 22.683969 3.9019687 23.317031 4.2929688 23.707031 L 6.2929688 25.707031 C 6.6839688 26.098031 7.3170313 26.098031 7.7070312 25.707031 L 15 18.414062 L 22.292969 25.707031 C 22.682969 26.098031 23.317031 26.098031 23.707031 25.707031 L 25.707031 23.707031 C 26.098031 23.316031 26.098031 22.682969 25.707031 22.292969 L 18.414062 15 L 25.707031 7.7070312 C 26.098031 7.3170312 26.098031 6.6829688 25.707031 6.2929688 L 23.707031 4.2929688 C 23.316031 3.9019687 22.682969 3.9019687 22.292969 4.2929688 L 15 11.585938 L 7.7070312 4.2929688 C 7.5115312 4.0974687 7.255875 4 7 4 z"/></svg>
            </div>
            <form v-cloak v-on:submit.prevent="submit" class="w-full flex flex-col justify-center bg-black p-8 text-sm bg-opacity-50">
                <input v-on:input="form.name.errors = []" v-model="form.name.value" :class="form.name.errors.length > 0 ? 'border-2 border-red-400 ' : ''" class="outline-none my-2 px-4 py-3" type="text" placeholder="Your name">
                <p v-cloak v-if="form.name.errors.length > 0" class="text-red-500 bg-opacity-50">${form.name.errors[0]}$</p>
                <input v-on:input="form.email.errors = []" v-model="form.email.value" :class="form.email.errors.length > 0 ? 'border-2 border-red-400 ' : ''" class="outline-none my-2 px-4 py-3" type="text" placeholder="Your email">
                <p v-cloak v-if="form.email.errors.length > 0" class="text-red-500 bg-opacity-50 ">${form.email.errors[0]}$</p>
                <textarea v-model="form.message.value" rows="6" class="outline-none my-2 px-4 py-3" placeholder="Your message"></textarea>
                <button class="my-2 bg-white font-semibold uppercase px-6 py-3 transition-all duration-500 hover:tracking-widest">Send application</button>
            </form>
        </div>
        <div v-else class="relative mx-auto z-1 select-none">
            <h2 class="text-4xl sm:text-6xl  md:text-7xl font-bold text-white leading-12 uppercase">Never Stop To</h2>
            <h3 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white leading-12 uppercase mb-6">Exploring The World</h3>

            <form v-on:submit.prevent="submit" class="w-full flex flex-col justify-center bg-black p-8 text-sm bg-opacity-50">
                <input v-on:input="form.name.errors = []" v-model="form.name.value" :class="form.name.errors.length > 0 ? 'border-2 border-red-400 ' : ''" class="outline-none my-2 px-4 py-3" type="text" placeholder="Your name">
                <p v-if="form.name.errors.length > 0" class="text-red-500 bg-opacity-50">${form.name.errors[0]}$</p>
                <input v-on:input="form.email.errors = []" v-model="form.email.value" :class="form.email.errors.length > 0 ? 'border-2 border-red-400 ' : ''" class="outline-none my-2 px-4 py-3" type="text" placeholder="Your email">
                <p v-if="form.email.errors.length > 0" class="text-red-500 bg-opacity-50 ">${form.email.errors[0]}$</p>
                <textarea v-model="form.message.value" rows="6" class="outline-none my-2 px-4 py-3" placeholder="Your message"></textarea>
                <button class="my-2 bg-white font-semibold uppercase px-6 py-3 transition-all duration-500 hover:tracking-widest">Send application</button>
            </form>
{{--            <p class="text-base max-w-2xl font-medium text-white leading-12 my-6 uppercase">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id magnam dicta asperiores sunt tenetur vel aspernatur laborum dignissimos veniam mollitia. Culpa optio praesentium veniam dolorem eveniet provident voluptates sed sint.</p>--}}
{{--            <a v-on:click.prevent="toggle" class="bg-white font-semibold uppercase px-6 py-3  transition-all duration-500 hover:tracking-widest" href="">Explore</a>--}}

        </div>

    </section>

</div>

<script src="{{asset('js/vue.js')}}"></script>
<script src="{{asset('js/axios.js')}}"></script>
<script>
    const { createApp } = Vue
    createApp({
        delimiters: ["${", "}$"],
        data() {
            return {
                openModal:false,
                sending:false,
                isSend:false,
                form:{
                    name:{
                        value:"",
                        errors:[]
                    },
                    email:{
                        value:"",
                        errors:[]
                    },
                    message:{
                        value:"",
                        errors:[]
                    }
                }
            }
        },
        methods:{
            toggle: function (){
                this.openModal = !this.openModal
            },
            submit: function(){
                let data = {
                    name:this.form.name.value,
                    email:this.form.email.value,
                    message:this.form.message.value,
                }

                this.sending =  true;

                let _this = this;
                axios.post('/api/send-application', data).then(function (response) {
                    _this.toggle();
                    _this.form.name.value = "";
                    _this.form.email.value = "";
                    _this.form.message.value = "";
                    _this.isSend = true;
                    _this.sending =  false
                    setTimeout(() => {
                        _this.isSend = false;
                    }, 4000)
                }).catch(function (error) {

                       if(error.response && error.response.data){
                           Object.entries(error.response.data.errors).map((err) => {
                               if(err[0] === 'name'){
                                   _this.form.name.errors = err[1]
                               }

                               if(err[0] === 'email'){
                                   _this.form.email.errors = err[1]
                               }
                           })
                       }

                    _this.sending =  false
                });


            }
        }
    }).mount('#app')
</script>
</body>
</html>
