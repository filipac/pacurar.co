<template>
    <div ref="contact">
        <form id="contactForm" method="post" class="form" role="form" novalidate v-on:submit.prevent="onSubmit" v-if="!sent">
            <!-- Form Field -->
            <div class="form-group">
                <input class="form-control required" id="name" name="name" placeholder="Name" type="text" v-validate="'required'" v-model="name"/>
                <span v-show="errors.has('name')" class="has-error error">{{ errors.first('name') }}</span>
            </div>
            <!-- /Form Field -->
            <!-- Form Field -->
            <div class="form-group">
                <input class="form-control required" id="email" name="email" placeholder="Email" type="email" v-validate="'required|email'" v-model="email"/>
                <span v-show="errors.has('email')" class="has-error error">{{ errors.first('email') }}</span>
            </div>
            <!-- /Form Field -->
            <!-- Form Field -->
            <div class="form-group">
                <input class="form-control required" id="subject" type="text" name="subject" placeholder="Subject" v-validate="'required'" v-model="subject">
                <span v-show="errors.has('subject')" class="has-error error">{{ errors.first('subject') }}</span>
            </div>
            <!-- /Form Field -->
            <!-- Form Field -->
            <div class="form-group">
                <textarea class="form-control required" id="message" name="message" placeholder="Message" rows="5" v-validate="'required'" v-model="message"></textarea>
                <span v-show="errors.has('message')" class="has-error error">{{ errors.first('message') }}</span>
            </div>
            <!-- /Form Field -->
            <!-- Form Field -->
            <div class="form-group">
                <input type="submit" class="btn btn-default form-send" value="Send!">
            </div>
            <!-- /Form Field -->
        </form>
        <div class="thank-you" v-if="sent">
            <p>Thank you from your message. We will get in touch soon.</p>
        </div>
    </div>
</template>

<script>
    export default {
      data: () => ({
        name: null,
        email: null,
        subject: null,
        message: null,
        sent: false
      }),
      methods: {
        onSubmit() {
          this.$validator.validateAll().then(() => {
            console.log('da')
            console.log(axios)
            axios.post('contact', {name:this.name,email:this.email,subject:this.subject,message:this.subject}).then((resp) => {
              this.sent = true
            }).catch((resp) => {
                console.log(resp)
            })
          }).catch(() => {
          });
        }
      }
    }
</script>