package ml.siddharth.inspireme;

import android.content.Intent;
import android.net.Uri;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.google.firebase.FirebaseApp;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;
import com.squareup.picasso.Picasso;

import java.util.Random;

public class UserDetailsActivity extends AppCompatActivity {
    private TextView name,location,company,doj;
    private Button github;
    private String name1,loc1,comp1,doj1,git1,prof1;
    private ImageView prof;
    private DatabaseReference mWomenDatabase;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_user_details);
        mWomenDatabase = FirebaseDatabase.getInstance().getReference();
        Random random = new Random();
        int rand = random.nextInt(90);

        name = (TextView)findViewById(R.id.name);
        prof = (ImageView)findViewById(R.id.profileimage);
        company = (TextView)findViewById(R.id.company);
        location = (TextView)findViewById(R.id.location);
        doj = (TextView)findViewById(R.id.doj);
        github = (Button)findViewById(R.id.github);

        DatabaseReference inspirer = mWomenDatabase.child("name").child(String.valueOf(rand));

        inspirer.addValueEventListener (new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                if (dataSnapshot.exists()){
                    name1 = dataSnapshot.child("name").getValue(String.class);
                    comp1 = dataSnapshot.child("company").getValue(String.class);
                    loc1 = dataSnapshot.child("location").getValue(String.class);
                    doj1 = dataSnapshot.child("doj").getValue(String.class);
                    git1 = dataSnapshot.child("github_url_url").getValue(String.class);
                    prof1 = dataSnapshot.child("image_url").getValue(String.class);


                    Picasso.get().load(prof1).into(prof);

                    name.setText(name1);
                    company.setText(comp1);
                    location.setText(loc1);
                    doj.setText(doj1);
                    github.setOnClickListener(new View.OnClickListener() {
                        @Override
                        public void onClick(View view) {
                            Uri uri = Uri.parse(git1);
                            Intent intent = new Intent(Intent.ACTION_VIEW, uri);
                            startActivity(intent);
                        }
                    });
                }
              else {
                    Toast.makeText(getApplicationContext(),"error",Toast.LENGTH_SHORT).show();
                }

            }

            @Override
            public void onCancelled(DatabaseError databaseError) {

            }
        });







    }
}