<template>
  <div class="container">
    <h1>Парковка</h1>
        <form @submit.prevent="parkCar">
            <div class="row align-items-center pb-3">
                <div class="col-md-5 form-group">
                    <label for="client">Клиент</label>
                      <select class="form-control" v-model="selectClient" id="client">
                          <option v-if="client.parked == false" v-for="client in unique(cars, 'name')" v-bind:value="client.client_id">
                            {{ client.name }}
                          </option>
                      </select>
                </div>
                <div class="col-md-5 form-group">
                    <label for="car">Автомобиль клиента</label>
                      <select class="form-control" v-model="selectCar" id="car">
                          <option v-for="car in carsFilter" v-bind:value="car.id">
                            {{ car.brand +' ' + '&laquo;' + car.model + '&raquo;' +' '+ car.color +' '+ car.number }}
                          </option>
                      </select>
                </div>
                <div class="col-md-2 mt-3">
                  <button type="submit" class="btn btn-primary">Припарковать</button>
                </div>
            </div>
        </form>
        <div v-if="errored" class="alert alert-danger" role="alert">Ошибка за 500</div>
        <div v-if="loading" class="alert alert-info text-center" role="alert">Загрузка</div>
        <div class="row">
        <car-item
          v-for="car in cars"
          :key="car.id"
          :car_data="car"
          @kickCar="kickCar"
        />
    </div>
  </div>
</template>

<script>
import CarItem from "./Item";

export default {
    name: "car-index",
    components: {
        CarItem
    },
    data() {
        return {
            cars: [],
            car: {
                id: "",
                name: "",
                client_id: "",
                parked: ""
            },
            selectClient: "",
            selectCar: "",
            edit: false,
            loading: true,
            errored: false,
            validationErrors: ""
        };
    },
    mounted() {
        this.getCars();
    },
    computed: {
        unique () {
            return function (arr, key) {
                var output = []
                var usedKeys = {}
                for (var i = 0; i < arr.length; i++) {
                    if (!usedKeys[arr[i][key]]) {
                        usedKeys[arr[i][key]] = true
                        output.push(arr[i])
                    }
                }
                return output
            }
        },
        carsFilter() {
            return this.cars.filter((obj) => {
                return obj.client_id === this.selectClient
            });
        }
    },
    methods: {
        getCars() {
            axios
                .get(`api/parking`)
                .then(response => {
                    this.cars = response.data;
                })
                .catch(error => {
                    console.log(error);
                    this.errored = true;
                })
                .finally(() => (this.loading = false));
        },
        parkCar() {
            axios
                .post(`/api/parking/${this.selectCar}`, {
                    _method: 'put',
                    parked: 1
                })
                .then(response => {
                    this.edit = false;
                    this.selectClient = 1;
                    this.getCars();
                    console.log(response);
                })
                .catch(error => {
                  console.log(error);
                  this.errored = true;
                });
        },
        kickCar(id) {
            axios
                .post(`/api/parking/${id}`, {
                    _method: 'put',
                    parked: 0
                })
                .then(response => {
                    this.edit = false;
                    selectCar: "",
                    this.getCars();
                    console.log(response);
                })
                .catch(error => {
                  console.log(error);
                  this.errored = true;
                });
        },
    },
};
</script>
