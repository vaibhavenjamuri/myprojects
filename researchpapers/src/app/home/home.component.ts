import { Component, OnInit,ViewChild } from '@angular/core';

//import { ChildComponent } from '../child/child.component';
import { HttpClient } from '@angular/common/http';
import { UsersDataService } from '../services/users-data.service';
import { MasterService } from '../service/master.service';


@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent {
	title(title: any) {
		throw new Error('Method not implemented.');
	}
	users: any;
	total: any;
	filteredUsers: any; 
	http: HttpClient;
	platform: string = '1';
	year: string = '0';
	page: number = 1; // Current page number
	itemsPerPage: number = 5; // Number of items per page
	editingUser: any = null;
	constructor(private userData: UsersDataService, private httpClient: HttpClient) {
		this.http = httpClient;
	}
	ngOnInit(): void {
		this.userData.users().subscribe((data) => {
		this.users = data;
		if (this.users && this.users.length > 0) {
			this.filteredUsers = this.users.filter((user: any) => user.Year === user.Year && user.platform === user.platform  );
		}
		});
		this.userData.total().subscribe((data) => {
			this.total = data;
		});
	}
	getUserFormData(data: any) {
		if (this.users && this.users.length > 0) {
			if (data.Year === '0' && data.platform === '1' && data.Search) {
				this.filteredUsers = this.users.filter((user: any) => (user.Year === user.Year && user.platform === user.platform) && (user.Authors.toLowerCase().includes(data.Search.toLowerCase())|| user.Title.toLowerCase().includes(data.Search.toLowerCase())||user.Year.toLowerCase().includes(data.Search.toLowerCase())||user.Source_Title.toLowerCase().includes(data.Search.toLowerCase())));
			} 
			else if (data.Year === '0' && data.platform === '1' && !data.Search) {
				this.filteredUsers = this.users.filter((user: any) => user.Year === user.Year && user.platform === user.platform) ;
			} 
			else if (data.Year !== '0' && data.platform !== '1' && !data.Search) {
				this.filteredUsers = this.users.filter((user: any) => user.Year === data.Year && user.platform.includes(data.platform));
			} 
			else if (data.Year === '0' && data.platform !== '1' && !data.Search) {
				this.filteredUsers = this.users.filter((user: any) =>user.platform && user.platform.split(',').map((p: string) => p.trim()).includes(data.platform));
			} 
			else if (data.Year !== '0' && data.platform === '1' && !data.Search) {
				this.filteredUsers = this.users.filter((user: any) => user.Year === data.Year);
			} 
			else if (data.Search && !data.Year && !data.platform) {
				this.filteredUsers = this.users.filter((user: any) => user.Authors.toLowerCase().includes(data.Search.toLowerCase())|| user.Title.toLowerCase().includes(data.Search.toLowerCase())||user.Year.toLowerCase().includes(data.Search.toLowerCase())||user.Source_Title.toLowerCase().includes(data.Search.toLowerCase()));
			} 
			else if (data.Year !== '0' && data.platform !== '1' && data.Search) {
				this.filteredUsers = this.users.filter((user: any) => user.Year === data.Year && user.platform === data.platform && (user.Authors.toLowerCase().includes(data.Search.toLowerCase())|| user.Title.toLowerCase().includes(data.Search.toLowerCase())||user.Year.toLowerCase().includes(data.Search.toLowerCase()) ||user.Source_Title.toLowerCase().includes(data.Search.toLowerCase())));
			} 
			else if (data.Year !== '0' && data.platform === '1' && data.Search) {
				this.filteredUsers = this.users.filter((user: any) => user.Year === data.Year && (user.Authors.toLowerCase().includes(data.Search.toLowerCase())|| user.Title.toLowerCase().includes(data.Search.toLowerCase())||user.Year.toLowerCase().includes(data.Search.toLowerCase()) ||user.Source_Title.toLowerCase().includes(data.Search.toLowerCase())));
			} 
			else if (data.Year === '0' && data.platform !== '1' && data.Search) {
				this.filteredUsers = this.users.filter((user: any) => user.platform === data.platform && (user.Authors.toLowerCase().includes(data.Search.toLowerCase())|| user.Title.toLowerCase().includes(data.Search.toLowerCase())||user.Year.toLowerCase().includes(data.Search.toLowerCase()) ||user.Source_Title.toLowerCase().includes(data.Search.toLowerCase())));
			} 
			const taskColumnChecked = {};
		}
	}
	openEditModal(user: any) {
    // Clone the user object to avoid modifying the original until save
	console.log('openEditModal');
    this.editingUser = { ...user };
	console.log(this.editingUser);

  }

  closeEditModal() {
    this.editingUser = null;
  }

  updateUser() {
    // Replace this with an actual update API call if needed
const index = this.filteredUsers.findIndex((user: any) => user.ID === this.editingUser?.ID);
    if (index > -1) {
      this.filteredUsers[index] = { ...this.editingUser };
    }
    this.closeEditModal();
  }
	private processData() {
	}
}
