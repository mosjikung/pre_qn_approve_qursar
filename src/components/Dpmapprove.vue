<template>
  <div>
    <q-btn
      class="q-px-xl"
      size="md"
      color="secondary"
      label="Approve"
      @click="open_detail()"
    ></q-btn>

    <q-dialog v-model="prompt" persistent>
      <q-card style="min-width: 90%; min-height: 100%">
        <q-banner
          expand="(true)"
          dense
          inline-actions
          class="text-white bg-indigo-9"
        >
          Approve
          <template v-slot:action>
            <q-btn icon="cancel" flat color="white" v-close-popup />
          </template>
        </q-banner>
        <div class="row">
          <div class="col">
            <div class="q-gutter-md" style="width: 100%">
              <div class="row items-center">
                <div class="col-2 text-right">
                  <text-subtitle1 class="text-left">QN NO.</text-subtitle1>
                </div>
                <div class="col-2">
                  <q-input
                    class="q-px-sm"
                    outlined
                    v-model="posts.ORDER_NO"
                    dense
                    disable
                  />
                </div>
                <text-subtitle1>QN Date</text-subtitle1>
                <div class="col-2">
                  <q-input
                    class="q-px-sm"
                    outlined
                    v-model="posts.ORDER_DATE"
                    dense
                    disable
                  />
                </div>
                <text-subtitle1>QN Type</text-subtitle1>
                <div class="col-2">
                  <q-input
                    class="q-px-sm"
                    outlined
                    v-model="posts.QN_TYPE"
                    dense
                    disable
                  />
                </div>
              </div>
              <br />
              <div class="row items-center">
                <div class="col-2 text-right">
                  <text-subtitle2>Type</text-subtitle2>
                </div>
                <div class="col-2">
                  <q-input
                    class="q-px-sm"
                    outlined
                    v-model="posts.BF_TYPE"
                    dense
                    disable
                  />
                </div>
                <text-subtitle1>Price Type</text-subtitle1>
                <div class="col-2">
                  <q-input
                    class="q-px-sm"
                    outlined
                    v-model="posts.PRICE_TYPE"
                    dense
                    disable
                  />
                </div>
                <text-subtitle1>Type Sub</text-subtitle1>
                <div class="col-2">
                  <q-input
                    class="q-px-sm"
                    outlined
                    v-model="posts.QN_TYPE_SUB"
                    dense
                    disable
                  />
                </div>
              </div>

              <br />
              <div class="row items-center">
                <div class="col-2 text-right">
                  <text-subtitle2>Sales</text-subtitle2>
                </div>
                <div class="col-2">
                  <q-input
                    class="q-px-sm"
                    outlined
                    v-model="posts.SALES_ID"
                    dense
                    disable
                  />
                </div>

                <div class="col-2">
                  <q-input
                    class="q-px-sm"
                    outlined
                    v-model="posts.SALE_NAME"
                    dense
                    disable
                  />
                </div>
                <text-subtitle1>Status</text-subtitle1>
                <div class="col-2">
                  <q-input
                    class="q-px-sm"
                    outlined
                    v-model="posts.RQN_APPROVED"
                    dense
                    disable
                  />
                </div>
                <div class="col-2"></div>
              </div>
              <br />
              <div class="row items-center">
                <div class="col-2 text-right">
                  <text-subtitle2 class="q-px-xs">Customer</text-subtitle2>
                </div>

                <div class="col-2">
                  <q-input
                    class="q-px-xs"
                    outlined
                    v-model="posts.CUSTOMER_ID"
                    dense
                    disable
                  />
                </div>

                <div class="col-5">
                  <q-input
                    class="q-px-xs"
                    outlined
                    v-model="posts.CUSTOMER_NAME"
                    dense
                    disable
                  />
                </div>
              </div>
              <br />
              <div class="row items-center">
                <div class="col-2 text-right">
                  <text-subtitle2 class="q-px-xs"
                    >End Buyer/Brand</text-subtitle2
                  >
                </div>

                <div class="col-4">
                  <q-input
                    class="q-px-xs"
                    outlined
                    v-model="posts.CUSTOMER_END"
                    dense
                    disable
                  />
                </div>
                <text-subtitle2 class="q-px-xs">Customer Type</text-subtitle2>
                <div class="col-2">
                  <q-input
                    class="q-px-xs"
                    outlined
                    v-model="posts.C_TYPE"
                    dense
                  />
                </div>
              </div>
              <br />
              <div class="row items-center">
                <div class="col-2 text-right">
                  <text-subtitle2 class="q-px-xs">Payment Term</text-subtitle2>
                </div>

                <div class="col-2">
                  <q-input
                    class="q-px-xs"
                    outlined
                    v-model="posts.PAYMENT_CONDITION"
                    dense
                    disable
                  />
                </div>
                <text-subtitle2 class="q-px-xs">Commission</text-subtitle2>
                <div class="col-2">
                  <q-input
                    class="q-px-xs"
                    outlined
                    v-model="posts.AGEN_COMMISSION"
                    dense
                    disable
                  />
                </div>
              </div>
              <br />
              <div class="row items-center">
                <div class="col-2 text-right">
                  <text-subtitle2 class="q-px-xs">Currency</text-subtitle2>
                </div>

                <div class="col-2">
                  <q-input
                    class="q-px-xs"
                    outlined
                    v-model="posts.CURRENCY"
                    dense
                    disable
                  />
                </div>
                <text-subtitle2 class="q-px-xs">Exc.Rte</text-subtitle2>
                <div class="col-2">
                  <q-input
                    class="q-px-xs"
                    outlined
                    v-model="posts.EXCHANGE_RATE"
                    dense
                    disable
                  />
                </div>
                <text-subtitle2 class="q-px-xs">Freight Cost</text-subtitle2>
                <div class="col-2">
                  <q-input
                    class="q-px-xs"
                    outlined
                    v-model="posts.FREIGHT_COST"
                    dense
                    disable
                  />
                </div>
                <text-subtitle2 class="q-px-xs">$</text-subtitle2>
              </div>
              <br />
              <div class="row items-center">
                <div class="col-2 text-right">
                  <text-subtitle2 class="q-px-xs">Season</text-subtitle2>
                </div>

                <div class="col-6">
                  <q-input
                    class="q-px-xs"
                    outlined
                    v-model="posts.SEASON"
                    dense
                    disable
                  />
                </div>
              </div>
              <br />
              <div class="row items-center">
                <div class="col-2 text-right">
                  <text-subtitle2 class="q-px-xs">Style</text-subtitle2>
                </div>

                <div class="col-6">
                  <q-input
                    class="q-px-xs q-pb-md"
                    outlined
                    v-model="posts.STYLING"
                    dense
                    disable
                  />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-1"></div>
              <div class="col-10">
                <q-table
                  :rows="row_confirm"
                  :columns="column_confirm"
                  :rows-per-page-options="[5]"
                  dense
                  row-key="CONFIRM"
                  @row-click="chose_data"
                  style="min-height: 340px"
                >
                </q-table>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-1"></div>
              <div class="col-10">
                <q-table
                  :rows="row_customer_po"
                  :columns="column_customer_po"
                  :rows-per-page-options="[5]"
                  dense
                  row-key="CONFIRM"
                  style="min-height: 340px"
                >
                  <template v-slot:body="props">
                    <q-tr :props="props">
                      <!-- <q-btn label="Cnacel Barcode" color="negative" @click="CANCEL_BARCODE" size="12px" padding="4px"></q-btn> -->
                      <!--   -->

                      <q-td key="CUSTOMER_PO" :props="props">
                        <q-input
                          input-class="text-center"
                          v-model="props.row.CUST_PONO"
                          dense
                        />
                      </q-td>
                      <q-td key="QTY_CONFIRM" :props="props">
                        <q-input
                          input-class="text-center"
                          v-model="props.row.ORDERED_QTY"
                          dense
                        />
                      </q-td>
                    </q-tr>
                  </template>
                </q-table>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-8"></div>
              <div class="col-3">
                <text-subtitle1
                  >Result QTY CUSTOMER PO&nbsp;&nbsp;<b>{{
                    this.sum_qty_customer_po
                  }}</b></text-subtitle1
                >
              </div>
            </div>
          </div>

          <div class="col">
            <div class="q-gutter-md" style="width: 100%">
              <div class="row items-center">
                <div class="col-1"></div>
                <text-subtitle1>QN เสนอราคา</text-subtitle1>
                <div class="col-2">
                  <q-input
                    class="q-px-sm"
                    outlined
                    v-model="this.qn_price"
                    dense
                  />
                </div>
                <text-subtitle1>QN Resive. No.</text-subtitle1>
                <div class="col-2">
                  <q-input
                    class="q-px-sm"
                    outlined
                    v-model="this.qn_resive_no"
                    dense
                  />
                </div>
                <div class="col-2">
                  <q-btn
                    class="q-px-xl q-pt-xs"
                    dense
                    size="md"
                    color="primary"
                    label="Report"
                  />
                </div>
              </div>
              <br />
              <div class="row items-center">
                <div class="col-1"></div>
                <text-subtitle1>Expire Date</text-subtitle1>
                <div class="col-2">
                  <q-input
                    class="q-px-sm"
                    outlined
                    v-model="posts.EXPIRED_DATE"
                    dense
                  />
                </div>
                <text-subtitle1>QN Resive. Desc</text-subtitle1>
                <div class="col-2">
                  <q-input
                    class="q-px-sm"
                    outlined
                    v-model="this.qn_resive_desc"
                    dense
                  />
                </div>
              </div>
              <br />
              <div class="row">
                <div class="col-1">
                  <text-subtitle1>Option</text-subtitle1>
                </div>
                <div class="col-5"></div>
                <div class="col-1">
                  <text-subtitle1>Remark</text-subtitle1>
                </div>
              </div>
              <div class="row items-center">
                <div class="col-5">
                  <q-table
                    :rows="row_option"
                    :columns="option_column"
                    :rows-per-page-options="[10]"
                    dense
                    row-key="NAME"
                    style="min-height: 340px"
                  >
                    <template v-slot:body="props">
                      <q-tr :props="props">
                        <!-- <q-btn label="Cnacel Barcode" color="negative" @click="CANCEL_BARCODE" size="12px" padding="4px"></q-btn> -->
                        <!--   -->

                        <q-td key="NAME" :props="props">
                          <q-input
                            input-class="text-center"
                            v-model="props.row.OP_NAME"
                            dense
                            disable
                          />
                        </q-td>
                      </q-tr>
                    </template>
                  </q-table>
                </div>
                <div class="col-1"></div>
                <div class="col-5">
                  <q-table
                    :rows="row_remark"
                    :columns="option_remark"
                    :rows-per-page-options="[10]"
                    dense
                    row-key="NAME"
                    style="min-height: 340px"
                  >
                    <template v-slot:body="props">
                      <q-tr :props="props">
                        <!-- <q-btn label="Cnacel Barcode" color="negative" @click="CANCEL_BARCODE" size="12px" padding="4px"></q-btn> -->
                        <!--   -->

                        <q-td key="NAME" :props="props">
                          <q-input
                            input-class="text-center"
                            v-model="props.row.OP_NAME"
                            dense
                            disable
                          />
                        </q-td>
                      </q-tr>
                    </template>
                  </q-table>
                </div>
              </div>

              <div class="row">
                <div class="col-4"></div>
                <div class="col-3">
                  <q-table
                    :rows="row_ship_plan"
                    :columns="option_ship_plan"
                    :rows-per-page-options="[10]"
                    title="Confirm Ship Plan (RDD)"
                    dense
                    row-key="WEEK"
                    style="min-height: 340px"
                  >
                    <template v-slot:body="props">
                      <q-tr :props="props">
                        <!-- <q-btn label="Cnacel Barcode" color="negative" @click="CANCEL_BARCODE" size="12px" padding="4px"></q-btn> -->
                        <!--   -->

                        <q-td key="WEEK" :props="props">
                          <q-input
                            input-class="text-center"
                            v-model="props.row.PERIOD_WEEK"
                            dense
                            disable
                          />
                        </q-td>
                        <q-td key="QTY" :props="props">
                          <q-input
                            input-class="text-center"
                            v-model="props.row.QUANTITY"
                            dense
                            disable
                          />
                        </q-td>
                      </q-tr>
                    </template>
                  </q-table>
                </div>
                <div class="col-5"></div>
              </div>

              <div class="row">
                <div class="col-4"></div>
                <div class="col-3">
                  <text-subtitle1
                    >Result QTY Ship Plan Confirm&nbsp;&nbsp;<b>{{
                      this.sum_qty_ship_plan_confirm
                    }}</b></text-subtitle1
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
        <br />
        <div class="row q-py-xs">
          <div class="col-1"></div>
          <h6>Remark</h6>
        </div>
        <div class="row q-py-xs">
          <div class="col-1"></div>
          <div class="col-5">
            <q-input v-model="remark" filled type="textarea" />
          </div>
        </div>
        <br />
        <br />
        <br />
        <div class="row">
          <div class="col-6"></div>
          <div class="col-3">
            <q-btn
              color="indigo-10"
              label="Approve"
              size="20px"
              @click="saveapprove()"
            />
          </div>
        </div>
      </q-card>
    </q-dialog>
  </div>
</template>

<script>
import { ref } from "vue";
import axios from "axios";
export default {
  data() {
    return {
      prompt: ref(false),
      posts: [],
      qn_resive_no: "",
      qn_price: "",
      qn_resive_desc: "",
      remark: "",
      username: "",
      row_option: [],
      row_remark: [],
      result_knit_plan: [],
      result_ship_plan: [],
      row_knit_plan: [],
      row_ship_plan: [],
      row_ship_plan_confirm: [],
      result_ship_plan_confirm: [],
      row_confirm: [],
      row_customer_po: [],
      result_customer_po: [],
      option_column: [
        {
          name: "NAME",
          label: "Name",
          align: "center",
          field: "NAME",
        },
      ],
      option_remark: [
        {
          name: "NAME",
          label: "Name",
          align: "center",
          field: "NAME",
        },
      ],
      option_knit_plan: [
        {
          name: "WEEK",
          label: "Week",
          align: "left",
          field: "WEEK",
        },
        {
          name: "QTY",
          label: "Qty",
          align: "right",
          field: "QTY",
        },
      ],
      option_ship_plan: [
        {
          name: "WEEK",
          label: "Week",
          align: "left",
          field: "WEEK",
        },
        {
          name: "QTY",
          label: "Qty",
          align: "right",
          field: "QTY",
        },
      ],
      column_confirm: [
        {
          name: "ITEM",
          label: "Item",
          align: "center",
          field: (row) => row.ITEM_CODE,
        },
        {
          name: "COLOR",
          label: "Color",
          align: "center",
          field: (row) => row.COLOR,
        },
        {
          name: "STD_LT",
          label: "Std.L/T(days)",
          align: "center",
          field: (row) => row.ITEM_LT,
        },
        {
          name: "QTY_QN",
          label: "Qty-QN",
          align: "center",
          field: (row) => row.QTY_QN,
        },
        {
          name: "QTY_CONFIRM",
          label: "Qty Confirm",
          align: "center",
          field: (row) => row.QTY_CONFIRM,
        },
        {
          name: "LINE_ID",
          label: "LINE ID",
          align: "center",
          field: (row) => row.LINE_ID,
        },
      ],
      column_customer_po: [
        {
          name: "CUSTOMER_PO",
          label: "Customer PO",
          align: "center",
          field: "CUSTOMER_PO",
        },
        {
          name: "QTY_CONFIRM",
          label: "qty_confirm",
          align: "center",
          field: "QTY_CONFIRM",
        },
      ],
      option_ship_plan_confirm: [
        {
          name: "WEEK",
          label: "Week",
          align: "left",
          field: "WEEK",
        },
        {
          name: "QTY",
          label: "Qty",
          align: "right",
          field: "QTY",
        },
      ],
    };
  },
  methods: {
    async open_detail() {
      this.prompt = true;
      this.row_option = [];
      this.row_remark = [];
      this.result_knit_plan = [];
      this.result_ship_plan = [];
      this.row_knit_plan = [];
      this.row_ship_plan = [];
      this.row_ship_plan_confirm = [];
      this.row_confirm = [];
      this.row_customer_po = [];
      this.result_customer_po = [];
      this.sum_qty_knit_plan = 0;
      this.sum_qty_ship_plan = 0;
      this.sum_qty_customer_po = 0;
      this.row_ship_plan_confirm = [];
      this.result_ship_plan_confirm = [];
      this.sum_qty_ship_plan_confirm = 0;

      const params = new FormData();
      params.append("QN_NO", this.detail);
      await axios({
        method: "post",
        url: this.$api_url + "/find_data.php/find_detail_qn",
        data: params,
      }).then((resp) => {
        console.log(resp.data);

        this.posts = resp.data.data[0];
      });

      const params3 = new FormData();
      params3.append("QN_NO", this.detail);

      await axios({
        method: "post",
        url: this.$api_url + "/find_data.php/find_data_confirm",
        data: params3,
      }).then((resp) => {
        console.log(resp.data);
        this.row_confirm = resp.data.data;
        console.log(this.row_confirm);
      });

      const params2 = new FormData();
      params2.append("LINE_ID", this.row_confirm[0].LINE_ID);
      axios({
        method: "post",
        url: this.$api_url + "/find_data.php/find_remark_qn",
        data: params2,
      }).then((resp) => {
        console.log(resp.data);

        this.row_remark = resp.data.data;
        console.log(this.row_remark);
      });

      axios({
        method: "post",
        url: this.$api_url + "/find_data.php/find_knit_plan",
        data: params2,
      }).then((resp) => {
        console.log(resp.data);
        this.row_knit_plan = resp.data.data;
        if (resp.data.data.length > 0) {
          resp.data.data.forEach((e) => {
            this.result_knit_plan.push({
              qty: e.QUANTITY,
            });
          });
        }

        for (var ax = 0; ax < this.result_knit_plan.length; ax++) {
          this.sum_qty_knit_plan =
            Number(this.sum_qty_knit_plan) +
            Number(this.result_knit_plan[ax].qty);
        }
      });

      axios({
        method: "post",
        url: this.$api_url + "/find_data.php/find_option_qn",
        data: params2,
      }).then((resp) => {
        this.row_option = resp.data.data;
      });

      axios({
        method: "post",
        url: this.$api_url + "/find_data.php/find_ship_plan",
        data: params2,
      }).then((resp) => {
        console.log(resp.data);
        this.row_ship_plan = resp.data.data;
        console.log(this.row_ship_plan);
        if (resp.data.data.length > 0) {
          resp.data.data.forEach((e) => {
            this.result_ship_plan.push({
              qty: e.QUANTITY,
            });
          });
        }
        for (var ax = 0; ax < this.result_ship_plan.length; ax++) {
          this.sum_qty_ship_plan =
            Number(this.sum_qty_ship_plan) +
            Number(this.result_ship_plan[ax].qty);
        }
      });

      axios({
        method: "post",
        url: this.$api_url + "/find_data.php/find_customer_po",
        data: params2,
      }).then((resp) => {
        console.log(resp.data);
        this.row_customer_po = resp.data.data;
        console.log(this.row_customer_po);
        if (resp.data.data.length > 0) {
          resp.data.data.forEach((e) => {
            this.result_customer_po.push({
              qty: e.ORDERED_QTY,
            });
          });
        }
        console.log(this.result_customer_po);
        for (var ax = 0; ax < this.result_customer_po.length; ax++) {
          this.sum_qty_customer_po =
            Number(this.sum_qty_customer_po) +
            Number(this.result_customer_po[ax].qty);
        }
      });

      const params4 = new FormData();
      params4.append("ITEM_CODE", this.row_confirm[0].ITEM_CODE);
      params4.append("ORDER_NO", this.detail);

      axios({
        method: "post",
        url: this.$api_url + "/find_data.php/find_ship_plan_confirm",
        data: params4,
      }).then((resp) => {
        console.log(resp.data);
        this.row_ship_plan_confirm = resp.data.data;
        if (resp.data.data.length > 0) {
          resp.data.data.forEach((e) => {
            this.result_ship_plan_confirm.push({
              kgs: e.ORDERED_KGS,
            });
          });
        }
        for (var ax = 0; ax < this.result_ship_plan_confirm.length; ax++) {
          this.sum_qty_ship_plan_confirm =
            Number(this.sum_qty_ship_plan_confirm) +
            Number(this.row_ship_plan_confirm[ax].kgs);
        }
      });
    },
    chose_data(evt, row) {
      this.row_remark = [];
      this.row_knit_plan = [];
      this.result_knit_plan = [];
      this.sum_qty_knit_plan = 0;
      this.row_option = [];
      this.row_ship_plan = [];
      this.result_ship_plan = [];
      this.sum_qty_ship_plan = 0;
      this.row_customer_po = [];
      this.result_customer_po = [];
      this.sum_qty_customer_po = 0;
      this.row_ship_plan_confirm = [];
      this.result_ship_plan_confirm = [];
      this.sum_qty_ship_plan_confirm = 0;

      const params2 = new FormData();
      params2.append("LINE_ID", row.LINE_ID);
      axios({
        method: "post",
        url: this.$api_url + "/find_data.php/find_remark_qn",
        data: params2,
      }).then((resp) => {
        console.log(resp.data);

        this.row_remark = resp.data.data;
        console.log(this.row_remark);
      });

      axios({
        method: "post",
        url: this.$api_url + "/find_data.php/find_knit_plan",
        data: params2,
      }).then((resp) => {
        console.log(resp.data);
        this.row_knit_plan = resp.data.data;
        if (resp.data.data.length > 0) {
          resp.data.data.forEach((e) => {
            this.result_knit_plan.push({
              qty: e.QUANTITY,
            });
          });
        }

        for (var ax = 0; ax < this.result_knit_plan.length; ax++) {
          this.sum_qty_knit_plan =
            Number(this.sum_qty_knit_plan) +
            Number(this.result_knit_plan[ax].qty);
        }
      });

      axios({
        method: "post",
        url: this.$api_url + "/find_data.php/find_option_qn",
        data: params2,
      }).then((resp) => {
        this.row_option = resp.data.data;
      });

      axios({
        method: "post",
        url: this.$api_url + "/find_data.php/find_ship_plan",
        data: params2,
      }).then((resp) => {
        console.log(resp.data);
        this.row_ship_plan = resp.data.data;
        console.log(this.row_ship_plan);
        if (resp.data.data.length > 0) {
          resp.data.data.forEach((e) => {
            this.result_ship_plan.push({
              qty: e.QUANTITY,
            });
          });
        }
        for (var ax = 0; ax < this.result_ship_plan.length; ax++) {
          this.sum_qty_ship_plan =
            Number(this.sum_qty_ship_plan) +
            Number(this.result_ship_plan[ax].qty);
        }
      });

      axios({
        method: "post",
        url: this.$api_url + "/find_data.php/find_customer_po",
        data: params2,
      }).then((resp) => {
        console.log(resp.data);
        this.row_customer_po = resp.data.data;
        console.log(this.row_customer_po);
        if (resp.data.data.length > 0) {
          resp.data.data.forEach((e) => {
            this.result_customer_po.push({
              qty: e.ORDERED_QTY,
            });
          });
        }
        console.log(this.result_customer_po);
        for (var ax = 0; ax < this.result_customer_po.length; ax++) {
          this.sum_qty_customer_po =
            Number(this.sum_qty_customer_po) +
            Number(this.result_customer_po[ax].qty);
        }
      });

      const params4 = new FormData();
      params4.append("ITEM_CODE", row.ITEM_CODE);
      params4.append("ORDER_NO", this.detail);
      console.log(row.ITEM_CODE);
      console.log(this.detail);
      axios({
        method: "post",
        url: this.$api_url + "/find_data.php/find_ship_plan_confirm",
        data: params4,
      }).then((resp) => {
        console.log(resp.data);
        this.row_ship_plan_confirm = resp.data.data;
        if (resp.data.data.length > 0) {
          resp.data.data.forEach((e) => {
            this.result_ship_plan_confirm.push({
              kgs: e.ORDERED_KGS,
            });
          });
        }
        for (var ax = 0; ax < this.result_ship_plan_confirm.length; ax++) {
          this.sum_qty_ship_plan_confirm =
            Number(this.sum_qty_ship_plan_confirm) +
            Number(this.row_ship_plan_confirm[ax].kgs);
        }
      });
    },
    saveapprove() {
      const params = new FormData();
      params.append("REMARK", this.remark);
      params.append("USERNAME", this.username);
      params.append("QN_NO", this.detail);

      axios({
        method: "post",
        url: this.$api_url + "/find_data.php/all_approve",
        data: params,
      }).then((resp) => {
        console.log(resp.data);
        this.prompt = false;
      });

      const params2 = new FormData();
      params2.append("USERNAME", this.username);
      this.rowshow = [];
      axios({
        method: "post",
        url: this.$api_url + "/find_data.php/find_all_data",
        data: params2,
      }).then((resp) => {
        this.rowshow = resp.data.data;
        console.log(this.rowshow);
        this.$emit("show", this.rowshow);
      });
    },
  },
  props: {
    detail: {
      type: String,
    },
    detail2: {
      type: String,
    },
    detail3: {
      type: String,
    },
    detail4: {
      type: String,
    },
    detail5: {
      type: String,
    },
    detail6: {
      type: String,
    },
  },
  mounted() {
    let username = this.$q.localStorage.getItem("username");
    this.username = username;
  },
};
</script>

<style></style>
