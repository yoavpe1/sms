import { Component, OnInit } from '@angular/core';
import {Http} from '@angular/http';
import {DatesServices} from './services/dateServices.service';
import {CrudServices} from './services/crudService.service';
import {BlessesInfo} from'./blessesInfo';


@Component({
  moduleId: module.id,
  selector: 'smsblss-form',
  templateUrl: 'smsbless-form.component.html'
})

export class SmsBlessFormComponent {
  
  today3: Object;
  submitted = false;
  newbleesingsOrder = new BlessesInfo('', '', '', '');


  constructor(datesServices: DatesServices, private crudServices: CrudServices ) {
    this.today3 = datesServices.getTodayDate();
  }

  ngOnInit() {
   // this.getAllData();  
  }

  getAllData() {
    this.crudServices.getDataApi()
    .subscribe(
      data => console.log(JSON.stringify(data)),
      error => console.log('server error')
    );
  }

createNewData(senderName: string, senderCell: string) {
  this.crudServices.createDataApi(senderName, senderCell).subscribe(
     data => this.getAllData(),
      error => console.log('server error')
  );
}

  
  
  blessingsBank = [
    {text: "blessing1"},
    {text: "blessing2"},
    {text: "blessing3"},
    {text: "blessing4"}
  ]

  smsTime = ["08:00", "08:30", "09:00", "09:30"]

  formText = ["text1", "text2"];

  onSubmit(param:Object) { 

    this.createNewData(param.senderName, param.senderCell);
    this.getAllData();  
    
    console.log(param);
    
    this.submitted = true;
    //console.log(this.formText);
    //console.log(this.smsTime);
 };
  onChange(param: any, index: any) {
    this.formText[index] = param;
  }

    cancel() {
      this.submitted = false;
      this.newbleesingsOrder = new BlessesInfo('', '', '', '');
  }

}
