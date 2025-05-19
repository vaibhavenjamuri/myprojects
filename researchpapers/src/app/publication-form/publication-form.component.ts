import { Component } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { Validators } from '@angular/forms';

@Component({
  selector: 'app-publication-form',
  templateUrl: './publication-form.component.html',
  styleUrls: ['./publication-form.component.css']

})
export class PublicationFormComponent {
	fieldNames = [
	  'Authors', 'Title', 'Year', 'Source_title', 'Volume', 'Issue', 'Art_No',
	  'Page_start', 'Page_end', 'Page_count', 'DOI', 'Link', 'Abstract',
	  'Author_Keywords', 'Index_Keywords', 'Platform' 
	];
	  publicationForm: FormGroup;

	constructor(
	  private fb: FormBuilder,
	  private httpClient: HttpClient 
	) {
this.publicationForm = this.fb.group(
  this.fieldNames.reduce((acc, field) => {
    const requiredFields = ['Authors', 'Title', 'Year', 'Platform']; // define required fields here
    acc[field] = requiredFields.includes(field)
      ? ['', Validators.required]
      : [''];
    return acc;
  }, {} as { [key: string]: any })
);
	}
onSubmit() {
  const formData = this.publicationForm.value;

  this.httpClient.post<{ success: boolean, id?: number, error?: string }>(
    'http://172.16.1.57/api/savePublication.php',
    formData
).subscribe((response: { success: boolean, id?: number, error?: string }) => {
  if (response.success) {
    alert('Data saved successfully. Publication ID = ' + response.id);
  } else {
    alert('Error saving data: ' + response.error);
  }
});
}
getInputStyle(field: string) {
  switch (field) {
    case 'Authors':
    case 'Title':
    case 'DOI':
	case 'Link':
	case 'Abstract':
	case 'Author_Keywords':
	case 'Index_Keywords':
      return { width: '100%' };
    case 'Platform':
      return { width: '25%' };
    default:
      return { width: '200px' };
  }
}
isFieldRequired(field: string): boolean {
  const control = this.publicationForm.get(field);
  return control?.hasValidator(Validators.required) ?? false;
}
}
