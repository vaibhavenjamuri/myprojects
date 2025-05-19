import { HttpClient} from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class MasterService {
 url1='http://172.16.1.57/api/chart1.php?year=';
 url2='http://172.16.1.57/api/chart2.php?year=';
 url3='http://172.16.1.57/api/chart3.php?year=';

  constructor(private http:HttpClient) { }
  listarray = [{ "name": "ravi", "mark": "75" }]
  GetData() {
    return this.listarray;
  }
  SaveData(input: any) {
    this.listarray.push(input);
  }

  // GetEmployee(){
   // let token='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1bmlxdWVfbmFtZSI6ImFkbWludXNlciIsInJvbGUiOiJhZG1pbiIsIm5iZiI6MTY2MTgzOTg1NiwiZXhwIjoxNjYxODQxMDU2LCJpYXQiOjE2NjE4Mzk4NTZ9.UH-ANZN90QYmi8mUfnySLbfdCfMuSBnsKycAMqsgUPg'
    // let head_obj=new HttpHeaders().set("Authorization","bearer "+token)
    // return this.http.get("https://localhost:44308/Employee",{headers:head_obj});
  // }

  GetCustomer(){
    return this.http.get("https://localhost:44308/Customer");
  }

  Getchartinfo(){
   
    return this.http.get(this.url1);
  }
    Getchartinfo2(){
   
    return this.http.get(this.url2);
  }
  Getchartinfo3(){
   
    return this.http.get(this.url3);
  }

}


// import { Injectable } from '@angular/core';
// import { HttpClient} from '@angular/common/http'
// @Injectable({
  // providedIn: 'root'
// })
// export class MasterService {
  // url='http://172.16.1.57/api/chart1.php';
    // constructor(private http:HttpClient){ }
      // users(){
        // return this.http.get(this.url);
      // }
    
  
// }
