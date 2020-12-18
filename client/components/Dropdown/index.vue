<template>
  <div class="btn-group">
    <li @click="toggleMenu()" class="dropdown-toggle" v-if="selectedOption.name !== undefined">
      {{ selectedOption.name }}
      <img class="caret" src="/dropdown.png"/>
    </li>

    <li @click="toggleMenu()" class="dropdown-toggle dropdown-toggle-placeholder"
        v-if="selectedOption.name === undefined">
      {{placeholderText}}
      <img class="caret" src="/dropdown.png"/>
    </li>

    <ul class="dropdown-menu" v-if="showMenu">
      <li v-for="(option, idx) in options" :key="idx">
        <a href="javascript:void(0)" @click="updateOption(option)">
          {{ option.name }}
        </a>
      </li>
    </ul>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        selectedOption: {
          name: '',
        },
        showMenu: false,
        placeholderText: 'Please select an item',
      }
    },
    props: {
      options: {
        type: [Array, Object]
      },
      selected: {},
      placeholder: [String],
      closeOnOutsideClick: {
        type: [Boolean],
        default: true,
      },
    },
    mounted() {
      this.selectedOption = this.selected;
      if (this.placeholder) {
        this.placeholderText = this.placeholder;
      }
      if (this.closeOnOutsideClick) {
        document.addEventListener('click', this.clickHandler);
      }
    },
    beforeDestroy() {
      document.removeEventListener('click', this.clickHandler);
    },
    methods: {
      updateOption(option) {
        this.selectedOption = option;
        this.showMenu = false;
        this.$emit('updateOption', this.selectedOption);
      },
      toggleMenu() {
        this.showMenu = !this.showMenu;
      },
      clickHandler(event) {
        const {target} = event;
        const {$el} = this;
        if (!$el.contains(target)) {
          this.showMenu = false;
        }
      },
    }
  }
</script>

<style lang="scss">
  .btn-group {
    position: relative;
    margin: 10px 30px;
    display: inline-block;
  }

  .dropdown-toggle {
    color: #000;
    font-weight: 500;
    font-size: 24px;
  }

  .dropdown-toggle:hover {
    cursor: pointer;
    & .caret {
      transition: 0.2s;
        opacity: 1;
      }
  }

  .dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    float: left;
    padding: 5px 0;
    margin: 2px 0 0;
    list-style: none;
    font-size: 14px;
    text-align: left;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
    background-clip: padding-box;
  }

  .dropdown-menu > li > a {
    padding: 10px 30px;
    display: block;
    clear: both;
    font-weight: normal;
    line-height: 1.6;
    color: #333333;
    white-space: nowrap;
    text-decoration: none;
  }

  .dropdown-menu > li > a:hover {
    background: #efefef;
    color: #409FCB;
  }

  .dropdown-menu > li {
    overflow: hidden;
    width: 100%;
    position: relative;
    margin: auto;
  }

  .caret {
    height: 10px;
    top: 15px;
    right: -24px;
    vertical-align: middle;
    opacity: 0.6;
    transition: 0.2s;
  }

  li {
    list-style: none;
  }
</style>
