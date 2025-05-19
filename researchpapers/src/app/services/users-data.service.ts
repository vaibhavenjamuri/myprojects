import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http'
@Injectable({
  providedIn: 'root'
})
export class UsersDataService {
  url='http://172.16.1.57/api/view.php';
  url2='http://172.16.1.57/api/total.php';
    constructor(private http:HttpClient){ }
      users(){
        return this.http.get(this.url);
      }
    total(){
	 return this.http.get(this.url2);
	}
  
}
