<template>
  <div>
      <svg @click="editContact" id="edit" width="30" height="30" viewBox="0 0 30 30" fill="none"
           xmlns="http://www.w3.org/2000/svg">
          <mask id="mask100" mask-type="alpha" maskUnits="userSpaceOnUse" x="6" y="6" width="19"
                height="19">
              <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M6 20.2525V24.0025H9.75L20.81 12.9425L17.06 9.1925L6 20.2525ZM23.71 10.0425C24.1 9.6525 24.1 9.0225 23.71 8.6325L21.37 6.2925C20.98 5.9025 20.35 5.9025 19.96 6.2925L18.13 8.1225L21.88 11.8725L23.71 10.0425Z"
                    fill="white"/>
          </mask>
          <g mask="url(#mask100)">
              <rect :class="getSelectedContacts.length == 1 ? 'actionButtons' : ''" x="2" y="2" width="26" height="26" fill="#   "/>
          </g>
      </svg>
  </div>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";

  export default {
    name: "EditBtn",
      methods: {
        ...mapActions(["clearSelectedFromGroups"]),
          editContact() {
              if (this.getSelectedContacts.length == 1) {
                  this.$router.push({ name: 'ContactEdit', params: {user_id: this.getSelectedContacts[0]}});
              }
          }
      },
      computed: {
        ...mapGetters(["getSelectedContacts"])
      },
  }
</script>

<style>

</style>
