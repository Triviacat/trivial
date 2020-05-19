<template>
    <section>
        <div class="field">
            <b-radio v-model="radio" name="private" native-value="1">
                {{ this.trans.get('trivial.privacityTrue') }}
            </b-radio>
        </div>
        <div class="field">
            <b-radio v-model="radio" name="private" native-value="0">
                {{ this.trans.get('trivial.privacityFalse') }}
            </b-radio>
        </div>
        <b-field :label="this.trans.get('trivial.chatUrl')" :message="this.trans.get('trivial.chatUrlHelp')">
            <b-input v-model="chat" name="chat"></b-input>
        </b-field>
        <b-field :label="this.trans.get('trivial.chatPassword')" :message="this.trans.get('trivial.chatPasswordHelp')">
            <b-input v-model="password" name="password"></b-input>
        </b-field>
        <div class="field" v-show="showInvited">
            <span class="label">{{ this.trans.get('trivial.invitedUsers') }}</span>
            <user-multiselect v-model="selectedUsers" id="ajax" label="name" track-by="id"
                :placeholder="this.trans.get('trivial.invitedUsers')" open-direction="bottom" :options="users"
                :multiple="true" :searchable="true" :loading="isLoading" :internal-search="false"
                :clear-on-select="true" :close-on-select="false" :options-limit="300" :limit="6" :max-height="600"
                :show-no-results="false" :hide-selected="true" @search-change="asyncFind" @blur="notLoading">
                <template slot="tag" slot-scope="{ option, remove }"><span
                        class="custom__tag"><span>{{ option.name }}</span><span class="custom__remove"
                            @click="remove(option)"><i class="far fa-times-circle"></i></span></span></template>
                <template slot="clear" slot-scope="props">
                    <div class="multiselect__clear" v-if="selectedUsers.length"
                        @mousedown.prevent.stop="clearAll(props.search)"></div>
                </template><span slot="noResult">Oops! No elements found. Consider changing the search query.</span>
            </user-multiselect>
            <p class="help">{{ this.trans.get('trivial.invitedUsersHelp') }}</p>
        </div>
        <div class="field">
            <button class="button">{{ this.trans.get('trivial.send') }}</button>
        </div>
        <input type="hidden" name="invited" :value="invited">
        <input type="hidden" name="user_id" :value="user_id">
    </section>
</template>

<script>
export default {
  props: {
    user_id: {
      type: Number
    },
    game: {
      type: Object,
      default: null
    },
    users_invited: {
      type: Array,
      default: null
    }
  },
  methods: {
    asyncFind: async function (query) {
      await window.axios.get('/api/users/name/' + query)
        .then(response => {
          this.users = response.data
          this.isLoading = false
        })
        .catch(function (error) {
          console.log(error)
        })
    },
    clearAll () {
      this.selectedUsers = []
    },
    notLoading () {
      this.isLoading = false
    }
  },

  data () {
    return {
      radio: '1',
      chat: '',
      password: '',
      selectedUsers: [],
      users: [],
      isLoading: false,
      invited: '',
      showInvited: 1
    }
  },
  watch: {
    radio: function (val, oldVal) {
      // console.log(val),
      switch (val) {
        case '0':
          this.showInvited = false
          break

        case '1':
          this.showInvited = true
          break
      }
    },
    selectedUsers: function (val, oldVal) {
      this.invited = JSON.stringify(this.selectedUsers)
      this.isLoading = false
      console.log(this.selectedUsers)
    }
    // chat: function (val, oldVal) {
    //     console.log(this.chat)
    // }
  },
  mounted () {
    if (this.game) {
      this.radio = this.game.private
      this.chat = this.game.chat
      this.password = this.game.password
    }
  },
  created () {
    if (this.users_invited) {
      this.invited = JSON.stringify(this.users_invited)
      this.selectedUsers = this.users_invited
      // console.log(this.invited);
    }
    // this.users = this.users_invited;
    // this.invited = JSON.stringify(this.users_invited);
    // console.log(this.users);
  }
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
