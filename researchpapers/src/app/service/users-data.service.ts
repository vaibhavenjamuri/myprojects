import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http'
@Injectable({
  providedIn: 'root'
})
export class UsersDataService {
  url='http://172.16.1.57/api/chart2.php';
    constructor(private http:HttpClient){ }
      users(){
        return this.http.get(this.url);
      }
    
  
}
