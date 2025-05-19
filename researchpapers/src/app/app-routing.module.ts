import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { CommonModule } from '@angular/common';
import { HomeComponent } from './home/home.component';
import { MychartComponent } from './mychart/mychart.component';
import { PublicationFormComponent } from './publication-form/publication-form.component';
const routes: Routes = [
  {path:"home",component:HomeComponent},
  {path:"chart",component:MychartComponent},
  {path:"publication-form",component:PublicationFormComponent},

  ];
@NgModule({
  imports: [CommonModule,
  RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
