<template>
  <section>
    <a v-if="hasQuantity" href="/cart" style="background-color:#000;color:#fff;font-weight:bold" class="nav-button-etnoc btn btn-lg">
      <span class="badge" style="background-color:#fff;color:#000">
        <span v-text="quantity"></span>
      </span>
      Cart
    </a>
  </section>
</template>

<script>
  import store from '../stores/store.js';

  export default{
    computed: {
      quantity: function(){
        return store.state.cart_quantity;
      },
      hasQuantity: function(){
        return this.quantity > 0;
      }
    }
  }
</script>