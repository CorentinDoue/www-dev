import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CvHomeComponent } from './cv-home.component';

describe('CvHomeComponent', () => {
  let component: CvHomeComponent;
  let fixture: ComponentFixture<CvHomeComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CvHomeComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CvHomeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
