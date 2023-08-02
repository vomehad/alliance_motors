export function SelectModule() {
  const getSelectTemplate = (
    data = [],
    placeholder,
    selectedId,
  ) => {
    let text = placeholder ?? "placeholder";
    let items;

    if (data.length){
      items = data.map((item) => {
        let cls = "";
        if (item.id === selectedId) {
          text = item.value;
          cls = "selected";
        }
        return `
                <li class="select__item ${cls}" data-type="item" data-id="${item.id}">
                    ${item.value}
                </li>
              `;
      });
    }

    return `
            <div class="select__backdrop " data-type="backdrop"></div>
            <div class="select__input" data-type="input">
              <div data-type="value">${text}</div>
              <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.14648 2.9679L1.19336 5.99133C1.07617 6.10852 1 6.29016 1 6.44836C1 6.81751 1.25781 7.06946 1.62109 7.06946C1.79688 7.06946 1.9375 7.01086 2.05469 6.88782L3.26172 5.63391L4.03516 4.74329L3.98828 5.98547V13.2921C3.98828 13.6613 4.25195 13.9249 4.61523 13.9249C4.97852 13.9249 5.23633 13.6613 5.23633 13.2921V5.98547L5.19531 4.74329L5.96289 5.63391L7.16992 6.88782C7.28711 7.01086 7.43359 7.06946 7.60938 7.06946C7.9668 7.06946 8.22461 6.81751 8.22461 6.44836C8.22461 6.29016 8.14844 6.10852 8.03125 5.99133L5.07813 2.9679C4.82031 2.69836 4.41016 2.6925 4.14648 2.9679ZM11.8691 13.7198L14.8223 10.6964C14.9395 10.5734 15.0156 10.3917 15.0156 10.2335C15.0156 9.87024 14.7578 9.61829 14.3945 9.61829C14.2188 9.61829 14.0781 9.67688 13.9609 9.79407L12.7539 11.048L11.9805 11.9386L12.0273 10.6964V3.38977C12.0273 3.03235 11.7637 2.76282 11.4004 2.76282C11.043 2.76282 10.7793 3.03235 10.7793 3.38977V10.6964L10.8203 11.9386L10.0527 11.048L8.8457 9.79407C8.72852 9.67688 8.58203 9.61829 8.41211 9.61829C8.04883 9.61829 7.79102 9.87024 7.79102 10.2335C7.79102 10.3917 7.86719 10.5734 7.98438 10.6964L10.9375 13.7198C11.1953 13.9952 11.6055 14.0011 11.8691 13.7198Z" fill="#B3B3B3"/>
              </svg>
            </div>
            <div class="select__dropdown">
              <ul class="select__list">
                ${items?.join("")}
              </ul>
            </div>
          `;
  };

  class Select {
    constructor(selector, options) {
      this.$el = document.querySelector(selector);
      this.options = options;
      this.selectedId = options.selectedId;

      this.#render();
      this.#setup();
    }

    #render() {
      const { placeholder, data, elementsData } = this.options;
      this.$el.classList.add("select");
      this.$el.innerHTML = getSelectTemplate(
        data,
        placeholder,
        this.selectedId,
        elementsData
      );
    }

    #setup() {
      this.clickHandler = this.clickHandler.bind(this);
      this.$el.addEventListener("click", this.clickHandler);
      this.$value = this.$el.querySelector('[data-type="value"]');
    }

    clickHandler(event) {
      const { type } = event.target.dataset;

      if (type === "input") {
        this.toggle();
      } else if (type === "item") {
        const id = event.target.dataset.id;
        this.select(id);
      } else if (type === "backdrop") {
        this.close();
      }
    }

    get isOpen() {
      return this.$el.classList.contains("open");
    }

    get current() {
      return this.options.data?.find((item) => item.id === this.selectedId) 
              || 
            this.options.elementsData?.find((el) => el.id === this.selectedId)
    }

    select(id) {
      this.selectedId = id;
      this.$value.textContent = this.current.value;

      this.$el.querySelectorAll('[data-type="item"]').forEach((el) => {
        el.classList.remove("selected");
      });
      this.$el.querySelector(`[data-id="${id}"]`).classList.add("selected");

      this.options.onSelect ? this.options.onSelect(this.current) : null;

      this.close();
    }

    toggle() {
      this.isOpen ? this.close() : this.open();
    }

    open() {
      this.$el.classList.add("open");
    }

    close() {
      this.$el.classList.remove("open");
    }

    destroy() {
      this.$el.removeEventListener("click", this.clickHandler);
      this.$el.innerHTML = "";
    }
  }

  const catalogSelect = document.querySelector("#select-catalog");
  const homeSelect = document.querySelector("#select-filter");

  if (homeSelect) {
    new Select("#select-filter", {
      placeholder: "Популярные",
      data: [
        { id: "1", value: "Популярные" },
        { id: "2", value: "Новинки" },
        { id: "3", value: "Сначала дешевле" },
        { id: "4", value: "Сначала дороже" },
        { id: "5", value: "По скидке" },
      ],
      onSelect(item) {
        console.log("Selected", item);
      },
    });
  }
  if (catalogSelect) {
    new Select("#select-catalog", {
      placeholder: "Сортировка по",
      data: [
        { id: "1", value: "Популярные каталог" },
        { id: "2", value: "Новинки каталог" },
        { id: "3", value: "Сначала дешевле каталог" },
        { id: "4", value: "Сначала дороже каталог" },
        { id: "5", value: "По скидке каталог" },
      ],
      onSelect(item) {
        console.log("Selected", item);
      },
    });
  }
}
