<script>
import axios from 'axios';
import { API_URL } from '../main.js';

export default {
  data() {
    return {
      brandListBlock: false,
      brands: [],
      models: [],
      selected: {
        brand: '',
        divBrand: 'Выберите марку',
        brandList: [],
        modelList: [],
        year: {
          from: '',
          to: '',
        },
        price: {
          from: '',
          to: '',
        },
        mileage: {
          from: '',
          to: '',
        },
        wheel_drive: {
          fwd: false,
          rwd: false,
          awd: false,
        },
        kpp: {
          dct: false,
          akpp: false,
          mkpp: false,
          cvt: false,
        },
        fuel: {
          benzin: false,
          electro: false,
          diesel: false,
          hybrid: false,
          hbo: false,
        },
      }
    }
  },
  props: {
    params: {}
  },
  computed: {
    hasNew() {
      return false;
    },
  },
  methods: {
    onlyNew() {
      console.log('only new')
    },
    showBrandList() {
      this.brandListBlock = !this.brandListBlock;
    },
    async getBrandList() {
      try {
        const response = await axios.get(`${API_URL}/api/brands`);
        const { data: list } = response;
        this.brands = list;
      } catch (e) {

      }
    },
    async getModelList() {
      try {
        const params = {brands: this.selected.brandList.join(",")};
        const response = await axios.get(`${API_URL}/api/models`, {params});
        const { data: list } = response;
        this.models = list;
      } catch (e) {

      }
    },
    selectBrand(id) {
      if (id === 0) {
        let result = [];
        Object.entries(this.brands).forEach(([key, value]) => {
          if (value.id !== 0) result.push(value.id);
        });

        if (this.selected.brandList.length && this.selected.brandList.length === result.length) {
          this.selected.brandList = [];
        } else {
          this.selected.brandList = result;
        }
      } else {
        if (this.selected.brandList.indexOf(id) !== -1) {
          this.selected.brandList = this.selected.brandList.filter(brandId => brandId !== id);
        } else {
          this.selected.brandList.push(id);
        }
      }

      this.selected.divBrand = this.selected.brandList.length ? `Выбрано ${this.selected.brandList.length}` : `Выберите марку`;
      if (this.selected.brandList.length) {
        this.selected.modelList = [];
        this.getModelList();
        this.$emit('get-cars', this.selected);
      }
    },
    selectModel(id) {
      if (id === 0) {
        let result = [];
        Object.entries(this.models).forEach(([key, value]) => {
          if (value.id !== 0) result.push(value.id);
        });

        if (this.selected.modelList.length && this.selected.modelList.length === result.length) {
          this.selected.modelList = [];
        } else {
          this.selected.modelList = result;
        }
      } else {
        if (this.selected.modelList.indexOf(id) !== -1) {
          this.selected.modelList = this.selected.modelList.filter(modelId => modelId !== id);
        } else {
          this.selected.modelList.push(id);
        }
      }

      this.$emit('get-cars', this.selected);
    },
    selectYear() {
      this.$emit('get-cars', this.selected);
    },
    selectPrice() {
      this.$emit('get-cars', this.selected);
    },
    selectMileage() {
      this.$emit('get-cars', this.selected);
    },
    selectedWheelDrive() {
      this.$emit('get-cars', this.selected);
    },
    selectedKPP() {
      this.$emit('get-cars', this.selected);
    },
    selectedFuel() {
      this.$emit('get-cars', this.selected);
    },
    getCars() {
      this.$emit('get-cars', this.selected);
    },
    clearFilters() {
      this.selected = {
        brand: '',
        divBrand: 'Выберите марку',
        brandList: [],
        modelList: [],
        year: {
          from: '',
          to: '',
        },
        price: {
          from: '',
          to: '',
        },
        mileage: {
          from: '',
          to: '',
        },
        wheel_drive: {
          fwd: false,
          rwd: false,
          awd: false,
        },
        kpp: {
          dct: false,
          akpp: false,
          mkpp: false,
          cvt: false,
        },
        fuel: {
          benzin: false,
          electro: false,
          diesel: false,
          hybrid: false,
          hbo: false,
        },
      }
      this.$emit('clear', this.selected);
    }
  },
  mounted() {
    this.getBrandList();
  }
}
</script>

<template>
  <div class="filter_body">
    <div class="cars_filter filter">
      <div class="filter_container">
        <div>
          <div class="flex justify-between items-center">
            <h1 class="filter_title">Фильтр</h1>
            <button type="button" class="btn-clear" @click="clearFilters">
<!--              <img src="../assets/svg/basket.svg" alt="new-model">-->
              <svg
                  width="16"
                  height="17"
                  viewBox="0 0 16 17"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
              >
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M3.89211 5.66088L3.90686 5.9232L4.19943 11.1245C4.25922 12.1873 4.28911 12.7187 4.51506 13.1221C4.71395 13.4772 5.01646 13.7632 5.38217 13.9418C5.79762 14.1447 6.32988 14.1447 7.39438 14.1447H8.60623C9.67074 14.1447 10.203 14.1447 10.6184 13.9418C10.9842 13.7632 11.2867 13.4772 11.4856 13.1221C11.7115 12.7187 11.7414 12.1873 11.8012 11.1245L12.0938 5.9232L12.1085 5.66088H12.7952C12.9989 5.66088 13.1641 5.49574 13.1641 5.29202C13.1641 5.0883 12.9989 4.92316 12.7952 4.92316H10.1013C10.0768 4.8329 10.0463 4.74535 10.0102 4.66092C9.71999 3.98224 9.07032 3.5059 8.31121 3.45266C8.24132 3.44775 8.16098 3.44775 8.00031 3.44775C7.83963 3.44775 7.75929 3.44775 7.6894 3.45266C6.9303 3.5059 6.28063 3.98224 5.99045 4.66092C5.95436 4.74535 5.92382 4.8329 5.89933 4.92316H3.2048C3.00108 4.92316 2.83594 5.0883 2.83594 5.29202C2.83594 5.49574 3.00108 5.66088 3.2048 5.66088H3.89211ZM8.78844 4.66092C8.6351 4.54061 8.44615 4.46458 8.24124 4.45021C8.21496 4.44836 8.17726 4.44775 8.00031 4.44775C7.82335 4.44775 7.78565 4.44836 7.75938 4.4502C7.55447 4.46458 7.36551 4.54061 7.21217 4.66092L8.78844 4.66092ZM5.19786 11.0683L4.90844 5.9232H11.0922L10.8028 11.0683C10.772 11.6157 10.7514 11.9677 10.7149 12.2352C10.68 12.4906 10.6398 12.5857 10.6131 12.6334C10.5136 12.811 10.3624 12.954 10.1795 13.0433C10.1303 13.0673 10.0332 13.102 9.77623 13.1225C9.50713 13.144 9.1545 13.1447 8.60623 13.1447H7.39438C6.84611 13.1447 6.49348 13.144 6.22438 13.1225C5.96739 13.102 5.87027 13.0673 5.82108 13.0433C5.63822 12.954 5.48697 12.811 5.38752 12.6334C5.36077 12.5857 5.32063 12.4906 5.28573 12.2352C5.24919 11.9677 5.22865 11.6157 5.19786 11.0683ZM6.656 6.76751C6.656 6.49137 6.43214 6.26751 6.156 6.26751C5.87986 6.26751 5.656 6.49137 5.656 6.76751L5.656 12.3004C5.656 12.5766 5.87986 12.8004 6.156 12.8004C6.43214 12.8004 6.656 12.5766 6.656 12.3004L6.656 6.76751ZM8.50031 6.76751C8.50031 6.49137 8.27645 6.26751 8.00031 6.26751C7.72416 6.26751 7.50031 6.49137 7.50031 6.76751V12.3004C7.50031 12.5766 7.72416 12.8004 8.00031 12.8004C8.27645 12.8004 8.50031 12.5766 8.50031 12.3004V6.76751ZM9.84461 6.26751C10.1208 6.26751 10.3446 6.49137 10.3446 6.76751V12.3004C10.3446 12.5766 10.1208 12.8004 9.84461 12.8004C9.56847 12.8004 9.34461 12.5766 9.34461 12.3004V6.76751C9.34461 6.49137 9.56847 6.26751 9.84461 6.26751Z"
                    fill="#8E8E8E"
                />
              </svg>
              Очистить
            </button>
          </div>
          <div
              class="flex items-center"
              v-if="hasNew"
          >
            <button
                type="button"
                class="checkbox _active"
                @click="onlyNew"
            ></button>
            <span class="filter_text">Новые модели</span>
          </div>
        </div>
        <div>
          <h1 class="filter_title">Марка</h1>
          <div class="filterSelect">
            <div class="filterSelect_container">
              <div
                  class="filterSelect_select"
                  @click="showBrandList"
              >
                <div class="filterSelect_value">{{ selected.divBrand }}</div>
<!--                <img src="../assets/svg/filter-arrow.svg" />-->
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M1.24603 5.21967C1.57407 4.92678 2.10593 4.92678 2.43397 5.21967L8 10.1893L13.566 5.21967C13.8941 4.92678 14.4259 4.92678 14.754 5.21967C15.082 5.51256 15.082 5.98744 14.754 6.28033L8.59397 11.7803C8.26593 12.0732 7.73407 12.0732 7.40603 11.7803L1.24603 6.28033C0.91799 5.98744 0.91799 5.51256 1.24603 5.21967Z" fill="#8E8E8E"/>
                </svg>
              </div>
              <div
                  class="filterSelect_dropdownW"
                  v-show="brandListBlock"
              >
                <ul class="filterSelect_list" id="filterSelect_list">
                  <li v-for="brand in brands">
                    <div class="flex items-center h22 mb-1">
                      <input
                          type="checkbox"
                          class="filterCheckbox"
                          :name="brand.name"
                          :id="brand.id"
                          :value="selected.brandList.indexOf(brand.id)"
                          @click="selectBrand(brand.id)"
                          :checked="selected.brandList.indexOf(brand.id) !== -1"
                      >
                      <label class="filter_text" :for="brand.id">{{ brand.name }}</label>
                      <br>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>

        </div>
        <div v-if="models.length">
          <h1 class="filter_title">Модель</h1>
          <div
              class="flex items-center h22 mb-1"
              v-for="model in models"
              :key="model.id"
          >
            <input
                type="checkbox"
                :name="model.name"
                @click="selectModel(model.id)"
                :checked="selected.modelList.indexOf(model.id) !== -1"
            />
            <label class="filter_text">{{ model.name }}</label>
            <br />
          </div>
        </div>
        <div>
          <h1 class="filter_title">Год</h1>
          <div class="flex">
            <input
                v-model="selected.year.from"
                class="filter_from"
                type="number"
                placeholder="От"
                @change="selectYear"
            />
            <input
                v-model="selected.year.to"
                class="filter_to"
                type="number"
                placeholder="До"
                @change="selectYear"
            />
          </div>
        </div>
        <div>
          <h1 class="filter_title">Цена</h1>
          <div class="flex">
            <input
                v-model="selected.price.from"
                class="filter_from"
                type="number"
                placeholder="От"
                @change="selectPrice"
            />
            <input
                v-model="selected.price.to"
                class="filter_to"
                type="number"
                placeholder="До"
                @change="selectPrice"
            />
          </div>
        </div>
        <div>
          <h1 class="filter_title">Пробег</h1>
          <div class="flex">
            <input
                v-model="selected.mileage.from"
                class="filter_from"
                type="number"
                placeholder="От"
                @change="selectMileage"
            />
            <input
                v-model="selected.mileage.to"
                class="filter_to"
                type="number"
                placeholder="До"
                @change="selectMileage"
            />
          </div>
        </div>
        <div>
          <h1 class="filter_title">Привод</h1>
          <div class="flex items-center h22 mb-1">
            <input
                v-model="selected.wheel_drive.fwd"
                type="checkbox"
                name="front"
                id="front"
                @change="selectedWheelDrive"
            />
            <label class="filter_text" for="front">Передний</label><br />
          </div>

          <div class="flex items-center h22 mb-1">
            <input
                v-model="selected.wheel_drive.rwd"
                type="checkbox"
                name="back"
                id="back"
                @change="selectedWheelDrive"
            />
            <label class="filter_text" for="back">Задний</label><br />
          </div>

          <div class="flex items-center h22 mb-1">
            <input
                v-model="selected.wheel_drive.awd"
                type="checkbox"
                name="full"
                id="full"
                @change="selectedWheelDrive"
            />
            <label class="filter_text" for="full">Полный</label><br />
          </div>
        </div>
        <div>
          <h1 class="filter_title">Коробка передач</h1>
          <div class="box-grid">
            <div class="flex items-center h22 mb-1">
              <input
                  v-model="selected.kpp.dct"
                  type="checkbox"
                  name="robot"
                  id="robot"
                  @change="selectedKPP"
              />
              <label class="filter_text" for="robot">Робот</label>
            </div>
            <div class="flex items-center h22 mb-1">
              <input
                  v-model="selected.kpp.akpp"
                  type="checkbox"
                  name="avtomat"
                  id="avtomat"
                  @change="selectedKPP"
              />
              <label class="filter_text" for="avtomat">Автомат</label>
            </div>
            <div class="flex items-center h22 mb-1">
              <input
                  v-model="selected.kpp.mkpp"
                  type="checkbox"
                  name="mechanic"
                  id="mechanic"
                  @change="selectedKPP"
              />
              <label class="filter_text" for="mechanic">Механика</label>
            </div>
            <div class="flex items-center h22 mb-1">
              <input
                  v-model="selected.kpp.cvt"
                  type="checkbox"
                  name="variable"
                  id="variable"
                  @change="selectedKPP"
              />
              <label class="filter_text" for="variable">Вариатор</label>
            </div>
          </div>
        </div>
        <div>
          <h1 class="filter_title">Топливо</h1>
          <div class="box-grid">
            <div class="flex items-center h22 mb-1">
              <input
                  v-model="selected.fuel.benzin"
                  type="checkbox"
                  name="benzin"
                  id="benzin"
                  @change="selectedFuel"
              />
              <label class="filter_text" for="benzin">Бензин</label>
            </div>
            <div class="flex items-center h22 mb-1">
              <input
                  v-model="selected.fuel.electro"
                  type="checkbox"
                  name="electro"
                  id="electro"
                  @change="selectedFuel"
              />
              <label class="filter_text" for="electro">Электро</label>
            </div>
            <div class="flex items-center h22 mb-1">
              <input
                  v-model="selected.fuel.diesel"
                  type="checkbox"
                  name="diesel"
                  id="diesel"
                  @change="selectedFuel"
              />
              <label class="filter_text" for="diesel">Дизель</label>
            </div>
            <div class="flex items-center h22 mb-1">
              <input
                  v-model="selected.fuel.hybrid"
                  type="checkbox"
                  name="hybrid"
                  id="hybrid"
                  @change="selectedFuel"
              />
              <label class="filter_text" for="hybrid">Гибрид</label>
            </div>
            <div class="flex items-center h22 mb-1">
              <input
                  v-model="selected.fuel.hbo"
                  type="checkbox"
                  name="hbo"
                  id="hbo"
                  @change="selectedFuel"
              />
              <label class="filter_text" for="hbo">ГБО</label>
            </div>
          </div>
        </div>
        <div class="flex">
          <button
              type="button"
              class="btn-apply filter-close"
              @click="getCars"
          >Применить</button>
          <button
              type="button"
              class="btn-clear-2"
              @click="clearFilters"
          >Очистить</button>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>