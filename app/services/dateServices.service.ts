import {Injectable} from '@angular/core'

@Injectable()
export class DatesServices {
    
  private today:Date;
  public today1: String;
  private dd: number;
  private mm: number;
  private yyyy: number;
  private data:any;
 
    getTodayDate() {
    this.today = new Date();
    this.dd = this.today.getDate();
    this.mm = this.today.getMonth()+1; //January is 0!
    this.yyyy = this.today.getFullYear();
    this.today1 = this.yyyy+'-'+this.mm+'-'+this.dd;
    return this.today1;
    }
}