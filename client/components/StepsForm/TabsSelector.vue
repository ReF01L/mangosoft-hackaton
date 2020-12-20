<template>
  <div class='TabsSelector'>

    <div class='tabs'>
      <div class='tab' v-for='tag in selected'
           @click='listAll.push(tag); selected = selected.filter(({id})=> id !== tag.id); $store.commit("modals/setSkills", selected)'>
        {{ tag.name }}
        <div class='tab-icon'/>
      </div>
    </div>
    <div class='field'>
      <input placeholder='Поиск' class='input' v-model='search'/>
      <div class='input-icon'/>

      <div class='selector' v-if='search'>
        <Close @click='search = ""'/>
        <div class='smol-title'>
          Рекомендуем
        </div>

        <div class='tabs'>
          <div class='tab' v-for='tag in filteredList'
               @click='selected.push(tag); $store.commit("modals/setSkills", selected); listAll = listAll.filter(({id})=> id !== tag.id)'>
            {{ tag.name }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Close from "~/components/StepsForm/Close";
import axios from "axios";

export default {
  name: "TabsSelector",
  components: {Close},
  data() {
    return {
      open: false,
      listAll: [],
      selected: [],
      search: ''
    }
  },
  computed: {
    filteredList() {
      const filtered = this.listAll.filter(({name}) => {
        return name.toLowerCase().includes(this.search.toLowerCase())
      })
      return filtered.length ? filtered : this.listAll
    }
  },
  async mounted() {
    axios
      .get(process.env.API + 'skills')
      .then(res => {
        if (res.status === 200) this.listAll = res?.data?.data;
      })
      .catch(err => {
        alert("Отсутсвует соединение с сервером: \n" + err)
      })
  },
  methods: {
    addTag() {

    },
    removeTag() {

    },
  }
}

</script>


<style scoped lang='scss'>
.TabsSelector {

}

.tabs {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;

  &:not(:empty) {
    margin-bottom: 30px;

  }

  .tab {
    height: 32px;
    padding: 8px 35px;
    display: flex;
    align-items: center;
    gap: 10px;

    border: 1px solid #C4C4C4;
    box-sizing: border-box;
    border-radius: 10px;


    font-size: 14px;
    line-height: 15px;

    color: #717171;


  }

  .tab-icon {
    width: 22px;
    height: 16px;
    background: url("../../static/tab-del.svg");
    background-size: contain;
    cursor: pointer;

    &:hover {

      filter: brightness(.5);
    }
  }

}

.field {
  position: relative;
  margin-bottom: 30px;

  .input {
    width: 100%;
    height: 52px;

    border: 1px solid #BCBCBC;
    box-sizing: border-box;
    border-radius: 100px;
    padding: 0 32px;

  }

  .input-icon {
    width: 21px;
    height: 21px;
    background-image: url("../../static/search.svg");
    position: absolute;
    right: 30px;
    top: calc(50% - 10px);
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    cursor: pointer;
  }

  .selector {
    z-index: 3;
    position: absolute;
    left: 0;
    right: 0;
    top: 100%;

    background: #FDFDFD;
    box-shadow: 0px 4px 10px #CBC09F;
    border-radius: 10px;
    padding: 11px 15px;
    min-height: 253px;
  }
}

.smol-title {
  font-weight: 600;
  font-size: 18px;
  line-height: 30px;
  color: #333333;
  margin-bottom: 16px;
}

</style>
