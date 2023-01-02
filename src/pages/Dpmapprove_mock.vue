<template>
  <div class="q-pa-md justify-center row item-mid q-gutter-md">
    <div class="row">
      <q-card class="my-card" style="min-width: 100%">
        <div class="row items-center">
          <div class="col-2 text-right">
            <text-subtitle2 class="text-left">QN NO.</text-subtitle2>
          </div>
          <div class="col-3">
            <q-input
              class="q-px-sm q-pt-md"
              outlined
              v-model="text"
              dense
              label="671187"
            />
          </div>
          <text-subtitle1>QN Date</text-subtitle1>
          <div class="col-3">
            <q-input
              class="q-px-sm q-pt-md"
              outlined
              v-model="text"
              dense
              label="5-Jul-2022"
            />
          </div>
          <text-subtitle1>QN Type</text-subtitle1>
          <div class="col-2">
            <q-select
              class="q-px-sm q-pt-md"
              outlined
              v-model="model"
              :options="options"
              dense
              label="Outlined"
            />
          </div>
        </div>
        <br />
        <div class="row items-center">
          <div class="col-2 text-right">
            <text-subtitle2>Type</text-subtitle2>
          </div>
          <div class="col-3">
            <q-input
              class="q-px-sm q-pt-md"
              outlined
              v-model="text"
              dense
              label="671187"
            />
          </div>
          <text-subtitle1>QN Date</text-subtitle1>
          <div class="col-3">
            <q-input
              class="q-px-sm q-pt-md"
              outlined
              v-model="text"
              dense
              label="5-Jul-2022"
            />
          </div>
          <text-subtitle1>QN Type</text-subtitle1>
          <div class="col-2">
            <q-select
              class="q-px-sm"
              outlined
              v-model="model"
              :options="options"
              dense
              label="Outlined"
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
              v-model="text"
              dense
              label="671187"
            />
          </div>

          <div class="col-4">
            <q-input
              class="q-px-sm"
              outlined
              v-model="text"
              dense
              label="5-Jul-2022"
            />
          </div>
          <text-subtitle1>Status</text-subtitle1>
          <div class="col-3">
            <q-input
              class="q-px-sm"
              outlined
              v-model="text"
              dense
              label="5-Jul-2022"
            />
          </div>
        </div>
        <br />
        <div class="row items-center">
          <div class="col-2 text-right">
            <text-subtitle2 class="q-px-xs">Customer</text-subtitle2>
          </div>
          <div class="col-2">
            <q-btn class="q-px-xl" size="md" color="black" label="..." />
          </div>

          <div class="col-2">
            <q-input
              class="q-px-xs"
              outlined
              v-model="text"
              dense
              label="5-Jul-2022"
            />
          </div>

          <div class="col-6">
            <q-input
              class="q-px-xl"
              outlined
              v-model="text"
              dense
              label="5-Jul-2022"
            />
          </div>
        </div>
        <br />
        <div class="row items-center">
          <div class="col-2 text-right">
            <text-subtitle2 class="q-px-xs">End Buyer/Brand</text-subtitle2>
          </div>
          <div class="col-2">
            <q-btn class="q-px-xl" size="md" color="black" label="..." />
          </div>

          <div class="col-4">
            <q-input
              class="q-px-xs"
              outlined
              v-model="text"
              dense
              label="5-Jul-2022"
            />
          </div>
          <text-subtitle2 class="q-px-xs">Customer Type</text-subtitle2>
          <div class="col-2">
            <q-input
              class="q-px-xs"
              outlined
              v-model="text"
              dense
              label="5-Jul-2022"
            />
          </div>
        </div>
        <br />
        <div class="row items-center">
          <div class="col-2 text-right">
            <text-subtitle2 class="q-px-xs">Payment Term</text-subtitle2>
          </div>
          <div class="col-2">
            <q-btn class="q-px-xl" size="md" color="black" label="..." />
          </div>

          <div class="col-4">
            <q-input
              class="q-px-xs"
              outlined
              v-model="text"
              dense
              label="Credit 90 Days"
            />
          </div>
          <text-subtitle2 class="q-px-xs">Commission</text-subtitle2>
          <div class="col-2">
            <q-input
              class="q-px-xs"
              outlined
              v-model="text"
              dense
              label="5-Jul-2022"
            />
          </div>
        </div>
        <br />
        <div class="row items-center">
          <div class="col-2 text-right">
            <text-subtitle2 class="q-px-xs">Currency</text-subtitle2>
          </div>

          <div class="col-3">
            <q-input
              class="q-px-xs"
              outlined
              v-model="text"
              dense
              label="Credit 90 Days"
            />
          </div>
          <text-subtitle2 class="q-px-xs">Exc.Rte</text-subtitle2>
          <div class="col-2">
            <q-input
              class="q-px-xs"
              outlined
              v-model="text"
              dense
              label="5-Jul-2022"
            />
          </div>
          <text-subtitle2 class="q-px-xs">Freight Cost</text-subtitle2>
          <div class="col-2">
            <q-input
              class="q-px-xs"
              outlined
              v-model="text"
              dense
              label="5-Jul-2022"
            />
          </div>
          <text-subtitle2 class="q-px-xs">$</text-subtitle2>
        </div>
        <br />
        <div class="row items-center">
          <div class="col-2 text-right">
            <text-subtitle2 class="q-px-xs">Season</text-subtitle2>
          </div>

          <div class="col-9">
            <q-input
              class="q-px-xs"
              outlined
              v-model="text"
              dense
              label="Credit 90 Days"
            />
          </div>
        </div>
        <br />
        <div class="row items-center">
          <div class="col-2 text-right">
            <text-subtitle2 class="q-px-xs">Style</text-subtitle2>
          </div>

          <div class="col-9">
            <q-input
              class="q-px-xs q-pb-md"
              outlined
              v-model="text"
              dense
              label="Credit 90 Days"
            />
          </div>
        </div>
      </q-card>
    </div>
    <q-card class="my-card" style="min-width: 50%">
      <!--ส่วนขวา -->
      <div class="row items-center">
        <div class="col-2 text-right">
          <text-subtitle2 class="text-left">QN เสนอราคา</text-subtitle2>
        </div>
        <div class="col-3">
          <q-input
            class="q-px-sm"
            outlined
            v-model="text"
            dense
            label="671187"
          />
        </div>
        <text-subtitle1>Qn Resive No.</text-subtitle1>
        <div class="col-3">
          <q-input
            class="q-px-sm"
            outlined
            v-model="text"
            dense
            label="5-Jul-2022"
          />
        </div>
        <div class="col-2">
          <q-btn class="q-px-xl" size="md" color="primary" label="Report" />
        </div>
      </div>
      <br />
      <div class="row items-center">
        <div class="col-2 text-right">
          <text-subtitle2 class="text-left">QN เสนอราคา</text-subtitle2>
        </div>
        <div class="col-3">
          <q-input
            class="q-px-sm"
            outlined
            v-model="text"
            dense
            label="671187"
          />
        </div>
        <text-subtitle1>Qn Resive No.</text-subtitle1>
        <div class="col-3">
          <q-input
            class="q-px-sm"
            outlined
            v-model="text"
            dense
            label="5-Jul-2022"
          />
        </div>
      </div>
      <br />
      <div class="row">
        <div class="col-2"></div>
        <q-select
          class="q-py-xl"
          label="option"
          transition-show="flip-up"
          transition-hide="flip-down"
          filled
          v-model="model"
          :options="optionx"
          style="width: 250px"
        />
        <div class="col-2"></div>
        <q-select
          class="q-py-xl"
          label="Remark"
          transition-show="flip-up"
          transition-hide="flip-down"
          filled
          v-model="model"
          :options="optionxx"
          style="width: 250px"
        />
      </div>
    </q-card>
  </div>
</template>

<script>
export default {
  data() {
    return {
      options: ["1", "2", "3"],
      optionx: ["REACTIVE", "ตัดริม ทากาว"],
      optionxx: ["CTP", "BRAND"],
    };
  },
};
</script>

<style lang="sass">
.alpha
align:left
</style>
