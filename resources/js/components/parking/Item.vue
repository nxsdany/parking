<template>
    <div v-if="car_data.parked == true" class="col-md-3 d-flex align-items-stretch mb-4">
        <div class="card text-center">
            <div class="card-header"><h5>{{ car_data.id }} {{ car_data.name }}</h5></div>
            <div class="card-body">
                {{ car_data.color }}
                <h4>{{ car_data.brand }}&laquo;{{ car_data.model }}&raquo;</h4>
                <b style="letter-spacing: 0.2rem;">{{ car_data.number }}</b>
                  <button @click="kickCar(car_data.id)"
                          class="btn btn-outline-danger btn-block mb-0 mt-4">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                  </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  name: "car-item",
  props: {
    car_data: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  data() {
    return {};
  },
  mounted() {},
  methods: {
    kickCar() {
      this.$emit("kickCar", this.car_data.id);
    }
  }
};
</script>
