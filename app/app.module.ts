import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule }   from '@angular/forms';
import { HttpModule }      from '@angular/http';
import {DatesServices} from './services/dateServices.service';
import {CrudServices} from './services/crudService.service';


import { AppComponent }  from './app.component';
import { SmsBlessFormComponent } from './smsbless-form.component';

@NgModule({
  imports:      [ BrowserModule, FormsModule, HttpModule ],
  declarations: [ AppComponent, SmsBlessFormComponent ],
  providers: [DatesServices, CrudServices],
  bootstrap:    [ AppComponent]
})
export class AppModule { }
