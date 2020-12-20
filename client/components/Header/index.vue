<template>
  <header>
    <a class='logo' href='/'>
      <img src='/logo.png' alt=''>
    </a>
    <div v-if='!profile' class='profile'>
      <div class='enter' @click='$store.commit("modals/setAuth", true)'>
        <img src='/i_people.png' alt=''>
        <span>Войти</span>
      </div>
    </div>
    <div v-else class='profile'>
      <div class='notification'>
        <div class='icon' @click='Active = !Active'>
          <span>{{ notifications <= 100 ? notifications : '100+' }}</span>
          <img src='/bell.png' alt=''>
        </div>
        <NotificationDropdown class='notification__dropdown' :class='{active: Active}'/>
      </div>
      <a class='enter' href='/profile'>
        <img src='/i_people.png' alt=''>
        <div class='enter-btn'></div>
        <span>{{ name }}</span>
      </a>
    </div>
  </header>
</template>

<script>
  import NotificationDropdown from '../NotificationDropdown'
  import {mapActions, mapGetters} from "vuex";

  export default {
    name: "index",
    components: {NotificationDropdown},
    data() {
      return {
        notifications: 100,
        Active: false
      }
    },
    computed: {
      name() {
        return this?.profile?.first_name || 'Профиль'
      },
      ...mapGetters('user', ['current_token', 'profile']),
      ...mapGetters('cards', ['UnreadNotificationsCount']),
    },
    methods: mapActions('user', ['signOut'])
  }
</script>

<style lang='scss' scoped>
  header {
    .logo {
      display: flex;
      justify-content: flex-start;
      align-items: center;
    }

    .profile {
      display: flex;
      justify-content: center;
      align-items: center;

      & img {
        border-radius: 50px;
        background-color: #FDFDFD;
        box-shadow: 0 4px 10px #CBC09F;
        padding: 20px;
      }

      & > span {
        color: black;
        font-size: 24px;
        margin: 20px;
      }

      & .notification {
        &__dropdown {
          opacity: 0;
          transition: 0.3s;
          z-index: -1;

          &.active {
            opacity: 1;
            z-index: auto;
          }
        }

        margin-right: 3em;
        position: relative;

        & .icon {
          &:hover {
            cursor: pointer;
          }
        }

        & span {
          background: #FFCC33;
          border-radius: 32px;
          position: absolute;
          top: 0;
          right: -20px;
          padding: 2px 10px;
        }

        display: flex;
        justify-content: center;
        align-items: center;
      }

      .enter {
        display: flex;
        justify-content: center;
        align-items: center;

        &:hover {
          cursor: pointer;
        }

        & > span {
          color: black;
          font-size: 24px;
          margin: 20px;
        }
      }

    }

    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 15em;
    background: #fff;
  }
</style>
