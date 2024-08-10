package com.mock.bodyguards.service.impl;

import com.mock.bodyguards.dto.request.example.ExampleRequest;
import com.mock.bodyguards.dto.response.example.ExampleResponse;
import com.mock.bodyguards.entity.Example;
import com.mock.bodyguards.exception.AlreadyExistsException;
import com.mock.bodyguards.repository.ExampleRepository;
import com.mock.bodyguards.service.IExampleService;
import lombok.AllArgsConstructor;
import org.modelmapper.ModelMapper;
import org.springframework.stereotype.Service;

import java.util.Optional;

@Service
@AllArgsConstructor
public class ExampleServiceImpl implements IExampleService {

    private ModelMapper modelMapper;
    private ExampleRepository exampleRepository;

    @Override
    public ExampleResponse createExample(ExampleRequest exampleRequest) {
        Example example = modelMapper.map(exampleRequest, Example.class);
        Optional<Example> exampleOptional = exampleRepository.findByMobileNumber(example.getMobileNumber());
        if(exampleOptional.isPresent()){
            throw new AlreadyExistsException("Example already registered with given mobileNumber " + example.getMobileNumber());
        }

        Example savedExample = exampleRepository.save(example);
        return modelMapper.map(savedExample, ExampleResponse.class);
    }

    @Override
    public ExampleResponse fetchExample(String mobileNumber) {
        return null;
    }

    @Override
    public boolean updateExample(ExampleRequest customerDto) {
        return false;
    }

    @Override
    public boolean deleteExample(String mobileNumber) {
        return false;
    }
}
