<template>
    <div id="fe-customizer">
        <button id="fec-toggle" @click="toggle"><span class="dashicons dashicons-admin-customizer"></span></button>
        <div id="fec-panel" :class="{ open: show }">
            <label>Site Title</label>
            <input @input="changed" v-model="title"/>
        </div>
    </div>
</template>

<script>
export default {
  name: 'app',
  data () {
    return {
      show: false,
      title: 'Site Title'
    }
  },
  created() {
    this.title = fec.title
  },
  beforeUpdate() {
    this.title = fec.title
  },
  methods: {
    toggle: function( e ) {
      this.show = ! this.show
      var body = document.querySelector('body'),
          className = 'fec'
      if ( true === this.show ) {
        if (body.classList)
          body.classList.add(className);
        else
          body.className += ' ' + className;
      } else {
        if (body.classList)
          body.classList.remove(className);
        else
          body.className = body.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
      }
    },
    changed: function( e ) {
      this.title = fec.title = e.target.value
      var el = document.querySelector('.site-title a') || document.querySelector('.site-title')
      el.innerText = e.target.value
    }
  }
}

</script>

<style>

body.fec > * {
  margin-left: 320px;
}

#wpadminbar {
  margin-left: 0;
}

#fec-toggle {
  border-radius: 50%;
  width: 30px;
  height: 30px;
  font-size: 1em;
  margin: 0;
  padding: 0;
  z-index: 9999;
  position: absolute;
  top: 10px;
  left: 10px;
}

#fe-customizer {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: left;
  color: #2c3e50;
  top: 30px;
  margin-left: 0;
  z-index: 9999;
  position: sticky;
}

#fec-panel {
  width: 320px;
  background: white;
  padding: 40px;
  position: absolute;
  top: 0;
  left: 0;
  display: none;
  min-height: 100vh;
}

#fec-panel.open {
  display: block;
}
</style>
