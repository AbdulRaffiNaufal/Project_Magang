<template>
  <div>
    <template v-if="!isMaintenance">
      <badaso-breadcrumb-row full> </badaso-breadcrumb-row>
      <vs-row v-if="$helper.isAllowedToModifyGeneratedCRUD('add', dataType)">
        <vs-col vs-lg="12">
          <vs-card>
            <div slot="header">
              <h3>
                {{
                  $t("crudGenerated.add.title", {
                    tableName: dataType.displayNameSingular,
                  })
                }}
              </h3>
            </div>
            <vs-row>
              <vs-col vs-lg="12" v-if="!isValid">
                <p class="is-error">No fields have been filled</p>
              </vs-col>
              <vs-col
                v-for="(dataRow, rowIndex) in dataType.dataRows"
                :key="rowIndex"
                :vs-lg="dataRow.details.size ? dataRow.details.size : '12'"
              >
                <!-- <input type="text" v-model="dataRow.value"> -->
                <!-- <vs-input type="text" v-model="dataRow.value"></vs-input> -->
                <template v-if="dataRow.add == 1">
                  <!-- {{ dataRow.value }} -->
                  <badaso-text
                    v-if="dataRow.type == 'text'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-text>
                  <badaso-text
                    v-if="dataRow.type == 'text_readonly'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :style="'pointer-events:none;'"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-text>
                  <badaso-email
                    v-if="dataRow.type == 'email'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-email>
                  <badaso-password
                    v-if="dataRow.type == 'password'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-password>
                  <badaso-textarea
                    v-if="dataRow.type == 'textarea'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-textarea>
                  <badaso-search
                    v-if="dataRow.type == 'search'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-search>
                  <badaso-number
                    v-if="dataRow.type == 'number'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-number>
                  <badaso-url
                    v-if="dataRow.type == 'url'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-url>
                  <badaso-time
                    v-if="dataRow.type == 'time'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    value-zone="local"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-time>
                  <badaso-date
                    v-if="dataRow.type == 'date'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-date>
                  <badaso-datetime
                    v-if="dataRow.type == 'datetime'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    value-zone="local"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-datetime>
                  <badaso-datetime
                    v-if="dataRow.type == 'datetime_readonly'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    value-zone="local"
                    size="12"
                    :style="'pointer-events:none;'"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-datetime>
                  <badaso-upload-image
                    v-if="dataRow.type == 'upload_image'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    :private-only="dataRow.details.type == 'private-only'"
                    :shares-only="dataRow.details.type == 'shares-only'"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-upload-image>
                  <badaso-upload-image-multiple
                    v-if="dataRow.type == 'upload_image_multiple'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    :private-only="dataRow.details.type == 'private-only'"
                    :shares-only="dataRow.details.type == 'shares-only'"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-upload-image-multiple>
                  <badaso-upload-file
                    v-if="dataRow.type == 'upload_file'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    :private-only="dataRow.details.type == 'private-only'"
                    :shares-only="dataRow.details.type == 'shares-only'"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-upload-file>
                  <badaso-upload-file-multiple
                    v-if="dataRow.type == 'upload_file_multiple'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    :private-only="dataRow.details.type == 'private-only'"
                    :shares-only="dataRow.details.type == 'shares-only'"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-upload-file-multiple>
                  <badaso-switch
                    v-if="dataRow.type == 'switch'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-switch>
                  <badaso-slider
                    v-if="dataRow.type == 'slider'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-slider>
                  <badaso-editor
                    v-if="dataRow.type == 'editor'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-editor>
                  <badaso-tags
                    v-if="dataRow.type == 'tags'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-tags>
                  <badaso-color-picker
                    v-if="dataRow.type == 'color_picker'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-color-picker>
                  <badaso-hidden
                    v-if="dataRow.type == 'hidden' ||
                          dataRow.type == 'data_identifier' ||
                          dataRow.type == 'relation'"

                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-hidden>
                  <badaso-checkbox
                    v-if="dataRow.type == 'checkbox'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                    :items="dataRow.details.items ? dataRow.details.items : []"
                  ></badaso-checkbox>
                  <badaso-select
                    v-if="dataRow.type == 'select'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                    :items="dataRow.details.items ? dataRow.details.items : []"
                  ></badaso-select>
                  <!-- <template v-if="dataRow.field == 'car_id'">
                    <badaso-select
                    v-if="dataRow.type == 'select'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                    :items="dataRow.details.items ? dataRow.details.items : []"
                    :key = "dataRow.value"
                    @change="changeCar($event)"
                  ></badaso-select>
                  </template> -->

                  <badaso-select
                    v-if="dataRow.type == 'select_readonly'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :style="'pointer-events:none;'"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                    :items="dataRow.details.items ? dataRow.details.items : []"
                  ></badaso-select>
                  <badaso-select-multiple
                    v-if="dataRow.type == 'select_multiple'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                    :items="dataRow.details.items ? dataRow.details.items : []"
                  ></badaso-select-multiple>
                  <badaso-radio
                    v-if="dataRow.type == 'radio'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                    :items="dataRow.details.items ? dataRow.details.items : []"
                  ></badaso-radio>
                  <badaso-code-editor
                    v-if="dataRow.type == 'code'"
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-code-editor>
                  <badaso-select
                    v-if="
                      dataRow.type == 'relation' &&
                      dataRow.relation.relationType == 'belongs_to'
                    "
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :items="
                      relationData[
                        $caseConvert.stringSnakeToCamel(
                          dataRow.relation.destinationTable
                        )
                      ]
                    "
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-select>
                  <badaso-select
                    v-if="
                      dataRow.type == 'relation_readonly' &&
                      dataRow.relation.relationType == 'belongs_to'
                    "
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :style="'pointer-events:none;'"
                    :items="
                      relationData[
                        $caseConvert.stringSnakeToCamel(
                          dataRow.relation.destinationTable
                        )
                      ]
                    "
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                  ></badaso-select>
                  <badaso-select-multiple
                    v-if="
                      dataRow.type == 'relation' &&
                      dataRow.relation.relationType == 'belongs_to_many'
                    "
                    :label="dataRow.displayName"
                    :placeholder="dataRow.displayName"
                    v-model="dataRow.value"
                    size="12"
                    :alert="
                      errors[$caseConvert.stringSnakeToCamel(dataRow.field)]
                    "
                    :items="
                      relationData[
                        $caseConvert.stringSnakeToCamel(
                          dataRow.relation.destinationTable
                        )
                      ]
                    "
                  ></badaso-select-multiple>
                
                </template>
              </vs-col>
            </vs-row>
          </vs-card>
        </vs-col>
        <vs-col vs-lg="12">
          <vs-card class="action-card">
            <vs-row>
              <vs-col vs-lg="12">
                <vs-button color="primary" type="relief" @click="submitForm">
                  <vs-icon icon="save"></vs-icon>
                  {{ $t("crudGenerated.add.button") }}
                </vs-button>
                <vs-button
                  :to="{
                    name: 'DataPendingAddBrowse',
                    params: {
                      urlBase64: base64PathName,
                    },
                  }"
                  v-if="dataLength > 0 && !isOnline"
                  color="success"
                  type="relief"
                >
                  <vs-icon icon="history"></vs-icon>
                  <strong
                    >{{ dataLength }} {{ $t("offlineFeature.dataPending") }}
                  </strong>
                </vs-button>
              </vs-col>
            </vs-row>
          </vs-card>
        </vs-col>
      </vs-row>
      <vs-row v-else>
        <vs-col vs-lg="12">
          <vs-card>
            <vs-row>
              <vs-col vs-lg="12">
                <h3>
                  {{
                    $t("crudGenerated.warning.notAllowedToAdd", {
                      tableName: dataType.displayNameSingular,
                    })
                  }}
                </h3>
              </vs-col>
            </vs-row>
          </vs-card>
        </vs-col>
      </vs-row>
    </template>
    <template v-if="isMaintenance">
      <badaso-breadcrumb-row full> </badaso-breadcrumb-row>

      <vs-row v-if="$helper.isAllowedToModifyGeneratedCRUD('add', dataType)">
        <vs-col vs-lg="12">
          <div class="badaso-maintenance__container">
            <img :src="`${maintenanceImg}`" alt="Maintenance Icon" />
            <h1 class="badaso-maintenance__text">
              We are under <br />maintenance
            </h1>
          </div>
        </vs-col>
      </vs-row>
    </template>
  </div>
</template>

<script>
export default {
  name: "CrudGeneratedAdd",
  components: {},
  data: () => ({
    isValid: true,
    errors: {},
    dataType: {},
    relationData: {},
    isMaintenance: false,
    dataLength: 0,
    pathname: location.pathname,
    userId: "",
    dataEmployees:{},
    dataPayments:{},
  }),
  mounted() {
    this.getDataType();
    this.getRoles();
    this.getRelationDataBySlug();
    this.requestObjectStoreData();
    this.getUser();
  },

  watch: {
    dataType: {
      handler(newValue){
        let harga = 0;
          for(let cars of this.relationData.cars){
            if(cars.id == this.dataType.dataRows[1].value){
                harga = cars.rentalPrice;
            }
          } 
          this.dataType.dataRows[8].value = this.dataType.dataRows[7].value * harga;

          for(let employee of this.relationData.employees){
            console.log(this.dataType.dataRows[3].value)
            if(employee.id == this.dataType.dataRows[3].value){
                employee.statusBooking = 'Akan bekerja';
                this.dataEmployees = employee;
            }
          }
      },
      deep:true
    }
  },
  methods: {
    submitForm() {
      this.errors = {};
      this.isValid = true;

      // init data rows
      const dataRows = {};
      for (const row of this.dataType.dataRows) {
        if (row && row.value || row.type == 'switch' || row.type == 'slider') {
          dataRows[row.field] = row.value;
        }
      }

      dataRows['rental_status'] = 'Disewa';

      try{
        this.validation(dataRows);
        this.saveData(dataRows);
      } catch (e) {
        this.$vs.notify({
          title: this.$t("alert.danger"),
          text: e.message,
          color: "danger",
        });
      }
    },

    validation(dataRows){
      if(("start_date" in dataRows) && ("end_date" in dataRows)){
        if(dataRows["start_date"] > dataRows["end_date"]){
          throw new Error("The date has passed");
        }
      }

      let out_of_quota = true;
      if(dataRows.car_id in this.quota_cars){
        if(this.quota_cars[dataRows.car_id] > 0){
          out_of_quota = false;
        }
      }
      if(out_of_quota){
        throw new Error("Out of quota");
      }

      if(Object.values(dataRows).length == 0) {
        this.isValid = false;
        throw new Error("Mohon isi");
      }
    },

    saveData(dataRows){
      //start request
      this.$openLoader();
            
      this.$api.badasoEntity
        .add({
          slug: this.$route.params.slug,
          data: dataRows,
        })
        .then((response) => {
          // edit status boking employee
          this.$api.badasoEntity
          .edit({
            slug: 'employees',
            data: this.dataEmployees,
          })
          .then((response) => {
            console.log('berhasil');
          })
          .catch((error) => {
            this.errors = error.errors;
            console.log(this.errors);
            this.$closeLoader();
            this.$vs.notify({
              title: "Danger",
              text: error.message,
              color: "danger",
            });
          });
          // this.$api.badasoEntity.read({
          //   slug: 'rentals',
          //   id: dataRows.employee_id
          // }).then((response)=>{
          //   let employee = response.data
          //   this.$api.badasoEntity.read({
          //     slug: 'employees',
          //     id: employee.user_id
          //   }).then((response)=>{
          //     this.$api.badasoUsers.read({})
          //   })
          // })

          this.$api.badasoEntity.read({
            slug: "cars",
            id: dataRows.car_id,
          })
          .then((response) => {
            let data = response.data;
            data.isAvailable -= 1;
            data.isUsed += 1;

            this.$api.badasoEntity.edit({
              slug: 'rentals',
              data: dataRows
            }).then((response)=>{
              employeeId = employee.label
            })



            this.$api.badasoEntity.edit({
              slug: "cars",
              data: data,
            })
            .then((response) => {
              console.log(response, " response car")
            })
            .catch((error) => {
              this.requestObjectStoreData();
              this.errors = error.errors;
              this.$closeLoader();
              this.$sv.notify({
                title: this.$t("alert.danger"),
                text: error.message,
                color: "danger",
              });
            });

            this.$closeLoader();
            this.$router.push({
              name: "CrudGeneratedBrowse",
              params: {
                slug: this.$route.params.slug,
              },
            });
          })
          })
          .catch((error) => {
            this.requestObjectStoreData();
            this.errors = error.errors;
            this.$closeLoader();
            this.$sv.notify({
              title: this.$t("alert.danger"),
              text: error.message,
              color: "danger",
            });
          });
    },

    async getDataType() {
      this.$openLoader();

      try {
        const response = await this.$api.badasoCrud.readBySlug({
          slug: this.$route.params.slug,
        });

        const response_user = await this.$api.badasoAuthUser.user({});
        let isAdmin = false;

        for(let role of response_user.data.user.roles){
          if(role.name == "administrator"){
            isAdmin = true;
            break;
          }
        }

        const response_quota = await this.$api.badasoEntity.browse({
          slug:"cars"
        });
        let cars = response_quota.data.data;
        let quota_cars = {};
        for(let car of cars ){
          quota_cars[car.id] = car.isAvailable;
        }
        this.quota_cars = quota_cars;

        this.$closeLoader();
        this.dataType = response.data.crudData;
        const dataRows = response.data.crudData.dataRows.map((data) => {
          if (
            data.value == undefined &&
            (data.type == "upload_image" || data.type == "upload_file")
          ) {
            data.value = "";
          } else if (
            data.value == undefined &&
            (data.type == "upload_image_multiple" ||
              data.type == "upload_file_multiple" ||
              data.type == "select_multiple" ||
              data.type == "checkbox")
          ) {
            data.value = Array;
          }
           else if (data.value == undefined && data.type == "slider") {
            data.value = 0;
          } else if (data.value == undefined && data.type == "switch") {
            data.value = 0;
          } else if (data.value == undefined && data.type == "tags") {
            data.value = "";
          } else if (data.value == undefined) {
            data.value = "";
          }

          if (data.field == "user_id") {
            if (!isAdmin) {
              data.value = response_user.data.user.id;
              data.type = 'relation_readonly';
            }
   
          }

          if(data.field == "start_date"){
            if(!isAdmin){
              data.value = new Date ();
              data.type = "datetime_readonly";
            }
          }
        
          if(data.field == "rental_code"){
            data.value =  Math.random().toString(36).slice(2).toUpperCase();
            data.type = "text_readonly";
          }

          if(data.field == "employee_id"){
            data.relation.destinationTableDisplayColumn = 'name';
          }

          try {
            data.details = JSON.parse(data.details);
            if (data.type == "hidden") {
              data.value = data.details.value ? data.details.value : "";
            }
          } catch (error) {}
          return data;
        });
        this.dataType.dataRows = JSON.parse(JSON.stringify(dataRows));

      } catch (error) {
        if (error.status == 503) {
          this.isMaintenance = true;
        }
        this.$closeLoader();
        this.$vs.notify({
          title: this.$t("alert.danger"),
          text: error.message,
          color: "danger",
        });
      }
    },
    getRoles(){
      this.$openLoader();
      this.$api.badasoRole
      .browse()
      .then((response) => {
          this.roles = response.data.roles;
      })
      .catch((error) => {
        if (error.status == 503) {
          this.isMaintenance = true;
        }
        this.$closeLoader();
        this.$vs.notify({
          title: this.$t("alert.danger"),
          text: error.message,
          color: "danger",
        });
      });
    },
    getRelationDataBySlug() {
      this.$openLoader();
      this.$api.badasoTable
        .relationDataBySlug({
          slug: this.$route.params.slug,
        })
        .then((response) => {
          this.$closeLoader();
          this.relationData = response.data;
          let employees = [];
          // console.log(this.relationData.badasoUsers.map());
          for(let employee of this.relationData.employees){
            this.relationData.badasoUsers.map((data) => {
             
              if(employee.statusBooking != 'Akan bekerja'){
             
                if(data.id == employee.userId){ 
                  employee.label = data.name;
                  employees.push(employee);
                 
                }
              }
               
            })
          }
          const response_user = this.$api.badasoAuthUser.user({});
          this.relationData.employees = employees;
          console.log(employees, "emp");
        
        })
        .catch((error) => {
          if (error.status == 503) {
            this.isMaintenance = true;
          }
          this.$closeLoader();
          this.$vs.notify({
            title: this.$t("alert.danger"),
            text: error.message,
            color: "danger",
          });
        });
    },
    requestObjectStoreData() {
      this.$readObjectStore(this.pathname).then((store) => {
        if (store.result) {
          this.dataLength = store.result.data.length;
        }
      });
    },
    getUser() {
      this.errors = {};
      this.$openLoader();
      this.$api.badasoAuthUser
        .user({})
        .then((response) => {
          this.$closeLoader();
          this.userId = response.data.user.id;
        })
        .catch((error) => {
          this.errors = error.errors;
          this.$closeLoader();
          this.$vs.notify({
            title: this.$t("alert.danger"),
            text: error.message,
            color: "danger",
          });
        });
    },

   
    
    // cangeCar(event)
    // {
    //   this.user.address.country = event.target.value
    //   this.selectedCountry = event.target.options[event.target.options.selectedIndex].text
    // },
  },
  computed: {
    isOnline: {
      get() {
        const isOnline = this.$store.getters["badaso/getGlobalState"].isOnline;
        return isOnline;
      },
    },
    base64PathName() {
      return window.btoa(location.pathname);
    },
    maintenanceImg() {
      const config = this.$store.getters["badaso/getConfig"];
      return config.maintenanceImage;
    },
  },
};
</script>
