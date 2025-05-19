import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HttpClientModule } from '@angular/common/http';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations'
import { NgxPaginationModule } from 'ngx-pagination';
import { MychartComponent } from './mychart/mychart.component';
import { HomeComponent } from './home/home.component';
import { PublicationFormComponent } from './publication-form/publication-form.component';
import { ReactiveFormsModule } from '@angular/forms';
@NgModule({
  declarations: [
	HomeComponent,
	MychartComponent,
    AppComponent,
    PublicationFormComponent,

  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
	ReactiveFormsModule,
    BrowserAnimationsModule,
    NgxPaginationModule
  ],
  bootstrap: [AppComponent]

})
export class AppModule { }
