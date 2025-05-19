import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PublicationFormComponent } from './publication-form.component';

describe('PublicationFormComponent', () => {
  let component: PublicationFormComponent;
  let fixture: ComponentFixture<PublicationFormComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [PublicationFormComponent]
    });
    fixture = TestBed.createComponent(PublicationFormComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
