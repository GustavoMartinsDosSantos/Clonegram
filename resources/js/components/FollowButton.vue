<template>
  <div class="container">
    <button
      class="btn btn-primary ml-4"
      @click="followUser"
      v-text="buttonText"
    ></button>
  </div>
</template>

<script>
export default {
  props: ["userId", "follows"],
  data: function () {
    return { followStatus: this.follows };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    followUser() {
      axios
        .post(`/follow/${this.userId}`)
        .then((response) => {
          this.followStatus = !this.followStatus;
        })
        .catch((error) => {
          if(error.response.status === 401)
            window.location = '/login'
        });
    },
  },
  computed: {
    buttonText() {
      return this.followStatus ? "Unfollow" : "Follow";
    },
  },
};
</script>
