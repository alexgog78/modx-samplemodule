'use strict';

sampleModule.combo.multiSelectLocal.tag = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        allowAddNewData: true,

        /*store: new Ext.data.ArrayStore({
            //idIndex: 0,
            fields: [],
        }),*/
        //displayField: 0,
        //valueField: 0,

        //classField: 'zzz',

        //store: ["111", "222", "888", "999"],
        //value: '111,888',

        //store: [['f','Foo'],['b','Bar'], ['111','111'], ['222','222']],
        //value: 'f,111',
        //value: [['zzz','zzzz'],['xxx','xxx']]
    });
    sampleModule.combo.multiSelectLocal.tag.superclass.constructor.call(this, config);
};
Ext.extend(sampleModule.combo.multiSelectLocal.tag, sampleModule.combo.multiSelectLocal, {

    initComponent: function () {
        console.log(this.value);
        sampleModule.combo.multiSelectLocal.superclass.initComponent.call(this);
    },


    initValue : function(){

        if(Ext.isObject(this.value) || Ext.isArray(this.value)){
            console.log(this.value);
            this.setValueEx(this.value);
            this.originalValue = this.getValue();
            console.log(this.originalValue);
        }else{
            Ext.ux.form.SuperBoxSelect.superclass.initValue.call(this);
        }
        if(this.mode === 'remote') {
            this.setOriginal = true;
        }
    },




    setValueEx : function(data){
        if(!this.rendered){
            this.value = data;
            return;
        }
        this.removeAllItems().resetStore();

        if(!Ext.isArray(data)){
            data = [data];
        }
        this.remoteLookup = [];

        if(this.allowAddNewData && this.mode === 'remote'){ // no need to query
            Ext.each(data, function(d){
                var r = this.findRecord(this.valueField, d[this.valueField]) || this.createRecord(d);
                this.addRecord(r);
            },this);
            return;
        }

        console.log(data);
        Ext.each(data,function(item){
            //item = {'value': item};
            console.log(item);
            this.addItem(item);
        },this);
    },

});
Ext.reg('samplemodule-combo-multiselect-tag', sampleModule.combo.multiSelectLocal.tag);
