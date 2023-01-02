<template>
  <div class="q-pa-md" style="max-width: 100%">
    <div class="q-gutter-md">
      <div class="my-card" style="max-width: 100%">
        <div class="row">
          <div class="col-12">
            <div class="q-pt-md" style="margin-top: 0px; padding-top: 0px">
              <q-table
                :rows="rowshow"
                :columns="columnsshow"
                :rows-per-page-options="[20]"
                dense
                row-key="QN_NO"
                style="min-height: 340px"
              >
                <template v-slot:body="props">
                  <q-tr :props="props">
                    <!-- <q-btn label="Cnacel Barcode" color="negative" @click="CANCEL_BARCODE" size="12px" padding="4px"></q-btn> -->
                    <!--   -->

                    <q-td key="EDIT" :props="props">
                      <Dpmapprove
                        :detail="props.row.ORDER_NO"
                        :detail2="props.row.ORDER_DATE"
                        :detail3="props.row.RQN_APPROVED"
                        :detail4="props.row.CUSTOMER_ID"
                        :detail5="props.row.CUSTOMER_NAME"
                        :detail6="props.row.LINE_ID"
                        @show="getshow"
                        @clicked="submit"
                      ></Dpmapprove>
                    </q-td>
                    <q-td key="QN_NO" :props="props">
                      <q-input
                        input-class="text-center"
                        v-model="props.row.ORDER_NO"
                        dense
                        disable
                      />
                    </q-td>
                    <q-td key="QN_DATE" :props="props">
                      <q-input
                        input-class="text-center"
                        v-model="props.row.ORDER_DATE"
                        dense
                        disable
                      />
                    </q-td>
                    <q-td key="Status" :props="props">
                      <q-input
                        input-class="text-center"
                        v-model="props.row.RQN_APPROVED"
                        dense
                        disable
                      />
                    </q-td>

                    <q-td key="CUS_ID" :props="props">
                      <q-input
                        input-class="text-center"
                        v-model="props.row.CUSTOMER_ID"
                        dense
                        disable
                      />
                    </q-td>
                    <q-td key="CUSTOMER" :props="props">
                      <!--key = name.columne -->
                      <q-input
                        input-class="text-center"
                        v-model="props.row.CUSTOMER_NAME"
                        dense
                        disable
                      />
                    </q-td>
                    <q-td key="TEAMNAME" :props="props">
                      <!--key = name.columne -->
                      <q-input
                        input-class="text-center"
                        v-model="props.row.TEAM_NAME"
                        dense
                        disable
                      />
                    </q-td>
                  </q-tr>
                </template>
              </q-table>
            </div>
          </div>
        </div>

        <!-- row -->
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Dpmapprove from "../components/Dpmapprove.vue";
export default {
  setup() {},
  data() {
    return {
      username: "",
      columnsshow: [
        {
          name: "EDIT",
          label: "APPROVE",
          align: "center",
          field: "EDIT",
        },
        {
          name: "QN_NO",
          label: "QN.NO",
          align: "center",
          field: "QN_NO",
          sortable: true,
        },
        {
          name: "QN_DATE",
          label: "QN.DATE",
          align: "center",
          field: "QN_DATE",
          sortable: true,
        },
        {
          name: "Status",
          label: "STATUS",
          align: "center",
          field: "Status",
          sortable: true,
        },

        {
          name: "CUS_ID",
          label: "CUS.ID",
          align: "center",
          field: "CUS_ID",
          sortable: true,
        },
        {
          name: "CUSTOMER",
          label: "CUSTOMER_NAME",
          align: "center",
          field: "CUSTOMER",
          sortable: true,
        },
        {
          name: "TEAMNAME",
          label: "TEAM NAME",
          align: "center",
          field: "TEAMNAME",
          sortable: true,
        },
      ],
      rowshow: [],
      rowshow2: [
        {
          QN_NO: "FANATICS, INC.",
          QN_DATE: "221515-0046",
          Status: "05",
          CUS_ID: "1515",
          CUSTOMER: "09221515",
          SO_YEAR: "22",
          STYLE: "NKDK-XXX-BLANK",
        },
      ],
    };
  },
  components: {
    Dpmapprove,
  },
  mounted() {
    let username = this.$q.localStorage.getItem("username");
    this.username = username;
    console.log(this.username);
    const params = new FormData();
    params.append("USERNAME", this.username);
    axios({
      method: "post",
      url: this.$api_url + "/find_data.php/find_all_data",
      data: params,
    }).then((resp) => {
      this.rowshow = resp.data.data;
      console.log(this.rowshow);
    });
  },
  methods: {
    getshow(value) {
      console.log(this.rowshow);
      this.rowshow = [];

      this.rowshow = value;
    },
  },
};
</script>
