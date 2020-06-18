package com.demo;

import org.apache.commons.fileupload.FileItem;
import org.apache.commons.fileupload.FileUploadException;
import org.apache.commons.fileupload.disk.DiskFileItemFactory;
import org.apache.commons.fileupload.servlet.ServletFileUpload;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.File;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.List;

@WebServlet("/DemoServlet")
public class DemoServlet extends HttpServlet {
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        ServletFileUpload sf=new ServletFileUpload(new DiskFileItemFactory());
        List<FileItem> multifiles=null;
        try {
            multifiles = sf.parseRequest(request);
        } catch (FileUploadException e) {
            e.printStackTrace();
        }
        for(FileItem item : multifiles) {
            try {
                item.write(new File("C:\\xampp\\htdocs\\final_exam\\files_from_people/"+item.getName()));
            } catch (Exception e) {
                e.printStackTrace();
            }
        }
        RequestDispatcher dispatcher= request.getRequestDispatcher("/succes.jsp");
        dispatcher.forward(request, response);
    }

}
