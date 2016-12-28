import {Injectable} from '@angular/core';
import {Http, Response, Headers} from '@angular/http';
import {Observable} from 'rxjs/Rx';

import 'rxjs/add/operator/map';
import 'rxjs/add/operator/catch';

@Injectable()
export class CrudServices {

    constructor(private http: Http) {

    }

    getDataApi(): Observable<any>{
        return this.http.get("https://jsonplaceholder.typicode.com/posts/1")
        .map( (res: Response) => res.json())
        .catch((error:any) => Observable.throw(error.json().error || 'server error'));
    }
    //<?xml version='1.0' encoding='UTF-8'?>
    xml: any = `
    InforuXML=    
    <Inforu>
    <User><Username>yoavpe</Username><Password>190997</Password></User>
    <Content Type="sms"><Message>This is a test SMS Message</Message></Content>
    <Recipients><PhoneNumber>0524640460</PhoneNumber></Recipients>
    <Settings><SenderNumber>0501111111</SenderNumber></Settings>
    </Inforu>
    `
 /*<User>
 <Username>MyUsername</Username>
 <Password>MyPassword</Password>
 </User>
 <Content Type="sms">
 <Message>This is a test SMS Message</Message>
 </Content>
 <Recipients>
 <PhoneNumber>0501111111;0502222222</PhoneNumber>
 </Recipients>
 <Settings>
 <SenderNumber>0501111111</SenderNumber>
 </Settings>
</Inforu>*/
    
    createDataApi(senderName: string, senderCell: string): Observable<any> {
        var headers = new Headers();
        headers.append('Content-Type', 'text/xml');
       
       
       //return this.http.post("http://localhost:3000", this.xml, {headers: headers});

       return this.http.post("http://tests.smsbless.co.il/php/processData.php", {senderName: senderName, senderCell: senderCell});
    }


}